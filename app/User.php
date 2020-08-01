<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'email_verified_at', 'password', 'remember_token', 'api_token'];

    public function generateToken()
    {
        $this->api_token = Str::random(60);;
        $this->save();

        return $this->api_token;
    }
}
