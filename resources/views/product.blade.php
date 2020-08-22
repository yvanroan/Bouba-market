@extends('layouts.app')

@section('content')
<div class="container">
	<main role="main">

	  <section class="jumbotron text-center">
	    <div class="container">
	      <h1>Album example</h1>
	      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
	      <p>
	        <a href="#" class="btn btn-primary my-2">Main call to action</a>
	        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
	      </p>
	    </div>
	  </section>
	  <h2>Category</h2>
		@foreach(App\Category::all() as $cat)
			<a href="{{route('product.list',[$cat->slug])}}"><button class="btn btn-secondary">{{$cat->name}}</button></a>
		@endforeach

	  <div class="album py-5 bg-light">
	    <div class="container">
	    	<h2>Products</h2>
	      	<div class="row">
	      	@if(count($products)>0)
            	@foreach($products as $product)
			        <div class="col-md-4">
			          <div class="card mb-4 shadow-sm">
			            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
			            <img src="{{Storage::url($product->image)}}" width="100%" height="225">
			            <div class="card-body">
			            	<div class="card-text">
			              		<p>{{$product->name}}</p>
	            				<p>{{$product->description}}</p>
			              	</div>
				            <div class="d-flex justify-content-between align-items-center">
				                <div class="btn-group">
				                  <a href="{{route('product.show',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">View</button></a>
				                  <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to Cart</button></a>
				                </div>
				                <span class="text-muted">${{$product->price}}</span>
				            </div>
			            </div>
			          </div>
	          		</div>
	          		
	          	@endforeach
	        @endif
	      	</div>
	    </div>
	  </div>
	  <h1>Carousel</h1>

<div class="jumbotron">
   <div id="carouselExampleFade" class="carousel slide " data-ride="carousel">
  	<div class="carousel-inner">

	    <div class="carousel-item active">
	     <div class="row">
	     	@foreach($randomActiveProduct as $product)
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
				                  <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to Cart</button></a>
				                </div>
				                <span class="text-muted">${{$product->price}}</span>
				            </div>
			            </div>
			          </div>
	       </div>
	       @endforeach
	     </div>
	    </div>

	    <div class="carousel-item">
	     <div class="row">
	     	@foreach($randomItemProduct as $product)
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
				                  <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to Cart</button></a>
				                </div>
				                <span class="text-muted">${{$product->price}}</span>
				            </div>
			            </div>
			          </div>
	       </div>
	       @endforeach
	     </div>
	     <!-- try this one too ;-)

	     <div class="carousel-item active">
	     <div class="row">
	         <img src="images/photo1.jpeg" class="img-thumbnail">
	      

	     </div>
	    </div>

	    <div class="carousel-item">
	     <div class="row">
	         <img src="images/photo1.jpeg" class="img-thumbnail">
	       
	     </div>
    	</div> -->
    	</div>



	 </div>
	  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
   </div>
  </main>
</div>
@endsection