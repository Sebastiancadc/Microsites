<?php

namespace App\Http\Controllers;

use App\Diapositivas;
use App\Http\Requests\PresentacionRequest;
use App\Presentaciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $ids = $presentacion->id;
        $titulo1 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 1 and id = $ids");
        $contenido1 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 1 and id = $ids");
        $imagen1 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 1 and id = $ids");
        $imagen_fondo1 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 1 and id = $ids");

        $titulo2 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 2 and id = $ids");
        $contenido2 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 2 and id = $ids");
        $imagen2 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 2 and id = $ids");
        $imagen_fondo2 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 2 and id = $ids");

        $titulo3 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 3 and id = $ids");
        $contenido3 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 3 and id = $ids");
        $imagen3 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 3 and id = $ids");
        $imagen_fondo3 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 3 and id = $ids");

        $titulo4 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 4 and id = $ids");
        $contenido4 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 4 and id = $ids");
        $imagen4 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 4 and id = $ids");
        $imagen_fondo4 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 4 and id = $ids");

        $titulo5 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 5 and id = $ids");
        $contenido5 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 5 and id = $ids");
        $imagen5 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 5 and id = $ids");
        $imagen_fondo5 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 5 and id = $ids");

        $titulo6 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 6 and id = $ids");
        $contenido6 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 6 and id = $ids");
        $imagen6 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 6 and id = $ids");
        $imagen_fondo6 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 6 and id = $ids");

        $titulo7 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 7 and id = $ids");
        $contenido7 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 7 and id = $ids");
        $imagen7 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 7 and id = $ids");
        $imagen_fondo7 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 7 and id = $ids");

        $titulo8 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 8 and id = $ids");
        $contenido8 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 8 and id = $ids");
        $imagen8 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 8 and id = $ids");
        $imagen_fondo8 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 8 and id = $ids");

        $titulo9 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 9 and id = $ids");
        $contenido9 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 9 and id = $ids");
        $imagen9 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 9 and id = $ids");
        $imagen_fondo9 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 9 and id = $ids");

        $titulo10 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 10 and id = $ids");
        $contenido10 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 10 and id = $ids");
        $imagen10 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 10 and id = $ids");
        $imagen_fondo10 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 10 and id = $ids");

        $titulo11 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 11 and id = $ids");
        $contenido11 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 11 and id = $ids");
        $imagen11 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 11 and id = $ids");
        $imagen_fondo11 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 11 and id = $ids");

        $titulo12 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 12 and id = $ids");
        $contenido12 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 12 and id = $ids");
        $imagen12 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 12 and id = $ids");
        $imagen_fondo12 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 12 and id = $ids");

        $titulo13 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 13 and id = $ids");
        $contenido13 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 13 and id = $ids");
        $imagen13 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 13 and id = $ids");
        $imagen_fondo13 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 13 and id = $ids");

        $titulo14 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 14 and id = $ids");
        $contenido14 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 14 and id = $ids");
        $imagen14 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 14 and id = $ids");
        $imagen_fondo14 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 14 and id = $ids");
        
        $titulo15 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 15 and id = $ids");
        $contenido15 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 15 and id = $ids");
        $imagen15 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 15 and id = $ids");
        $imagen_fondo15 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 15 and id = $ids"); 

        $titulo16 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 16 and id = $ids");
        $contenido16 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 16 and id = $ids");
        $imagen16 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 16 and id = $ids");
        $imagen_fondo16 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 16 and id = $ids");

        $titulo17 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 17 and id = $ids");
        $contenido17 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 17 and id = $ids");
        $imagen17 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 17 and id = $ids");
        $imagen_fondo17 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 17 and id = $ids");

        $titulo18 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 18 and id = $ids");
        $contenido18 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 18 and id = $ids");
        $imagen18 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 18 and id = $ids");
        $imagen_fondo18 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 18 and id = $ids");

        $titulo19 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 19 and id = $ids");
        $contenido19 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 19 and id = $ids");
        $imagen19 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 19 and id = $ids");
        $imagen_fondo19 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 19 and id = $ids");

        $titulo20 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 20 and id = $ids");
        $contenido20 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 20 and id = $ids");
        $imagen20 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 20 and id = $ids");
        $imagen_fondo20 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 20 and id = $ids");

        return view('admin.noticias.post', compact('presentacion',
        'titulo1','contenido1','imagen1','imagen_fondo1',
        'titulo2','contenido2','imagen2','imagen_fondo2',
        'titulo3','contenido3','imagen3','imagen_fondo3',
        'titulo4','contenido4','imagen4','imagen_fondo4',
        'titulo5','contenido5','imagen5','imagen_fondo5',
        'titulo6','contenido6','imagen6','imagen_fondo6',
        'titulo7','contenido7','imagen7','imagen_fondo7',
        'titulo8','contenido8','imagen8','imagen_fondo8',
        'titulo9','contenido9','imagen9','imagen_fondo9',
        'titulo10','contenido10','imagen10','imagen_fondo10',
        'titulo11','contenido11','imagen11','imagen_fondo11',
        'titulo12','contenido12','imagen12','imagen_fondo12',
        'titulo13','contenido13','imagen13','imagen_fondo13',
        'titulo14','contenido14','imagen14','imagen_fondo14',
        'titulo15','contenido15','imagen15','imagen_fondo15',
        'titulo16','contenido16','imagen16','imagen_fondo16',
        'titulo17','contenido17','imagen17','imagen_fondo17',
        'titulo18','contenido18','imagen18','imagen_fondo18',
        'titulo19','contenido19','imagen19','imagen_fondo19',
        'titulo20','contenido20','imagen20','imagen_fondo20',


    ));
    }

    public function full($id)
    {
        $presentacion = Presentaciones::where('id', $id)->first();
        $ids = $presentacion->id;
        $titulo1 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 1 and id = $ids");
        $contenido1 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 1 and id = $ids");
        $imagen1 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 1 and id = $ids");
        $imagen_fondo1 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 1 and id = $ids");

        $titulo2 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 2 and id = $ids");
        $contenido2 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 2 and id = $ids");
        $imagen2 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 2 and id = $ids");
        $imagen_fondo2 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 2 and id = $ids");

        $titulo3 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 3 and id = $ids");
        $contenido3 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 3 and id = $ids");
        $imagen3 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 3 and id = $ids");
        $imagen_fondo3 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 3 and id = $ids");

        $titulo4 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 4 and id = $ids");
        $contenido4 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 4 and id = $ids");
        $imagen4 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 4 and id = $ids");
        $imagen_fondo4 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 4 and id = $ids");

        $titulo5 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 5 and id = $ids");
        $contenido5 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 5 and id = $ids");
        $imagen5 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 5 and id = $ids");
        $imagen_fondo5 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 5 and id = $ids");

        $titulo6 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 6 and id = $ids");
        $contenido6 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 6 and id = $ids");
        $imagen6 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 6 and id = $ids");
        $imagen_fondo6 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 6 and id = $ids");

        $titulo7 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 7 and id = $ids");
        $contenido7 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 7 and id = $ids");
        $imagen7 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 7 and id = $ids");
        $imagen_fondo7 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 7 and id = $ids");

        $titulo8 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 8 and id = $ids");
        $contenido8 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 8 and id = $ids");
        $imagen8 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 8 and id = $ids");
        $imagen_fondo8 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 8 and id = $ids");

        $titulo9 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 9 and id = $ids");
        $contenido9 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 9 and id = $ids");
        $imagen9 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 9 and id = $ids");
        $imagen_fondo9 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 9 and id = $ids");

        $titulo10 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 10 and id = $ids");
        $contenido10 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 10 and id = $ids");
        $imagen10 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 10 and id = $ids");
        $imagen_fondo10 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 10 and id = $ids");

        $titulo11 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 11 and id = $ids");
        $contenido11 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 11 and id = $ids");
        $imagen11 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 11 and id = $ids");
        $imagen_fondo11 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 11 and id = $ids");

        $titulo12 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 12 and id = $ids");
        $contenido12 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 12 and id = $ids");
        $imagen12 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 12 and id = $ids");
        $imagen_fondo12 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 12 and id = $ids");

        $titulo13 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 13 and id = $ids");
        $contenido13 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 13 and id = $ids");
        $imagen13 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 13 and id = $ids");
        $imagen_fondo13 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 13 and id = $ids");

        $titulo14 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 14 and id = $ids");
        $contenido14 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 14 and id = $ids");
        $imagen14 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 14 and id = $ids");
        $imagen_fondo14 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 14 and id = $ids");
        
        $titulo15 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 15 and id = $ids");
        $contenido15 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 15 and id = $ids");
        $imagen15 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 15 and id = $ids");
        $imagen_fondo15 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 15 and id = $ids"); 

        $titulo16 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 16 and id = $ids");
        $contenido16 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 16 and id = $ids");
        $imagen16 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 16 and id = $ids");
        $imagen_fondo16 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 16 and id = $ids");

        $titulo17 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 17 and id = $ids");
        $contenido17 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 17 and id = $ids");
        $imagen17 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 17 and id = $ids");
        $imagen_fondo17 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 17 and id = $ids");

        $titulo18 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 18 and id = $ids");
        $contenido18 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 18 and id = $ids");
        $imagen18 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 18 and id = $ids");
        $imagen_fondo18 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 18 and id = $ids");

        $titulo19 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 19 and id = $ids");
        $contenido19 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 19 and id = $ids");
        $imagen19 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 19 and id = $ids");
        $imagen_fondo19 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 19 and id = $ids");

        $titulo20 = DB::select("SELECT titulo as titulo FROM diapositiva WHERE numero_pg = 20 and id = $ids");
        $contenido20 = DB::select("SELECT contenido as contenido FROM diapositiva WHERE numero_pg = 20 and id = $ids");
        $imagen20 = DB::select("SELECT imagen as imagen FROM diapositiva WHERE numero_pg = 20 and id = $ids");
        $imagen_fondo20 = DB::select("SELECT imagen_fondo as imagen_fondo FROM diapositiva WHERE numero_pg = 20 and id = $ids");

        return view('admin.presentaciones.index', compact('presentacion',
        'titulo1','contenido1','imagen1','imagen_fondo1',
        'titulo2','contenido2','imagen2','imagen_fondo2',
        'titulo3','contenido3','imagen3','imagen_fondo3',
        'titulo4','contenido4','imagen4','imagen_fondo4',
        'titulo5','contenido5','imagen5','imagen_fondo5',
        'titulo6','contenido6','imagen6','imagen_fondo6',
        'titulo7','contenido7','imagen7','imagen_fondo7',
        'titulo8','contenido8','imagen8','imagen_fondo8',
        'titulo9','contenido9','imagen9','imagen_fondo9',
        'titulo10','contenido10','imagen10','imagen_fondo10',
        'titulo11','contenido11','imagen11','imagen_fondo11',
        'titulo12','contenido12','imagen12','imagen_fondo12',
        'titulo13','contenido13','imagen13','imagen_fondo13',
        'titulo14','contenido14','imagen14','imagen_fondo14',
        'titulo15','contenido15','imagen15','imagen_fondo15',
        'titulo16','contenido16','imagen16','imagen_fondo16',
        'titulo17','contenido17','imagen17','imagen_fondo17',
        'titulo18','contenido18','imagen18','imagen_fondo18',
        'titulo19','contenido19','imagen19','imagen_fondo19',
        'titulo20','contenido20','imagen20','imagen_fondo20',
    ));
    }





    public function crearpresentacion()
    {
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        return view('admin.presentaciones.crear', compact('vercampaña'));
    }

    public function store(PresentacionRequest $request)
    {
        
        $presentaciones = new Presentaciones();
        $presentaciones->id = $request->id;
        $presentaciones->user_id = $request->user_id;
        $presentaciones->number = $request->id;
        $presentaciones->title = $request->title;
        $presentaciones->campana = $request->campana;
        $presentaciones->time = $request->time;
        $presentaciones->color = $request->color;
        $presentaciones->colortitulos = $request->colortitulos;
        $presentaciones->colorcontenido = $request->colorcontenido;
        $presentaciones->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha);
        $presentaciones->save();

        foreach ($request->titulo as $key => $value) {
            $diapositiva = new Diapositivas();
            $diapositiva->user_id = $request->user_id;
            $diapositiva->number = $request->id;
            $diapositiva->id = $request->id;
            $diapositiva->numero_pg = $request->numero_pg[$key];
            $diapositiva->titulo = $request->titulo[$key];
            if(isset($diapositiva->imagen)){
                $diapositiva->imagen = $request->imagen[$key];
            }
            if(isset($diapositiva->imagen_fondo)){
                $diapositiva->imagen_fondo = $request->imagen_fondo[$key];
            }
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
        $imagen_fondo1 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 1");
        $contenido1 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 1");

        $titulo2 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 2");
        $imagen2 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 2");
        $imagen_fondo2 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 2");
        $contenido2 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 2");

        $titulo3 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 3");
        $imagen3 = DB::select("SELECT Max(imagen) as imagen  FROM diapositiva WHERE number = $id and  numero_pg = 3");
        $imagen_fondo3 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 3");
        $contenido3 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 3");

        $titulo4 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 4");
        $imagen4 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 4");
        $imagen_fondo4 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 4");
        $contenido4 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 4");

        $titulo5 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 5");
        $imagen5 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 5");
        $imagen_fondo5 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 5");
        $contenido5 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 5");

        $titulo6 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 6");
        $imagen6 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 6");
        $imagen_fondo6 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 6");
        $contenido6 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 6");

        $titulo7 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 7");
        $imagen7 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 7");
        $imagen_fondo7 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 7");
        $contenido7 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 7");

        $titulo8 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 8");
        $imagen8 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 8");
        $imagen_fondo8 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 8");
        $contenido8 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 8");

        $titulo9 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 9");
        $imagen9 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 9");
        $imagen_fondo9 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 9");
        $contenido9 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 9");

        $titulo10 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 10");
        $imagen10 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 10");
        $imagen_fondo10 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 10");
        $contenido10 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 10");

        $titulo11 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 11");
        $imagen11 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 11");
        $imagen_fondo11 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 11");
        $contenido11 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 11");

        $titulo12 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 12");
        $imagen12 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 12");
        $imagen_fondo12 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 12");
        $contenido12 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 12");

        $titulo13 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 13");
        $imagen_fondo13 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 13");
        $imagen13 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 13");
        $contenido13 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 13");
        
        $titulo14 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 14");
        $imagen14 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 14");
        $imagen_fondo14 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 14");
        $contenido14 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 14");

        $titulo15 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 15");
        $imagen15 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 15");
        $imagen_fondo15 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 15");
        $contenido15 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 15");

        $titulo16 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 16");
        $imagen16 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 16");
        $imagen_fondo16 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 16");
        $contenido16 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 16");

        $titulo17 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 17");
        $imagen17 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 17");
        $imagen_fondo17 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 17");
        $contenido17 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 17");

        $titulo18 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 18");
        $imagen18 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 18");
        $imagen_fondo18 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 18");
        $contenido18 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 18");

        $titulo19 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 19");
        $imagen19 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 19");
        $imagen_fondo19 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 19");
        $contenido19 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 19");

        $titulo20 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 20");
        $imagen20 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 20");
        $imagen_fondo20 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 20");
        $contenido20 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 20");
 
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        return view('admin/noticias/edit', compact('noticiaActualizar', 'vercampaña'
        ,'titulo1','imagen1','imagen_fondo1','contenido1'
         ,'titulo2','imagen2','imagen_fondo2', 'contenido2',
         'titulo3','imagen3', 'imagen_fondo3','contenido3',
         'titulo4','imagen4','imagen_fondo4','contenido4',
         'titulo5','imagen5','imagen_fondo5', 'contenido5',
         'titulo6','imagen6','imagen_fondo6', 'contenido6',
         'titulo7','imagen7','imagen_fondo7', 'contenido7',
         'titulo8','imagen8','imagen_fondo8', 'contenido8',
         'titulo9','imagen9','imagen_fondo9', 'contenido9',
         'titulo10','imagen10','imagen_fondo10', 'contenido10',
         'titulo11','imagen11','imagen_fondo11', 'contenido11',
         'titulo12','imagen12','imagen_fondo12', 'contenido12',
         'titulo13','imagen13','imagen_fondo13', 'contenido13',
         'titulo14','imagen14','imagen_fondo14', 'contenido14',
         'titulo15','imagen15','imagen_fondo15', 'contenido15',
         'titulo16','imagen16','imagen_fondo16','contenido16',
         'titulo17','imagen17','imagen_fondo17','contenido17',
         'titulo18','imagen18','imagen_fondo18', 'contenido18',
         'titulo19','imagen19','imagen_fondo19','contenido19',
         'titulo20','imagen20','imagen_fondo20', 'contenido20',
        ));
    }

    public function editAd($id)
    {
        $noticiaActualizar = Presentaciones::findOrFail($id);
        $id = $noticiaActualizar->id;
        $titulo1 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 1");
        $imagen_fondo1 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 1");
        $imagen1 = DB::select("SELECT Max(imagen) as imagen  FROM diapositiva WHERE number = $id and  numero_pg = 1");
        $contenido1 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 1");

        $titulo2 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 2");
        $imagen_fondo2 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 2");
        $imagen2 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 2");
        $contenido2 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 2");

        $titulo3 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 3");
        $imagen_fondo3 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 3");
        $imagen3 = DB::select("SELECT Max(imagen) as imagen  FROM diapositiva WHERE number = $id and  numero_pg = 3");
        $contenido3 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 3");

        $titulo4 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 4");
        $imagen_fondo4 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 4");
        $imagen4 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 4");
        $contenido4 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 4");

        $titulo5 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 5");
        $imagen_fondo5 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 5");
        $imagen5 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 5");
        $contenido5 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 5");

        $titulo6 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 6");
        $imagen_fondo6 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 6");
        $imagen6 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 6");
        $contenido6 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 6");

        $titulo7 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 7");
        $imagen_fondo7 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 7");
        $imagen7 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 7");
        $contenido7 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 7");

        $titulo8 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 8");
        $imagen_fondo8 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 8");
        $imagen8 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 8");
        $contenido8 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 8");

        $titulo9 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 9");
        $imagen_fondo9 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 9");
        $imagen9 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 9");
        $contenido9 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 9");

        $titulo10 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 10");
        $imagen_fondo10 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 10");
        $imagen10 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 10");
        $contenido10 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 10");

        $titulo11 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 11");
        $imagen_fondo11 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 11");
        $imagen11 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 11");
        $contenido11 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 11");

        $titulo12 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 12");
        $imagen_fondo12 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 12");
        $imagen12 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 12");
        $contenido12 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 12");

        $titulo13 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 13");
        $imagen_fondo13 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 13");
        $imagen13 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 13");
        $contenido13 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 13");
        
        $titulo14 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 14");
        $imagen_fondo14 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 14");
        $imagen14 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 14");
        $contenido14 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 14");

        $titulo15 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 15");
        $imagen_fondo15 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 15");
        $imagen15 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 15");
        $contenido15 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 15");

        $titulo16 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 16");
        $imagen_fondo16 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 16");
        $imagen16 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 16");
        $contenido16 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 16");

        $titulo17 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 17");
        $imagen_fondo17 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 17");
        $imagen17 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 17");
        $contenido17 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 17");

        $titulo18 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 18");
        $imagen_fondo18 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 18");
        $imagen18 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 18");
        $contenido18 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 18");

        $titulo19 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 19");
        $imagen_fondo19 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 19");
        $imagen19 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 19");
        $contenido19 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 19");

        $titulo20 = DB::select("SELECT Max(titulo) as titulo FROM diapositiva WHERE number = $id and numero_pg = 20");
        $imagen_fondo20 = DB::select("SELECT Max(imagen_fondo) as imagen_fondo  FROM diapositiva WHERE number = $id and  numero_pg = 20");
        $imagen20 = DB::select("SELECT Max(imagen) as imagen FROM diapositiva WHERE number = $id and  numero_pg = 20");
        $contenido20 = DB::select("SELECT Max(contenido) as contenido FROM diapositiva WHERE number = $id and  numero_pg = 20");
 
        $vercampaña = DB::select("SELECT * FROM rol");
        return view('admin/noticias/editad', compact('noticiaActualizar', 'vercampaña'
        ,'titulo1','imagen1','imagen_fondo1','contenido1'
         ,'titulo2','imagen2','imagen_fondo2', 'contenido2',
         'titulo3','imagen3','imagen_fondo3', 'contenido3',
         'titulo4','imagen4','imagen_fondo4', 'contenido4',
         'titulo5','imagen5','imagen_fondo5', 'contenido5',
         'titulo6','imagen6','imagen_fondo6', 'contenido6',
         'titulo7','imagen7','imagen_fondo7', 'contenido7',
         'titulo8','imagen8','imagen_fondo8', 'contenido8',
         'titulo9','imagen9','imagen_fondo9', 'contenido9',
         'titulo10','imagen10','imagen_fondo10', 'contenido10',
         'titulo11','imagen11','imagen_fondo11', 'contenido11',
         'titulo12','imagen12', 'imagen_fondo12','contenido12',
         'titulo13','imagen13','imagen_fondo13', 'contenido13',
         'titulo14','imagen14', 'imagen_fondo14','contenido14',
         'titulo15','imagen15', 'imagen_fondo15','contenido15',
         'titulo16','imagen16', 'imagen_fondo16','contenido16',
         'titulo17','imagen17', 'imagen_fondo17','contenido17',
         'titulo18','imagen18', 'imagen_fondo18','contenido18',
         'titulo19','imagen19', 'imagen_fondo19','contenido19',
         'titulo20','imagen20', 'imagen_fondo20','contenido20',
        ));
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
            $diapositiva->imagen_fondo = $request->imagen_fondo[$key];
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
            $diapositiva->imagen_fondo = $request->imagen_fondo[$key];
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
