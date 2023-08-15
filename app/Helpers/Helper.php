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

    public static function getTypeHouse() {
        $data = [];
        $data['chambre'] = 'Chambre';
        $data['appartement'] = 'Appartement';

        return $data;
    }

}
