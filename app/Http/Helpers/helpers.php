<?php

use Carbon\Carbon;
use App\Models\Fvt;
use App\Lib\Captcha;
use App\Models\City;
use App\Models\Resume;
use App\Notify\Notify;
use App\Lib\ClientInfo;
use App\Models\Country;
use App\Lib\FileManager;
use App\Models\Frontend;
use App\Constants\Status;
use App\Models\Extension;
use Illuminate\Support\Str;
use App\Models\GeneralSetting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

function getIpInfo()
{
    $ipInfo = ClientInfo::ipInfo();
    return $ipInfo;
}

function osBrowser()
{
    $osBrowser = ClientInfo::osBrowser();
    return $osBrowser;
}

function getRealIP()
{
    $ip = $_SERVER["REMOTE_ADDR"];
    //Deep detect ip
    if (filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    }
    if (filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    if ($ip == '::1') {
        $ip = '127.0.0.1';
    }

    return $ip;
}

function gs($key = null)
{
    $general = Cache::get('GeneralSetting');
    if (!$general) {
        $general = GeneralSetting::first();
        Cache::put('GeneralSetting', $general);
    }

    $general = GeneralSetting::first();

    if ($key) {
        return @$general->$key;
    }

    return $general;
}

function appendQuery($key, $value)
{
    return request()->fullUrlWithQuery([$key => $value]);
}

function siteFavicon()
{
    return getImage(getFilePath('logoIcon') . '/favicon.png');
}

function siteLogo($type = null)
{
    $name = $type ? "/logo_$type.png" : '/logo.png';
    return getImage(getFilePath('logoIcon') . $name);
}

function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    return asset('assets/images/default.png');
}

function getFilePath($key)
{
    return fileManager()->$key()->path;
}

function fileManager()
{
    return new FileManager();
}

function getFileSize($key)
{
    return fileManager()->$key()->size;
}

function getContent($dataKeys, $singleQuery = false, $limit = null, $orderById = false)
{

    if ($singleQuery) {
        $content = Frontend::where('data_keys', $dataKeys)->orderBy('id', 'desc')->first();
    } else {

        $article = Frontend::when($limit != null, function ($q) use ($limit) {
            return $q->limit($limit);
        });
        if ($orderById) {
            $content = $article->where('data_keys', $dataKeys)->orderBy('id')->get();
        } else {
            $content = $article->where('data_keys', $dataKeys)->orderBy('id', 'desc')->get();
        }
    }
    return $content;
}

function verifyCaptcha()
{
    return Captcha::verify();
}

function notify($user, $templateName, $shortCodes = null, $sendVia = null, $createLog = true)
{
    $general = gs();

    $globalShortCodes = [
        'site_name' => $general->site_name,
        'site_currency' => $general->cur_text,
        'currency_symbol' => $general->cur_sym,
    ];

    if (gettype($user) == 'array') {
        $user = (object) $user;
    }

    $shortCodes = array_merge($shortCodes ?? [], $globalShortCodes);

    $notify = new Notify($sendVia);
    $notify->templateName = $templateName;
    $notify->shortCodes = $shortCodes;
    $notify->user = $user;
    $notify->createLog = $createLog;
    $notify->userColumn = isset($user->id) ? $user->getForeignKey() : 'user_id';
    $notify->send();
}

function verificationCode($length)
{
    if ($length == 0) {
        return 0;
    }

    $min = pow(10, $length - 1);
    $max = (int) ($min - 1) . '9';
    return random_int($min, $max);
}

function showEmailAddress($email)
{
    $endPosition = strpos($email, '@') - 1;
    return substr_replace($email, '***', 1, $endPosition);
}

function getNumber($length = 8)
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function urlPath($routeName, $routeParam = null)
{
    if ($routeParam == null) {
        $url = route($routeName);
    } else {
        $url = route($routeName, $routeParam);
    }
    $basePath = route('home');
    $path = str_replace($basePath, '', $url);
    return $path;
}

function menuActive($routeName)
{
    if ($routeName) {
        $class = 'mm-active';
        if (is_array($routeName)) {
            foreach ($routeName as $key => $value) {
                if (request()->routeIs($routeName)) {
                    return $class;
                }
            }
        } else {
            if (request()->routeIs($routeName)) {
                return $class;
            }
        }
    }
}

function getPaginate($paginate = 20)
{
    return $paginate;
}

function paginateLinks($data)
{
    return $data->appends(request()->all())->links();
}

function showDateTime($date, $format = 'Y-m-d h:i A')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}
function diffForHumans($date)
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->diffForHumans();
}

function showAmount($amount, $decimal = 2, $separate = true, $exceptZeros = false)
{
    $separator = '';
    if ($separate) {
        $separator = ',';
    }
    $printAmount = number_format($amount, $decimal, '.', $separator);
    if ($exceptZeros) {
        $exp = explode('.', $printAmount);
        if ($exp[1] * 1 == 0) {
            $printAmount = $exp[0];
        } else {
            $printAmount = rtrim($printAmount, '0');
        }
    }
    return $printAmount;
}

function fileUploader($file, $location, $size = null, $old = null, $thumb = null)
{

    $fileManager = new FileManager($file);
    $fileManager->path = $location;
    $fileManager->size = $size;
    $fileManager->old = $old;
    $fileManager->thumb = $thumb;
    $fileManager->upload();
    return $fileManager->filename;
}

function strLimit($title = null, $length = 10)
{
    return Str::limit($title, $length);
}

function keyToTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}

function getPageSections($arr = false)
{
    $jsonUrl = resource_path('views/') . 'sections.json';
    $sections = json_decode(file_get_contents($jsonUrl));
    if ($arr) {
        $sections = json_decode(file_get_contents($jsonUrl), true);
        ksort($sections);
    }
    return $sections;
}
function titleToKey($text)
{
    return strtolower(str_replace(' ', '_', $text));
}
function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}

function loadCustomCaptcha($width = '100%', $height = 46, $bgColor = '#003')
{
    return Captcha::customCaptcha($width, $height, $bgColor);
}

function loadReCaptcha()
{
    return Captcha::reCaptcha();
}

function showMobileNumber($number)
{
    $length = strlen($number);
    return substr_replace($number, '***', 2, $length - 4);
}

function loadExtension($key)
{
    $extension = Extension::where('act', $key)->where('status', Status::ENABLE)->first();
    return $extension ? $extension->generateScript() : '';
}


if( !function_exists('sortOrder') ){
    function sortOrder($countries){

        $maxSortOrder = $countries->max('sort_order');

        $completeSequence = range(1, $maxSortOrder);

        $mergedSequence = $completeSequence + $countries->pluck('sort_order')->toArray();

        sort($mergedSequence);

        $mergedSequence = array_values($mergedSequence);

        $countries->transform(function ($item, $key) use ($mergedSequence) {
            $item->sort_order = $mergedSequence[$key];
            return $item;
        });

        return $countries;
    }
}

if (!function_exists('getCountry')) {
    function getCountry() {
        $getIpInfo = getIpInfo();

        if (!empty($getIpInfo['country']) && count($getIpInfo['country']) < 0) {
            return Country::where('name', $getIpInfo['country'])->first();
        } else {
            return Country::where('sort_order', 1)->first();
        }
    }
}


if (!function_exists('getCity')) {
    function getCity($id) {
        $city = City::find($id);
        return $city;
    }
}



if (!function_exists('getCities')) {
    function getCities() {
        $country = getCountry();

        if ($country) {
            return City::where('country_id', $country->id)->get(['id', 'name', 'name_ar']);
        }

        return [];
    }
}


if (!function_exists('fvtPost')) {
    function fvtPost($type, $property_id)
    {
        $user_id = auth()->user()->id;

        $existing_fvt = Fvt::where('type', $type)
                            ->where('property_id', $property_id)
                            ->where('user_id', $user_id)
                            ->first();

        if ($existing_fvt) {
            $existing_fvt->delete();
            return false;
        }

        $fvt = new Fvt();
        $fvt->type = $type;
        $fvt->property_id = $property_id;
        $fvt->user_id = $user_id;
        $fvt->save();
        return true;
    }
}




if(!function_exists('getFvtCount')){
    function getFvtCount($type, $property_id){
        $fvt = Fvt::where('type', $type)->where('property_id', $property_id)->count();
        return $fvt;
    }
}

if(!function_exists('findMyFvt')){
    function findMyFvt($type, $property_id){
        $user_id = auth()->user()->id ?? 0;
        $fvt = Fvt::where('type', $type)->where('property_id', $property_id)->where('user_id', $user_id)->first();
        if($fvt){
            return true;
        }else{
            return false;
        }
    }
}



if(!function_exists('filePath')){
    function filePath()
    {
        $path['import'] = [
            'path'=>'assets/import',
        ];

        $path['demo'] = [
            'path'=>'assets/demo/email',
            'path_email'=>'assets/demo/email',
        ];

        return $path;
    }
}

if(!function_exists('download_from_url')){
    function download_from_url(string $url, string $prefix = ''): ?string
    {

        if (! $stream = @fopen($url, 'r')) {
            throw new \Exception('Can not open file from ' . $url);
        }

        $tempFile = tempnam(sys_get_temp_dir(), $prefix);

        if (file_put_contents($tempFile, $stream)) {
            return $tempFile;
        }

        return null;
    }
}

if (!function_exists('saveResume')) {
    function saveResume($file, $video_link = null, $update = false)
    {
        if (!$file instanceof UploadedFile) {
            throw new \Exception('Invalid file upload.');
        }

        if ($file->getClientOriginalExtension() !== 'pdf') {
            throw new \Exception('Only PDF files are allowed.');
        }

        $location = 'resumes/';
        $sizeLimit = 1024 * 1024 * 10;

        if ($file->getSize() > $sizeLimit) {
            throw new \Exception('File size exceeds the 10MB limit.');
        }

        $filename = uniqid('resume_') . '.' . $file->getClientOriginalExtension();

        if ($update) {
            $resume = Resume::findOrFail($update);
            if (file_exists('resumes/' . $resume->resume)) {
                unlink('resumes/' . $resume->resume);
            }

            $file->move(public_path($location), $filename);

            $resume->video_link = $video_link;
            $resume->resume = $filename;
            $resume->save();
            return $resume;
        }

        $file->move(public_path($location), $filename);

        return $filename;
    }
}


if (!function_exists('safe_count')) {

    function safe_count($value) {
        if (is_array($value) || $value instanceof Countable) {
            return count($value);
        }
        if (is_string($value) && json_decode($value)) {
            return count(json_decode($value, true));
        }
        return 0;
    }
}


if (!function_exists('getHeroBanner')) {
    function getHeroBanner(string $type, string $section = 'hero_banner'): object 
    {
        $heroBanners = getContent($section.'.element', false, null, true);

        $heroBanner = (object) [
            "subtitle" => "",
            "title" => "",
            "description" => "",
            "image" => ""
        ];

        $appLocale = app()->getLocale();

        foreach ($heroBanners as $banner) {
            if (isset($banner->data_values->page_slug) && $banner->data_values->page_slug == $type) {
                if(isset($banner->data_values->subtitle)){
                    $heroBanner->subtitle = $appLocale == 'en' ? $banner->data_values->subtitle : $banner->data_values->subtitle_ar;
                }
                if(isset($banner->data_values->title)){
                    $heroBanner->title = $appLocale == 'en' ? $banner->data_values->title : $banner->data_values->title_ar;
                }
                if(isset($banner->data_values->description)){
                    $heroBanner->description = $appLocale == 'en' ? $banner->data_values->description : $banner->data_values->description_ar;
                }
                if(isset($banner->data_values->image)){
                    $heroBanner->image = getImage('assets/images/frontend/' . $section . '/' . $banner->data_values->image);
                }
                break;
            }
        }

        return $heroBanner;
    }
}