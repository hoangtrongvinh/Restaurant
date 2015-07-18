<?php
$this->assign('page', 'page3');
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
    <?php foreach($foods as $food) { ?>
                <div id="slider-2">
                    
                    <div class="p4" style="height: 419px; float:left;">
                            <figure><a class="lightbox-image" href="/images/hinh_mon_an/<?php echo $food['Food']['image'] ?>" data-gal="prettyPhoto[prettyPhoto]">
                                    <img src="/images/hinh_mon_an/<?php echo $food['Food']['image'] ?>" alt="" style="height: 209px;width: 223px;"><span style="top: -100%;"></span></a></figure>
                            <h5><?php echo $food['Food']['name'] ?></h5>
                            <p class="p1"><?php echo $food['Food']['excerpt'] ?></p>
                            <p class="p2"><strong class="color-2">Price: <?php echo $this->Number->currency($food['Food']['price'], 'USD');?></strong></p>
                            <a class="button-1" href="#">Add to Cart</a>
                        </div>
                </div>
                    <?php } ?>
</div>
<div style="clear: both;"></div>
</div
</div>
