
                @include('backend.sessionMsg')
                <div class="card-body">
         

                <div class="form-group">
                  <label for="exampleInputEmail1">Per Unit Rate <span style="color:red" >*</span></label>
                 
                  <input type="text" class="form-control" name="rate" value="{!!old('rate',@$edit->rate)!!}">
                 
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      