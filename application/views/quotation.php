

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quotations <small>List of quotations</small></h3>
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
                <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index.php/quotation/new_quotation'">Create Quotation</button>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quotations <small>All</small></h2>
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
                    <p class="text-muted font-13 m-b-30">

                      List of all quotations, You can use options like Search, and Orders on the data. Also you can export to PDF, print the data and copy to clipboard
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Arrival</th>
                          <th>Departure</th>
                          <th>PAX</th>
                          <th>Contact</th>
                          <th>Quotation Date &amp; Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        foreach ($quotations as $key => $value) { ?>


                        <tr id="<?=$value->id?>">
                          <td><?=$value->id?></td>
                          <td><a href="quotation/quot/<?=$value->id?>"><?=$value->quot_name?></a></td>
                          <td><?=$this->common->convert_date_format_to_dmY($value->arrival_date)?></td>
                          <td><?=$this->common->convert_date_format_to_dmY($value->departure_date)?></td>
                          <td><?=$value->pax?></td>
                          <td><?=$value->contact?></td>
                          <td><?=$value->created_on?></td>
                          <td>
                            <button type="button" value="<?=$value->id?>" onclick="window.location='quotation/view/<?=$value->id?>'" class="view_quot btn btn-primary" name="button">View</button>
                            <button type="button" class="btn btn-primary" onclick="window.location='quotation/quot/<?=$value->id?>'" name="button">Edit</button>
                            <?php if($isAdmin) : ?><button type="button" class="btn btn-danger" onclick="delenquiry(<?=$value->id?>);$(this).closest('tr').remove();" >Delete</button> <?php endif; ?>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

                <?php
                // if($isAdmin){
                //   echo "Admin";
                // }else{
                //   echo "User";
                // }
                ?>

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
            <script type="text/javascript">
            function delenquiry(id) {
                if (confirm("Are you sure?")) {
                  var del ={
                    'id' : id
                  };
                  console.log(del);
                    $.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>" + "index.php/quotation/delete",
                      data: del,
                        success: function (res) {
                          $('#<?=$value->id?>').remove();
                            //alert(res);
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

          </body>
        </html>
