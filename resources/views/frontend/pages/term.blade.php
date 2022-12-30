@extends('frontend.layouts.master')

@section('title',' Terms and conditions')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Terms And Conditions</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Terms and conditions  -->
 <div class="container">
     <div class="row">
        {!! setting('term_and_condition',1,'Not written yet') !!}
     </div>
 </div>
    
	

	@include('frontend.layouts.newsletter')
@endsection
