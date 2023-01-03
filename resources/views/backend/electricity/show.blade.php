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
              @php
                  $date = Carbon\Carbon::now()->format('Ym');
              @endphp
              
              @include('backend.sessionMsg')
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bill No: </label>
                   
                    <p>AdE{!!$date.$electricity->id!!}</p>
                   
                  </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Name  of Building: </label>
               
                <p>{!!$electricity->user->name!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Time of payment: </label>
               
                <p>{!!$electricity->time!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Current reading: </label>
               
                <p>{!!$electricity->current_read!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Date: </label>
               
                <p>{!!$electricity->current_date!!}</p>
               
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Account no: </label>
               
                <p>{!!$electricity->account!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Previous reading: </label>
               
                <p>{!!$electricity->previous_read!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Date: </label>
               
                <p>{!!$electricity->previous_date!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Meter no: </label>
               
                <p>{!!$electricity->meter_no!!}</p>
               
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Unit Utilised: </label>
               
                <p>{!!$electricity->unit!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  Issuing Date: </label>
               
                <p>{!!$electricity->issue_date!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  Last Day of payment: </label>
               
                <p>{!!$electricity->last_date!!}</p>
               
              </div>
              <hr>
<hr>
              <h4> <b>(A)</b> &nbsp; Current Payment </h4> <br>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  1. Price of unit utilised: </label>
               
                <p>{!!$electricity->current_price!!}</p>
               
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">
                  2. Service Charge: </label>
               
                <p>{!!$electricity->service_charged!!}</p>
               
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">
                  3. Electricity Tax: </label>
               
                <p>{!!$electricity->electricity_tax!!}</p>
               
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">
                  4. Demand Charge: </label>
               
                <p>{!!$electricity->demand_charge!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  5. Electricity VAT: </label>
               
                <p>{!!$electricity->electricity_vat!!}</p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  Sub Total: </label>
               
                <p> <b> {!!$electricity->c_sub_total!!} Tk.</b></p>
               
              </div>

              <h4> <b>(B)</b> &nbsp; Due bill </h4> <br>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  from date: </label>
               
                <p> <b> {!!$electricity->d_fromdate!!} </b></p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  to date: </label>
               
                <p> <b> {!!$electricity->d_todate!!}</b></p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  Due balance: </label>
               
                <p> <b> {!!$electricity->due_balance!!}</b></p>
               
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  Surcharge: </label>
               
                <p> <b> {!!$electricity->surcharge!!}</b></p>
               
              </div>
               
              <h5><b>Sub Total: &nbsp;</b> {!!$electricity->d_sub_total!!} Tk.</h5>
              <hr>

             

              <h5><b>1. Total amount to pay in time: &nbsp;</b>{!!$electricity->total_intime!!}Tk.</h5>

              <hr>

              <h5> <b> 2. Total amount to pay out of time: </b> {!!$electricity->total_outtime!!} Tk.</h5>

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