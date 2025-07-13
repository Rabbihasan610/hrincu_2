<?php

namespace App\Constants;

class FileInfo
{
    public function fileInfo()
    {
        $data['verify'] = [
            'path' => 'verify'
        ];
        $data['default'] = [
            'path' => 'assets/images/default.png',
        ];
        $data['ticket'] = [
            'path' => 'support',
        ];
        $data['logoIcon'] = [
            'path' => 'assets/images/logoIcon',
        ];
        $data['favicon'] = [
            'size' => '128x128',
        ];
        $data['extensions'] = [
            'path' => 'assets/images/extensions',
            'size' => '36x36',
        ];
        $data['seo'] = [
            'path' => 'assets/images/seo',
            'size' => '1180x600',
        ];
        $data['userProfile'] = [
            'path' => 'assets/images/user/profile',
            'size' => '300x300',
        ];
        $data['adminProfile'] = [
            'path' => 'assets/admin/images/profile',
            'size' => '300x300',
        ];

        $data['city'] = [
            'path' => 'assets/admin/images/city',
            'size' => '285x210',
        ];

        $data['state'] = [
            'path' => 'assets/admin/images/state',
            'size' => '285x210',
        ];

         $data['all_category'] = [
            'path' => 'assets/admin/images/all_category',
            'size' => '285x210',
        ];


        $data['blog'] = [
            'path' => 'assets/admin/images/blog',
            'size' => '800x600',
        ];

        $data['service'] = [
            'path' => 'assets/admin/images/service',
            'size' => '100x100',
        ];
        $data['trainingpath'] = [
            'path' => 'assets/admin/images/trainingpath',
            'size' => '570x440',
        ];
        
        $data['sector'] = [
            'path' => 'assets/admin/images/sector',
            'size' => '416x300',
        ];

        return $data;
    }

}
