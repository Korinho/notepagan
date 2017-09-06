<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Deudor;

use App\Caso;

class WebsiteController extends Controller
{
	public function index()
	{	
		$totalAdeudos = Caso::where(['status'=>0])->sum('adeudo');
		$totalEmpresas = Deudor::where(['tipo' => 'empresas'])->count();
		$totalPersonas = Deudor::where(['tipo' => 'personas'])->count();


		$deudores = Deudor::orderBy('total_deudas','desc')
						->with('casos')
						->take(3)
						->get();

		$casos = Caso::where(['status' => 0 ])
					->with('deudor','usuario')
					->orderBy('adeudo', 'desc')
					->take(10)
					->get();

    	return view('website.index',compact(
    		'deudores',
    		'totalAdeudos',
    		'totalEmpresas',
    		'totalPersonas',
    		'casos'
		));
	}
	public function terminos()
	{
		return view('website.terminos');
	}
	public function faqs()
	{
		return view('website.faqs');
	}
	public function publicidad()
	{
		return view('website.publicidad');
	}
	public function empresas()
	{
		$empresas = Deudor::where(['tipo' => 'empresas'])
							->with('casos')
							->orderBy('total_deudas',"desc")
							->take(3)
							->get();
		
		$casos = Caso::paginate(5);		

		return view('website.empresas',compact('empresas','casos'));
	}
	public function personas()
	{
		$personas = Deudor::where(['tipo' => 'personas'])
							->with('casos')
							->orderBy('total_deudas',"desc")
							->paginate(5);

		return view('website.personas',compact('personas'));
	}
	

	public function casosEmpresa($empresa)
	{
		$empresa = Deudor::where(['tipo' => 'empresas','nombre'=> $empresa])->first();
		$casos = Caso::where(['deudor_id' => $empresa->id])->paginate(5);

		return view('website.casosEmpresa', compact('casos','empresa'));
	}

	public function casosPersona($persona)
	{
		$personas = Deudor::where(['tipo' => 'personas'])
							->where("nombre", "LIKE", "%$persona%")
							->with('casos')
							->paginate(5);
		return view('website.casosPersona', compact('personas','persona'));
	}
	
	public function search($keyword)
	{
		$empresas 	= Deudor::searchByType($keyword,'empresas')->take(4)->get();
		$personas 	= Deudor::searchByType($keyword,'personas')->take(4)->get();
		$casos 		= Caso::search($keyword)->paginate(5);
		

    	return view('website.search',compact('empresas','personas','casos','keyword'));
	}

}
