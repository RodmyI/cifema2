<?php

namespace App\Http\Controllers;

use App\Orderp;
use App\Product;
use App\Material;
use App\Buyorder;
use Illuminate\Http\Request;
use App\Http\Requests\OrderpRequest;
use Illuminate\Support\Facades\DB;

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
        $this->validate(request(), [
            'product_id' => 'required',
            'number' => 'required|unique:orderps',
            'quantity' => 'required',
            'dateinit' => 'required'
        ]);

        //op ultimate
        $antorderp = Orderp::where('product_id', $request->product_id)->orderBy('id', 'DESC')->first();

        $orderp = new Orderp;

        $orderp->product_id = $request->product_id;
        $orderp->quantity = $request->quantity;
        $orderp->dateinit = date("Y-m-d", strtotime($request->dateinit));
        $orderp->number = $request->number;

        $orderp->save();

        //update data standards
        if(!is_null($antorderp)){
            foreach($antorderp->materials as $material){
                $orderp->materials()->attach($material->pivot->material_id, ['quantity' => $material->pivot->quantity, 'observation' => $material->pivot->observation]);
            }
        }

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
        $materials = $orderp->materials;
        return view('orderps.edit', compact('orderp','products','materials'));
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
        $this->validate(request(), [
            'product_id' => 'required',
            'number' => 'required|unique:orderps',
            'quantity' => 'required',
            'dateinit' => 'required'
        ]);

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

    /*-------------------------------*/
    /*--------   Standard   ---------*/
    /*-------------------------------*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStandard()
    {
        session(['page' => 'standards', 'page_item' => 'standards_index']);
        $orderps = Orderp::paginate();

        return view('standards.index', compact('orderps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStandard(Orderp $orderp)
    {
        session(['page' => 'standards', 'page_item' => 'standards_create']);
        $products = Product::all();
        return view('standards.create', compact('products','orderp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStandard(Request $request, Orderp $orderp)
    {
        $buyorder = new Buyorder;

        $buyorder->number = $orderp->number;
        $buyorder->orderp_id = $orderp->id;

        $buyorder->save();

        //update data standards
        for($i=0; $i<count($request->get('material_id')); $i++){
            $orderp->materials()->attach($request->get('material_id')[$i], ['quantity' => $request->get('quantity_mat')[$i], 'observation' => $request->get('observation_mat')[$i]]);

            //restar stock
            $material = Material::find($request->get('material_id')[$i]);
            $quantity_ = $material->stock-$request->get('quantity_mat')[$i];

            //update quantity in stock
            //$material->update(['stock' => $quantity_]);
            if($quantity_<0){
                $quantity_ = abs($quantity_);
                //create stander o.c.
                $buyorder->materials()->attach($request->get('material_id')[$i], ['quantity' => $quantity_, 'observation' => $request->get('observation_mat')[$i]]);
            }
        }

        $orderps = Orderp::paginate();

        return view('standards.index', compact('orderps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orderp  $orderp
     * @return \Illuminate\Http\Response
     */
    public function editStandard(Orderp $orderp)
    {
        session(['page' => 'standards', 'page_item' => 'standards_edit']);
        $products = Product::all();
        $materials = $orderp->materials;
        return view('standards.edit', compact('orderp','products','materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orderp  $orderp
     * @return \Illuminate\Http\Response
     */
    public function updateStandard(Request $request, Orderp $orderp)
    {
        $buyorder_id = $orderp->buyorder;

        $buyorder = Buyorder::find($buyorder_id);

        // Detach all materales from the orderp...
        $orderp->materials()->detach();
        // Detach all materales from the buyorder...
        $buyorder->materials()->detach();

        for($i=0; $i<count($request->get('material_id')); $i++){
            $orderp->materials()->attach($request->get('material_id')[$i], ['quantity' => $request->get('quantity_mat')[$i], 'observation' => $request->get('observation_mat')[$i]]);

            //restar stock
            $material = Material::find($request->get('material_id')[$i]);
            $quantity_ = $material->stock-$request->get('quantity_mat')[$i];

            //update quantity in stock
            //$material->update(['stock' => $quantity_]);

            if($quantity_<0){
                $quantity_ = abs($quantity_);
                //create stander o.c.
                $buyorder->materials()->attach($request->get('material_id')[$i], ['quantity' => $quantity_, 'observation' => $request->get('observation_mat')[$i]]);
            }
        }

        return redirect()->route('standards.edit', $orderp->id)->with('info', 'Estandar de la O.P. actualizado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orderp  $orderp
     * @return \Illuminate\Http\Response
     */
    public function showStandard(Orderp $orderp)
    {
        session(['page' => 'standards', 'page_item' => 'standards_show']);

        $materials = $orderp->materials;
        return view('standards.show', compact('orderp','materials'));
    }
}