<?php
$this->assign('title', 'Menu');
$this->assign('page', 'page2');
$this->assign('search', $this->element("search"));
$value = $this->request->query('page');
echo $this->Html->css(array('bootstrap.min'), array('block' => 'addcss'));
$this->Html->script('jquery.bxSlider', array('inline' => false));
?>
<?php
            $chi_tiet = $thuc_don['Menu']['id'];
            ?>
            <div class="wrapper">   
                <article class="col-1">
                    <div class="indent-left">
                        <div class="img-indent-bot">
                            <h3 class="prev-indent-bot"><?php echo $thuc_don['Menu']['name'] ?></h3>
                            <div class="wrapper img-indent-bot">
                                <figure class="img-indent"><img src="/images/thuc_don/<?php echo $thuc_don['Menu']['image'] ?>" alt="" height="125px" width="210px"></figure>
                                <div class="extra-wrap">
                                    <?php echo $thuc_don['Menu']['content'] ?>
                                    <h5 style="margin-bottom: 26px; margin-top: 12px; color: red; font-size: 17px;">Giá <?php echo $this->Number->currency($thuc_don['Menu']['price'], ' VND'); ?> /bàn</h5>
                                                                        <?php echo $this->Form->create('Cart',array('class'=>'add-form','url'=>array('controller'=>'carts','action'=>'addmenu')));?>
                                    <?php echo $this->Form->hidden('menu_id',array('value'=>$thuc_don['Menu']['id']))?>
                                    <?php echo $this->Form->input('SL',array('value'=>1,'type'=>'number','style'=>'height: 43px; width: 67px;','label'=>false,'div' => false))?>
                                    <?php echo $this->Form->submit('Mua',array('class'=>'btn-success btn btn-lg','style'=>'display: inline;','div' => false));?>
                                    <?php echo $this->Form->end();?>	   	    
                                </div>
                            </div>
                        </div>


                        <h3 class="p1">Danh sách thực đơn</h3>
                        <div>

                            <?php
                        foreach($ds_thuc_don as $menu) {
                            ?>
                            <div style="float:left; width:150px">
                                <div class="p2">
                                    <figure><a href="#"><img src="/images/thuc_don/<?php echo $menu['Menu']['image'] ?>" alt="" width="130px" height="100px"></a></figure>
                                    <h5><?php
                                        echo $this->Html->link($menu['Menu']['name'], array('controller' => 'menus',
                                            'action' => 'thuc_don', 'id' => $menu['Menu']['id'], '?' => array('page' => $value), 'ext' => 'html'), array('style' => 'font-size: 18px; color: red;', 'escape' => false));
                                        ?></h5>
                                    (Giá: <?php echo $this->Number->currency($menu['Menu']['price'], ' VND'); ?>)
                                </div>
                            </div> 
                            <?php
                        }
                    ?>
                </div>
        </article>
        <?php
        $ds_mon_an = $this->requestAction('/menus/chi_tiet_thuc_don/' . $chi_tiet);
        ?>
        <article class="col-2">
            <h3>Chi tiết thực đơn</h3>
            <ul>
                <?php foreach ($ds_mon_an as $food) { ?>
                    <li>
                        <img src="/images/hinh_mon_an/<?php echo $food['Food']['image'] ?> " alt="" width="210px" height="125px" align="right" style="float:right;">
                        <h5 style="color: rgb(5, 8, 255); font-size: initial;margin-top: 16px;" class="prev-indent-bot"><?php echo $food['Food']['name'] ?> </h5>
                        <div style="height:87px; overflow:hidden;"><?php
                            echo $this->Text->truncate(
                                    $food['Food']['excerpt'], 80, array(
                                'ellipsis' => '...',
                                'exact' => false
                                    )
                            );
                            ?></div>
                        <?php
                        echo $this->Html->link('Chi tiết', array('controller' => 'foods',
                            'action' => 'cung_loai', 'type' => $food['Food']['food_type_id'],
                            'id' => $food['Food']['id'], 'ext' => 'html'), array('class' => 'button-2'));
                        ?> 
                    </li>
                <?php } ?>
            </ul>
        </article>
    </div>
<div style="clear: both;"></div>
<br />
<div style="position: relative; right: -30%;">
    <?php echo $this->element('pagination-counter'); ?>
    <br/>
<?php echo $this->element('pagination'); ?>
    <br/>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#slider').bxSlider({
            pager: true,
            controls: false,
            moveSlideQty: 1,
            displaySlideQty: 3
        });
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