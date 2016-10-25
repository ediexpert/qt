

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

              <div class="col-md-12 col-sm-12 col-xs-12">

              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_content">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <input type="hidden" id="quot_id" value="<?=$quot[0]->id?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quotation Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  disabled="disabled"  type="text" id="first-name" value="<?php echo $quot[0]->quot_name;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No of PAX<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  disabled="disabled"  type="number" id="last-name" name="last-name" value="<?php echo $quot[0]->pax;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  disabled="disabled"  type="email" id="email" class="form-control" name="email"  value="<?php echo $quot[0]->email;?>" data-parsley-trigger="change" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Arrival <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input   disabled="disabled"   class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $quot[0]->arrival_date;?>" required="required" type="date">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Departure <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  disabled="disabled"  class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $quot[0]->departure_date;?>" required="required" type="date">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profit">Profit %
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" min="1" id="quot_profit" name="profit" value="<?php echo $quot[0]->profit;?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <button id="update_profit" class="btn btn-primary" type="button" name="button">Update</button>
                        </div>

                      </div>
                    </div>


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


    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>gentelella/build/js/custom.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#update_profit').click(function(){

          var d = {
            'id' : $('#quot_id').val(),
            'profit' : $('#quot_profit').val()
          };
          console.log(d);
          $.ajax({
            type: "POST",
            url: "<?=base_url()?>"+"index.php/quotation/profit_update",
            data : d,
            success: function(){
              alert("Profit Updated!");
            }
          })
        })
      })
    </script>

  </body>
</html>
