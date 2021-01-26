<?php

namespace App\Http\Controllers;

use App\Archivos;
use App\Noticia;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArchivosController extends Controller
{

    public function index()
    {
        $usuariologeado = Auth::user();
        $campaña = Auth::user()->username;
  
        $archivos22 = DB::select("SELECT * FROM noticias WHERE campana = '$campaña'");
        return view('admin.archivos.archivos', compact('archivos22'));
    }

    public function index2(Request $request)
    {
        $archivos = app\Noticia::paginate(5);
        return view('admin.archivos.index', compact('archivos'));
    }

    public function store(Request $request)
    {
        /* imagenes/archivos */
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $name = $file->getClientOriginalname();
            $file->move(public_path() . '/upload/', $name);
        }

        $CapacitacionAgregar = new Noticia();
        $CapacitacionAgregar->titulo = $request->titulo;
        $CapacitacionAgregar->tipo_archivo = $request->tipo_archivo;
        $CapacitacionAgregar->archivo = $name;
        $CapacitacionAgregar->save();
        return back()->with('agregar', 'El archivo a sido agregada correctamente');
    }

    public function edit($id)
    {
        $ArchivoActualizar = App\Noticia::findOrFail($id);
        return view('admin/archivos/editar', compact('ArchivoActualizar'));
    }

    public function update(Request $request, $id)
    {
        /* imagenes/archivos */
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $name = $file->getClientOriginalname();
            $file->move(public_path() . '/upload/', $name);
        }

        $ArchivoUpdate = App\Noticia::findOrFail($id);
        $ArchivoUpdate->titulo = $request->titulo;
        $ArchivoUpdate->tipo_archivo = $request->tipo_archivo;
        $ArchivoUpdate->archivo = $name;
        $ArchivoUpdate->save();
        return redirect()->action('ArchivosController@index')->with('update', 'El archivo a sido actualizado correctamente');
    }

    public function editadmin($id)
    {
        $ArchivoActualizar = App\Noticia::findOrFail($id);
        return view('admin/archivos/editaradmin', compact('ArchivoActualizar'));
    }

    public function updateadmin(Request $request, $id)
    {
        /* imagenes/archivos */
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $name = $file->getClientOriginalname();
            $file->move(public_path() . '/upload/', $name);
        }

        $ArchivoUpdate = App\Noticia::findOrFail($id);
        $ArchivoUpdate->titulo = $request->titulo;
        $ArchivoUpdate->tipo_archivo = $request->tipo_archivo;
        $ArchivoUpdate->archivo = $name;
        $ArchivoUpdate->save();
        return redirect()->action('ArchivosController@index2')->with('update', 'El archivo a sido actualizado correctamente');
    }

    public function destroy($id)
    {
        $EliminarArchivo = App\Noticia::findOrFail($id);
        $EliminarArchivo->delete();
        return back()->with('eliminar', 'eliminado correctamente ');
    }


    public function download()
    {
        $item = Noticia::table('noticias')->get();
        return view('admin.archivos.archivos', compact('item'));
    }
}
