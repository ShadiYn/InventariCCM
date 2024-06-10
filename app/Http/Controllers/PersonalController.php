<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use App\Models\Baja;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::all();
        return view('personal.index', ['personal'=>$personal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido1'=> 'required',
            'apellido2'=>'',
            'sexo'=> 'required',
            'regimen'=> 'required',
            'area'=> 'required',
            'departamento'=> 'required',
            'fecha_incorporacion'=> 'required',
            'nif'=> 'required',
            'correo'=> 'required',
        ]);

        $newPersonal = Personal::create($data);
        return redirect(route('personal.index'));

        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personal = Personal::with('bajas')->findOrFail($id);
        return view('personal.show', compact('personal'));
    }

        public function search(Request $request)
        {
            $query = $request->input('query');
            $results = Personal::where('nombre', 'LIKE', "%{$query}%")
                                ->orWhere('apellido1', 'LIKE', "%{$query}%")
                                ->orWhere('apellido2', 'LIKE', "%{$query}%")
                                ->get();
            return response()->json($results);
        }

        public function createBaja()
{
    return view('personal.add_baja');
}

    

   public function storeBaja(Request $request, $personalId)
{
    $request->validate([
        'fecha_baja' => 'required|date',
        'motivo' => 'required|string',
        'baja_certificado' => 'required|boolean',
        'personal_id' => 'required|exists:personals,id'
    ]);

    $baja = Baja::create([
        'fecha_baja' => $request->fecha_baja,
        'motivo' => $request->motivo,
        'baja_certificado' => $request->baja_certificado,
        'personal_id' => $request->personal_id
    ]);

    return redirect()->route('personal.show', $request->personal_id)->with('success', 'La baja se ha creado correctamente.');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personal)
    {
        return view('personal.edit', ['personal' => $personal]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
{
    $data = $request->validate([
        'nombre' => 'required',
        'apellido1'=> 'required',
        'apellido2'=>'',
        'sexo'=> 'required',
        'regimen'=> 'required',
        'area'=> 'required',
        'departamento'=> 'required',
        'fecha_incorporacion'=> 'required',
        'nif'=> 'required',
        'correo'=> 'required',
    ]);

    
    
    $personal->update($data);

    return redirect(route('personal.index'))->with('success', 'Los datos se han actualizado correctamente.');
}

    

   
    public function delete(Personal $personal)
    {
        
    }
}
