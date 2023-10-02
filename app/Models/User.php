<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'users';


    public static function autenticate($email, $password)
    {
        $user = User::where('email', $email)->first();
        if ($user && $user->password === $password) {
            return $user;
        }
        return false;
    }
}
