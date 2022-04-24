<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Exception;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function create_user(UserRequest $request)
    {
        try{
            if (Auth::user()->role == "admin"){
                if(User::where('email', $request->email)->exists()){
                    Session::flash('error', 'El correo ingresado ya existe, por favor revise y vuelva a intentarlo.');
                    return redirect('crear-usuario');
                }else{
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->role = $request->role;
                    $user->password = Hash::make($request->password);
                    $user->save();
                    Session::flash('message', 'Usuario creado exitosamente!');
                    return redirect('crear-usuario');
                }
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al crear el usuario. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #U0001.');
            return redirect('/panel-administrativo');
        }
    }

    public function update_user(UpdateUserRequest $request, $id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                if(User::where([['email', $request->email], ['id', '!=', $newid]])->exists()){
                    Session::flash('error', 'El correo nuevo para el usuario ya existe, por favor revise y vuelva a intentarlo.');
                    return redirect('ver-usuarios');
                }else{
                    User::where('id', $newid)->update(['name' => $request->name]);
                    User::where('id', $newid)->update(['email' => $request->email]);
                    User::where('id', $newid)->update(['role' => $request->role]);
                    if($request->password != "" && $request->repassword != "" && ($request->password == $request->repassword)){
                        User::where('id', $newid)->update(['password' => Hash::make($request->password)]);
                    }
                    Session::flash('message', 'Usuario editado exitosamente!');
                    return redirect('ver-usuarios');
                }
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al editar el usuario. Verifique su conexión a internet, revise los datos ingresados e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #U0002.');
            return redirect('/panel-administrativo');
        }
    }

    public function delete_user(Request $request, $id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                User::where('id', $newid)->delete();
                Session::flash('message', 'Usuario eliminado exitosamente!');
                return redirect('ver-usuarios');
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al eliminar el usuario. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #U0003.');
            return redirect('/panel-administrativo');
        }
    }
}
