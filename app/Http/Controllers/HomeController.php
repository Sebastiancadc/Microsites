<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;

use Illuminate\Http\Request;
use App\User;
use App\Permisos;
use App\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = User::all();
        $usuariosregistrados = DB::table('usuario')->count();

        return view('admin.usuarios.usuario', compact('users','usuariosregistrados'));
    }

    public function CrearRol(Request $request)
    {
        $Rol = new Permisos();
        $Rol->Roles = $request->Roles;
        $Rol->save();
        return redirect()->action('HomeController@permisoslista')->with('Rol', 'Rol creado correctamente');
    }
    public function permisoslista()
    {
        $permisos = Permisos::all();
        return view('admin.usuarios.permisos', compact('permisos'));
    }

    public function editarpermisos($id)
    {
        $permisoActualizar = Permisos::findOrFail($id);
        return view('admin/usuarios/editarpermisos', compact('permisoActualizar'));
    }

    public function updatepermisos(Request $request, $id)
    {
        $permisos = Permisos::findOrFail($id);
        $permisos->create_status = $request->create_status;
        if ($request->has('create_status')) {
            $permisos->create_status = "1";
        } else {
            $permisos->create_status = "0";
        }
        $permisos->update_status = $request->update_status;
        if ($request->has('update_status')) {
            $permisos->update_status = "1";
        } else {
            $permisos->update_status = "0";
        }
        $permisos->delete_status = $request->delete_status;
        if ($request->has('delete_status')) {
            $permisos->delete_status = "1";
        } else {
            $permisos->delete_status = "0";
        }

        $permisos->save();
        return redirect()->action('HomeController@permisoslista')->with('Permisosedit', 'Permisos editados correctamente');
    }
    

    public function store(UsuarioRequest $request)
    {
        $request->request->add([
            'password' => Hash::make($request->input('password'))
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->ciudad = $request->ciudad;
        $user->role = $request->role;
        $user->Rol_Id_Rol = $request->Rol_Id_Rol;
        $user->password = $request->password;
        $user->save();
        $Rol = new Permisos();
        $Rol->Roles = $request->username;
        $Rol->save();
        return redirect('admin/usuario')->with('crearCampaña', 'Campaña creada correctamente');
    }

    public function edit($id)
    {
        $userActualizar = User::findOrFail($id);
        return view('admin/usuarios/editaruser', compact('userActualizar'));
    }

    public function update(Request $request, $id)
    {

        $request->merge([
            'password' => Hash::make($request->input('password'))
        ]);
        $UserUpdate = User::findOrFail($id);
        $UserUpdate->username = $request->username;
        $UserUpdate->ciudad = $request->ciudad;
        $UserUpdate->password = $request->password;
        $UserUpdate->save();
        $Rol = Permisos::findOrFail($id);
        $Rol->Roles = $request->username;
        $Rol->save();
        return redirect('admin/usuario')->with('editarUsuario', 'Campaña editada correctamente');
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('admin/usuario')->with('eliminarusuario', 'La campaña se elimino');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('auth.login');
        // $this->guard()->logout();Request $request

        // $request->session()->invalidate();

        // return $this->loggedOut($request) ?: redirect('admin.login');
    }

}