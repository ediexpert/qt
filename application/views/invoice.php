<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Quotation";
$obj_pdf->SetTitle($title);
// $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>gentelella/build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="nav-md" style="">
    <div id="id_main" class="container body">




      <div class="main_container">



  <!-- /top navigation -->


          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">


              <div class="clearfix"></div>

              <div class="row">
                <div id="pdf_area" class="col-md-12">
                  <div class="x_panel">

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
                                            <br><b>PAX:</b> <?=$quotation_info[0]->pax?>

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
                          <div class="col-xs-12 table">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Hotel</th>
                                  <th>Room type</th>
                                  <th>PAX</th>
                                  <th>Arrival</th>
                                  <th>Departure</th>
                                  <!-- <th style="width: 59%">Description</th> -->
                                  <th>Subtotal</th>
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
                                foreach ($hotel as $key => $value) { ?>
                                  <tr>
                                    <td><b><?=$this->common->get_hotel_by_id($value->hotel_id)?></b></td>
                                    <td>
                                      <?=$this->common->get_hotel_room_type_by_id_str($value->room_type_id)?></td>
                                    <td><?=$value->no_pax?></td>
                                    <td><?=$value->cin_date?></td>
                                    <td><?=$value->cout_date?></td>
                                    <td>$50.00</td>
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
                                  <th>Subtotal</th>
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
                                foreach ($dayplan as $key => $value) {

                                  ?>
                                  <tr>
                                    <td><b><?=$value->dayplan_date?></b></td>
                                    <td><?=$this->common->get_time_by_id($value->daytime_id)?></td>
                                    <td><?=$this->common->get_service_name_by_id_str($value->services_id)?></td>
                                    <td>$50.00</td>
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
                            <p class="lead">Amount Due 2/22/2014</p>
                            <div class="table-responsive">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>$250.30</td>
                                  </tr>
                                  <tr>
                                    <th>Tax (9.3%)</th>
                                    <td>$10.34</td>
                                  </tr>
                                  <tr>
                                    <th>Shipping:</th>
                                    <td>$5.80</td>
                                  </tr>
                                  <tr>
                                    <th>Total:</th>
                                    <td>$265.24</td>
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

            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>

      <!-- jQuery -->

    </body>
  </html>

  <?php

  $content = ob_get_contents();
  ob_end_clean();
  $obj_pdf->writeHTML($content, true, false, true, false, '');
  $obj_pdf->Output('output.pdf', 'D');
  ?>
