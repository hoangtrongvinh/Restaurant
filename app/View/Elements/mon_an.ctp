<?php
$this->assign('page', 'page3');
echo $this->Html->css(array('bootstrap.min'), array('block' => 'addcss'));
echo $this->Html->css('prettyPhoto', array('inline' => false));
echo $this->Html->script('jquery.prettyPhoto', array('inline' => false));
echo $this->Html->script('hover-image', array('inline' => false));
echo $this->Html->script('jquery.bxSlider', array('inline' => false));
$this->start('javascript1');
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("a[data-gal^='prettyPhoto']").prettyPhoto({theme: 'facebook'});
    });
</script>
<?php $this->end(); ?>
<div class="container">
    <h3 class="prev-indent-bot">Catalogue</h3>
    <?php foreach ($foods as $food) { ?>
        <div id="slider-2">

            <div class="p4" style="height: 419px; float:left;">
                <figure><a class="lightbox-image" href="/images/hinh_mon_an/<?php echo $food['Food']['image'] ?>" data-gal="prettyPhoto[prettyPhoto]">
                        <img src="/images/hinh_mon_an/<?php echo $food['Food']['image'] ?>" alt="" style="height: 209px;width: 223px;"><span style="top: -100%;"></span></a></figure>
                <h5 style="height: 38px;"> <?php echo $this->Html->link($food['Food']['name'], array('controller' => 'foods',
        'action' => 'cung_loai','type' => $food['Food']['food_type_id'],
        'id' => $food['Food']['id'],'ext' => 'html'), array('style' => 'font-size: 18px; color: red;', 'escape' => false));
        ?></h5>
                <p class="p1" style="height: 59px;"><?php
                    echo $this->Text->truncate(
                            $food['Food']['excerpt'], 80, array(
                        'ellipsis' => '...',
                        'exact' => false
                            )
                    );
                    ?></p>
                <p class="p2"><strong class="color-2">Price: <?php echo $this->Number->currency($food['Food']['price'], 'USD'); ?></strong></p>
                        <?php echo $this->Form->create('Cart',array('class'=>'add-form','url'=>array('controller'=>'carts','action'=>'add')));?>
			<?php echo $this->Form->hidden('product_id',array('value'=>$food['Food']['id']))?>
                        <?php echo $this->Form->hidden('SL',array('value'=>1,'type'=>'number','style'=>'height: 43px; width: 67px;','label'=>false,'div' => false))?>
			<?php echo $this->Form->submit('Add to Cart',array('class'=>'btn-success btn btn-lg','style'=>'display: inline;','div' => false));?>
			<?php echo $this->Form->end();?>
            </div>
        </div>
<?php } ?>
</div>
<div style="clear: both;"></div>
<br />
<div style="position: relative; right: -30%;">
    <?php echo $this->element('pagination-counter'); ?>
    <br/>
<?php echo $this->element('pagination'); ?>
    <br/>

</div>

</div
</div>
<script>
$(document).ready(function(){
	$('.add-form').submit(function(e){
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