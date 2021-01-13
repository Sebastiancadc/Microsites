<?php

namespace App\Http\Controllers;


use App\Http\Requests\SolicitudRequest;
use Illuminate\Http\Request;
use App\Noticia;
use App\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuariologeado = Auth::user();
        $campaña = Auth::user()->username;

        if ($usuariologeado->role  <> 'admin') {
            $vercampaña = DB::select("SELECT * FROM noticias WHERE campana = '$campaña'");
        } else {
            $vercampaña = Noticia::all();
        }

        return view('admin.dashboards.dashboard', compact('vercampaña'));
    }

    public function indexAdmin()
    {
        $solicitudRegistradas = DB::table('solicitud')->count();
        $usuarioRegistrads = DB::table('usuario')->count();
        $solicidesPendientes = DB::select("SELECT * FROM solicitud WHERE estado = 'pendiente'");  
        return view('admin.dashboards.dashboardAdmin',compact('solicitudRegistradas','usuarioRegistrads','solicidesPendientes'));
    }

    public function solicitud()
    {
        return view('admin.solicitud');
    }


}