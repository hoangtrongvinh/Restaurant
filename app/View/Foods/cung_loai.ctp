<?php
$value = $this->request->query('page');
$this->assign('title', 'Cùng loại');
$this->assign('search',$this->element("search"));
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
    
    <h3 style="color:#F70D2A;"><?php echo  $chi_tiet['Food']['name']?></h3>
  <img src="/images/hinh_mon_an/<?php echo  $chi_tiet['Food']['image']?>" alt="" style="margin-right:10px" align="left" height="250px" width="400px">
  <h5><?php echo  $chi_tiet['Food']['excerpt']?></h5>
  <p><?php echo  $chi_tiet['Food']['content']?></p>
  <p class="p2"><strong class="color-2">Giá: <?php echo $this->Number->currency($chi_tiet['Food']['price'], 'USD'); ?> - Sl:</strong>&nbsp;
    <input value="1" size="2" type="text">
  </p>
  <a class="button-1" href="#">Mua</a>
  <div style="clear:both"></div>
    
    
    <h3 class="prev-indent-bot">Món ăn cùng loại</h3>
    <?php foreach ($foods as $food) { ?>
        <div id="slider-2">
            <div class="p4" style="height: 419px; float:left;">
                <figure><a class="lightbox-image" href="/images/hinh_mon_an/<?php echo $food['Food']['image'] ?>" data-gal="prettyPhoto[prettyPhoto]">
                        <img src="/images/hinh_mon_an/<?php echo $food['Food']['image'] ?>" alt="" style="height: 209px;width: 223px;"><span style="top: -100%;"></span></a></figure>
                <h5 style="height: 38px;"> <?php echo $this->Html->link($food['Food']['name'], array('controller' => 'foods',
        'action' => 'cung_loai','type' => $food['Food']['food_type_id'],
        'id' => $food['Food']['id'],'?' => array('page' =>$value),'ext' => 'html'), array('style' => 'font-size: 18px; color: red;', 'escape' => false));
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
                <a class="button-1" href="#">Add to Cart</a>
            </div>
        </div>
<?php } 
?>
</div>
<div style="clear: both;"></div>
<br />
<div style="position: relative; right: -30%;">
    <?php echo $this->element('pagination-counter'); ?>
    <br/>
<?php echo $this->element('pagination'); ?>
    <br/>

</div>

