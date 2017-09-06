<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use App\Http\Requests;

use App\Http\Requests\StoreCasoRequest;

use Illuminate\Support\Facades\Auth;

// Models
use App\User;
use App\Caso;
use App\Deudor;
use App\Comentario;

// Algolia
use App\Contracts\Search;


class CasosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $casos = Caso::where('usuario_id',$user->id)->with('deudor')->paginate(5) ;
        return view('casos.index',compact('casos'));

    }

    public function apiMisCasos()
    {
        $user = Auth::user();
        $casos = Caso::where('usuario_id',$user->id)->with('deudor')->paginate(5) ;
        return collect($casos->items());
    }

    public function apiStatus(Request $request)
    {
        
        $caso = Caso::find($request->id);
        $caso->status = $request->status;
        $caso->desenlace = $request->desenlace;
        $caso->save();

        return $caso->id; 
    }
    public function apiGetFilter($filterKey)
    {
        $casos   = Caso::orderBy($filterKey)
                        ->with(['deudor','usuario'])
                        ->take(10)
                        ->get();
        
        return json_encode($casos);
    }
    public function apiGetByStatus($status)
    {
        $casos   = Caso::where(['status' => $status])
                        ->with(['deudor','usuario'])
                        ->take(10)
                        ->get();
        
        return json_encode($casos);
    }

    public function create(Search $search)
    {   
        return view('casos.create');
    }
    public function createAgain($idEmpresa)
    {
        $empresa = Deudor::find($idEmpresa);

        return view('casos.create',compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCasoRequest $request)
    {
        $caso = new Caso($request->all());
        $caso->usuario_id = Auth::user()->id;
        $caso->save();

        $request->session()->flash('success', 'Caso creado exitosamente!');

        return $caso->id;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caso = Caso::find($id);
        
        if($caso == null)
            return redirect('/');

        $deudor = Deudor::find($caso->deudor->id);

        $comentarios = Comentario::
            where(['caso_id' => $id])
                ->with(['user','likes'])
                ->orderBy('created_at','desc')
                ->get();

        return view('casos.show',compact(
            [
                'caso',
                'deudor',
                'comentarios'
            ]
        ));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
