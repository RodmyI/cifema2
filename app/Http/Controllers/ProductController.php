<?php

namespace App\Http\Controllers;

use App\Product;
use App\Typept;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['page' => 'products', 'page_item' => 'products_index']);

        $products = Product::query();

        if($request->isMethod('post')){
            if ( $request->has('name') && is_null($request->input('name')) && $request->has('typept_id') && is_null($request->input('typept_id')) ){
                    $request->session()->forget('name_s');
                    $request->session()->forget('typept_id_s');
            }else{
                if ( $request->has('name') && !is_null($request->input('name')) && $request->has('typept_id') && !is_null($request->input('typept_id')) )
                {
                    $products = $products->where([
                                                ['name', 'LIKE', trim($request->input('name')) . '%'],
                                                ['typept_id', $request->input('typept_id')],
                                            ]);
                    $request->session()->put('name_s', trim($request->input('name')));
                    $request->session()->put('typept_id_s', $request->input('typept_id'));
                }elseif ( $request->has('name') && !is_null($request->input('name')) ){
                    $products = $products->where([
                                                ['name', 'LIKE', trim($request->input('name')) . '%'],
                                            ]);
                    $request->session()->put('name_s', trim($request->input('name')));
                    $request->session()->forget('typept_id_s');
                }elseif ( $request->has('typept_id') && !is_null($request->input('typept_id')) ){
                    $products = $products->where([
                                                ['typept_id', $request->input('typept_id')],
                                            ]);
                    $request->session()->put('typept_id_s', $request->input('typept_id'));
                    $request->session()->forget('name_s');
                }
            }
        }else{
            if ( $request->session()->exists('name_s') && $request->session()->get('name_s') == ''){
                    $request->session()->forget('name_s');
            }
            if ( $request->session()->exists('typept_id_s') && $request->session()->get('typept_id_s') == ''){
                    $request->session()->forget('typept_id_s');
            }


            if ( $request->session()->exists('name_s') && $request->session()->exists('typept_id_s') )
            {
                $products = $products->where([
                                            ['name', 'LIKE', session('name_s') . '%'],
                                            ['typept_id', session('typept_id_s')],
                                        ]);
            }elseif ( $request->session()->exists('name_s') ){
                $products = $products->where([
                                            ['name', 'LIKE', session('name_s') . '%'],
                                        ]);
            }elseif ( $request->session()->exists('typept_id_s') ){
                $products = $products->where([
                                            ['typept_id', session('typept_id_s')],
                                        ]);
            }
        }

        $products = $products->paginate();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'products', 'page_item' => 'products_create']);

        $typepts = Typept::get();

        return view('products.create', compact('typepts'));
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
            'typept_id' => 'required',
            'name' => 'required',
            'unit' => 'required',
            'cantidadinit' => 'required',
            'code' => 'required|unique:products',
            'price' => 'required',
            'img_prod' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'data_sheet' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $img_prod = $request->file('img_prod');
        if($img_prod!=''){
            $imageName = time().'p.'.$img_prod->getClientOriginalExtension();
            $img_prod->move(public_path('myproducts/images'), $imageName);
        }else{
            $imageName = '';
        }

        $data_sheet = $request->file('data_sheet');
        if($data_sheet!=''){
            $imageNameFT = time().'ft.'.$data_sheet->getClientOriginalExtension();
            $data_sheet->move(public_path('myproducts/images'), $imageNameFT);
        }else{
            $imageNameFT = '';
        }

        $product = new Product;

        $product->typept_id = $request->typept_id;
        $product->name = $request->name;
        $product->unit = $request->unit;
        $product->cantidadinit = $request->cantidadinit;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->img_prod = $imageName;
        $product->data_sheet = $imageNameFT;
        $product->stock = $request->cantidadinit;

        $product->save();

        return redirect()->route('products.edit', $product->id)->with('info', 'Producto guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        session(['page' => 'products', 'page_item' => 'products_show']);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        session(['page' => 'products', 'page_item' => 'products_edit']);

        $typepts = Typept::get();

        return view('products.edit', compact('product','typepts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate(request(), [
            'typept_id' => 'required',
            'name' => 'required',
            'unit' => 'required',
            'cantidadinit' => 'required',
            'code' => 'required|unique:products,code,'.$product->id,
            'price' => 'required',
            'img_prod' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'data_sheet' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $img_prod = $request->file('img_prod');
        if($img_prod!=''){
            $imageName = time().'p.'.$img_prod->getClientOriginalExtension();
            $img_prod->move(public_path('myproducts/images'), $imageName);
        }else{
            $imageName = '';
        }

        $data_sheet = $request->file('data_sheet');
        if($data_sheet!=''){
            $imageNameFT = time().'ft.'.$data_sheet->getClientOriginalExtension();
            $data_sheet->move(public_path('myproducts/images'), $imageNameFT);
        }else{
            $imageNameFT = '';
        }

        $arr_product = array();

        $arr_product['typept_id'] = $request->typept_id;
        $arr_product['name'] = $request->name;
        $arr_product['unit'] = $request->unit;
        $arr_product['cantidadinit'] = $request->cantidadinit;
        $arr_product['code'] = $request->code;
        $arr_product['price'] = $request->price;
        $arr_product['stock'] = $request->stock;
        $arr_product['status'] = $request->status;

        if($request->file('img_prod')!=''){
            $arr_product['img_prod'] = $imageName;

            //Delete images
            $old_img_prod = public_path('myproducts/images/'.$request->old_img_prod);
            if(!is_null($request->old_img_prod)){
                unlink($old_img_prod);
            }
        }
        if($request->file('data_sheet')!=''){
            $arr_product['data_sheet'] = $imageNameFT;
            
            //Delete images
            $old_data_sheet = public_path('myproducts/images/'.$request->old_data_sheet);
            if(!is_null($request->old_data_sheet)){
                unlink($old_data_sheet);
            }
        }

        $product->update($arr_product);

        return redirect()->route('products.edit', $product->id)->with('info', 'Producto actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->update(['status'=>'0']);

        return back()->with('info', 'Eliminado correctamente.');
    }
}
