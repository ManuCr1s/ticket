<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Origen;
use App\Models\Pasos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ticket.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $response = Pasos::where('idsol',$id)->first();
        if(!$response){
            $errors = ['Not_Found'=> 'No se encontro el expediente'];
            return  $errors = $errors->toJson();
        }
        return $response = $response->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    { 
        $validated = Validator::make($request->all(), $this->rules(),$this->message());
        if($validated->fails())return $validated->errors();
        $origen = Origen::where('idsol',$request->input('ticket'))->first();
        if(!$origen)return $errors = ['Not_Found'=> 'No se encontro el expediente, ingrese nuevamente'];
        $pasos = $this->store($origen->idsol);
        $origen = $origen->toJson();
        $response = $origen.$pasos;
        return $origen;        
    }
    public function rules()
    {
        return [
            'anio' => 'opcion_valida',
            'ticket' => 'required'
        ];  
    }
    public function message()
    {
        return [
            'anio.opcion_valida' => 'Por favor ingrese año del listado',
            'ticket.required' => 'Por favor ingrese el codigo de ticket'
        ];
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
