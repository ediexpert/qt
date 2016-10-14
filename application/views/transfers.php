

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php if(isset($title)) echo $title; ?> </h3>
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

<<<<<<< HEAD
              
=======
              <div class="col-md-12 col-sm-12 col-xs-12">
                
              </div>
>>>>>>> 34fdb84e1852edc285092a290662cf57dc491308
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  <?php if($isAdmin): ?>
                    <div  class="panel panel-body" id="add_city_div" style="display:block">
                        <select id="txr_type" class="" name="city">
                          <option>Transfer type</option>
                          <?php
                          foreach ($ttype as $key => $value) { ?>
                            <option value="<?=$value->id?>"><?=$value->transfer_type?></value>
                          <?php }
                           ?>
                        </select>
                        <select id="to" class="" name="city">
                          <option>Select Origin</option>
                          <?php
                          foreach ($areas as $key => $value) { ?>
                            <option value="<?=$value->id?>"><?=$value->area_name?></value>
                          <?php }
                           ?>
                        </select>
                        <select id="td" class="" name="city">
                          <option>Select Destination</option>
                          <?php
                          foreach ($areas as $key => $value) { ?>
                            <option value="<?=$value->id?>"><?=$value->area_name?></value>
                          <?php }
                           ?>
                        </select>
                        <input id="tup" type="number" placeholder="unit price" name="name" value="">
                        <input id="tfp" type="number" name="price" placeholder="full price" value="">
                        <button class="btn-primary"  id="id_save_txr" type="button" name="button">Add Transfer</button>
                    </div>
					
					<div  class="panel panel-body">
                        <input id="vehicle" type="text" placeholder="Mercedese 2 Seater" value="">
                        <button class="btn-primary"  id="id_save_vehicle" type="button" name="button">Add Vehicle</button>
                    </div>
					
					<?php endif; ?>

                    <h2><?php if(isset($heading)) echo $heading; ?> <small>All</small></h2>
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
					<?php foreach($areas as $k => $val){
						$area_name[] =  $val->area_name;
					} 					
					?>
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
						  <th>Vehicle</th>
                          <th>Origin</th>
                          <th>Destination</th>                          
                          <th>Full Price</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        foreach ($transfers as $key => $value) { ?>


                        <tr>
                          
						  <td><?=$value->transfer_type?></td>
                          <td><?=$area_name[$value->transfer_origin]?></td>
                          <td><?=$area_name[$value->transfer_destination]?></td>
                          <td><?=$value->transfer_full_price?></td>
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
					$(document).ready(function(){
						$('#id_save_vehicle').click(function(){
							var vehicle = $('#vehicle').val();							
							if(vehicle != ""){
								var reqData = {
									'txr_type' : vehicle
								};
								$.ajax({
									type : "POST",
									url : "<?=base_url()?>"+"index.php/transfers/add_vehicle",
									data : reqData,
									success : function(res){
										console.log(res);
										$('#vehicle').val('');	
										$('#txr_type').append('<option value='+res+'>'+vehicle+'</option>');
									}
								})
							}
						})
					});
					</script>
					
					
					<script>
					$(document).ready(function(){
						$('#id_save_txr').click(function(){
							var txr_type = $('#txr_type').val();
							var origin = $('#to').val();
							var dest = $('#td').val();
							var uprice = $('#tup').val();
							var price = $('#tfp').val();							
							if( (txr_type != "") && (origin != "") && (dest != "") && (uprice != "") && (price != "") ){
								var reqData = {
									'ttid' : txr_type,
									'to' : origin,
									'td' : dest,
									'tup' : uprice,
									'tfp' : price,
								};
								$.ajax({
									type : "POST",
									url : "<?=base_url()?>"+"index.php/transfers/add",
									data : reqData,
									success : function(res){
										console.log(res);
										$('#tup').val('');
										$('#tfp').val('');									
										$('#datatable-buttons').append(res);
									}
								})
							}
						})
					});
					</script>
  </body>
</html>
