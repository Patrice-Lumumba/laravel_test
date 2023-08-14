<?php

namespace App\Helpers;

class Helper
{
    public static function getRole() {
        $data = [];
        $data['admin'] = 'Admin';
        $data['user'] = 'User';

        return $data;
    }

}
