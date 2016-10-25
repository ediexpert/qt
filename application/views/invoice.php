<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = $quotation_info[0]->quot_name . "-Quotation-" .date('d-m-Y');
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
    <style media="screen">
    table, th, td {
     border: 1px solid black;
    }
    </style>
  </head>
<body class="nav-md" style="">
  <?php $total_price = 0;
  $per_person_txr = 0;
   ?>
  <?php foreach($areas as $k => $val){
    $area_name[] =  $val->area_name;
  }
  ?>
    <h1><small class="pull-right">Date: <?=date('d-m-Y')?></small>
    </h1>


    <table>
      <tr>
        <td>From:
          <address>
              <strong><?=$company[0]->name?></strong>
              <br><?=$company[0]->address?>
              <br><?=$company[0]->city?>, <?=$company[0]->country?> 94107
              <br>Phone: <?=$company[0]->phone?>
              <br>Email: <?=$company[0]->email?>
          </address>
        </td>
        <td>To:
          <address>
              <strong><?=$quotation_info[0]->quot_name?></strong>
              <br><b>PAX:</b> <?=$pax=$quotation_info[0]->pax?>

              <br>Phone: 1 (804) 123-9876
              <br>Email: <?=$quotation_info[0]->email?>
          </address>
        </td>
        <td>
          <b>Invoice #007612</b>
          <br>
          <br><b>Arrival:</b>  <?=$quotation_info[0]->arrival_date?>
          <br><b>Departure:</b>  <?=$quotation_info[0]->departure_date?>
          <br><b>Account:</b> 968-34567
        </td>
      </tr>
    </table>
    <hr>
    <h3>Hotel &amp; Lodging info:</h3>
    <b>
    <table>
      <thead>
        <tr>
          <th>Hotel</th>
          <th>Room type</th>
          <th>PAX</th>
          <th>Minors</th>
          <th>Room(s)</th>
          <th>Arrival</th>
          <th>Departure</th>
        </tr>
        <tr>
          <td><?=$hotel[0]->hotel_name?></td>
          <td><?=$hotel[0]->room_type?></td>
          <td><?=$hotel[0]->pax?></td>
          <td><?=$hotel[0]->minor?></td>
          <td><?=$hotel[0]->no_rooms?></td>
          <td><?=date('d-m-Y',strtotime($hotel[0]->arrival_date))?></td>
          <td><?=date('d-m-Y',strtotime($hotel[0]->departure_date))?></td>
          <?php $total_hotel_price = $hotel[0]->room_price*$hotel[0]->no_rooms; ?>
        </tr>
    </table>
    <hr>
    <h3>Dayplan:</h3>
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Services</th>
        </tr>
        <?php
        $service_adult = $service_minor = 0;
        foreach ($dayplan as $key => $value) { ?>
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
              }
             $s_price = $this->quotation_model->get_price_minor_by_service_ids($val)[0];
             foreach ($s_price as $key => $v) {
                 $service_minor +=$v;
              }
            }
             ?>
           </td>
          </tr>
        <?php
        }
        ?>
      </thead>
    </table>
    <hr>
    <h3>Transfers:</h3>
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Origin</th>
          <th>Destination</th>
          <th>Qty</th>
        </tr>
        <?php

        foreach ($txr_data as $key => $value) {

          ?>
          <tr>
            <td><?=date('d-m-Y',strtotime($value->dayplan_date))?></td>
            <td><?=$area_name[$value->txr_origin-1]?></td>
            <td><?=$area_name[$value->txr_destination-1]?></td>
            <td><?=$value->txr_qty?></td>
            <?php   $tp = ($value->transfer_full_price*$value->txr_qty)/$pax;
              $per_person_txr = $per_person_txr + $tp;
              ?>
          </tr>
        <?php
        }
        ?>
      </thead>

    </table>
    <hr>
    <table>
      <tr>
        <td>
          Payment methods
        </td>
        <td>
          <?php
            //$quotation_total = ($perhead_hotel)*$adults +($perhead_hotel)*$minors +($perhead_services)*$adults +($perhead_services)*$minors + ($perhead_txr)*$pax;
            $minors = $hotel[0]->minor;
            $adults = $hotel[0]->pax -  $minors;
            $total = $total_hotel_price +($service_adult*$adults)+($service_minor*$minors)+($per_person_txr)*$pax;
            $total_with_profit = $total +($total*$quotation_info[0]->profit)/100;
            $exact_profit = $total_with_profit - $total;
          ?>
          <table class="table">
            <tbody>
              <tr>
                <th style="width:50%">Per Person(Adult):</th>
                <td>(<?=$service_adult?> AED )  X <?=$adults?></td>
              </tr>
              <tr>
                <th>Per Person(Minor)</th>
                <td>(<?=$service_minor?> AED ) X <?=$minors?></td>
              </tr>
              <tr>
                <th>Transfer(per head):</th>
                <td>(<?=$per_person_txr?> AED ) X <?=$pax?></td>
              </tr>
              <tr>
                <th>Total:</th>

                <td><b><?=$total_with_profit?> AED</b></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </table>
  </b>
  </body>
</html>

  <?php

  $content = ob_get_contents();
  ob_end_clean();
  $obj_pdf->writeHTML($content, true, false, true, false, '');
  $obj_pdf->Output($title.'.pdf', 'D');
  ?>
