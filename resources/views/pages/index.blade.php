@extends ('layouts.app2')

@section('content')
<div class="container">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			 <div class="carousel-item active">
			     <img class="img-fluid" src="../images/image1.jpg" alt="First slide">
			  </div>
			 <div class="carousel-item">
			   <img class="d-block w-100" src="../images/image2.jpg" alt="Second slide">
			 </div>
			 <div class="carousel-item">
			   <img class="d-block w-100" src="../images/image3.jpg" alt="Third slide">
			</div>
		</div>
	</div>
</div>
<br>
<div class="container">
	<h2>About Us</h2>
	<div class="row">		
		<div class="col-md-4">
			<div class="card">
			  <img class="card-img-top" src="../images/image4.jpg" alt="Card image cap">
			  <div class="card-body">
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
			  <img class="card-img-top" src="../images/image4.jpg" alt="Card image cap">
			  <div class="card-body">
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
			  <img class="card-img-top" src="../images/image4.jpg" alt="Card image cap">
			  <div class="card-body">
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
		</div>
	</div>
</div>
<br>



@endsection