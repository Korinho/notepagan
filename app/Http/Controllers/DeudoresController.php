<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\StoreDeudorRequest;

use App\Deudor;


class DeudoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeudorRequest $request)
    {
        if($deudor = Deudor::where(['nombre'=>$request->nombre])->first())
        {
            $deudor->total_deudas = $deudor->total_deudas + $request->total_deudas;

            if($deudor->tipo == 'personas')
            {
                $newDeudor = Deudor::create($deudor->toArray());
                return $newDeudor->id;
            }   

            $deudor->save();
            return $deudor->id;
        }

        $deudor = Deudor::create($request->all());
        $deudor->save();
        return $deudor->id;
    }
    public function apiStore(Request $request)
    {
        if(Deudor::create($request->all()))
            return true;
        else
            return false;

    }
    public function autoCompleteNombre(Request $request)
    {

        $deudores = Deudor::select('nombre')
                    ->where('nombre','LIKE',"%$request->keyword%")
                    ->take(10)
                    ->get();
        return json_encode($deudores);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function setlogo(Request $request, $id)
    {
        
        $file = $request->file('file');

        $name = $file->getClientOriginalName();

        $path = 'archivos/logos/'.$id;

        $name = md5($name).time();

        $file->move($path,$name);

        $deudor = Deudor::find($id);

        $deudor->logo = "/".$path."/".$name;

        $deudor->save();    

        return 'good';

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
        $deudor = Deudor::find($id); 
        $deudor->delete();
        //
    }
}
