

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Wizards</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Wizards <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
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
                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $quot[0]->arrival_date;?>" required="required" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Departure <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="birthday2" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $quot[0]->departure_date;?>" required="required" type="text">
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
                          <div id="hotel_added_res"></div>
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
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="col-md-2 text-center">
                                    <label>
                                          <input type="checkbox">Checkin With Baby
                                          <p class="text-danger">200 AED</p>
                                    </label>
                                  </div>
                                  <div class="col-md-2 text-center">
                                    <label>
                                          <input type="checkbox">Checkin With Baby
                                          <p class="text-danger">200 AED</p>
                                    </label>
                                  </div>
                                  <div class="col-md-2 text-center">
                                    <label>
                                          <input type="checkbox">Checkin With Baby
                                          <p class="text-danger">200 AED</p>
                                    </label>
                                  </div>
                                  <div class="col-md-2 text-center">
                                    <label>
                                          <input type="checkbox">Checkin With Baby
                                          <p class="text-danger">200 AED</p>
                                    </label>
                                  </div>
                                  <div class="col-md-2 text-center">
                                    <label>
                                          <input type="checkbox">Checkin With Baby
                                          <p class="text-danger">200 AED</p>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <!-- / Hotel options div -->
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
                                  <input type="number" class="form-control" name="nights" value="">
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

                          <button type="button" id="add_hotel" class="btn btn-primary" name="button">Add Another Hotel</button>


                        </form>
                      </div>
                      <div id="step-3">
                        <h2 class="StepTitle text-center">Day Plan(s)</h2>
                        <form class="form-horizontal form-label-left">
                          <input type="hidden" name="quotation_id" value="<?php echo $quot[0]->id;?>">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select id="cities" class="form-control">
                                    <option value="1">date 1</option>
                                    <option value="2">date 2</option>
                                    <option value="3">date 3</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Time
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                  <select id="hotels" class="form-control">
                                    <option>Morning </option>
                                    <option>Afternoon </option>
                                    <option>Evening </option>
                                    <option>Night </option>

                                  </select>
                                </div>
                              </div>
                              <div class="form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Service
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                  <select id="hotels" class="form-control">
                                    <option>Food / breakfast /Lunch /Dinner </option>
                                    <option>Dessert Safari </option>
                                    <option>Ferrari World </option>
                                    <option>Dubai City tour </option>

                                  </select>
                                </div>
                              </div>
                              <div id="service_div"></div>


                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Add another service
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button id="add_service" type="button" class="btn btn-warning" name="button">Add More Services</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="days_div"></div>

                          <button type="button" id="add_day" class="btn btn-primary" name="button">Add Another Day</button>


                        </form>
                      </div>
                      <div id="step-4">
                        <h2 class="StepTitle text-center">Transfer(s)</h2>
                        <form class="form-horizontal form-label-left">

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Transfer Type<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="hotels" class="form-control">
                                  <option>Food / breakfast /Lunch /Dinner </option>
                                  <option>Dessert Safari </option>
                                  <option>Ferrari World </option>
                                  <option>Dubai City tour </option>

                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Transfer<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="hotels" class="form-control">
                                  <option>Food / breakfast /Lunch /Dinner </option>
                                  <option>Dessert Safari </option>
                                  <option>Ferrari World </option>
                                  <option>Dubai City tour </option>

                                </select>
                              </div>
                            </div>


                        </form>

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
          $(document).ready(function() {
            $('#birthday').daterangepicker({
              singleDatePicker: true,
              calender_style: "picker_4"
            }, function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
            });
          });
        </script>
        <!-- /bootstrap-daterangepicker -->
        <!-- bootstrap-daterangepicker -->
        <script>
          $(document).ready(function() {
            $('#birthday2').daterangepicker({
              singleDatePicker: true,
              calender_style: "picker_4"
            }, function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
              console.log(daydiff(parseDate($('#birthday').val()), parseDate($('#birthday2').val())));
              var d= daydiff(parseDate($('#birthday').val()), parseDate($('#birthday2').val()));
              $('#nights').val(d);
            });
          });
        </script>
        <!-- /bootstrap-daterangepicker -->
        <!-- calculate night(s) -->
        <script>
        function parseDate(str) {
            var mdy = str.split('/');
            return new Date(mdy[2], mdy[0]-1, mdy[1]);
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
            <!-- add day -->
            <script>
            $(document).ready(function(){
              $('#add_day').click(function(){
                  console.log("click to add day div");
                  $('#days_div').append('<div class="panel panel-default"> <div class="panel-body"> <div class="form-group"> <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date </label> <div class="col-md-6 col-sm-6 col-xs-12"> <select id="cities" class="form-control"> <option value="1">date 1</option> <option value="2">date 2</option> <option value="3">date 3</option> </select> </div> </div> <div class="form-group" > <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Time </label> <div class="col-md-6 col-sm-6 col-xs-12"> <select id="hotels" class="form-control"> <option>Morning </option> <option>Afternoon </option> <option>Evening </option> <option>Night </option> </select> </div> </div> <div class="form-group" > <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Service </label> <div class="col-md-6 col-sm-6 col-xs-12"> <select id="hotels" class="form-control"> <option>Food / breakfast /Lunch /Dinner </option> <option>Dessert Safari </option> <option>Ferrari World </option> <option>Dubai City tour </option> </select> </div> </div> <div id="service_div"></div> <div class="form-group"> <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Add another service </label> <div class="col-md-6 col-sm-6 col-xs-12"> <button id="add_service" type="button" class="btn btn-warning" name="button">Add More Services</button> </div> </div> </div></div>');
              });
            });
            </script>
            <!-- /add day -->
            <!-- add hotels -->
            <script>
            $(document).ready(function(){
              $('#add_hotel').click(function(){
                  console.log("click to add day div");
                  $.post( "<?php echo base_url(); ?>" + "index.php/quotation/add_hotel", function( data ) {
                    $("#id_cidate").val('');
                    $("#id_codate").val('');
                    $("#id_pax").val('');
                    $( "#hotel_added_res" ).append( data );
                  });
              });
            });
            </script>
            <!-- /add hotels -->

        </body>
        </html>
