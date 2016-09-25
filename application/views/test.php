<!-- get rooms on select of city -->
<script>
  $(document).ready(function() {
    $("#hotels").change(function(){
      // $("#id_room_type").find("option:gt(0)").remove();// remove all options except first
        var d= $("#hotels").val();
        console.log(d);
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/quotation/get_rooms/"+d,
            dataType: 'json',
            //data: d,
            success: function(res) {
              $.each(res,function(key,val){
                  $.each(val,function(index,x){
                     $('#id_room_type').append('<div class="col-md-2 text-center"><label><input type="checkbox" name="room[]" value="'+x['id']+'">'+x['room_type']+'<p class="text-danger">'+x['room_price']+'</p></label></div>');
                });
            });
            }
        });
    });
  });
</script>
<!-- /get rooms on select of city -->
'
