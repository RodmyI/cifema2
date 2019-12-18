<?php

namespace App\Http\Controllers;

use App\Standard;
use App\Orderp;
use App\Material;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'standards', 'page_item' => 'standards_index']);
        $standards = Standard::paginate();

        return view('standards.index', compact('standards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'standards', 'page_item' => 'standards_create']);
        $orderps = Orderp::all();
        $materials = Material::all();
        return view('standards.create', compact('orderps','materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $standard = new Standard;

        $standard->product_id = $request->product_id;
        $standard->quantity = $request->quantity;
        $standard->dateinit = date("Y-m-d", strtotime($request->dateinit));
        $standard->number = $request->number;

        $standard->save();

        return redirect()->route('standards.edit', $standard->id)->with('info', 'Estandar guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(Standard $standard)
    {
        session(['page' => 'standards', 'page_item' => 'standards_show']);

        $orderp = Orderp::findOrFail($standard->product->id);

        return view('standards.show', compact('standard','orderp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function edit(Standard $standard)
    {
        session(['page' => 'standards', 'page_item' => 'standards_edit']);
        $orderps = Orderp::all();

        return view('standards.edit', compact('standard','orderps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standard $standard)
    {
        $standard->update($request->all());

        return redirect()->route('standards.edit', $standard->id)->with('info', 'Estandar actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standard $standard)
    {
        $standard->delete();

        return back()->with('info', 'Eliminado correctamente.');
    }
}
