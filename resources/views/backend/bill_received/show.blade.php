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
              <li class="breadcrumb-item active">WASA bill Form</li>
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
                <h3 class="card-title">WASA bill</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @php
                  $date = Carbon\Carbon::now()->format('Ym');
              @endphp
              
              @include('backend.sessionMsg')
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bill No: </label>
                   
                    <p>AdW{!!$date.$water->id!!}</p>
                   
                  </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Name  of Building: </label>
               
                <p>{!!$water->building!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Name of Tenants: </label>
               
                <p>{!!$water->tenants!!}</p>
               
              </div>

              <hr>

              <h4> <b>(A)</b> &nbsp; Current Payment </h4> <br>

              <div class="form-group">
                <h5>1. Duration of bill &nbsp;</h5>
                <label for="exampleInputEmail1">From date </label>
               
                <p>{!!$water->c_fromdate!!}</p> 

                <label for="exampleInputEmail1">To date </label>
               
                <p>{!!$water->c_todate!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">2. Measurement of floor (square feet)</label>
               
                <p>{!!$water->c_measurement!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">3. Total months</label>
               
                <p>{!!$water->c_totalmonth!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">4. Rate of bill per sqf.</label>
               
                <p>{!!$water->c_rate!!}</p>
               
              </div>
               
              <h5><b>Total: &nbsp;</b>{{$water->totalpay}} Tk.</h5>
              <hr>

              <h4> <b>(B)</b> &nbsp; Due Payment </h4> <br>

              <div class="form-group">
                <h5>1. Duration of bill &nbsp;</h5>
                <label for="exampleInputEmail1">From date </label>
               
                <p>{!!$water->d_fromdate!!}</p>

                <label for="exampleInputEmail1">To date </label>
               
                <p>{!!$water->d_todate!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">2. Measurement of floor (square feet)</label>
               
                <p>{!!$water->d_measurement!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">3. Total months</label>
               
                <p>{!!$water->d_totalmonth!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">4. Rate of bill per sqf.</label>
               
                <p>{!!$water->d_rate!!}</p>
               
              </div>
               

              <h5><b>Total Due: &nbsp;</b>{{$water->totaldue}} Tk.</h5>

              <hr>

              <h5> <b> (3) . Determinants of total bill : </b>{{$water->total_bill}} Tk.</h5>

              </div>
              <!-- /.card-body -->

              
            </div>
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
    
@endsection