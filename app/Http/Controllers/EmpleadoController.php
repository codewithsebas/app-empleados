<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Area;
use App\Models\Rol;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with(['area', 'roles'])->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $areas = Area::all();
        $roles = Rol::all();
        return view('empleados.create', compact('areas', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\p{L} ]+$/u',
            'email' => [
                'required',
                'email',
                'regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,6}$/',
                'unique:empleados,email'],
            'sexo' => 'required|in:M,F',
            'area_id' => 'required|exists:areas,id',
            'boletin' => 'nullable|boolean',
            'descripcion' => 'required|string',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $empleado = Empleado::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'area_id' => $request->area_id,
            'boletin' => $request->boletin ? 1 : 0,
            'descripcion' => $request->descripcion,
        ]);

        if ($request->has('roles')) {
            $empleado->roles()->sync($request->roles);
        }

        return redirect()->route('empleados.index')->with('success', 'Empleado agregado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        $areas = Area::all();
        $roles = Rol::all();
        return view('empleados.edit', compact('empleado', 'areas', 'roles'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\p{L} ]+$/u',
            'email' => 'required|email|regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,6}$/',
            'sexo' => 'required|in:M,F',
            'area_id' => 'required|exists:areas,id',
            'boletin' => 'nullable|boolean',
            'descripcion' => 'required|string',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

    $data = $request->only('nombre', 'email', 'sexo', 'area_id', 'descripcion');
    $data['boletin'] = $request->has('boletin') ? true : false;

    try {
        $empleado->update($data);
            if ($request->has('roles')) {
            $empleado->roles()->sync($request->roles);
            } else {
            $empleado->roles()->detach();
            }

            return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el empleado.']);
        }
    }


    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
