@extends('layouts.app')

@section('content')

 <div class="section_slider">
  	<div class="cycle-slideshow">
	    <img src="{{ asset('images/slider/silos-metalicos.jpg') }}" class="img_slider">
	    <img src="{{ asset('images/slider/desgranadora-de-maiz.jpg') }}" class="img_slider">
	    <img src="{{ asset('images/slider/silos-metalicos.jpg') }}" class="img_slider">
	    <img src="{{ asset('images/slider/silos-metalicos.jpg') }}" class="img_slider">
	    <img src="{{ asset('images/slider/picadora-de-forrajes-modelo-P80.jpg') }}" class="img_slider">
	    
	    <!-- empty element for pager links -->
    	<div class="cycle-pager"></div>
	</div>
 </div>
 <div class="content_body_page">
 	<h1 class="title_page">Productos</h1>
 	<div class="row">
 		@foreach($products as $product)
 		<div class="col-md-3 col-xs-12">
		 	<div class="content_product">
			 	<div class="grid">
					<figure class="effect-hera">
						<img src="{{ asset('myproducts/images/'.$product->img_prod) }}" alt=""/>
						<figcaption class="link_product_hover">
							<p><a href="{{ asset('myproducts/images/'.$product->data_sheet) }}" rel="light"><i class="fa fa-fw fa-file-code-o"></i></a></p>
						</figcaption>
					</figure>
					<div>
						<h2><a href="{{ asset('myproducts/images/'.$product->data_sheet) }}" rel="light">{{ $product->name }}</a></h2>
						<label>
	                      @php
	                        $typep = App\Typept::findOrFail($product->typept_id);
	                      @endphp
	                      {{ $typep->name }}</label><br>
						<span>Precio: Bs. {{ $product->price }}</span>
					</div>
				</div>
			</div>
 		</div>
 		@endforeach
 	</div>
 	{{ $products->links() }}
 </div>

@endsection