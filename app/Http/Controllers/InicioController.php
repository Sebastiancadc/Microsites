<?php

namespace App\Http\Controllers;

use App\Diapositivas;
use App\Http\Requests\SolicitudRequest;
use Illuminate\Http\Request;
use App\Noticia;
use App\Presentaciones;
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
        $presentaciones = Presentaciones::all();
        
        if ($usuariologeado->role  <> 'admin') {
            $vercampañass = DB::select("SELECT * FROM presentaciones WHERE campana = '$campaña'");
            $vercampañas = DB::select("SELECT * FROM presentaciones WHERE campana = 'admin'");
            $vercampaña = array_merge($vercampañass,$vercampañas);
        } else {
            $vercampaña = Presentaciones::all();
            
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