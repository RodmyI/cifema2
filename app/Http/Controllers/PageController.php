<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Product;
use App\Typept;

class PageController extends Controller
{

    /**
     * Display a listing of the resource and categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $products = Product::where([
                                    ['name', 'LIKE', trim($request->s) . '%'],
                                    ['status', '<>', '0'],
                                ])->paginate(6);
        $typepts = Typept::get();

        return view('page.search', compact('products','typepts'));
    }

    public function categories(Request $request)
    {
        $typept = Typept::findOrFail($request->cat);
        $products = $typept->products()->paginate(6);
        $typepts = Typept::get();

        return view('page.categories', compact('typept','products','typepts'));
    }

    public function about()
    {
        return view('page.about');
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function sendcontact(Request $request)
    {
    	$to_name = $request->name;
		$to_email = $request->email;
        $to_phone = $request->phone;
        $to_message = $request->message;

		$data = array('name'=>$to_name, "body" => $to_message, 'email' => $to_email, 'phone' => $to_phone);
    
        Mail::send('emails.mail', $data, function($message) use ($request) {
            $message->to('cifema.sam2020@gmail.com', '')
            ->subject('Formulario de Contacto - CIFEMA SAM');
            $message->from('cifema.sam2020@gmail.com','Mensaje de contacto');
        });

        if (Mail::failures()) {
            return redirect()->route('contact')->with('info', '¡Lo siento! Por favor, inténtelo de nuevo más tarde.');
        }else{
            return redirect()->route('contact')->with('info', 'Mensaje enviado con exito.');
        }
    }
}