@extends('frontend.layout.master')
@section('content')
<main>
    <section class="section">
      <div class="container">
        <div class="row no-gutters-lg">
          <div class="col-12">
            <h2 class="section-title">Notice</h2>
          </div>
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="row">

              <div class="col-12 mb-4">
                <article class="card article-card">
                  <a href="{{(!empty($noticefirst->file))?URL::to('storage/'.$noticefirst->file):URL::to('image/no_image.png')}}">
                    <div class="card-image">
                      <div class="post-info"> <span class="text-uppercase">{{$noticefirst->created_at->format('d M, Y')}}</span>
                      
                      </div>
                      <img loading="lazy" decoding="async" src="{{(!empty($noticefirst->logo))?URL::to('storage/'.$noticefirst->logo):URL::to('image/no_image.png')}}" alt="Post Thumbnail" class="w-100">
                    </div>
                  </a>
                  <div class="card-body px-0 pb-1">
    
                    <h2 class="h1"><a class="post-title" href="{{(!empty($noticefirst->file))?URL::to('storage/'.$noticefirst->file):URL::to('image/no_image.png')}}">{{$noticefirst->title}}</a></h2>
               
                  </div>
                </article>
              </div>
              
              @foreach ($notice as $item)
              <div class="col-md-6 mb-4">
                <article class="card article-card article-card-sm h-100">
                  <a href="{{(!empty($item->file))?URL::to('storage/'.$item->file):URL::to('image/no_image.png')}}">
                    <div class="card-image">
                      <div class="post-info"> <span class="text-uppercase">{{$item->created_at->format('d M, Y')}}</span>
                       
                      </div>
                      <img loading="lazy" decoding="async" src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="Post Thumbnail" class="w-100">
                    </div>
                  </a>
                  <div class="card-body px-0 pb-0">
    
                    <h2><a class="post-title" href="{{(!empty($item->file))?URL::to('storage/'.$item->file):URL::to('image/no_image.png')}}">{{$item->title}}</a></h2>
                  
                    
                  </div>
                </article>
              </div>
              @endforeach
             
           

   
            </div>
          </div>
          <div class="col-lg-4">
    <div class="widget-blocks">
      <div class="row">

        <div class="col-lg-12 col-md-6">
          <div class="widget">
            <h2 class="section-title mb-3">Speech</h2>
            <div class="widget-body">
              <div class="widget-list">
                <article class="card mb-4">
                  <div class="card-image">
                    <div class="post-info"> <span class="text-uppercase">{{$speechfirst->created_at->format('d M,Y')}}</span>
                    </div>
                    <img loading="lazy" decoding="async" src="{{(!empty($speechfirst->logo))?URL::to('storage/'.$speechfirst->logo):URL::to('image/no_image.png')}}" alt="Post Thumbnail" class="w-100">
                  </div>
                  <div class="card-body px-0 pb-1">
                    <h3><a class="post-title post-title-sm"
                        href="{{(!empty($speechfirst->file))?URL::to('storage/'.$speechfirst->file):URL::to('image/no_image.png')}}">{{$speechfirst->title}}</a></h3>
                    
                  </div>
                </article>
                @foreach ($speech as $item)
                <a class="media align-items-center" href="{{(!empty($item->file))?URL::to('storage/'.$item->file):URL::to('image/no_image.png')}}">
                    <img loading="lazy" decoding="async" src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="Post Thumbnail" class="w-100">
                    <div class="media-body ml-3">
                      <h3 style="margin-top:-5px">{{$item->title}}</h3>
                      
                    </div>
                  </a>
                @endforeach
               

              </div>
            </div>
          </div>
        </div>
   
      </div>
    </div>
  </div>
        </div>
      </div>
    </section>
  </main>
@endsection