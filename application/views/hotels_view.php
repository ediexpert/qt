

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="text-uppercase"><?php if(isset($title)) echo $title; ?> </h3>
              </div>

             
            </div>

            <div class="clearfix"></div>
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!--<h2>Form Design <small>different form elements</small></h2> -->
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  <?php if($isAdmin): ?>
                    <br />
                    <div enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate class="form-horizontal form-label-left">
                      <?php
                      foreach ($info as $key => $value) { ?>
                        <input  type="hidden" id="hotel_id" value="<?=$value->id?>" disabled="disabled">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hotel Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="hotel_name" disabled="disabled" required="required" value="<?=$value->hotel_name?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Room Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  id="room_type"  required="required" value="" placeholder="Room Type" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  id="room_price"  required="required" value="" placeholder="price" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                     
                     
                     
                      <?php  }     ?>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button  class="btn btn-primary">Cancel</button>
                          <button id="add_room" class="btn btn-success">Submit</button>
                        </div>
                      </div>
					</div>
                    
					<?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
               
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  

                    <h2>Rooms</h2>
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
                    <?php if( isset($res) ) echo '<div class="alert">'. $res.'</div>'; ?>
                    <p class="text-muted font-13 m-b-30"></p>
					
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Type</th>
						  <th>Price</th>
						  <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        foreach ($rooms as $key => $value) { ?>


                        <tr>
                          <td><?=$value->id?></td>
                          <td><?=$value->room_type?></td>
						  <td><?=$value->room_price?></td>
						  <td><a href="" class="btn btn-primary">View</a></td>
                        </tr>
                        <?php
                      }
                      ?>

                      </tbody>
                    </table>
                  </div>
                </div>
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
            <!-- Datatables -->
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/jszip/dist/jszip.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
            <script src="<?php echo base_url(); ?>gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="<?php echo base_url(); ?>gentelella/build/js/custom.min.js"></script>

            <!-- Datatables -->
            <script>
              $(document).ready(function() {
                var handleDataTableButtons = function() {
                  if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                      dom: "Bfrtip",
                      buttons: [
                        {
                          extend: "copy",
                          className: "btn-sm"
                        },
                        {
                          extend: "csv",
                          className: "btn-sm"
                        },
                        {
                          extend: "excel",
                          className: "btn-sm"
                        },
                        {
                          extend: "pdfHtml5",
                          className: "btn-sm"
                        },
                        {
                          extend: "print",
                          className: "btn-sm"
                        },
                      ],
                      responsive: true
                    });
                  }
                };

                TableManageButtons = function() {
                  "use strict";
                  return {
                    init: function() {
                      handleDataTableButtons();
                    }
                  };
                }();

                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({
                  keys: true
                });

                $('#datatable-responsive').DataTable();

                $('#datatable-scroller').DataTable({
                  ajax: "js/datatables/json/scroller-demo.json",
                  deferRender: true,
                  scrollY: 380,
                  scrollCollapse: true,
                  scroller: true
                });

                var table = $('#datatable-fixed-header').DataTable({
                  fixedHeader: true
                });

                TableManageButtons.init();
              });
            </script>
            <!-- /Datatables -->
            <script>
              $(document).ready(function() {
                $("#city_name").change(function(){
                  $("#areas").find("option:gt(0)").remove();// remove all options except first
                    var d= $("#city_name").val();
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/cities/get_area_list/"+d,
                        dataType: 'json',
                        //data: d,
                        success: function(res) {
                          $.each(res,function(key,val){
                              $.each(val,function(index,x){
                                 var opt = $('<option />');
                                 opt.val(x['id']);
                                 opt.text(x['area_name']);
                                 $('#areas').append(opt);
                            });
                        });
                        }
                    });
                });
              });
            </script>
            <script type="text/javascript">
            $(document).ready(function(){
              $('#id_save_hotel').click(function(){
                var city = $('#city_name').val();
                var area = $('#areas').val();
                var hotel = $('#id_hotel').val();
                var postData = {
                  'city' : city,
                  'area' : area,
                  'hotel' : hotel
                };
                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url(); ?>" + "index.php/hotels/add",
                  data:postData,
                  success:function(res){
                    $('#id_hotel').val('')
                    $('#datatable-buttons').append(res);
                  }
                })
              })
            });

            </script>
			
			<script>
					  $(document).ready(function(){
						 $('#add_room').click(function(){
							 var id = $('#hotel_id').val();
							var room = $('#room_type').val();
							var price = $('#room_price').val();
							var formData = {
								'id' : id,
								'room_type' : room,
								'room_price' : price
							};
							console.log(formData);
							$.ajax({
								type : "POST",
								url : "<?=base_url()?>"+"index.php/hotels/add_room",
								data : formData,
								success : function(res){
									$('#datatable-buttons').append(res);
									console.log(res);
								}
							})
						 }
						 ) 
					  });
					  </script>
          </body>
        </html>
