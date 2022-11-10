<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = ['name'];

    public function shop() {
        return $this->hasMany(Shop::class);
    }
}