@extends('frontend.layout.master')
@section('content')
@extends('frontend.layout.master')
@section('content')
<main>
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumbs mb-4"> <a href="{{route('index')}}">Home</a>
						<span class="mx-1">/</span>  <a href="#!">Notice List</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="p-2">
						<div class="content">
                            <table class="table table-responsive">
                                <thead>
                                  <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>File</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notice as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td><img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="notice" style="max-width:100px"></td>
                                        <td><a href="{{(!empty($item->file))?URL::to('storage/'.$item->file):URL::to('image/no_image.png')}}">{{@$item->file}}</a></td>
                                      </tr>
                                    @endforeach
                                
        
                                </tbody>
                              </table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</main>
@endsection
@endsection