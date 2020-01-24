<?php

namespace App\Http\Controllers;

use App\Entrymp;
use App\Material;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class EntrympController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'entrymps', 'page_item' => 'entrymps_index']);

        $entrymps = Entrymp::orderBy('number', 'DESC')->paginate();

        return view('entrymps.index', compact('entrymps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'entrymps', 'page_item' => 'entrymps_create']);

        return view('entrymps.create');
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
            'number' => 'required|unique:entrymps',
            'document_type' => 'required',
            'document_number' => 'required',
            'provider' => 'required',
            'date_entry' => 'required',
            'received_by' => 'required',
        ]);

        $entrymp = new Entrymp;

        $entrymp->number = $request->number;
        $entrymp->document_type = $request->document_type;
        $entrymp->document_number = $request->document_number;
        $entrymp->provider = $request->provider;
        $entrymp->date_entry = date("Y-m-d", strtotime($request->date_entry));
        $entrymp->received_by = $request->received_by;

        $entrymp->save();

        //add data entry_material
        for($i=0; $i<count($request->get('material_id')); $i++){
            $entrymp->materials()->attach($request->get('material_id')[$i], ['quantity' => $request->get('quantity_mat')[$i]]);
        }

        return redirect()->route('entrymps.edit', $entrymp->id)->with('info', 'Entreda guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entrymp  $entrymp
     * @return \Illuminate\Http\Response
     */
    public function show(Entrymp $entrymp)
    {
        session(['page' => 'entrymps', 'page_item' => 'entrymps_show']);
        $materials = $entrymp->materials;

        return view('entrymps.show', compact('entrymp', 'materials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entrymp  $entrymp
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrymp $entrymp)
    {
        session(['page' => 'entrymps', 'page_item' => 'entrymps_edit']);
        $materials = $entrymp->materials;

        return view('entrymps.edit', compact('entrymp', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entrymp  $entrymp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrymp $entrymp)
    {
        $this->validate(request(), [
            'number' => 'required|unique:entrymps,number,'.$entrymp->id,
            'document_type' => 'required',
            'document_number' => 'required',
            'provider' => 'required',
            'date_entry' => 'required',
            'received_by' => 'required'
        ]);

        $entrymp->update([
        	'number' => $request->number,
        	'document_type' => $request->document_type,
        	'document_number' => $request->document_number,
        	'provider' => $request->provider,
        	'date_entry' => date("Y-m-d", strtotime($request->date_entry)),
            'received_by' => $request->received_by
        ]);

        // Detach all materales from the entrymp...
        $entrymp->materials()->detach();

        for($i=0; $i<count($request->get('material_id')); $i++){
            $entrymp->materials()->attach($request->get('material_id')[$i], ['quantity' => $request->get('quantity_mat')[$i]]);
        }

        return redirect()->route('entrymps.edit', $entrymp->id)->with('info', 'Entrada actualizada con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entrymp  $entrymp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrymp $entrymp)
    {
        $entrymp->delete();
        return back()->with('info', 'Eliminado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function exportPDF(Entrymp $entrymp)
    {
        $materials = $entrymp->materials;

        if($entrymp->status == 0){
            foreach($entrymp->materials as $itemat){
                $material =  Material::find($itemat->id);
                //Sumar al stock;
                $sum = $material->stock + $itemat->quantity;
                $material->update([ 'stock' => $sum ]);
            }
            $entrymp->update(['status' => 1]);
        }

        $pdf = PDF::loadview('entrymps.pdf', compact('entrymp','materials'));
        return $pdf->download('ingreso_material_'.$entrymp->number.'.pdf');
    }
}
