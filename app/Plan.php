<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Plan extends Model {

    public static $rules=array(

        'reference'=>'required',
        'designation'=>'required',
        'commentaire'=>'string',
        'departement'=>'required|in:preho',
        'date_sortie'=>'date',
        'locataire'=>'string',
        'disponible'=>'in:0,1',
        'plan'=>'mimes:pdf,jpg,png,jpeg|size:5000'

    );

    public static function validate($data){
        return Validator::make($data,static::$rules);
    }

}
