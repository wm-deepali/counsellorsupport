$(document).ready( function () {
    $('#for_all').DataTable();
} );

$('#verify-otp').click(function(){
    $('.otp-box').hide();
    $('.new-password').show();
});
$(document).ready(function(){
$('.add_op').click(function() {
    $('.block_op:last').after('<div class="block_op"><div class="row"><div class="col-sm-3"><label for="product_op_cat">To</label><input type="time" class="form-control" id="product_op_stock" name="to[]" value="" /></div><div class="col-sm-3"><label for="product_op_stock">From</label><input type="time" class="form-control" id="product_op_stock" name="from[]" value="" /></div><span class="remove_op"><i class="fa fa-minus"></i> Remove</span></div></div></div>');
});
$('.optionBox_op').on('click','.remove_op',function() {
    $(this).parent().remove();
});
    });