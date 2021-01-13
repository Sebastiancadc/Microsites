<?php

namespace App\Http\Controllers;

use App\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudControlller extends Controller
{
    public function index()
    {
        $solicitud = Solicitud::all();
        $solicitudRegistradas = DB::table('solicitud')->count();
        $pendientes = DB::table('solicitud')->whereestado('pendiente')->count();
        $revisado = DB::table('solicitud')->whereestado('revisado')->count();
        return view('admin.solicitud.index', compact('solicitud','solicitudRegistradas','pendientes',
    'revisado'));
    }

    public function store(Request $request)
    {
        $solicitud = new Solicitud();
        $solicitud->name = $request->name;
        $solicitud->save();
        return back()->with('crearsoli', 'Solicitud enviada correctamente');
    }

    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('admin.solicitud.editar', compact('solicitud'));
    }

    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado = $request->estado;
        $solicitud->save();

        return redirect()->action('SolicitudControlller@index')->with('editarsoli', 'Solicitud editada correctamente');
    }
    public function destroy($id)
    {
        $data = Solicitud::findOrFail($id);
        $data->delete();
        return redirect()->action('SolicitudControlller@index')->with('seelimino', 'Solicitud eliminado correctamente');
    }
    
}