<?php

namespace App\Http\Controllers;

use App\Outputmp;
use App\Material;
use App\Orderp;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class OutputmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'outputmps', 'page_item' => 'outputmps_index']);

        $outputmps = Outputmp::orderBy('number', 'DESC')->paginate();

        return view('outputmps.index', compact('outputmps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'outputmps', 'page_item' => 'outputmps_create']);
        $orderps = Orderp::orderBy('number', 'ASC')->get();

        return view('outputmps.create', compact('orderps'));
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
            'number' => 'required|unique:outputmps',
            'orderp_id' => 'required',
            'date_output' => 'required',
            'received_by' => 'required',
        ]);

        $outputmp = new Outputmp;

        $outputmp->number = $request->number;
        $outputmp->orderp_id = $request->orderp_id;
        $outputmp->received_by = $request->received_by;
        $outputmp->date_output = date("Y-m-d", strtotime($request->date_output));

        $outputmp->save();

        $cant_ = 0;
        $myoutputmps = Outputmp::where('orderp_id', $request->orderp_id)->get();
        foreach($myoutputmps as $outputmp){
        	$cant_ += $outputmp->delivered_quantity;
        }

        //copiar estandares
        $orderps = Orderp::find($request->orderp_id);
        foreach ($orderps->materials as $material) {
        	$outputmp->materials()->attach($material->pivot->material_id, ['quantity_standard' => $material->pivot->quantity, 'quantity_available' => $material->stock, 'delivered_quantity' => $cant_]);
        }

        return redirect()->route('outputmps.edit', $outputmp->id)->with('info', 'Salida guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outputmp  $outputmp
     * @return \Illuminate\Http\Response
     */
    public function show(Outputmp $outputmp)
    {
        session(['page' => 'outputmps', 'page_item' => 'outputmps_show']);

        return view('outputmps.show', compact('outputmp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outputmp  $outputmp
     * @return \Illuminate\Http\Response
     */
    public function edit(Outputmp $outputmp)
    {
        session(['page' => 'outputmps', 'page_item' => 'outputmps_edit']);
        $orderps = Orderp::orderBy('number', 'ASC')->get();

        return view('outputmps.edit', compact('outputmp','orderps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outputmp  $outputmp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outputmp $outputmp)
    {
        $this->validate(request(), [
            'number' => 'required|unique:outputmps,number,'.$outputmp->id,
            'date_output' => 'required',
            'received_by' => 'required'
        ]);

        $outputmp->update([
            'number' => $request->number,
            'date_entry' => date("Y-m-d", strtotime($request->date_entry)),
            'received_by' => $request->received_by
        ]);

        // Detach all materales from the outputmp...
        $outputmp->materials()->detach();

        for($i=0; $i<count($request->get('material_id')); $i++){

            $outputmp->materials()->attach($request->get('material_id')[$i], ['quantity_standard' => $request->get('quantity_standard')[$i],'quantity_available' => $request->get('quantity_available')[$i],'delivered_quantity' => $request->get('delivered_quantity')[$i],'quantity_output' => $request->get('quantity_output')[$i],'observation' => $request->get('observation')[$i]]);
        }

        return redirect()->route('outputmps.edit', $outputmp->id)->with('info', 'Salida actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outputmp  $outputmp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outputmp $outputmp)
    {
        $outputmp->delete();
        return back()->with('info', 'Eliminado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function exportPDF(Outputmp $outputmp)
    {
        $materials = $outputmp->materials;

        if($outputmp->status == 0){
            foreach($outputmp->materials as $itemat){
                $material =  Material::find($itemat->id);
                //Restar al stock;
                $rest = $material->stock - $itemat->pivot->quantity_output;
                $material->update([
                    'stock' => $rest
                ]);
            }
            $outputmp->update(['status' => 1]);
        }

        $pdf = PDF::loadview('outputmps.pdf', compact('outputmp','materials'));
        return $pdf->download('ingreso_material_'.$outputmp->number.'.pdf');
    }
}
