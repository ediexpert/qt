<?php
function list_of_services($arr){
  $ci =& get_instance();
  $x = explode(',',$arr);
  foreach ($x as $key => $value) {
    $r = $ci->common->get_service($value);
    // print_r($r);
    foreach ($r as $key => $value) {
      echo '<li>'.$value->service_name.'<li>';
      echo '<li><img style="width: 100%" src="'.base_url().'images/'.$value->img.'" alt="" /></li>';
    }

  }
}


?>
<!-- page content -->
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Itenary</h3>
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
               <div class="x_panel" style="height:auto;">
                 <div class="x_title">
                   <h2>Itenary</h2>
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
                   <div class="row">

                     <div class="col-md-12">
                       <?php
                       foreach ($dayplan as $key => $value) {

                         ?>
                         <!-- price element -->
                         <div class="col-md-3 col-sm-6 col-xs-12">
                           <div class="pricing">
                             <div class="title">
                               <h2><?=$value->dayplan_date?></h2>
                               <!-- <h1>Arrival</h1> -->
                             </div>
                             <div class="x_content">
                               <div class="">
                                 <div class="pricing_features">
                                   <ul class="list-unstyled text-left">
                                     <?php list_of_services($value->services_id); ?>
                                     </ul>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                         <!-- price element -->
                       <?php
                       }
                       ?>



                       <?php /*
                       <!-- price element -->
                       <div class="col-md-3 col-sm-6 col-xs-12">
                         <div class="pricing">
                           <div class="title">
                             <h2>Day 2 : 06-10-2016</h2>
                             <h1></h1>
                             <!-- <span></span> -->
                           </div>
                           <div class="x_content">
                             <div class="">
                               <div class="pricing_features">
                                 <ul class="list-unstyled text-left">
                                   <li><i class="fa fa-check text-success"></i> <strong>Dubai City Tour  </strong></li>
                                   <li><img style="width: 100%" src="<?php echo base_url(); ?>images/dubaitour.jpg" alt="" /></li>
                                 </ul>
                               </div>
                             </div>
                             <!-- <div class="pricing_footer">
                               <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Download <span> now!</span></a>
                               <p>
                                 <a href="javascript:void(0);">Sign up</a>
                               </p>
                             </div> -->
                           </div>
                         </div>
                       </div>
                       <!-- price element -->
                       <!-- price element -->
                       <div class="col-md-3 col-sm-6 col-xs-12">
                         <div class="pricing">
                           <div class="title">
                             <h2>Day 3 : 07-10-2016</h2>
                             <h1></h1>
                             <!-- <span></span> -->
                           </div>
                           <div class="x_content">
                             <div class="">
                               <div class="pricing_features">
                                 <ul class="list-unstyled text-left">
                                   <li><i class="fa fa-check text-success"></i> <strong>Departure  </strong></li>
                                   <li><img style="width: 100%" src="<?php echo base_url(); ?>images/airplain.jpg" alt="" /></li>
                                 </ul>
                               </div>
                             </div>
                             <!-- <div class="pricing_footer">
                               <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Download <span> now!</span></a>
                               <p>
                                 <a href="javascript:void(0);">Sign up</a>
                               </p>
                             </div> -->
                           </div>
                         </div>
                       </div>
                       <!-- price element -->
                       */ ?>
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

   <!-- Custom Theme Scripts -->
   <script src="<?php echo base_url(); ?>gentelella/build/js/custom.min.js"></script>
 </body>
</html>
