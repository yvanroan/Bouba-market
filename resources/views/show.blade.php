@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
	<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<div class="details_image_large"><img src="{{Storage::url($product->image)}}" alt=""><!-- <div class="product_extra product_new"><a href="categories.html">New</a></div> --></div>
						<!-- <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							<div class="details_image_thumbnail active" data-image="images/details_1.jpg"><img src="{{Storage::url($product->image)}}" width='40%' height='40%' alt=""></div>
							<div class="details_image_thumbnail" data-image="images/details_2.jpg"><img src="{{Storage::url($product->image)}}" width='40%' height='40%' alt=""></div>
							<div class="details_image_thumbnail" data-image="images/details_3.jpg"><img src="{{Storage::url($product->image)}}"  width='40%' height='40%' alt=""></div>
							<div class="details_image_thumbnail" data-image="images/details_4.jpg"><img src="{{Storage::url($product->image)}}" width='40%' height='40%' alt=""></div>
						</div> -->
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<h2 class="details_name">{{$product->name}}</h2>
						<h4 >${{$product->price}}</h4>
						

						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="availability">Availability:</div>
							<span>In Stock</span>
						</div>
						<br>
						<div class="details_text">
								<h5>Description</h5>
							<p>{{$product->description}}</p>
						</div>

						<!-- Product Quantity -->
						<div class="product_quantity_container">
							<!-- <button class="btn btn-sm btn-outline-primary" disabled="disabled">
								<span>Qty</span>
								<input id="quantity_input" type="number"  value="1">
								<!- ca accepte les tirets faut changer ca ->
							</button> -->
							<a href="#" class="btn btn-sm btn-outline-primary text-uppercase">Add to cart</a>
						</div>
						<hr>
						<!-- Share -->
						<div class="details_share">
							<span>Share:</span>
							<ul>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row description_row">
				<div class="col">
					<div class="description_title_container">
						<h4 class="description_title">Additional Info</h4>
						<hr>
						<p>{!!$product->additional_info!!}</p>
					</div>
					<div class="description_text">
						<a href="">Reviews(1)</a> 
					</div>
				</div>
			</div>
			@if(count($productFromSameCategory )>0)
			<div class="jumbotron">
				<h3 class="text-center">YOU MAY LIKE THESE TOO</h3>
				<br>
				<div class="row">
	     	@foreach($productFromSameCategory as $product)
	       <div class="col-4">
	         <div class="card mb-4 shadow-sm">
			            <img src="{{Storage::url($product->image)}}" width="100%" height="225">
			            <div class="card-body">
			            	<div class="card-text">
			              		<p>{{$product->name}}</p>
	            				<p>{{$product->description}}</p>
			              	</div>
				            <div class="d-flex justify-content-between align-items-center">
				                <div class="btn-group">
				                  <a href="{{route('product.show',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">View</button></a>
				                  <button type="button" class="btn btn-sm btn-outline-primary">Add to Cart</button>
				                </div>
				                <span class="text-muted">${{$product->price}}</span>
				            </div>
			            </div>
			          </div>
	       </div>
	       @endforeach
	     </div>
			</div>
			@endif
		</div>
	</div>

	<!-- Products -->

	<!-- <div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Related Products</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">-->

						<!-- Product -->
						<!-- <div class="product">
							<div class="product_image"><img src="images/product_1.jpg" alt=""></div>
							<div class="product_extra product_new"><a href="categories.html">New</a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$670</div>
							</div>
						</div> -->

						<!-- Product -->
						<!-- <div class="product">
							<div class="product_image"><img src="images/product_2.jpg" alt=""></div>
							<div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$520</div>
							</div>
						</div> -->

						<!-- Product -->
						<!-- <div class="product">
							<div class="product_image"><img src="images/product_3.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$710</div>
							</div>
						</div> -->

						<!-- Product -->
						<!-- <div class="product">
							<div class="product_image"><img src="images/product_4.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$330</div>
							</div>
						</div> -->

					<!-- </div>
				</div>
			</div>
		</div>
	</div> -->
            
    </div>
</div>
@endsection

