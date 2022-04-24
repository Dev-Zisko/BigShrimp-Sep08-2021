<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Exception;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function create_category(Request $request)
    {
        try{
            if (Auth::user()->role == "admin"){
                if(Category::where('name', $request->name)->exists()){
                    Session::flash('error', 'La categoría ingresada ya existe, por favor revise y vuelva a intentarlo.');
                    return redirect('crear-categoria');
                }else{
                    $category = new Category;
                    $category->name = $request->name;
                    $category->save();
                    Session::flash('message', 'Categoría creada exitosamente!');
                    return redirect('crear-categoria');
                }
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al crear la categoría. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #C0001.');
            return redirect('/panel-administrativo');
        }
    }

    public function update_category(Request $request, $id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                if(Category::where([['name', $request->name], ['id', '!=', $newid]])->exists()){
                    Session::flash('error', 'La categoría ingresada ya existe, por favor revise y vuelva a intentarlo.');
                    return redirect('ver-categorias');
                }else{
                    Category::where('id', $newid)->update(['name' => $request->name]);
                    Session::flash('message', 'Categoría editada exitosamente!');
                    return redirect('ver-categorias');
                }
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al editar la categoría. Verifique su conexión a internet, revise los datos ingresados e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #C0002.');
            return redirect('/panel-administrativo');
        }
    }

    public function delete_category(Request $request, $id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $category = Category::find($newid);
                if(Product::where('id_category', $category->id)->exists()){
                    Session::flash('error', 'Existen productos con esta categoría, por favor elimine primero los productos y por último la categoría.');
                    return redirect('ver-categorias');
                }else{
                    Category::where('id', $newid)->delete();
                    Session::flash('message', 'Categoría eliminada exitosamente!');
                    return redirect('ver-categorias');
                }
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al eliminar la categoría. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #C0003.');
            return redirect('/panel-administrativo');
        }
    }
}
