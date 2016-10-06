<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
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
                    <h2>Form Design <small>different form elements</small></h2>
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
                    <br />
                    <form enctype="multipart/form-data" accept-charset="utf-8" method="post" action="<?=base_url()?>index.php/services/update" data-parsley-validate class="form-horizontal form-label-left">
                      <?php
                      foreach ($service as $key => $value) { ?>
                        <input  type="hidden" name="id" value="<?=$value->id?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="sname" required="required" value="<?=$value->service_name?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="sprice" required="required" value="<?=$value->service_price?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <?php if($value->img): ?>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="img_name" value="<?=$value->img?>">
                            <img src="<?=base_url()?>images/<?=$value->img?>" alt="" width="300"/>
                          </div>
                        </div>
                      <?php endif; ?>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" type="file" name="img">
                        </div>
                      </div>
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div> -->
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div> -->
                      <?php  }     ?>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button  class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

<?php /*
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
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
                      <?php
                      foreach ($service as $key => $value) { ?>
                              <input id="serviceid" type="hidden" name="name" value="<?=$value->id?>">
                              <div class="form-group">
                                <label for="">Service Type ID</label>
                                <input id="stid" type="text" name="name" value="<?=$value->service_type_id?>">
                              </div>
                              <div class="form-group">
                                <label for="">Service Name</label>
                                <input id="sname" type="text" name="name" value="<?=$value->service_name?>">
                              </div>
                              <div class="form-group">
                                <label for="">Price</label>
                                <input id="sprice" type="text" name="name" value="<?=$value->service_price?>">
                              </div>
                              <div class="form-group">
                                <label for="">Image</label>
                                <input id="img" type="file" name="file" value="" accept="image/*">
                                <input type="text" id="img_filename" name="name" value="<?=$value->img?>">
                              </div>
                              <div class="form-group">
                                <button id="update_service" type="button" name="button">Update</button>
                              </div>


                      <?php  }     ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        */ ?>
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
    <!-- <script type="text/javascript">
      $(document).ready(function(){
        $('input[type=file]').change(function() {
          console.log($('#img').prop('files'));
            $.ajax({
              type:"POST",
              data: $('#img').attr('files'),
              url : "<?php //echo base_url(); ?>index.php/services/upload",
              contentType: 'multipart/form-data',
              processData: false,
              success : function(res){
                console.log(res);
              }
            })
        });
      })
    </script> -->
    <!-- <script type="text/javascript">
      $(document).ready(function(){
        $('#update_service').click(function(){
          var sid  = $('#serviceid').val();
          // var stid = $('#stid').val();
          var sname =$('#sname').val();
          var sprice = $('#sprice').val();
          var img = $('#img_filename').attr("file");
          var d = {  'id' : sid,
            'sname' : sname,
            'sprice' : sprice,
            'img' : img
          };
          console.log(d)
          $.ajax({
            type : "POST",
            contentType: 'multipart/form-data',
            url : "<?php //echo base_url(); ?>index.php/services/update",
            data : d,
            success : function(res){
              console.log(res);
            }
          })
        })
      })
    </script> -->

  </body>
</html>
