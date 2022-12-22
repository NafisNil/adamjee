
                @include('backend.sessionMsg')
                <div class="card-body">


                <div class="form-group">
                  <label for="exampleInputEmail1">Name <span style="color:red" >*</span></label>
                 
                  <input type="text" class="form-control" name="name" value="{!!old('name',@$user->name)!!}">
                 
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email <span style="color:red" >*</span></label>
                   
                    <input type="text" class="form-control" name="email" value="{!!old('email',@$user->email)!!}">
                   
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile <span style="color:red" >*</span></label>
                   
                    <input type="text" class="form-control" name="mobile" value="{!!old('mobile',@$user->mobile)!!}">
                   
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      