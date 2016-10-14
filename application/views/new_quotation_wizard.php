<?php foreach($areas as $k => $val){
	$area_name[] =  $val->area_name;
} 					
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Wizards <small>Sessions</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Quotation info</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Hotels</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Day plans</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>Transfers</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <h2 class="StepTitle text-center">General information</h2>
                        <form class="form-horizontal form-label-left">

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quotation Name <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" value="<?php echo $quot[0]->quot_name;?>" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No of PAX<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="last-name" name="last-name" value="<?php echo $quot[0]->pax;?>" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="email" class="form-control" name="email"  value="<?php echo $quot[0]->email;?>" data-parsley-trigger="change" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Arrival <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $quot[0]->arrival_date;?>" required="required" type="date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Departure <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="birthday2" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $quot[0]->departure_date;?>" required="required" type="date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Night(s)</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="nights" class="form-control"  disabled="disabled" placeholder="0" value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No of Minors
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="last-name" name="last-name" value="<?php echo $quot[0]->minor;?>"  class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                        </form>

                      </div>
                      <div id="step-2">
                        <h2 class="StepTitle text-center">Hotel(s)</h2>
                        <form class="form-horizontal form-label-left">
                          <input id="id_qid" type="hidden" name="quotation_id" value="<?php echo $quot[0]->id;?>">
                          <div id="hotel_added_res">
                          <?php
                            if(isset($quotation_hotel)){
                              foreach ($quotation_hotel as $key => $value) {
                                // print_r( $value);
                                echo $this->common->get_hotel_by_id($value->hotel_id);
                                echo '<div class="panel panel-default"> <div class="panel-body"> <table class="table table-hover"> <tr> <th>city</th><th>Hotel</th><th>Checkin</th><th>checkout</th><th>Night(s)</th><th>PAX</th><th>Minor(s)</th> <th></th></tr> <tr> <td>'.$this->common->get_city_by_id($value->city_id).'</td><td>'.$this->common->get_hotel_by_id($value->hotel_id).'</td><td>'.$value->cin_date.'</td><td>'.$value->cout_date.'</td><td>Night(s)</td><td>'.$value->no_pax.'</td><td>Minor(s)</td><td><button class="btn-danger" onclick="delQuotHotel('.$value->id.');$(this).closest(\'tr\').remove();">X</button></td> </tr> </table> </div> </div>';
                              }
                            }
                          ?>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">City
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select id="cities" class="form-control">
                                    <option value="1">Choose option</option>
                                    <?php foreach ($cities as $key => $value) { ?>
                                      <option value="<?=$value->id?>"><?=$value->city_name?></option>
                                      <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hotel
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                  <select id="hotels" class="form-control">
                                    <option>Choose option </option>

                                  </select>
                                </div>
                              </div>
                              <!-- Hotel options div -->
                              <div class="form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Options Available
                                </label>
                                <div id="id_room_type" class="col-md-6 col-sm-6 col-xs-12">
                                  
                                  <!-- room will come here -->
                                </div>
                              </div>
                              <!-- / Hotel options div -->
							  <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No of Room(s)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="norooms" class="form-control"  value="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Checkin Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="id_cidate" type="date" class="form-control" name="cidate" value="<?php echo $quot[0]->arrival_date;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Checkout Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="id_codate" type="date" class="form-control" name="codate" value="<?php echo $quot[0]->departure_date;?>">
                                </div>
                              </div>
							  
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Night(s)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="hotel_night" class="form-control" name="nights" value="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PAX
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="id_pax" type="number" class="form-control" name="pax" value="<?php echo $quot[0]->pax;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Minor(s)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" class="form-control" name="minors" value="<?php echo $quot[0]->minor;?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="hotels_div"></div>

                          <button type="button" id="add_hotel" class="btn btn-primary" name="button">Save</button>


                        </form>
                      </div>
                      <div id="step-3">
                        <h2 class="StepTitle text-center">Day Plan(s)</h2>
                        <form class="form-horizontal form-label-left">
                          <input type="hidden" name="quotation_id" value="<?php echo $quot[0]->id;?>">
                          <div id="services_added_res">
                            <?php
                              if(isset($quotation_dayplan)){
                                foreach ($quotation_dayplan as $key => $value) {
                                  // print_r( $value);
                                  echo '<div class="panel panel-default"> <div class="panel-body"> <table class="table table-hover"> <tr><th>date</th><th>Time</th><th>Services</th><th></th></tr><td>'.$value->dayplan_date.'</td><td>'.$value->daytime_id.'</td><td>'.$value->services_id.'</td><td><button class="btn-danger" onclick="delQuotDayplan('.$value->id.');$(this).closest(\'tr\').remove();">X</button></td></tr> </table> </div> </div>';
                                }
                              }
                            ?>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="id_dayplan_date" type="date" name="dayplan_date" value="<?php echo $quot[0]->arrival_date;?>"  min="<?php echo $quot[0]->arrival_date;?>" max="<?php echo $quot[0]->departure_date;?>">
                                </div>
                              </div>
                              <div class="form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Time
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                  <select id="id_daytime" class="form-control">
                                    <option>Please select</option>
                                    <?php
                                    foreach ($timing as $key => $value) {
                                      // print_r( $value);
                                      echo '<option value="'.$value->id.'">'.$value->daytime.' </option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Service Type
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                  <select id="" class="form-control">
                                    <option>Please select</option>
                                    <?php
                                    foreach ($services_type as $key => $value) {
                                      // print_r( $value);
                                      echo '<option value="'.$value->id.'">'.$value->service_type.' </option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div id="id_services_div" class="form-group"></div>
                              <div class="form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Service
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <?php
                                    foreach ($services as $key => $value) {
                                      // print_r( $value);
                                      echo '<div class="checkbox"><label><input class="chkbx" type="checkbox" name="services[]" value="'.$value->id.'"  >'.$value->service_name.' </label></div> <!-- /checkbox div -->';
                                    }
                                    ?>
                                    <input type="hidden" id='textbx' name="name" value="">

                                </div>
                              </div>

                              <div id="service_div"></div>


                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Add another service
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!-- <button id="add_service" type="button" class="btn btn-warning" name="button">Add More Services</button> -->
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="days_div"></div>

                          <button type="button" id="id_add_dayplan" class="btn btn-primary" name="button">Save &amp; Add Another Dayplan</button>


                        </form>
                      </div>
					  
					  
					  <!-- ### STEP 4 --- ####### -->
                      <div id="step-4">
                        <h2 class="StepTitle text-center">Transfer(s)</h2>
						<div class="">
						
							<table id="txr_table" class="table">
								<tr><th>Date</th><th>Vehicle</th><th>Origin</th><th>Destination</th><th>Qty</th><th>Price</th></tr>
								<?php 
								foreach($quotation_txr as $key => $val){ ?>
								<tr>
									<td><?=$val->dayplan_date?></td>
									<td><?=$val->transfer_type?></td>
									<td><?=$area_name[$val->txr_origin]?></td>
									<td><?=$area_name[$val->txr_destination]?></td>
									<td><?=$val->txr_qty?></td>
									<td><?php
									print_r($this->quotation_model->get_fare($val->transfer_type_id,$val->txr_origin,$val->txr_destination)[0]->transfer_full_price) ;?></td>
								</tr>
							<?php
								} 
							?>
								
							</table>
						</div>
                        <div class="form-horizontal form-label-left">
                            <div id="txr_type_res"></div>
							
							
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="txr_date" class="form-control"  min="<?php echo $quot[0]->arrival_date;?>" max="<?php echo $quot[0]->departure_date;?>" />
                              </div>

                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Transfer Type<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="id_txr_type" class="form-control">
                                  <option>Select Please</option>
                                  <?php
                                  foreach ($transfer_type as $key => $value) {
                                    // print_r( $value);
                                    echo '<option value="'.$value->id.'"  >'.$value->transfer_type.' </option> <!-- /checkbox div -->';
                                  }
                                  ?>

                                </select>
                              </div>

                            </div>
							<div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Origin<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="txr_origin" class="form-control">
                                  <option>Select Please</option>
                                  <?php
                                  foreach ($areas as $key => $value) {
                                    // print_r( $value);
                                    echo '<option value="'.$value->id.'"  >'.$value->area_name.' </option> <!-- /checkbox div -->';
                                  }
                                  ?>

                                </select>
                              </div>
							  </div>
							  <div class="form-group">
								  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Destination<span class="required">*</span>
								  </label>
								  <div class="col-md-6 col-sm-6 col-xs-12">
									<select id="txr_dest" class="form-control">
									  <option>Select Please</option>
									  <?php
									  foreach ($areas as $key => $value) {
										// print_r( $value);
										echo '<option value="'.$value->id.'"  >'.$value->area_name.' </option> <!-- /checkbox div -->';
									  }
									  ?>

									</select>
								  </div>

								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Vehicle Quantity</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="txr_qty" type="number" class="form-control" placeholder="Qty eg:3" />
									</div>
								</div> 
			
				
                            <div class="form-group" id="id_txt_save_div">
                              <div class="text-center col-md-12 col-sm-12 col-xs-12">
                                <button id="id_txr_save" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                            <div class="form-group" id="id_view_quotation_div" style="display:none">
                              <div class="text-center col-md-12 col-sm-12 col-xs-12">
                                <a type="button" id="" href="<?=base_url()?>index.php/quotation/view/<?=$quot[0]->id?>" class="btn btn-primary" name="button">View Quotation</a>
                                  <button type="button" id="" class="btn btn-primary" name="button">View Iterina</button>
                              </div>
                            </div>



                        </div>

                      

                    </div>
                    <!-- End SmartWizard Content -->






                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>gentelella/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>gentelella/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.js"></script>
        <!-- jQuery Smart Wizard -->
        <script src="<?php echo base_url(); ?>gentelella/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo base_url(); ?>gentelella/js/moment/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>gentelella/js/datepicker/daterangepicker.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url(); ?>gentelella/build/js/custom.min.js"></script>

        <!-- jQuery Smart Wizard -->
        <script>
        $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
        });
        </script>
        <!-- /jQuery Smart Wizard -->
        <!-- bootstrap-daterangepicker -->
        <script>
          // $(document).ready(function() {
          //   $('#birthday').daterangepicker({
          //     singleDatePicker: true,
          //     calender_style: "picker_4"
          //   }, function(start, end, label) {
          //     console.log(start.toISOString(), end.toISOString(), label);
          //   });
          // });
        </script>
        <!-- /bootstrap-daterangepicker -->
        <!-- bootstrap-daterangepicker -->
        <script>
          // $(document).ready(function() {
          //   $('#birthday2').daterangepicker({
          //     singleDatePicker: true,
          //     calender_style: "picker_4"
          //   }, function(start, end, label) {
          //     console.log(start.toISOString(), end.toISOString(), label);
          //     console.log(daydiff(parseDate($('#birthday').val()), parseDate($('#birthday2').val())));
          //     var d= daydiff(parseDate($('#birthday').val()), parseDate($('#birthday2').val()));
          //     $('#nights').val(d);
          //   });
          // });
        </script>
        <!-- /bootstrap-daterangepicker -->

        <!-- calculate night(s) -->

        <script>
        $(document).ready(function() {
          var d= daydiff( parseDate($('#birthday').val()), parseDate($('#birthday2').val()) );
           $('#nights').val(d);
        });
        $(document).ready(function() {
          $('#birthday2').change(function(){
            var d= daydiff( parseDate($('#birthday').val()), parseDate($('#birthday2').val()) );
             $('#nights').val(d);
          })
        });
        $(document).ready(function() {
          $('#birthday').change(function(){
            var d= daydiff( parseDate($('#birthday').val()), parseDate($('#birthday2').val()) );
             $('#nights').val(d);
          })
        });


        $(document).ready(function() {
          var d= daydiff( parseDate($('#id_cidate').val()), parseDate($('#id_codate').val()) );
           $('#hotel_night').val(d);
        });
        $(document).ready(function() {
          $('#id_codate').change(function(){
            var nd= daydiff( parseDate($('#id_cidate').val()), parseDate($('#id_codate').val()) );
             $('#hotel_night').val(nd);
          })
        });
        $(document).ready(function() {
          $('#id_cidate').change(function(){
            var nd= daydiff( parseDate($('#id_cidate').val()), parseDate($('#id_codate').val()) );
             $('#hotel_night').val(nd);
          })
        });


        function parseDate(str) {
            var mdy = str.split('-');
            //return new Date(mdy[2], mdy[0]-1, mdy[1]);
            return new Date(mdy[0], mdy[1], mdy[2]);
        }

        function daydiff(first, second) {
            return Math.round((second-first)/(1000*60*60*24));
        }
        </script>
        <!-- /bootstrap-daterangepicker -->

        <!-- validator -->
            <script>
              // initialize the validator function
              validator.message.date = 'not a real date';

              // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
              $('form')
                .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                .on('change', 'select.required', validator.checkField)
                .on('keypress', 'input[required][pattern]', validator.keypress);

              $('.multi.required').on('keyup blur', 'input', function() {
                validator.checkField.apply($(this).siblings().last()[0]);
              });

              $('form').submit(function(e) {
                e.preventDefault();
                var submit = true;

                // evaluate the form using generic validaing
                if (!validator.checkAll($(this))) {
                  submit = false;
                }

                if (submit)
                  this.submit();

                return false;
              });
            </script>
            <!-- /validator -->

            <!-- get hotels on select of city -->
            <script>
              $(document).ready(function() {
                $("#cities").change(function(){
                  $("#hotels").find("option:gt(0)").remove();// remove all options except first
                    var d= $("#cities").val();
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/quotation/get_hotels_list/"+d,
                        dataType: 'json',
                        //data: d,
                        success: function(res) {
                          $.each(res,function(key,val){
                              $.each(val,function(index,x){
                                 var opt = $('<option />');
                                 opt.val(x['id']);
                                 opt.text(x['hotel_name']);
                                 $('#hotels').append(opt);
                            });
                        });
                        }
                    });
                });
              });
            </script>
            <!-- /get hotels on select of city -->
            <!-- add service -->
            <script>
            $(document).ready(function(){
              $('#add_service').click(function(){
                  console.log("click to add service div");
                  $('#service_div').append('<div class="form-group" ><label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Service</label><div class="col-md-6 col-sm-6 col-xs-12"><select id="hotels" class="form-control"><option>Dessert Safari </option><option>Ferrari World </option><option>Dubai City tour </option></select></div></div>');
              });
            });
            </script>
            <!-- /add service -->

            <!-- add Hotel -->
            <script>
            $(document).ready(function(){
              $('#add_hotel').click(function(){
                  console.log("click to add day div");
                  var qid = $("#id_qid").val();
                  var city_id = $('#cities').val();
                  // var city_area_id = $('#id_city_areaid').val();
                  var cidate = $('#id_cidate').val();
                  var codate = $('#id_codate').val();
                  var pax = $('#id_pax').val();
                  var hotel_id = $('#hotels').val();
				  var no_rooms = $('#norooms').val();
                  // var x =  $('input[name="room[]"]').val();;

                  // var arr = [];
                  // $(".hotel_room_chkbx:checked").each(function () {
                  //     arr.push($(this).val());
                  // });
                  var text = "";
                  $('.hotel_room_chkbx:checked').each(function(){
                      text += $(this).val()+',';
                  });
                  text = text.substring(0,text.length-1);
                    console.log(text);
                  var room_ids = text;
                  // var room_type_id = $('#id_room_typeid').val();
                  var postData = {
                      'qid' : qid,
                      'city_id' : city_id,
                      'cidate' : cidate,
                      'codate' : codate,
                      'pax' : pax,
                      'hotel_id' : hotel_id,
                      'room_id' : room_ids,
					  'no_rooms' : no_rooms
                    };

                    console.log(postData);
                  $.ajax({
                       type: "POST",
                       url: "<?php echo base_url(); ?>" + "index.php/quotation/add_hotel",
                       data: postData , //assign the var here
                       success: function(data){
                         $('#hotels').val('');
                         $( "#hotel_added_res" ).append( data );
                       }
                  });
              });
            });
            </script>
            <!-- /add hotels -->
            <!-- add Dayplan -->
            <script>
            $(document).ready(function(){
              $('#id_add_dayplan').click(function(){
                  console.log("sending data to add day plan");
                  var qid = $("#id_qid").val();
                  var dayplan_date = $('#id_dayplan_date').val();
                  var daytime_id = $('#id_daytime').val();
                  // var services_type_id = $('#id_service_type').val();
                  var services_id = $('#textbx').val();

                  var postData = {
                      'qid' : qid,
                      'dayplan_date' : dayplan_date,
                      'daytime_id' : daytime_id,
                      // 'services_type_id' : services_type_id,
                      'services_id' : services_id
                    };
                    console.log(postData);
                  $.ajax({
                       type: "POST",
                       url: "<?php echo base_url(); ?>" + "index.php/quotation/add_dayplan",
                       data: postData , //assign the var here
                       success: function(res){
                         $('#id_dayplan_date').val('');
                         $('#id_daytime').val('');
                         $('#id_service').val('');
                         $( "#services_added_res" ).append( res );
                       }
                  });
              });
            });
            </script>
            <!-- /add Dayplan -->

            <!-- add values of checkbox in input -->
            <script type="text/javascript">
            $(document).ready(function(){
              $('.chkbx').click(function(){
                  var text = "";
                  $('.chkbx:checked').each(function(){
                      text += $(this).val()+',';
                  });
                  text = text.substring(0,text.length-1);

                  $('#textbx').val(text);
              });
            }
            );

            </script>
            <!-- /add values of checkbox in input -->
            <!-- get rooms on select of city -->
            <script>
              $(document).ready(function() {
                $("#hotels").change(function(){
                  // $("#id_room_type").find("option:gt(0)").remove();// remove all options except first
                    var d= $("#hotels").val();
                    console.log(d);
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/quotation/get_rooms/"+d,
                        dataType: 'json',
                        //data: d,
                        success: function(res) {
							$('#id_room_type').html('');
                          $.each(res,function(key,val){
                              $.each(val,function(index,x){
                                 $('#id_room_type').append('<div class="col-md-2 text-center"><label><input class="hotel_room_chkbx" type="checkbox" name="room[]" value="'+x['id']+'"><br/>'+x['room_type']+'<p class="text-danger">'+x['room_price']+'&nbsp;AED</p></label></div>');
                            });
                        });
                        }
                    });
                });
              });
            </script>
            <!-- /get rooms on select of city -->
            
            <!-- / add transfer type -->
			<!-- DELETE quotation hotel -->
			<script type="text/javascript">
            function delQuotHotel(id) {
                if (confirm("Are you sure?")) {
                  var del ={
                    'id' : id
                  };
                  console.log(del);
                    $.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>" + "index.php/quotation/deleteHotel",
                      data: del,
                        success: function (res) {
                          $('#<?=$value->id?>').remove();
                            alert(res);
                        },
                        error: function () {
                            alert('failure');
                        }
                    });
                } else {
                    alert(id + " not deleted");
                }
            }

            </script>
			<!-- /DELETE quotation hotel -->
			<!-- DELETE quotation DAYPLAN -->
			<script type="text/javascript">
            function delQuotDayplan(id) {
                if (confirm("Are you sure?")) {
                  var del ={
                    'id' : id
                  };
                  console.log(del);
                    $.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>" + "index.php/quotation/deleteDayplan",
                      data: del,
                        success: function (res) {
                          $('#<?=$value->id?>').remove();
                            alert(res);
                        },
                        error: function () {
                            alert('failure');
                        }
                    });
                } else {
                    alert(id + " not deleted");
                }
            }

            </script>
			<!-- /DELETE quotation DAYPLAN -->
						<!-- add transfer type -->
            <script>
            $(document).ready(function(){
              $('#id_txr_save').click(function(){
                  var qid = $("#id_qid").val();
                  var txr_type = $('#id_txr_type').val();
				  var origin = $('#txr_origin').val();
				  var dest = $('#txr_dest').val();
				  var qty = $('#txr_qty').val();
				  var txr_date = $('#txr_date').val();
				
                  var postData = {
                      'qid' : qid,
                      'txr_type' : txr_type,
					  'txr_origin' : origin,
					  'txr_dest' : dest,
					  'txr_qty' : qty,
					  'date' : txr_date
                    };
                    console.log(postData);
                  $.ajax({
                       type: "POST",
                       url: "<?php echo base_url(); ?>" + "index.php/quotation/add_txr_type",
                       data: postData , //assign the var here
                       success: function(res){
						   console.log(res);
                         $("#txr_table" ).append('<tr><td>'+txr_date+'</td><td>'+txr_type+'</td><td>'+origin+'</td><td>'+dest+'</td></tr>');
                       }
                  });
              });
            });
            </script>
            <!-- / add transfer type -->
        </body>
        </html>
