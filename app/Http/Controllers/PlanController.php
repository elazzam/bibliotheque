<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use App\Plan;
use Illuminate\Support\Facades\Request;


class PlanController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
if(Request::ajax()){
$ref = Input::get('reference');
$desi = Input::get('designation');
$loc = Input::get('locataire');
$dep = Input::get('departement');



$disp = Input::get('etat');

    //dd(Input::all());
if($disp==0 or $disp ==1)
$plans = Plan::where('reference' ,'like', "%$ref%")->where('designation','like',"%$desi%")->where('locataire','like',"%$loc%")->where('disponible','=',$disp)->where('departement','like',"%$dep%")->orderBy('created_at','desc')->paginate(15);
else
$plans = Plan::where('reference' ,'like', "%$ref%")->where('designation','like',"%$desi%")->where('locataire','like',"%$loc%")->where('departement','like',"%$dep%")->orderBy('created_at','desc')->paginate(15);

return View::make('plan.ajaxtable',['plans'=>$plans]);
}

$plans = Plan::orderBy('created_at','desc')->paginate(15);
return View::make('plan.index', array('plans' => $plans));

}

/**
 * Show the form for creating a new resource.
 *
 * @return Response
 */
public function create()
{
    return View::make('plan.create');
}

/**
 * Store a newly created resource in storage.
 *
 * @return Response
 */
public function store()
{
    $validation = Plan::validate(Input::all());

    if($validation->fails() ){

        return redirect()->back()->withErrors($validation->errors())->withInput();
    }

    $plan = new Plan;
    $plan->reference=Input::get('reference');
    $plan->designation=Input::get('designation');
    $plan->disponible=0;//disponible
    $plan->locataire='';
    $plan->commentaire=Input::get('commentaire');
    $plan->departement=Input::get('departement');
    $plan->save();

    $file = Input::file('plan');
    if($file) {
        $name = Input::file('plan')->getClientOriginalName();
        $file->move("document/plans/$plan->id", $name);
    }

    $plans = Plan::orderBy('created_at','desc')->paginate(15);
    return View::make('plan.index', array('plans' => $plans));
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return Response
 */
public function show($id)
{
    if(Plan::find($id)) {
        $plan = Plan::find($id);
        if (File::exists("document/plans/$id")) {
            return View::make('plan.show')->with(['plan' => $plan, 'files' => File::allFiles("document/plans/$id")]);
        } else {

            return View::make('plan.show')->with(['plan' => $plan]);
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
    if(Plan::find($id)) {
        $plan = Plan::find($id);
        if (File::exists("document/plans/$id")) {
            return View::make('plan.edit')->with(['plan' => $plan, 'files' => File::allFiles("document/plans/$id")]);
        } else {

            return View::make('plan.edit')->with(['plan' => $plan]);
        }
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
    $validation = Plan::validate(Input::all());

    if($validation->fails() ){

        return redirect()->back()->withErrors($validation->errors())->withInput();
    }


    $plan = Plan::find($id);
    $plan->reference=Input::get('reference');
    $plan->departement=Input::get('departement');
    $plan->designation=Input::get('designation');
    $plan->disponible=Input::get('disponible');
    $plan->locataire=Input::get('locataire');
    $plan->date_sortie=Input::get('date_sortie');
    $plan->commentaire=Input::get('commentaire');
    $plan->save();

    $file = Input::file('plan');

    if($file) {
        $success = File::cleanDirectory("document/plans/$id");
        $name = Input::file('plan')->getClientOriginalName();
        $file->move("document/plans/$id", $name);
    }


    $plans = Plan::orderBy('created_at','desc')->paginate(15);
    return View::make('plan.index', array('plans' => $plans));
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return Response
 */
public function destroy($id)
{
    if(Plan::find($id)) {
        $plan = Plan::find($id);
        if (File::exists("document/plans/$id")) {
            $success = File::cleanDirectory("document/plans/$id");
        }
        $plan->delete($id);
        return redirect()->back();
    }
}

public function downloadplan($id){
    if(Plan::find($id)){

            $files = File::allFiles("document/plans/$id");

        foreach ($files as $file) {
            return \Response::download($file);
        }
    }

}


}
