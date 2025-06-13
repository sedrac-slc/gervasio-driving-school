<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Exception;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy('created_at', 'desc')->paginate();
        return view('auth.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.vehicle.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        try{
            Vehicle::create($request->all());
            flash()->success('Veículo criado com successo');
            return redirect()->route('vehicles.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::find($id);
        return view('auth.vehicle.form', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, string $id)
    {
        try{
            $vehicle = Vehicle::find($id);
            $vehicle->update($request->all());
            flash()->success('Veículo editado com successo');
            return redirect()->route('vehicles.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $vehicle = Vehicle::find($id);
            $vehicle->delete();
            flash()->success('Veículo eliminado com successo');
            return redirect()->route('vehicles.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
