<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('user.profile_setting', compact('user'));
    }

    public function submitProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $user = auth()->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image;
                $user->image = fileUploader($request->image, getFilePath('userProfile'), getFileSize('userProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->address = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => @$user->address->country,
            'city' => $request->city,
        ];

        $user->save();
        $notify[] = ['success', 'Profile updated successfully'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {
        return view('user.password');
    }

    public function submitPassword(Request $request)
    {

        $passwordValidation = Password::min(6);
        if (gs('secure_password')) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $this->validate($request, [
            'current_password' => 'required',
            'password' => ['required', 'confirmed', $passwordValidation],
        ]);

        $user = auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            $notify[] = ['success', 'Password changes successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'The password doesn\'t match!'];
            return back()->withNotify($notify);
        }
    }

    public function accoundChangePassword(){
        $data['user'] = User::findOrFail(Auth::user()->id);
        return view('user.change-password',$data);
    }

    public function accoundChangePasswordStore(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();

            $notify[] = ['success', 'Password Changed Successfully.'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Sorry! Your current password dost not match.'];
            return redirect()->back()->withNotify($notify);
        }
    }

    public function accoundChangeUserId(){
        $data['user'] = User::findOrFail(Auth::user()->id);
        return view('user.edit-id',$data);
    }

    public function accoundChangeUserIdStore(Request $request){
        $this->validate($request,[
            'password' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->password])){
            $user = User::find(Auth::user()->id);
            $user->email = $request->email;
            $user->save();

            $notify[] = ['success', 'User ID Changed Successfully.'];

            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Sorry! Your password dost not match.'];
            return redirect()->back()->withNotify($notify);
        }
    }
}
