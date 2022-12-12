
                @include('backend.sessionMsg')
                <div class="card-body">


                <div class="form-group">
                  <label for="exampleInputEmail1">Name  of Building  <span style="color:red" >*</span></label>
                 
                  <input type="text" class="form-control" name="building" value="{!!old('building',@$edit->building)!!}">
                 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Name of Tenants </label>
                 
                  <input type="text" class="form-control" name="tenants" value="{!!old('tenants',@$edit->tenants)!!}">
                 
                </div>

                <hr>

                <h4> <b>(A)</b> &nbsp; Current Payment </h4> <br>

                <div class="form-group">
                  <h5>1. Duration of bill &nbsp;</h5>
                  <label for="exampleInputEmail1">From date </label>
                 
                  <input type="date" class="form-control" name="c_fromdate" value="{!!old('c_fromdate',@$edit->c_fromdate)!!}"> <br>

                  <label for="exampleInputEmail1">To date </label>
                 
                  <input type="date" class="form-control" name="c_todate" value="{!!old('c_todate',@$edit->c_todate)!!}">
                 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">2. Measurement of floor (square feet)</label>
                 
                  <input type="number" class="form-control" name="c_measurement" value="{!!old('c_measurement',@$edit->c_measurement)!!}">
                 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">3. Total months</label>
                 
                  <input type="number" class="form-control" name="c_totalmonth" value="{!!old('c_totalmonth',@$edit->c_totalmonth)!!}">
                 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">4. Rate of bill per sqf.</label>
                 
                  <input type="number" class="form-control" name="c_rate" value="{!!old('c_rate',@$edit->c_rate)!!}">
                 
                </div>
                 

                <hr>

                <h4> <b>(B)</b> &nbsp; Due Payment </h4> <br>

                <div class="form-group">
                  <h5>1. Duration of bill &nbsp;</h5>
                  <label for="exampleInputEmail1">From date </label>
                 
                  <input type="date" class="form-control" name="d_fromdate" value="{!!old('d_fromdate',@$edit->d_fromdate)!!}"> <br>

                  <label for="exampleInputEmail1">To date </label>
                 
                  <input type="date" class="form-control" name="d_todate" value="{!!old('d_todate',@$edit->d_todate)!!}">
                 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">2. Measurement of floor (square feet)</label>
                 
                  <input type="number" class="form-control" name="d_measurement" value="{!!old('d_measurement',@$edit->d_measurement)!!}">
                 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">3. Total months</label>
                 
                  <input type="number" class="form-control" name="d_totalmonth" value="{!!old('d_totalmonth',@$edit->d_totalmonth)!!}">
                 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">4. Rate of bill per sqf.</label>
                 
                  <input type="number" class="form-control" name="d_rate" value="{!!old('d_rate',@$edit->d_rate)!!}">
                 
                </div>
                 

                


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>