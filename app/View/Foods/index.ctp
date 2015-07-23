<?php
$this->assign('title', 'Món ăn');
$this->assign('search',$this->element("search"));
echo $this->element('mon_an',array('$foods'=>$foods));
?>
<script>
$(document).ready(function(){
	$('#add-form').submit(function(e){
		e.preventDefault();
		var tis = $(this);
		$.post(tis.attr('action'),tis.serialize(),function(data){
			$('#cart-counter').text(data);
                        $('#msg').html('<div class="alert alert-success flash-msg">Product Added to Shopping Cart</div>');
			$('.flash-msg').delay(2000).fadeOut('slow');
		});
	});
});
</script>
