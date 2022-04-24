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
use App\Models\Quotation;

class ViewController extends Controller
{
    // Página Principal

    public function view_index()
    {
        try{
            $categories = Category::orderBy('name')->get();
            return view('index', compact('categories'));
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0001.');
            $categories = "Yes";
            return view('index', compact('categories'));
        }
    }

    public function view_about()
    {
        try{
            $categories = Category::orderBy('name')->get();
            return view('about', compact('categories'));
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0001.');
            $categories = "Yes";
            return view('about', compact('categories'));
        }
    }

    public function view_contact()
    {
        try{
            $categories = Category::orderBy('name')->get();
            return view('contact', compact('categories'));
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0001.');
            $categories = "Yes";
            return view('contact', compact('categories'));
        }
    }

    public function view_products($category)
    {
        try{
            $newCategory = Crypt::decrypt($category);
            if($newCategory == "all") {
                $categories = Category::orderBy('name')->get();
                $productsAll = Product::All();
                $products = collect();
                foreach($productsAll as $product){
                    $category = Category::find($product->id_category);
                    $newProduct = new Product;
                    $newProduct->id = $product->id;
                    $newProduct->name = $product->name;
                    $newProduct->category = $category->name;
                    $newProduct->description = $product->description;
                    $newProduct->image = $product->image;
                    $products->push($newProduct);
                }
                return view('products', compact('categories', 'products'));
            }
            else {
                $categories = Category::orderBy('name')->get();
                $productsAll = Product::where('id_category', $newCategory)->get();
                $products = collect();
                foreach($productsAll as $product){
                    $category = Category::find($product->id_category);
                    $newProduct = new Product;
                    $newProduct->id = $product->id;
                    $newProduct->name = $product->name;
                    $newProduct->category = $category->name;
                    $newProduct->description = $product->description;
                    $newProduct->image = $product->image;
                    $products->push($newProduct);
                }
                return view('products', compact('categories', 'products'));
            }
            
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0001.');
            $categories = "Yes";
            return view('contact', compact('categories'));
        }
    }

    public function search_product(Request $request)
    {
        try{
            if ($request->search == null || $request->search == "") {
                $productsAll = Product::All();
            } else{
                $productsAll = Product::where('name', 'LIKE', $request->search . '%')->orWhere('description', 'LIKE', $request->search . '%')->get();
            }
            $categories = Category::orderBy('name')->get();
            $products = collect();
            foreach($productsAll as $product){
                $category = Category::find($product->id_category);
                $newProduct = new Product;
                $newProduct->id = $product->id;
                $newProduct->name = $product->name;
                $newProduct->category = $category->name;
                $newProduct->description = $product->description;
                $newProduct->image = $product->image;
                $products->push($newProduct);
            }
            return view('products', compact('categories', 'products'));
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0001.');
            $categories = "Yes";
            return view('contact', compact('categories'));
        }
    }

    public function view_quotation($product)
    {
        try{
            $categories = Category::orderBy('name')->get();
            $products = Product::All();
            $newProduct = Crypt::decrypt($product);
            if ($newProduct == "all") {
                $productsSelected = null;
            }
            else {
                $productsSelected = Product::where('id', $newProduct)->get();
            }
            return view('quotation', compact('categories', 'products', 'productsSelected'));
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0001.');
            $categories = "Yes";
            return view('quotation', compact('categories'));
        }
    }

    // CRUD Usuarios

    public function view_user()
    {
        try{
            if (Auth::user()->role == "admin"){
                $users = User::All();
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.users.view', compact('users', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0001.');
            return view('auth.login');
        }
    }

    public function view_create_user()
    {
        try{
            if (Auth::user()->role == "admin"){
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.users.create', compact('alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0002.');
            return view('auth.login');
        }
    }

    public function view_update_user($id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $user = User::find($newid);
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.users.update', compact('user', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0003.');
            return view('auth.login');
        }
    }

    public function view_delete_user($id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $user = User::find($newid);
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.users.delete', compact('user', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0004.');
            return view('auth.login');
        }
    }

    // CRUD Categorias

    public function view_category()
    {
        try{
            if (Auth::user()->role == "admin"){
                $categories = Category::All();
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.categories.view', compact('categories', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0005.');
            return view('auth.login');
        }
    }

    public function view_create_category()
    {
        try{
            if (Auth::user()->role == "admin"){
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.categories.create', compact('alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0006.');
            return view('auth.login');
        }
    }

    public function view_update_category($id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $category = Category::find($newid);
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.categories.update', compact('category', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0007.');
            return view('auth.login');
        }
    }

    public function view_delete_category($id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $category = Category::find($newid);
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.categories.delete', compact('category', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0008.');
            return view('auth.login');
        }
    }

    // CRUD Productos

    public function view_product()
    {
        try{
            if (Auth::user()->role == "admin"){
                $productsAll = Product::All();
                $products = collect();
                foreach($productsAll as $product){
                    $category = Category::find($product->id_category);
                    $newProduct = new Product;
                    $newProduct->id = $product->id;
                    $newProduct->name = $product->name;
                    $newProduct->category = $category->name;
                    $newProduct->description = $product->description;
                    $products->push($newProduct);
                }
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.products.view', compact('products', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            dd($ex);
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0009.');
            return view('auth.login');
        }
    }

    public function view_create_product()
    {
        try{
            if (Auth::user()->role == "admin"){
                $categories = Category::All();
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.products.create', compact('categories', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0010.');
            return view('auth.login');
        }
    }

    public function view_update_product($id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $product = Product::find($newid);
                $categories = Category::All();
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.products.update', compact('product', 'categories','alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0011.');
            return view('auth.login');
        }
    }

    public function view_delete_product($id)
    {
        try{
            if (Auth::user()->role == "admin"){
                $newid = Crypt::decrypt($id);
                $product = Product::find($newid);
                $categories = Category::All();
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.products.delete', compact('product', 'categories','alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0012.');
            return view('auth.login');
        }
    }

    // CRUD Quotations

    public function view_quotes()
    {
        try{
            if (Auth::user()->role == "admin"){
                $quotes = Quotation::orderByDesc('status')->get();
                $alert = Quotation::where('status', 'Sin responder')->count();
                return view('dashboard.quotes.view', compact('quotes', 'alert'));
            }
            else {
                return redirect('/');
            }
        }catch(Exception $ex){
            Session::flash('error', 'Error al cargar los datos del sistema. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #V0005.');
            return view('auth.login');
        }
    }
}
