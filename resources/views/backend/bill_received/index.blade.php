@extends('backend.layout.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bill Receive form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bill Receive form</li>
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
                <h3 class="card-title">Bill Receive form</h3>
            
               
                <a href="{{route('bill_received.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
                     
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Month </th>
                    <th>Tenants Name</th>
                    <th>Cheque No.</th>
                    <th>Received Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $date = Carbon\Carbon::now()->format('Ym');
                @endphp
                  
                    @foreach ($receivebill as $key=>$item) 
                            
                   
                   
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->created_at->format('d-m-y')}}</td>
                   <td>{{$item->month}}</td>
                   <td>{{$item->user->name}}</td>
                   <td>{{$item->cheque}}</td>
                   <td>{{$item->dt_receive}}</td>
                   <td>{{$item->amount}}</td>
                 
                    <td>
                      
                      <a href="{{route('bill_received.edit',[$item->id])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                    
                      
                    
                     
                     
                      <form action="{{route('bill_received.destroy',[$item->id])}}" method="POST">
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
                    <th>Date</th>
                    <th>Month </th>
                    <th>Tenants Name</th>
                    <th>Cheque No.</th>
                    <th>Received Date</th>
                    <th>Amount</th>
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