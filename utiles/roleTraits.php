<?php
namespace utiles\roleTraits;
use App\User;
trait roleTraits{
    public static function hasRole($user_id){
        return User::where('id', $user_id)->where('role', 1)->exists();
    }
}