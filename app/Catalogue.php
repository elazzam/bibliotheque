<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class Catalogue extends Model {

public static $rules=array(

);

    public static function validate($data){
        return Validator::make($data,static::$rules);
    }
}
