<?php

namespace App\Http\Controllers;

use App\Buyorder;
use App\Product;
use App\Material;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BuyorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'buyorders', 'page_item' => 'buyorders_index']);
        $buyorders = Buyorder::paginate();

        return view('buyorders.index', compact('buyorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'buyorders', 'page_item' => 'buyorders_create']);
        $products = Product::all();
        return view('buyorders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buyorder = new Buyorder;

        $buyorder->product_id = $request->product_id;
        $buyorder->quantity = $request->quantity;
        $buyorder->dateinit = date("Y-m-d", strtotime($request->dateinit));
        $buyorder->number = $request->number;

        $buyorder->save();

        //update data roles
        $buyorder->materials()->attach($request->get('material_id'), ['quantity' => $request->get('quantity'), 'observation' => $request->get('observation')]);

        return redirect()->route('buyorders.edit', $buyorder->id)->with('info', 'Order de Produccion guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyorder  $buyorder
     * @return \Illuminate\Http\Response
     */
    public function show(Buyorder $buyorder)
    {
        session(['page' => 'buyorders', 'page_item' => 'buyorders_show']);

        $product = Product::findOrFail($buyorder->product->id);

        return view('buyorders.show', compact('buyorder','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyorder  $buyorder
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyorder $buyorder)
    {
        session(['page' => 'buyorders', 'page_item' => 'buyorders_edit']);
        $products = Product::all();
        $materials = $buyorder->materials;
        
        return view('buyorders.edit', compact('buyorder','products','materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyorder  $buyorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyorder $buyorder)
    {
        $buyorder->update($request->all());

        // Detach all materales from the buyorder...
        $buyorder->materials()->detach();

        $buyorder->materials()->attach($request->get('material_id'), ['quantity' => $request->get('quantity'), 'observation' => $request->get('observation')]);

        return redirect()->route('buyorders.edit', $buyorder->id)->with('info', 'Order de Produccion actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyorder  $buyorder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyorder $buyorder)
    {
        $buyorder->delete();

        return back()->with('info', 'Eliminado correctamente.');
    }

    /*-------------------------------*/
    /*--------   Standard   ---------*/
    /*-------------------------------*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBuyorder_material()
    {
        session(['page' => 'buyorder_material', 'page_item' => 'buyorder_material_index']);
        $buyorders = Buyorder::paginate();

        return view('buyorder_material.index', compact('buyorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBuyorder_material(Buyorder $buyorder)
    {
        session(['page' => 'buyorder_material', 'page_item' => 'buyorder_material_create']);
        $products = Product::all();
        return view('buyorder_material.create', compact('products','buyorder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBuyorder_material(Request $request, Buyorder $buyorder)
    {
        $buyorder->update(['date_issue' => $request->get('date_issue')]);
        //update data buyorder_material
        for($i=0; $i<count($request->get('material_id')); $i++){
            $buyorder->materials()->attach($request->get('material_id')[$i], ['quantity' => $request->get('quantity_mat')[$i], 'observation' => $request->get('observation_mat')[$i], 'class_item' => $request->get('class_item')[$i]]);
        }

        $buyorders = Buyorder::paginate();

        return view('buyorder_material.index', compact('buyorders'));

        //return redirect()->route('buyorder_material.edit', $buyorder->id)->with('info', 'Order de Produccion guardado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyorder  $buyorder
     * @return \Illuminate\Http\Response
     */
    public function editBuyorder_material(Buyorder $buyorder)
    {
        session(['page' => 'buyorder_material', 'page_item' => 'buyorder_material_edit']);
        $products = Product::all();
        $materials = $buyorder->materials;
        
        return view('buyorder_material.edit', compact('buyorder','products','materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyorder  $buyorder
     * @return \Illuminate\Http\Response
     */
    public function updateBuyorder_material(Request $request, Buyorder $buyorder)
    {
        $buyorder->update(['date_issue' => $request->get('date_issue')]);
        // Detach all materales from the buyorder...
        $buyorder->materials()->detach();

        for($i=0; $i<count($request->get('material_id')); $i++){
            $buyorder->materials()->attach($request->get('material_id')[$i], ['quantity' => $request->get('quantity_mat')[$i], 'observation' => $request->get('observation_mat')[$i], 'class_item' => $request->get('class_item')[$i]]);
        }

        return redirect()->route('buyorder_material.edit', $buyorder->id)->with('info', 'Estandar de la O.P. actualizado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyorder  $buyorder
     * @return \Illuminate\Http\Response
     */
    public function showBuyorder_material(Buyorder $buyorder)
    {
        session(['page' => 'buyorder_material', 'page_item' => 'buyorder_material_show']);
        $products = Product::all();
        $materials = $buyorder->materials;

        return view('buyorder_material.show', compact('buyorder','products','materials'));
    }

    /**
     * Display the specified resource.
     */
    public function exportPDF(Buyorder $buyorder)
    {
        $products = Product::all();
        $materials = $buyorder->materials;
        $buyorder->update(['status' => 1]);

        $pdf = PDF::loadview('buyorder_material.pdf', compact('buyorder','products','materials'));
        return $pdf->download('orden_de_compra_'.$buyorder->number.'.pdf');
    }
}