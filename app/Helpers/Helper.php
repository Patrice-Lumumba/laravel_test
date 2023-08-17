<?php

namespace App\Helpers;

use App\Models\Message;

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

    public static function getCity() {
        $data = [];
        $data['douala'] = 'Douala';
        $data['youande'] = 'Yaoundé';
        $data['dschang'] = 'Dschang';
        $data['bafoussam'] = 'Baffoussam';

        return $data;
    }

    public static function getNumeroChambre() {
        $data = [];
        $data['s01'] = 'S01';
        $data['s02'] = 'S02';
        $data['s03'] = 'S03';
        $data['s04'] = 'S04';
        $data['s05'] = 'S05';
        $data['s06'] = 'S06';

        return $data;
    }

    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    }

}
