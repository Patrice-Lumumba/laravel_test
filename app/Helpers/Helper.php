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

    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    }

}
