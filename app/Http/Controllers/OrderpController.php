<?php

namespace App\Http\Controllers;

use App\Orderp;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\OrderpRequest;

class OrderpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'orderps', 'page_item' => 'orderps_index']);
        $orderps = Orderp::paginate();

        return view('orderps.index', compact('orderps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'orderps', 'page_item' => 'orderps_create']);
        $products = Product::all();
        return view('orderps.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderp = new Orderp;

        $orderp->product_id = $request->product_id;
        $orderp->quantity = $request->quantity;
        $orderp->dateinit = date("Y-m-d", strtotime($request->dateinit));
        $orderp->number = $request->number;

        $orderp->save();

        return redirect()->route('orderps.edit', $orderp->id)->with('info', 'Order de Produccion guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orderp  $orderp
     * @return \Illuminate\Http\Response
     */
    public function show(Orderp $orderp)
    {
        session(['page' => 'orderps', 'page_item' => 'orderps_show']);

        $product = Product::findOrFail($orderp->product->id);

        return view('orderps.show', compact('orderp','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orderp  $orderp
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderp $orderp)
    {
        session(['page' => 'orderps', 'page_item' => 'orderps_edit']);
        $products = Product::all();

        return view('orderps.edit', compact('orderp','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orderp  $orderp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderp $orderp)
    {
        $orderp->update($request->all());

        return redirect()->route('orderps.edit', $orderp->id)->with('info', 'Order de Produccion actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orderp  $orderp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderp $orderp)
    {
        $orderp->delete();

        return back()->with('info', 'Eliminado correctamente.');
    }
}
