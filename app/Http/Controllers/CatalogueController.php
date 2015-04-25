<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Catalogue;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class CatalogueController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(\Request::ajax()){
            $ref = Input::get('reference');
            $desi = Input::get('designation');
            $loc = Input::get('locataire');
            $dep = Input::get('departement');



            $disp = Input::get('etat');

            //dd(Input::all());
            if($disp==0 or $disp ==1)
                $catalogues = Catalogue::where('reference' ,'like', "%$ref%")->where('designation','like',"%$desi%")->where('locataire','like',"%$loc%")->where('disponible','=',$disp)->where('departement','like',"%$dep%")->orderBy('created_at','desc')->paginate(15);
            else
                $catalogues = Catalogue::where('reference' ,'like', "%$ref%")->where('designation','like',"%$desi%")->where('locataire','like',"%$loc%")->where('departement','like',"%$dep%")->orderBy('created_at','desc')->paginate(15);

            return View::make('catalogue.ajaxtable',['catalogues'=>$catalogues]);
        }

        $catalogues = Catalogue::orderBy('created_at','desc')->paginate(15);
        return View::make('catalogue.index', array('catalogues' => $catalogues));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('catalogue.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validation = Catalogue::validate(Input::all());

        if($validation->fails() ){

            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        $catalogue = new Catalogue;
        $catalogue->reference=Input::get('reference');
        $catalogue->designation=Input::get('designation');
        $catalogue->disponible=0;//disponible
        $catalogue->locataire='';
        $catalogue->commentaire=Input::get('commentaire');
        $catalogue->departement=Input::get('departement');
        $catalogue->save();



        $catalogues = Catalogue::orderBy('created_at','desc')->paginate(15);
        return View::make('catalogue.index', array('catalogues' => $catalogues));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        if(Catalogue::find($id)) {
            $catalogue = Catalogue::find($id);
            if (File::exists("document/catalogues/$id")) {
                return View::make('catalogue.show')->with(['catalogue' => $catalogue]);
            } else {

                return View::make('catalogue.show')->with(['catalogue' => $catalogue]);
            }
        }
        else {
            return View::make('errors.404');
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(Catalogue::find($id)) {
            $catalogue = Catalogue::find($id);


                return View::make('catalogue.edit')->with(['catalogue' => $catalogue]);

        }
        else {
            return View::make('errors.404');
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $validation = Catalogue::validate(Input::all());

        if($validation->fails() ){

            return redirect()->back()->withErrors($validation->errors())->withInput();
        }


        $catalogue = Catalogue::find($id);
        $catalogue->reference=Input::get('reference');
        $catalogue->departement=Input::get('departement');
        $catalogue->designation=Input::get('designation');
        $catalogue->disponible=Input::get('disponible');
        $catalogue->locataire=Input::get('locataire');
        $catalogue->date_sortie=Input::get('date_sortie');
        $catalogue->commentaire=Input::get('commentaire');
        $catalogue->save();




        $catalogues = Catalogue::orderBy('created_at','desc')->paginate(15);
        return View::make('catalogue.index', array('catalogues' => $catalogues));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if(Catalogue::find($id)) {
            $catalogue = Catalogue::find($id);
            $catalogue->delete($id);
            return redirect()->back();
        }
	}



}
