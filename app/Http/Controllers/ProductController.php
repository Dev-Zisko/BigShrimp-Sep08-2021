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
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function create_product(Request $request)
    {
        try{
            if (Auth::user()->role == "admin"){
                $product = new Product;
                $product->name = $request->name;
                $product->description = $request->description;
                $product->id_category = $request->category;
                if ($request->hasFile('image')){
                    $image = $request->file('image')->store('public');
                    $cutimage = substr($image, 7);
                    $product->image = $cutimage;
                }
                $product->save();
                Session::flash('message', 'Producto creado exitosamente!');
                return redirect('crear-producto');
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al crear el producto. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #P0001.');
            return redirect('/panel-administrativo');
        }
    }

    public function update_product(Request $request, $id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $product = Product::find($newid);
                if($request->validate == "yes"){
                    if ($request->image != null) {
                        $image = $request->file('image')->store('public');
                        $cutimage = substr($image, 7);
                        unlink(storage_path('app/public/'.$product->image));
                        Product::where('id', $newid)->update(['image'=>$cutimage]);
                    } else {
                        Session::flash('error', 'No se edito el producto. Por favor elija una imagen correctamente e intente nuevamente.');
                        return redirect('ver-productos');
                    }
                }
                Product::where('id', $newid)->update(['name' => $request->name]);
                Product::where('id', $newid)->update(['description' => $request->description]);
                Product::where('id', $newid)->update(['id_category' => $request->category]);
                Session::flash('message', 'Producto editado exitosamente!');
                return redirect('ver-productos');
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al editar el producto. Verifique su conexión a internet, revise los datos ingresados e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #P0002.');
            return redirect('/panel-administrativo');
        }
    }

    public function delete_product(Request $request, $id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $product = Product::find($newid);
                unlink(storage_path('app/public/'.$product->image));
                Product::where('id', $newid)->delete();
                Session::flash('message', 'Producto eliminado exitosamente!');
                return redirect('ver-productos');
            }
            else {
                return redirect('/panel-administrativo');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al eliminar el producto. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #P0003.');
            return redirect('/panel-administrativo');
        }
    }
}
