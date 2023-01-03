@extends('frontend.layout.master')
@section('content')
<main>
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumbs mb-4"> <a href="{{route('index')}}">Home</a>
						<span class="mx-1">/</span>  <a href="#!">Contact</a>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="pr-0 pr-lg-4">
						<div class="content">Feel free to contact ....
							<div class="mt-5">
								<p class="h3 mb-3 font-weight-normal"><a class="text-dark" href="mailto:{{$contact->email}}">{{$contact->email}}</a>
								</p>
								<p class="mb-3"><a class="text-dark" href="tel:{{$contact->phone}}">&#43;{{$contact->phone}}</a>
								</p>
								<p class="mb-2">{!!$contact->address!!}</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</main>
@endsection