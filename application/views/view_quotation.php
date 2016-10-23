
<?php $total_price = 0;
$per_person_txr = 0;
 ?>
<?php foreach($areas as $k => $val){
  $area_name[] =  $val->area_name;
}
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quotation <small><?php //print_r($dayplan); ?></small></h3>
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
              <div id="pdf_area" class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quotation Design <small>Sample user invoice design</small></h2>
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

                    <section id="exportthis" class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i> Quotation.
                                          <small class="pull-right">Date: <?=date('d-M-Y')?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <address>
                                          <strong><?=$company[0]->name?></strong>
                                          <br><?=$company[0]->address?>
                                          <br><?=$company[0]->city?>, <?=$company[0]->country?> 94107
                                          <br>Phone: <?=$company[0]->phone?>
                                          <br>Email: <?=$company[0]->email?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>
                                          <strong><?=$quotation_info[0]->quot_name?></strong>
                                          <br><b>PAX:</b> <?=$pax=$quotation_info[0]->pax?>

                                          <br>Phone: 1 (804) 123-9876
                                          <br>Email: <?=$quotation_info[0]->email?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Invoice #007612</b>
                          <br>
                          <br><b>Arrival:</b>  <?=$quotation_info[0]->arrival_date?>
                          <br><b>Departure:</b>  <?=$quotation_info[0]->departure_date?>
                          <br>
                          <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
					  <?php //print_r($hotel[0]); ?>
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Hotel</th>
                                <th>Room type</th>
                                <th>PAX</th>
								<th>Minors</th>
								<th>Room(s)</th>
                                <th>Arrival</th>
                                <th>Departure</th>
								<?php if($isAdmin): ?>
								<th>Price</th>
								<?php endif; ?>
                                <!-- <th style="width: 59%">Description</th> -->

                              </tr>
                            </thead>
                            <tbody>
                              <!-- <tr>
                                <td>1</td>
                                <td>Call of Duty</td>
                                <td>455-981-221</td>
                                <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                                </td>
                                <td>$64.50</td>
                              </tr> -->
                              <?php
							  /*
                              foreach ($hotel as $key => $value) { ?>
                                <tr>
                                  <td><b><?=$this->common->get_hotel_by_id($value->hotel_id)?></b></td>
                                  <td>
                                    <?=$this->common->get_hotel_room_type_by_id_str($value->room_type_id)?></td>
                                  <td><?php $adult_pax = $value->no_pax; ?></td>
								  <td><?php $minor_pax = $value->minor; ?></td>
								  <td><?=$value->no_rooms?></td>
                                  <td><?=$value->cin_date?></td>
                                  <td><?=$value->cout_date?></td>

                                  <td><?php
								  $r = $this->quotation_model->quotation_hotel_total($quotation_info[0]->id)[0];
								  print_r($r->total);
								  $total_hotel = $r->total;
								  echo '/';
								  $r = $this->quotation_model->quotation_hotel_room_price($quotation_info[0]->id)[0];
                                  foreach ($r as $key => $value) {
                                    // $total = $value * $value->no_pax;
                                    $hotel_price = $value;
                                    echo $value . " AED";
                                  }
                                  ?></td>
                                </tr>
                              <?php
                              }*/


                              ?>
							  <tr>
								<td><?=$hotel[0]->hotel_name?></td>
								<td><?=$hotel[0]->room_type?></td>
								<td><?=$hotel[0]->pax?></td>
								<td><?=$hotel[0]->minor?></td>
								<td><?=$hotel[0]->no_rooms?></td>
								<td><?=$hotel[0]->arrival_date?></td>
								<td><?=$hotel[0]->departure_date?></td>

								<td><?php $total_hotel_price = $hotel[0]->room_price*$hotel[0]->no_rooms; ?>
								<?php if($isAdmin): echo $total_hotel_price;  endif; ?></td>


							  </tr>


                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Services</th>
                                <!-- <th style="width: 59%">Description</th> -->
                                <?php if($isAdmin): ?>
                                <th>Subtotal</th>
                                <?php endif; ?>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- <tr>
                                <td>1</td>
                                <td>Call of Duty</td>
                                <td>455-981-221</td>
                                <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                                </td>
                                <td>$64.50</td>
                              </tr> -->
                              <?php
							                           $service_adult = $service_minor = 0;
                              foreach ($dayplan as $key => $value) {

                                ?>
                                <tr>
                                  <td><b><?=date('d-m-Y',strtotime($value->dayplan_date))?></b></td>
                                  <td><?=$this->common->get_time_by_id($value->daytime_id)?></td>
                                  <td><?=$this->common->get_service_name_by_id_str($value->services_id)?></td>

								  <td><?php
                                  $sprice = $this->quotation_model->get_service_ids_by_qid_date($quotation_info[0]->id,$value->dayplan_date)[0] ;
                                  foreach ($sprice as $key => $val) {
                                    $s_price = $this->quotation_model->get_price_by_service_ids($val)[0];
                                    foreach ($s_price as $key => $v) {
                                      $service_price = $v;
                  									  $service_adult +=$v;
                  									  if($isAdmin):
                                        echo $v;
                  									  endif;
                                    }
									                 $s_price = $this->quotation_model->get_price_minor_by_service_ids($val)[0];
                                   foreach ($s_price as $key => $v) {
			                                 $service_minor +=$v;
                                       if($isAdmin):
                                         echo $v;
				                               endif;
                                    }
                                  }
                                   ?></td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->



                      <!--  transfer info -->
                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Qty</th>
                                <?php if($isAdmin): ?>
                                  <th>Price(Full)</th>
                                  <th>Per Person</th>
                                <?php endif; ?>


                              </tr>
                            </thead>
                            <tbody>
                              <!-- <tr>
                                <td>1</td>
                                <td>Call of Duty</td>
                                <td>455-981-221</td>
                                <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                                </td>
                                <td>$64.50</td>
                              </tr> -->
                              <?php

                              foreach ($txr_data as $key => $value) {

                                ?>
                                <tr>
                                  <td><?=$value->dayplan_date?></td>
                                  <td><?=$area_name[$value->txr_origin-1]?></td>
                                  <td><?=$area_name[$value->txr_destination-1]?></td>
                                  <td><?=$value->txr_qty?></td>
                                  <?php   $tp = ($value->transfer_full_price*$value->txr_qty)/$pax;
                                    $per_person_txr = $per_person_txr + $tp;
                                    if($isAdmin): ?>
                                  <td><?=$value->transfer_full_price?></td>
                                  <td><?=$tp?></td>
                                <?php endif; ?>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <!-- / transfer info -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                          <p class="lead">Payment Methods:</p>
                          <img src="<?php echo base_url(); ?>images/visa.png" alt="Visa">
                          <img src="<?php echo base_url(); ?>images/mastercard.png" alt="Mastercard">
                          <img src="<?php echo base_url(); ?>images/american-express.png" alt="American Express">
                          <img src="<?php echo base_url(); ?>images/paypal2.png" alt="Paypal">
                          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead">Quote Price</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Per Person(Adult):</th>
                                  <td><?php  //echo $total_price = $hotel_price + $service_price; ?>
									<?=$service_adult?>
                                 AED</td>
                                </tr>
                                <tr>
                                  <th>Per Person(Minor)</th>
                                  <td><?php //echo $tax = ceil($total_price * 9.3)/100; ?> <?=$service_minor?> AED</td>
                                </tr>
                                <!-- <tr>
                                  <th>Shipping:</th>
                                  <td>$5.80</td>
                                </tr> -->
                                <tr>
                                  <th>Transfer(per head):</th>
                                  <td><b><?=$per_person_txr?> AED</b></td>
                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <?php
                                    //$quotation_total = ($perhead_hotel)*$adults +($perhead_hotel)*$minors +($perhead_services)*$adults +($perhead_services)*$minors + ($perhead_txr)*$pax;
                                    $total = $total_hotel_price +($service_adult*$hotel[0]->pax)+($service_minor*$hotel[0]->minor)+($per_person_txr)*$pax;
                                    $total_with_profit = $total +($total*$quotation_info[0]->profit)/100;
                                    $exact_profit = $total_with_profit - $total;
                                  ?>
                                  <td><b><?=$total_with_profit?> AED</b></td>
                                </tr>
                                <tr>
                                  <td>
                                    Profit
                                  </td>
                                  <td><?=$quotation_info[0]->profit?>% -
                                    <?=$exact_profit?>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <script src"<?php echo base_url(); ?>gentelella/js/xepOnline.jqPlugin.js"></script>

                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                          <a href="<?php echo base_url(); ?>index.php/quotation/itenary/<?=$quotation_info[0]->id?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> View Itenary</a>
                          <a  href="<?php echo base_url(); ?>index.php/createpdf/view/<?=$quotation_info[0]->id?>" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>


                        </div>
                      </div>
                    </section>
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
    <script src="<?php echo base_url(); ?>gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src"<?php echo base_url(); ?>gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>gentelella/build/js/custom.min.js"></script>
  </body>
</html>
