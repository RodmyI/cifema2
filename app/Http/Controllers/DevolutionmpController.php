<?php

namespace App\Http\Controllers;

use App\Devolutionmp;
use App\Material;
use App\Orderp;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class DevolutionmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'devolutionmps', 'page_item' => 'devolutionmps_index']);

        $devolutionmps = Devolutionmp::orderBy('number', 'DESC')->paginate();

        return view('devolutionmps.index', compact('devolutionmps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'devolutionmps', 'page_item' => 'devolutionmps_create']);
        $orderps = Orderp::orderBy('number', 'ASC')->get();

        return view('devolutionmps.create', compact('orderps'));
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
            'number' => 'required|unique:devolutionmps',
            'orderp_id' => 'required',
            'date_dev' => 'required',
            'received_by' => 'required',
        ]);

        $devolutionmp = new Devolutionmp;

        $devolutionmp->number = $request->number;
        $devolutionmp->orderp_id = $request->orderp_id;
        $devolutionmp->received_by = $request->received_by;
        $devolutionmp->date_dev = date("Y-m-d", strtotime($request->date_dev));

        $devolutionmp->save();

        $cant_ = 0;
        $mydevolutionmps = Devolutionmp::where('orderp_id', $request->orderp_id)->get();
        foreach($mydevolutionmps as $devolutionmp){
        	$cant_ += $devolutionmp->delivered_quantity;
        }

        //copiar estandares
        $orderps = Orderp::find($request->orderp_id);
        foreach ($orderps->materials as $material) {
        	$devolutionmp->materials()->attach($material->pivot->material_id, ['quantity_standard' => $material->pivot->quantity, 'delivered_quantity' => $cant_]);
        }

        return redirect()->route('devolutionmps.edit', $devolutionmp->id)->with('info', 'Devolución guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Devolutionmp  $devolutionmp
     * @return \Illuminate\Http\Response
     */
    public function show(Devolutionmp $devolutionmp)
    {
        session(['page' => 'devolutionmps', 'page_item' => 'devolutionmps_show']);

        return view('devolutionmps.show', compact('devolutionmp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Devolutionmp  $devolutionmp
     * @return \Illuminate\Http\Response
     */
    public function edit(Devolutionmp $devolutionmp)
    {
        session(['page' => 'devolutionmps', 'page_item' => 'devolutionmps_edit']);
        $orderps = Orderp::orderBy('number', 'ASC')->get();

        return view('devolutionmps.edit', compact('devolutionmp','orderps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Devolutionmp  $devolutionmp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devolutionmp $devolutionmp)
    {
        $this->validate(request(), [
            'number' => 'required|unique:outputmps,number,'.$devolutionmp->id,
            'date_dev' => 'required',
            'received_by' => 'required'
        ]);

        $devolutionmp->update([
            'number' => $request->number,
            'received_by' => $request->received_by,
            'date_dev' => date("Y-m-d", strtotime($request->date_dev)),
        ]);

        // Detach all materales from the devolutionmp...
        $devolutionmp->materials()->detach();

        for($i=0; $i<count($request->get('material_id')); $i++){

            $devolutionmp->materials()->attach($request->get('material_id')[$i], ['quantity_standard' => $request->get('quantity_standard')[$i],'delivered_quantity' => $request->get('delivered_quantity')[$i],'quantity_output' => $request->get('quantity_output')[$i],'observation' => $request->get('observation')[$i]]);
        }

        return redirect()->route('devolutionmps.edit', $devolutionmp->id)->with('info', 'Devolución actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Devolutionmp  $devolutionmp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devolutionmp $devolutionmp)
    {
        $devolutionmp->delete();
        return back()->with('info', 'Eliminado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function exportPDF(Devolutionmp $devolutionmp)
    {
        $materials = $devolutionmp->materials;

        if($devolutionmp->status == 0){
            foreach($devolutionmp->materials as $itemat){
                $material =  Material::find($itemat->id);
                //Restar al stock;
                $rest = $material->stock + $itemat->pivot->quantity_output;
                $material->update([
                    'stock' => $rest
                ]);
            }
            $devolutionmp->update(['status' => 1]);
        }
        $pdf = PDF::loadview('devolutionmps.pdf', compact('devolutionmp','materials'));
        return $pdf->download('devolucion_material_'.$devolutionmp->number.'.pdf');
    }
}
