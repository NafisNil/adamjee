@extends('backend.layout.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Water form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Water form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ">
      <div class="container offset-3">
        <div class="row">
          <!-- left column -->
         
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Water form</h3>
            
               
                <a href="{{route('water.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
                     
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Bill No</th>
                    <th>Building Name</th>
                    <th>Tenants Name</th>
                    <th>Total Bill (BDT)</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $date = Carbon\Carbon::now()->format('Ym');
                @endphp
                  
                    @foreach ($water as $key=>$item) 
                            
                   
                   
                  <tr>
                    <td>{{++$key}}</td>
                    <td>AdW{!!$date.$item->id!!}</td>
                   <td>{{$item->building}}</td>
                   <td>{{$item->user->name}}</td>
                   <td>{{$item->total_bill}} Tk.</td>
                 
                    <td>
                      
                      <a href="{{route('water.edit',[$item])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                      <a href="{{route('pdf_wasa',[$item->id])}}"><button class="btn btn-outline-info btn-sm"><i class="fa fa-file" aria-hidden="true"></i></button></a>
                      <a href="{{route('water.show',[$item])}}"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button></a>
                    
                     
                     
                      <form action="{{route('water.destroy',[$item])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
            
                 
                    </td>
                   
                  </tr>
                
    
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Bill No</th>
                    <th>Building Name</th>
                    <th>Tenants Name</th>
                    <th>Total Bill (BDT)</th>
                    <th>Action</th>
                  
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
         
          <!--/.col (left) -->
          <!-- right column -->
        
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection