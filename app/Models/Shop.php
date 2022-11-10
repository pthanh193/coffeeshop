<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';
    protected $fillable = [
        'id_district',
        'name',
        'address',
        'openingtime',
        'price',
        'description',
        'image1',
        'image2',
    ];

    public function district() {
        return $this->belongsTo(District::class, 'id_district');
    }
        
    public static function validate(array $data) {
        $errors = [];

        if (! $data['id_district']){
            $errors['id_district'] = 'District field cannot be empty.';
        } 

        if(! $data['name']){
            $errors['name'] = 'Name field cannot be empty.';
        }

        if(! $data['address']){
            $errors['address'] = 'Address field cannot be empty.';
        }

        if(! $data['openingtime']){
            $errors['openingtime'] = 'Opening time field cannot be empty.';
        }

        if(! $data['price']){
            $errors['price'] = 'Price field cannot be empty.';
        }

        if(! $data['description']){
            $errors['description'] = 'Description field cannot be empty.';
        }

        if(empty($_FILES['image1']['name'] )){
            $errors['image1'] = 'Image field cannot be empty.';
        }

        if(empty($_FILES['image2']['name'] ) ){
            $errors['image2'] = 'Image field cannot be empty.';
        }

        return $errors;
    }   

    public static function validateUpdate(array $data) {
        $errors = [];

        if (! $data['id_district']){
            $errors['id_district'] = 'District field cannot be empty.';
        } 

        if(! $data['name']){
            $errors['name'] = 'Name field cannot be empty.';
        }

        if(! $data['address']){
            $errors['address'] = 'Address field cannot be empty.';
        }

        if(! $data['openingtime']){
            $errors['openingtime'] = 'Opening time field cannot be empty.';
        }

        if(! $data['price']){
            $errors['price'] = 'Price field cannot be empty.';
        }

        if(! $data['description']){
            $errors['description'] = 'Description field cannot be empty.';
        }

        return $errors;
    }   

}