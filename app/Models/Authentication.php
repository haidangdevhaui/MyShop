<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{

    public static function login($userId, $accessToken, $expired)
    {
    	$auth = new Authentication;
        $auth->user_id      = $userId;
        $auth->access_token = $accessToken;
        $auth->expired      = $expired;
        $auth->save();
    }
}
