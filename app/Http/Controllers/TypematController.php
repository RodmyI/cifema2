<?php

namespace App\Http\Controllers;

use App\Typemat;
use Illuminate\Http\Request;

class TypematController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'materials', 'page_item' => 'materials_cat']);

        $typemats = Typemat::paginate();

        return view('typemats.index', compact('typemats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'materials', 'page_item' => 'materials_cat']);
        return view('typemats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typemat = Typemat::create($request->all());

        return redirect()->route('typemats.edit', $typemat->id)->with('info', 'Categoria guardado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typemat  $typemat
     * @return \Illuminate\Http\Response
     */
    public function edit(Typemat $typemat)
    {
        session(['page' => 'materials', 'page_item' => 'materials_cat']);

        return view('typemats.edit', compact('typemat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typemat  $typemat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typemat $typemat)
    {
        $typemat->update($request->all());

        return redirect()->route('typemats.edit', $typemat->id)->with('info', 'Categoria actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typemat  $typemat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typemat $typemat)
    {
        $typemat->delete();

        return back()->with('info', 'Eliminado correctamente.');
    }
}
