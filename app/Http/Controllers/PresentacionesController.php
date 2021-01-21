<?php

namespace App\Http\Controllers;

use App\Diapositivas;
use App\Presentaciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PresentacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $noticia = Presentaciones::all();
        $noticiasRegistradas = DB::table('presentaciones')->count();
        return view('admin.noticias.index', compact('noticia', 'noticiasRegistradas'));
    }

    public function indexpresentacion()
    {
        $presentaciones = Presentaciones::all();
        $diapositivas = Diapositivas::all();
        return view('admin.noticias.index', compact('presentaciones', 'diapositivas'));
    }
    public function index2()
    {
        $usuariologeado = Auth::user();
        $campaña = Auth::user()->username;

        if ($usuariologeado->role  <> 'admin') {
            $vercampañass = DB::select("SELECT * FROM presentaciones WHERE campana = '$campaña'");
            $vercampañas = DB::select("SELECT * FROM presentaciones WHERE campana = 'admin'");
            $vercampaña = array_merge($vercampañass, $vercampañas);
        } else {
            $vercampaña = Presentaciones::all();
        }
        return view('admin.noticias.noticia', compact('vercampaña'));
    }
    public function post($title)
    {
        $presentacion = Presentaciones::where('title', $title)->first();
        return view('admin.noticias.post', compact('presentacion'));
    }
    public function crearpresentacion()
    {
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        return view('admin.presentaciones.crear', compact('vercampaña'));
    }

    public function store(Request $request)
    {
        
        $presentaciones = new Presentaciones();
        $presentaciones->id = $request->id;
        $presentaciones->user_id = $request->user_id;
        $presentaciones->number = $request->id;
        $presentaciones->title = $request->title;
        $presentaciones->campana = $request->campana;
        $presentaciones->time = $request->time;
        $presentaciones->color = $request->color;
        $presentaciones->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha);
        $presentaciones->save();

        foreach ($request->titulo as $key => $value) {
            $diapositiva = new Diapositivas();
            $diapositiva->user_id = $request->user_id;
            $diapositiva->number = $request->id;
            $diapositiva->numero_pg = $request->numero_pg[$key];
            $diapositiva->titulo = $request->titulo[$key];
            $diapositiva->imagen = $request->imagen[$key];
            $diapositiva->contenido = $request->contenido[$key];
            $diapositiva->campana = $request->campana;
            $diapositiva->save();
        }

        return redirect()->action('PresentacionesController@index2')->with('crearnoticia', 'La presentacion se creo correctamente');
    }

    public function edit($id)
    {
        
        $noticiaActualizar = Presentaciones::findOrFail($id);
        $id = $noticiaActualizar->id;
        $titulo1 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 1");
        $imagen1 = DB::select("SELECT Max(imagen) as imagen  FROM diapositiva WHERE number = $id and  numero_pg = 1");
        $contenido1 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 1");

        $titulo2 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 2");
        $imagen2 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 2");
        $contenido2 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 2");

        $titulo3 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 3");
        $imagen3 = DB::select("SELECT Max(imagen) as imagen  FROM diapositiva WHERE number = $id and  numero_pg = 3");
        $contenido3 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 3");

        $titulo4 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 4");
        $imagen4 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 4");
        $contenido4 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 4");

        $titulo5 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 5");
        $imagen5 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 5");
        $contenido5 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 5");

        $titulo6 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 6");
        $imagen6 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 6");
        $contenido6 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 6");

        $titulo7 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 7");
        $imagen7 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 7");
        $contenido7 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 7");

        $titulo8 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 8");
        $imagen8 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 8");
        $contenido8 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 8");

        $titulo9 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 9");
        $imagen9 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 9");
        $contenido9 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 9");

        $titulo10 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 10");
        $imagen10 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 10");
        $contenido10 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 10");

        $titulo11 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 11");
        $imagen11 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 11");
        $contenido11 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 11");

        $titulo12 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 12");
        $imagen12 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 12");
        $contenido12 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 12");

        $titulo13 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 13");
        $imagen13 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 13");
        $contenido13 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 13");
        
        $titulo14 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 14");
        $imagen14 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 14");
        $contenido14 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 14");

        $titulo15 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 15");
        $imagen15 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 15");
        $contenido15 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 15");

        $titulo16 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 16");
        $imagen16 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 16");
        $contenido16 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 16");

        $titulo17 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 17");
        $imagen17 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 17");
        $contenido17 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 17");

        $titulo18 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 18");
        $imagen18 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 18");
        $contenido18 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 18");

        $titulo19 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 19");
        $imagen19 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 19");
        $contenido19 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 19");

        $titulo20 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 20");
        $imagen20 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 20");
        $contenido20 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 20");
 
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        return view('admin/noticias/edit', compact('noticiaActualizar', 'vercampaña'
        ,'titulo1','imagen1', 'contenido1'
         ,'titulo2','imagen2', 'contenido2',
         'titulo3','imagen3', 'contenido3',
         'titulo4','imagen4', 'contenido4',
         'titulo5','imagen5', 'contenido5',
         'titulo6','imagen6', 'contenido6',
         'titulo7','imagen7', 'contenido7',
         'titulo8','imagen8', 'contenido8',
         'titulo9','imagen9', 'contenido9',
         'titulo10','imagen10', 'contenido10',
         'titulo11','imagen11', 'contenido11',
         'titulo12','imagen12', 'contenido12',
         'titulo13','imagen13', 'contenido13',
         'titulo14','imagen14', 'contenido14',
         'titulo15','imagen15', 'contenido15',
         'titulo16','imagen16', 'contenido16',
         'titulo17','imagen17', 'contenido17',
         'titulo18','imagen18', 'contenido18',
         'titulo19','imagen19', 'contenido19',
         'titulo20','imagen20', 'contenido20',
        ));
    }

    public function editAd($id)
    {
        $noticiaActualizar = Presentaciones::findOrFail($id);
        $id = $noticiaActualizar->id;
        $titulo1 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 1");
        $imagen1 = DB::select("SELECT Max(imagen) as imagen  FROM diapositiva WHERE number = $id and  numero_pg = 1");
        $contenido1 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 1");

        $titulo2 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 2");
        $imagen2 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 2");
        $contenido2 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 2");

        $titulo3 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 3");
        $imagen3 = DB::select("SELECT Max(imagen) as imagen  FROM diapositiva WHERE number = $id and  numero_pg = 3");
        $contenido3 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 3");

        $titulo4 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 4");
        $imagen4 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 4");
        $contenido4 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 4");

        $titulo5 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 5");
        $imagen5 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 5");
        $contenido5 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 5");

        $titulo6 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 6");
        $imagen6 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 6");
        $contenido6 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 6");

        $titulo7 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 7");
        $imagen7 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 7");
        $contenido7 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 7");

        $titulo8 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 8");
        $imagen8 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 8");
        $contenido8 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 8");

        $titulo9 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 9");
        $imagen9 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 9");
        $contenido9 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 9");

        $titulo10 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 10");
        $imagen10 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 10");
        $contenido10 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 10");

        $titulo11 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 11");
        $imagen11 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 11");
        $contenido11 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 11");

        $titulo12 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 12");
        $imagen12 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 12");
        $contenido12 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 12");

        $titulo13 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 13");
        $imagen13 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 13");
        $contenido13 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 13");
        
        $titulo14 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 14");
        $imagen14 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 14");
        $contenido14 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 14");

        $titulo15 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 15");
        $imagen15 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 15");
        $contenido15 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 15");

        $titulo16 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 16");
        $imagen16 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 16");
        $contenido16 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 16");

        $titulo17 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 17");
        $imagen17 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 17");
        $contenido17 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 17");

        $titulo18 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 18");
        $imagen18 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 18");
        $contenido18 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 18");

        $titulo19 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 19");
        $imagen19 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 19");
        $contenido19 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 19");

        $titulo20 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 20");
        $imagen20 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 20");
        $contenido20 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 20");
 
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        return view('admin/noticias/edit', compact('noticiaActualizar', 'vercampaña'
        ,'titulo1','imagen1', 'contenido1'
         ,'titulo2','imagen2', 'contenido2',
         'titulo3','imagen3', 'contenido3',
         'titulo4','imagen4', 'contenido4',
         'titulo5','imagen5', 'contenido5',
         'titulo6','imagen6', 'contenido6',
         'titulo7','imagen7', 'contenido7',
         'titulo8','imagen8', 'contenido8',
         'titulo9','imagen9', 'contenido9',
         'titulo10','imagen10', 'contenido10',
         'titulo11','imagen11', 'contenido11',
         'titulo12','imagen12', 'contenido12',
         'titulo13','imagen13', 'contenido13',
         'titulo14','imagen14', 'contenido14',
         'titulo15','imagen15', 'contenido15',
         'titulo16','imagen16', 'contenido16',
         'titulo17','imagen17', 'contenido17',
         'titulo18','imagen18', 'contenido18',
         'titulo19','imagen19', 'contenido19',
         'titulo20','imagen20', 'contenido20',
        ));
        return view('admin/noticias/editad', compact('noticiaActualizar', 'vercampaña'));
    }

    public function update(Request $request, $id)
    {
       
        $noticiaUpdate = Presentaciones::findOrFail($id);
        $noticiaUpdate->save();
        $noticia = Presentaciones::find($id);
        $noticia->fecha = Carbon::createFromFormat('Y-m-d', $request->fecha);
        $noticia->update($request->all());

        foreach ($request->titulo as $key => $value) {
            $diapositiva = new Diapositivas();
            $diapositiva->user_id = $request->user_id;
            $diapositiva->id = $request->id;
            $diapositiva->number = $request->id;
            $diapositiva->numero_pg = $request->numero_pg[$key];
            $diapositiva->titulo = $request->titulo[$key];
            $diapositiva->imagen = $request->imagen[$key];
            $diapositiva->contenido = $request->contenido[$key];
            $diapositiva->campana = $request->campana;
            $diapositiva->save();
        }
        
        return redirect()->action('PresentacionesController@index')->with('editarnoticia', 'Presentacion actualizada correctamente');
    }

    public function updateUs(Request $request, $id)
    {

        $noticiaUpdate = Presentaciones::findOrFail($id);
        $noticiaUpdate->save();
        $noticia = Presentaciones::find($id);
        $noticia->fecha = Carbon::createFromFormat('Y-m-d', $request->fecha);
        $noticia->update($request->all());

        foreach ($request->titulo as $key => $value) {
            $diapositiva = new Diapositivas();
            $diapositiva->user_id = $request->user_id;
            $diapositiva->id = $request->id;
            $diapositiva->number = $request->id;
            $diapositiva->numero_pg = $request->numero_pg[$key];
            $diapositiva->titulo = $request->titulo[$key];
            $diapositiva->imagen = $request->imagen[$key];
            $diapositiva->contenido = $request->contenido[$key];
            $diapositiva->campana = $request->campana;
            $diapositiva->save();
        }

        return redirect()->action('PresentacionesController@index2')->with('editarnoticia', 'Presentacion actualizada correctamente');
    }

    public function destroyUs($id)
    {
        $noticia = Presentaciones::findOrFail($id);
        $noticia->delete();
        return redirect()->action('PresentacionesController@index2')->with('eliminar', 'Presentacion eliminada correctamente');
    }

    public function destroy($id)
    {
        $noticia = Presentaciones::findOrFail($id);
        $noticia->delete();
        return redirect()->action('PresentacionesController@index')->with('eliminar', 'Presentacion eliminada correctamente');
    }

    public function logout()
    {

        Auth::logout();

        return redirect('auth.login');
    }
}
