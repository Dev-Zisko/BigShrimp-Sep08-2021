<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuotationRequest;
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
use App\Models\Quotation;
use App\Models\Detail;
use PDF;

class QuotationController extends Controller
{
    public function create_quotation(Request $request)
    {
        try{
            if ($request->prod == null || $request->prod == "") {
                $messagePage = "Por favor seleccione algún producto para cotizar.";
                return view('message', compact('messagePage'));
            }
            else {
                $quotation = new Quotation;
                $quotation->status = "Sin responder";
                $quotation->name = $request->name;
                $quotation->lastname = $request->lastname;
                $quotation->email = $request->email;
                $quotation->cellphone = $request->cellphone;
                $quotation->rif = $request->rif;
                $quotation->business = $request->business;
                $quotation->address = $request->address;
                $quotation->message = $request->message;
                $quotation->save();
                $lastQuotation = Quotation::All()->last();
                $products = $request->prod;
                $countProducts = count($products);
                for($i=0; $i < $countProducts; $i++){
                    $detail = new Detail;
                    $detail->product = $request->prod[$i];
                    $detail->quantity = $request->quantity[$i];
                    $detail->id_quotation = $lastQuotation->id;
                    $detail->save();
                }
                $messagePage = "Cotización envíada correctamente, nuestro personal le responderá en la brevedad posible. Gracias.";
                return view('message', compact('messagePage'));
            }
        }catch(Exception $ex){
            dd($ex);
            Session::flash('error', 'Error al crear el producto. Verifique su conexión a internet e intente nuevamente. Si el error persiste comuniquese con el soporte e indiquele el código de error #P0001.');
            return redirect('/');
        }
    }

    public function view_quotation_pdf($id) 
    {
        try{
            $newid = Crypt::decrypt($id);
            $quotation = Quotation::find($newid);
            $details = Detail::where('id_quotation', $newid)->get();
            $view =  \View::make('dashboard.quotes.quote', compact('quotation', 'details'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream('dashboard.quotes.quote');
        }catch(Exception $ex){
            Session::flash('error', 'Error al ver el recibo. Por favor revise que los datos ingresados son correctos y no se encuentran duplicados, revise su conexión a internet o intente más tarde. Si el error persiste comuniquese con el soporte e indiquele el código de error #.');
            return redirect('/');
        }
    }
}
