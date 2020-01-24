@extends('layouts.app')

@section('content')

 <div class="content_body_page">
 	<h1 class="title_page"><strong>Categoria:</strong> {{ $typept->name }}</h1>
 	<div class="row">
 		<div class="col-md-10 col-xs-12">
 			@if($products->count()>0)
			 	<div class="row">
			 		@foreach($products as $product)
			 		<div class="col-md-4 col-xs-12">
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
		 	@else
		 		<p>No se encontraron resultados</p>
		 	@endif
 		</div>
 		<div class="col-md-2 col-xs-12">
 			<h3 class="title_sidebar">Categorias</h3>
 			@if($typepts->count() > 0)
 				<div class="list_cats">
 					@foreach($typepts as $row)
 						<div class="items_cat">
 							<a href="{{ route('category',$row->id) }}" class="@if($typept->id==$row->id){{ 'active' }}@endif">{{ $row->name }}</a>
 						</div>
 					@endforeach
 				</div>
 			@endif
 		</div>
 	</div>
 </div>

@endsection