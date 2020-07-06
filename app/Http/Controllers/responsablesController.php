<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importar el modelo
use App\responsable;

class responsablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $allresponsables = responsable::all(); 
       
        return view('responsables.index', compact('allresponsables'));
        
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
    public function store(Request $request)
    {
        //dd($request->description_text);
         //Create/crear
        $responsableObject = new responsable;
        $responsableObject->descripcion = $request->description_text;
        $responsableObject->responsable = $request->responsable_text;
        $responsableObject->fecha_solicitud = $request->fecha_date;
        $responsableObject->save();

        $allresponsables = responsable::all();
        
        return view('responsables.index', compact('allresponsables'));
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
        $objectToUpdate = responsable::find($id);
        return view('responsables.edit', compact('objectToUpdate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         //update/actualizar
        //dd($request);
        $objectToUpdate = responsable::find($request->id_responsable_hidden);
        $objectToUpdate->descripcion = $request->description_text;
        $objectToUpdate->responsable = $request->responsable_text;
        $objectToUpdate->fecha_solicitud = $request->fecha_date;
        $objectToUpdate->save();
        
        $allresponsables = responsable::all();
        return view('responsables.index', compact('allresponsables'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_responsable)
    {
        
        $objectToDelete = responsable::destroy($id_responsable);
        
        $allresponsables = responsable::all();
        
        return view('responsables.index', compact('allresponsables'));
    }
}
