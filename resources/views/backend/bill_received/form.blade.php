
                @include('backend.sessionMsg')
                <div class="card-body">



                <div class="form-group">
                  <label for="exampleInputEmail1">Name of Tenants </label>
                 
                                  

                  <select class="form-control" name="tenants">
                    
                    <option>Select tenants</option>
                      
                    @foreach ($user as $key => $value)
                      <option value="{{ $value->id }}" {{ ( $value->id == @$edit->tenants) ? 'selected' : '' }}> 
                          {{ $value->name }} 
                      </option>
                    @endforeach    
                  </select>
                 
                </div>

                <hr>

               

                <div class="form-group">
                
                  <label for="exampleInputEmail1">Month </label>
                 
                  <input type="text" class="form-control" name="month" value="{!!old('month',@$edit->month)!!}"> <br>

                  <label for="exampleInputEmail1">Date </label>
                 
                  <input type="date" class="form-control" name="dt_receive" value="{!!old('dt_receive',@$edit->dt_receive)!!}">
                 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Cheque No.</label>
                 
                  <input type="text" class="form-control" name="cheque" value="{!!old('cheque',@$edit->cheque)!!}">
                 
                </div>

                <hr>


                <div class="form-group">
                  <label for="exampleInputEmail1">Amount</label>
                 
                  <input type="number" class="form-control" name="amount" value="{!!old('amount',@$edit->amount)!!}">
                 
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>