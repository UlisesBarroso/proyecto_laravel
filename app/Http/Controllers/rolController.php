<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
class rolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Rol::all();
        return view ("rol.list" ,compact("rol"));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("rol.create");
    }
    private function validateData(Request $request){
        $request->validate([
            'descripcion' => 'required|max:100',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validateData($request);
       $data['descripcion'] = $request->descripcion;
       $rol = Rol::create($data);
       return redirect('rol')->with('success',
            $rol->descripcion . ' guardado satisfactorio...');
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
        $rol = Rol::find($id);
        if ($rol)
        return view("rol.edit", compact("rol"));
        else
            echo "no se encontro";
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
        $this->validateData($request);
        $data['descripcion']= $request->descripcion;
        Rol::whereId($id)->update($data);
        return redirect ('rol')->with('success',
             'guardado satisfactoriamente ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rol::whereId($id)->delete();
        return redirect('rol')->with('success',
                'El elemento fue borrado...');
    }
}
