<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['username', 'password', 'role'];

    public static function validate(array $data) {
        $errors = [];

        if (! $data['username']) 
        {
            $errors['username'] = 'Invalid username.';
        } elseif (static::where('username', $data['username'])->count() > 0) {
            $errors['username'] = 'Username already in use.';
        }    

        if (strlen($data['password']) < 6) 
        {
            $errors['password'] = 'Password must be at least 6 characters.';
        } elseif ($data['password'] != $data['password_confirmation']) {
            $errors['password'] = 'Password confirmation does not match.';
        }
        
        return $errors;
    }   
}
