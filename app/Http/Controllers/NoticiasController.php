<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\User;
use App\Category;
use App\Helpers\Helpers;
use App\Http\Requests\NoticiaRequest;
use App\Presentaciones;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class NoticiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $noticia = Presentaciones::paginate(6);
        $noticiasRegistradas = DB::table('presentaciones')->count();
        return view('admin.noticias.index', compact('noticia', 'noticiasRegistradas'));
    }
    public function index2()
    {
        $usuariologeado = Auth::user();
        $campaña = Auth::user()->username;

        if ($usuariologeado->role  <> 'admin') {
            $vercampañass = DB::select("SELECT * FROM noticias WHERE campana = '$campaña'");
            $vercampañas = DB::select("SELECT * FROM noticias WHERE campana = 'admin'");
            $vercampaña = array_merge($vercampañass, $vercampañas);
        } else {
            $vercampaña = Noticia::all();
        }

        return view('admin.noticias.noticia', compact('vercampaña'));
    }

    public function crearnoticia()
    {
        $user = User::find(Auth::User()->id);
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        $categoria = Category::all();

        return view('admin.noticias.crearnoticia', compact('categoria', 'user', 'vercampaña'));
    }
    public function crearnoticias()
    {
        $user = User::find(Auth::User()->id);
        $categoria = Category::all();
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        return view('admin.crearnoticia', compact('categoria', 'user', 'vercampaña'));
    }

    public function store(NoticiaRequest $request)
    {

        $noticia = new Noticia();
        $noticia->title = $request->title;
        $noticia->user_id = $request->user_id;
        $noticia->campana = $request->campana;
        $noticia->fecha = Carbon::createFromFormat('d/m/Y',$request->fecha);
        $noticia->slug = Str::slug($request->title);
        $noticia->image = $request->image;
        $noticia->save();
        if ($request->file('image')) {
            $nombre = Storage::disk('imaposts')->put('imagenes/posts', $request->file('image'));
            $noticia->fill(['image' => asset($nombre)])->save();
        }

        return redirect()->action('NoticiasController@index2')->with('crearnoticia', 'Noticia publicada correctamente');
    }

    public function edit($id)
    {
        $noticiaActualizar = Noticia::findOrFail($id);
        $categoria = Category::all();
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        return view('admin/noticias/edit', compact('noticiaActualizar', 'categoria', 'vercampaña'));
    }

    public function editAd($id)
    {
        $noticiaActualizar = Noticia::findOrFail($id);
        $categoria = Category::all();
        $vercampaña = DB::select("SELECT * FROM rol WHERE Roles <> 'admin'");
        return view('admin/noticias/editad', compact('noticiaActualizar', 'categoria', 'vercampaña'));
    }

    public function update(Request $request, $id)
    {
        $noticiaUpdate = Noticia::findOrFail($id);
        $noticiaUpdate->save();

        $noticia = Noticia::find($id);
        $noticia->fecha = Carbon::createFromFormat('Y-m-d',$request->fecha);
        $noticia->slug =  Str::slug($request->title);
        $noticia->update($request->all());

        if ($request->file('image')) {
            $nombre = Storage::disk('imaposts')->put('plantilla/img/noticia',  $request->file('image'));
            $noticia->fill(['image' => asset($nombre)])->save();
        }
        
        return redirect()->action('NoticiasController@index')->with('editarnoticia', 'Noticia actualizada correctamente');
    }

    public function updateUs(Request $request, $id)
    {
        $noticiaUpdate = Noticia::findOrFail($id);
        $noticiaUpdate->save();

        $noticia = Noticia::find($id);
        $noticia->fecha = Carbon::createFromFormat('Y-m-d',$request->fecha);
        $noticia->slug =  Str::slug($request->title);
        $noticia->update($request->all());

        if ($request->file('image')) {
            $nombre = Storage::disk('imaposts')->put('plantilla/img/noticia',  $request->file('image'));
            $noticia->fill(['image' => asset($nombre)])->save();
        }

        Session::flash('message', 'Publicación actualizada correctamente');
        return back()->with('editarnoticia', 'Noticia actualizada correctamente');
    }

    public function post($slug)
    {
        $noticia = Noticia::where('slug', $slug)->first();
        return view('admin.noticias.post', compact('noticia'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();
        Session::flash('message', 'Publicación borrada  correctamente');
        return redirect()->action('NoticiasController@index')->with('eliminar', 'la noticia se elimino correctamente');
    }


    public function logout()
    {

        Auth::logout();

        return redirect('auth.login');
    }
}
