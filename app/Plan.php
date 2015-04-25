<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Plan extends Model {

    public static $rules=array(

        'reference'=>'required|string',
        'designation'=>'required|string',
        'commentaire'=>'string',
        'departement'=>'required|in:preho,concasseur',
        'date_sortie'=>'date',
        'locataire'=>'string',
        'disponible'=>'in:0,1',
        'plan'=>'mimes:pdf,jpg,png,jpeg|max:10000'

    );

    public static function validate($data){
        return Validator::make($data,static::$rules);
    }

}
