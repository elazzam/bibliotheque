<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class Catalogue extends Model {

public static $rules=array(

    'reference'=>'required|string',
    'designation'=>'required|string',
    'commentaire'=>'string',
    'departement'=>'required|in:preho,concasseur',
    'locataire'=>'string',
    'disponible'=>'in:0,1'
);

    public static function validate($data){
        return Validator::make($data,static::$rules);
    }
}
