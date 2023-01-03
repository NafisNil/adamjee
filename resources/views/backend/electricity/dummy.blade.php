@extends('backend.layout.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Electricity form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Electricity form</li>
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
                <h3 class="card-title">Electricity form</h3>
            
               
                <a href="{{route('electricity.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
                <button onclick="sum()" class="float-right btn btn-outline-info btn-sm mb-2 ml-2 mr-2">Total Bill</button>
                <button onclick="reset()" class="float-right btn btn-outline-danger btn-sm mb-2 ml-2 mr-2">Reset</button>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Bill No</th>
                    <th>Customer Name</th>
                    <th>Account No.</th>
                    <th>Total Bill (BDT) - Intime</th>
                    <th>Total Bill (BDT) - Outtime</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $date = Carbon\Carbon::now()->format('Ym');
                @endphp
                  
                    @foreach ($electricity as $key=>$item) 
                            
                  
                   
                  <tr>
                  
                    <td>{{++$key}}</td>
                    <td>AdE{!!$date.$item->id!!}</td>
                   <td>{{@$item->user->name}}</td>
                   <td>{{$item->account}}</td>
                   <td>{{$item->total_intime}}</td>
                   <td>{{$item->total_outtime}} </td>
                 
                    <td>
                      
                      <a href="{{route('electricity.edit',[$item])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                      <a href="{{route('pdf_electricity',[$item->id])}}"><button class="btn btn-outline-info btn-sm"><i class="fa fa-file" aria-hidden="true"></i></button></a>
                      <a href="{{route('electricity.show',[$item])}}"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button></a>
                    
                     
                     
                      <form action="{{route('electricity.destroy',[$item])}}" method="POST">
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
                    <th>Customer Name</th>
                    <th>Account No.</th>
                    <td>Total Bill</td>
                    <td id="total"></td>
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
    <script>
        function sum(){
            let table = document.getElementById('example1');
        let sum = 0;
        for (let i = 1; i < table.rows.length-1; i++) {
          let cellValue = table.rows[i].cells[5].innerHTML;  // Column index is 2
          cellValue = parseFloat(cellValue);
          console.log(cellValue);
          sum += parseFloat(cellValue);
        }
      
       // console.log(sum);
       document.getElementById('total').innerHTML = "Total Bill : <b>"+ sum + "</b>TK.";
        }

        function reset(){
            sum = 0;
         
       // console.log(sum);
       document.getElementById('total').innerHTML = "Total Bill : "+ sum + "TK.";
        }
        </script>

@endsection