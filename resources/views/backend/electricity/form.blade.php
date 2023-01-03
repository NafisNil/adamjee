
                @include('backend.sessionMsg')
                <div class="card-body">


                <div class="form-group">
                  <label for="exampleInputEmail1"> Customer Info  <span style="color:red" >*</span></label>
                 

                  <select class="form-control" id="dropdown" name="customer_info">
                    
                    <option>Select Customer</option>
                      
                    @foreach ($user as $key => $value)
                      <option value="{{ $value->id }}" {{ ( $value->id == @$edit->customer_info) ? 'selected' : '' }}> 
                          {{ $value->name }} 
                      </option>
                    @endforeach    
                  </select>
                 
                </div>

                <div class="form-group">

                    <div class="form-row ">

                      <label for="exampleInputEmail1">Time of payment</label>
                    
                      <input type="text" class="form-control" name="time" value="{!!old('time',@$edit->time)!!}">
                   </div>

                   <div class="form-row col-md-6 float-left">

                    <label for="exampleInputEmail1">Current Reading</label>
                  
                    <input type="number" class="form-control"  id="num1" name="current_read" value="{!!old('current_read',@$edit->current_read)!!}">
                 </div>

                 <div class="form-row col-md-6 float-right">

                  <label for="exampleInputEmail1">Date</label>
                
                  <input type="date" class="form-control" name="current_date" value="{!!old('current_date',@$edit->current_date)!!}">
               </div>
                 
                </div>



                <div class="form-group">

                 <div class="form-row col-md-6 float-left">

                  <label for="exampleInputEmail1">Previous Reading</label>
                
                  <input type="number" class="form-control" name="previous_read" id="previous_read" value="{!!old('previous_read',@$edit->previous_read)!!}">
               </div>

               <div class="form-row col-md-6 float-right">

                <label for="exampleInputEmail1">Date</label>
              
                <input type="date" class="form-control" name="previous_date" value="{!!old('previous_date',@$edit->previous_date)!!}">
             </div>
               
              </div>



              <div class="form-group">

              

                 <label for="exampleInputEmail1">Account Name</label>
               
                 <input type="text" class="form-control" name="account" value="{!!old('account',@$edit->account)!!}">
             

              
             </div>



             <div class="form-group">

             <div class="form-row col-md-6 float-left">

              <label for="exampleInputEmail1">Meter No</label>
            
              <input type="text" class="form-control" name="meter_no" value="{!!old('meter_no',@$edit->meter_no)!!}">
           </div>

           <div class="form-row col-md-6 float-right">

            <label for="exampleInputEmail1">Unit Utilised</label>
          
            <input type="number" class="form-control" name="unit" id="num3" onfocus="addNumbers()" >
         </div>
           
          </div>



          <div class="form-group">

            <div class="form-row col-md-6 float-left">

             <label for="exampleInputEmail1">Issue Date</label>
           
             <input type="date" class="form-control" name="issue_date" value="{!!old('issue_date',@$edit->issue_date)!!}">
          </div>

          <div class="form-row col-md-6 float-right">

           <label for="exampleInputEmail1">Last Date of Payment</label>
         
           <input type="date" class="form-control" name="last_date" value="{!!old('last_date',@$edit->last_date)!!}">
        </div>
          

       
         </div>

                <hr>
              <hr>

         <br>

          <div class="form-group">
            <br><br><br><br>
            <hr>
            <h2>Current payment</h2>
            <br>
            <div class="form-row col-md-6 float-left">

             <label for="exampleInputEmail1">1. Price of unit utilised</label>
           
             <input type="number"  step=0.01 class="form-control" id="due" name="current_price" onfocus="totalUnitPrice()" value="{!!old('current_price',@$edit->current_price)!!}">
          </div>

          <div class="form-row col-md-6 float-right">

           <label for="exampleInputEmail1">2. Service Charge</label>
         
           <input type="number" class="form-control" name="service_charged" value="{!!old('service_charged',@$edit->service_charged)!!}">
        </div>
          
        <div class="form-row col-md-6 float-left">

          <label for="exampleInputEmail1">3. Electricity Tax</label>
        
          <input type="number" class="form-control" name="electricity_tax" value="{!!old('electricity_tax',@$edit->electricity_tax)!!}">
       </div>

       <div class="form-row col-md-6 float-right">

        <label for="exampleInputEmail1">4. Demand Charge</label>
      
        <input type="number" class="form-control" name="demand_charge" value="{!!old('demand_charge',@$edit->demand_charge)!!}">
     </div>

     <div class="form-row col-md-6 float-left">

      <label for="exampleInputEmail1">5. Electricity VAT</label>
    
      <input type="number" class="form-control" name="electricity_vat" value="{!!old('electricity_vat',@$edit->electricity_vat)!!}">
   </div>

       
         </div>
             
         <hr>
<hr><br><br><br>

         <div class="form-group">
          <br><br><br><br>
          <hr>
          <h2>Due bill</h2>
          <br>
          <div class="form-row col-md-6 float-left">

           <label for="exampleInputEmail1"> From Date</label>
         
           <input type="date" class="form-control"  id="start-date" name="d_fromdate" value="{!!old('d_fromdate',@$edit->d_fromdate)!!}">
        </div>

        <div class="form-row col-md-6 float-right">

         <label for="exampleInputEmail1"> To Date </label>
       
         <input type="date" class="form-control" id="end-date" name="d_todate" value="{!!old('d_todate',@$edit->d_todate)!!}">
      </div>
        
      <div class="form-row col-md-6 float-left">

        <label for="exampleInputEmail1">1. Due Balance</label>
      
        <input type="number" id="num4" class="form-control" name="due_balance" value="{!!old('due_balance',@$edit->due_balance)!!}" >
     </div>

     <div class="form-row col-md-6 float-right">

      <label for="exampleInputEmail1">2. Surcharge</label>
    <input type="hidden"  value="{{$unitrate->rate}}" id="unit_rate">
      <input type="number" class="form-control" id="surcharged" name="surcharge"  step=0.01   onfocus="surchargeNum()">
   </div>

     
       </div>
           

                </div>

                <br>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>



              <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
              <script>
                      $('#dropdown').change(function() {
                      var num = $(this).val();
                      
                      $.ajax({
                        url: '/get-data-electricity/',
                        type: 'GET',
                        data: {value: num},
                        success: function(response) {
                          $('#previous_read').val(response.current_read);
                         // $('#rate').val(response.c_rate);
                        }
                    
                      });

                      
                    });
              </script>