<?php

namespace App\Http\Controllers;

use App\Material;
use App\Typemat;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['page' => 'materials', 'page_item' => 'materials_index']);

        $materials = Material::query();

        if($request->isMethod('post')){
            if ( $request->has('name') && is_null($request->input('name')) && $request->has('typemat_id') && is_null($request->input('typemat_id')) ){
                    $request->session()->forget('name_s');
                    $request->session()->forget('typemat_id_s');
            }else{
                if ( $request->has('name') && !is_null($request->input('name')) && $request->has('typemat_id') && !is_null($request->input('typemat_id')) )
                {
                    $materials = $materials->where([
                                                ['name', 'LIKE', trim($request->input('name')) . '%'],
                                                ['typemat_id', $request->input('typemat_id')],
                                            ]);
                    $request->session()->put('name_s', trim($request->input('name')));
                    $request->session()->put('typemat_id_s', $request->input('typemat_id'));
                }elseif ( $request->has('name') && !is_null($request->input('name')) ){
                    $materials = $materials->where([
                                                ['name', 'LIKE', trim($request->input('name')) . '%'],
                                            ]);
                    $request->session()->put('name_s', trim($request->input('name')));
                    $request->session()->forget('typemat_id_s');
                }elseif ( $request->has('typemat_id') && $request->input('typemat_id') !== '' ){
                    $materials = $materials->where([
                                                ['typemat_id', $request->input('typemat_id')],
                                            ]);
                    $request->session()->put('typemat_id_s', $request->input('typemat_id'));
                    $request->session()->forget('name_s');
                }
            }
        }else{
            if ( $request->session()->exists('name_s') && $request->session()->get('name_s') == ''){
                    $request->session()->forget('name_s');
            }
            if ( $request->session()->exists('typemat_id_s') && $request->session()->get('typemat_id_s') == ''){
                    $request->session()->forget('typemat_id_s');
            }


            if ( $request->session()->exists('name_s') && $request->session()->exists('typemat_id_s') )
            {
                $materials = $materials->where([
                                            ['name', 'LIKE', session('name_s') . '%'],
                                            ['typemat_id', session('typemat_id_s')],
                                        ]);
            }elseif ( $request->session()->exists('name_s') ){
                $materials = $materials->where([
                                            ['name', 'LIKE', session('name_s') . '%'],
                                        ]);
            }elseif ( $request->session()->exists('typemat_id_s') ){
                $materials = $materials->where([
                                            ['typemat_id', session('typemat_id_s')],
                                        ]);
            }
        }

        $materials = $materials->paginate();

        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'materials', 'page_item' => 'materials_create']);

        $typemats = Typemat::get();

        return view('materials.create', compact('typemats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = Material::create($request->all());

        //add quantity in stock
        $material->update(['stock' => $request->input('quantityinit')]);

        return redirect()->route('materials.edit', $material->id)->with('info', 'Materialo guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        session(['page' => 'materials', 'page_item' => 'materials_show']);

        return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        session(['page' => 'materials', 'page_item' => 'materials_edit']);

        $typemats = Typemat::get();

        return view('materials.edit', compact('material','typemats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $material->update($request->all());

        return redirect()->route('materials.edit', $material->id)->with('info', 'Materialo actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();

        return back()->with('info', 'Eliminado correctamente.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function materialST(Request $request)
    {
        $term = $request->term;

        $materials = Material::where('name', 'like', '%'.$term.'%')
                    ->get();

        if($materials->count()==0){
            $products = array();
            $info['id']    = "no_id";
            $info['name'] = "No users found.";
            array_push($products,$info);
            echo json_encode($products);
            return;
        }else{
            return $materials;
        }
    }
}
