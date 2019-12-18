<?php

namespace App\Http\Controllers;

use App\Typept;
use Illuminate\Http\Request;

class TypeptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'products', 'page_item' => 'products_cat']);

        $typepts = Typept::paginate();

        return view('typepts.index', compact('typepts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'products', 'page_item' => 'products_cat']);
        return view('typepts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typept = Typept::create($request->all());

        return redirect()->route('typepts.edit', $typept->id)->with('info', 'Categoria guardado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typept  $typept
     * @return \Illuminate\Http\Response
     */
    public function edit(Typept $typept)
    {
        session(['page' => 'products', 'page_item' => 'products_cat']);

        return view('typepts.edit', compact('typept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typept  $typept
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typept $typept)
    {
        $typept->update($request->all());

        return redirect()->route('typepts.edit', $typept->id)->with('info', 'Categoria actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typept  $typept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typept $typept)
    {
        $typept->delete();

        return back()->with('info', 'Eliminado correctamente.');
    }
}
