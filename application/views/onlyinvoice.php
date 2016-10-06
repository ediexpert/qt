<?php

$cont = '<html lang="en" > <head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Meta, title, CSS, favicons, etc. --> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="' .base_url() .'gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Font Awesome --> </head> <body> <table class="table"> <tr> <td> <div class="col-sm-4 invoice-col"> From <address>
                            <strong>'.$company[0]->name.'</strong>
                            <br>'.$company[0]->address.'
                            <br>'.$company[0]->city.', ' . $company[0]->country .' 94107
                            <br>Phone: ' .$company[0]->phone. '
                            <br>Email: ' .$company[0]->email. '
                        </address> </div> </td > <td class="col-md-6"> <div class="col-sm-4 invoice-col"> To <address> <strong>' .$quotation_info[0]->quot_name. '</strong>
                            <br><b>PAX:</b> ' .$quotation_info[0]->pax. '

                            <br>Phone: 1 (804) 123-9876
                            <br>Email: ' .$quotation_info[0]->email. '
                        </address> </div> <div class="col-sm-4 invoice-col"> <b>Invoice #007612</b> <br> <br><b>Arrival:</b> ' .$quotation_info[0]->arrival_date. '
            <br><b>Departure:</b>  ' .$quotation_info[0]->departure_date. ' <br> <b>Account:</b> 968-34567 </div> </td> </tr> <tr> <table class="table table-border"> <tr> <th> <h3>Hotel Booking inforamtion</h3> </th> </tr> <tr> <th> Hotel </th> <th> Room Type </th> <th> PAX </th> <th> Arrival </th> <th> Departure </th> </tr>';
            foreach ($hotel as $key => $value) {
              $cont .='<tr><td><b>' .$this->common->get_hotel_by_id($value->hotel_id). '</b></td>
                <td>' .$this->common->get_hotel_room_type_by_id_str($value->room_type_id). '</td>
                <td>' .$value->no_pax. '</td>
                <td>' .$value->cin_date. '</td>
                <td>' .$value->cout_date. '</td>
                <td></td>
              </tr>';

            }
            $cont .= ' </table> </tr> <tr> <table class="table table-border"> <tr> <th> <h3>Dayplan &amp; Services</h3> </th> </tr> <tr> <th> Date </th> <th> Time </th> <th> Services </th> <th> </th> </tr>';
          foreach ($dayplan as $key => $value) {

            $cont .= '
            <tr>
              <td><b>' .$value->dayplan_date. '</b></td>
              <td>' .$this->common->get_time_by_id($value->daytime_id). '</td>
              <td>' .$this->common->get_service_name_by_id_str($value->services_id). '</td>
              <td>$50.00</td>
            </tr>';
          }
        $cont   .= ' </table> </tr> <tr> <td> </td> </tr> </table> </body> </html>';
  echo $cont;
  ?>
