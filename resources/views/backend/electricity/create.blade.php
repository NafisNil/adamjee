@extends('backend.layout.master')
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Electricity bill Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container offset-3">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Electricity bill</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('electricity.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              @include('backend.electricity.form')
                      </form>
            </div>
            <!-- /.card -->

    

          </div>
          <!--/.col (left) -->
          <!-- right column -->
        
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <script>
      function addNumbers() {
  // Get the values of the two numbers to add
  var num1 = document.getElementById("num1").value;
  var num2 = document.getElementById("previous_read").value;

  // Convert the strings to numbers and add them
  var result = parseInt(num1) - parseInt(num2);

  // Display the result in the result input field
  document.getElementById("num3").value = result;
  
}



function surchargeNum() {
  // Get the values of the two numbers to add

  var num4 = document.getElementById("num4").value;



  // Convert the strings to numbers and add them
  var result = parseInt(num4)/100 ;

  // Display the result in the result input field
  document.getElementById("surcharged").value = result;

}


function totalUnitPrice(){
  var unit = document.getElementById("unit_rate").value;
  var total = document.getElementById("num3").value;
  var totalcost = unit * total;
document.getElementById("due").value = totalcost;
}


      </script>


@endsection