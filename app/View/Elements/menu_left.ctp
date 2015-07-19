<?php
foreach ($ds_thuc_don as $key => $menu) {
    if ($key == 0) {
        ?>
        <div class="wrapper">   
            <article class="col-1">
                <div class="indent-left">
                    <div class="img-indent-bot">
                        <h3 class="prev-indent-bot"><?php echo $menu['Menu']['name'] ?></h3>
                        <div class="wrapper img-indent-bot">
                            <figure class="img-indent"><img src="/images/thuc_don/<?php echo $menu['Menu']['image'] ?>" alt="" height="125px" width="210px"></figure>
                            <div class="extra-wrap">
                                <?php echo $menu['Menu']['content'] ?>
                                <h5>Giá <?php echo $this->Number->currency($menu['Menu']['price'], 'USD'); ?> /bàn</h5>
                                <input name="txtsl" value="1" style="width:40px;height:35px; text-align:center" type="text"> <a class="button-1" href="#">Mua</a>	    
                            </div>
                        </div>
                    </div>


                    <h3 class="p1">Danh sách thực đơn </h3>
                    <div>

                        <?php
                    } else {
                        ?>
                        <div style="float:left; width:150px">
                            <div class="p2">
                                <figure><a href="#"><img src="/images/thuc_don/<?php echo $menu['Menu']['image'] ?>" alt="" width="130px" height="100px"></a></figure>
                                <h5><?php
                echo $this->Html->link($menu['Menu']['name'], array('controller' => 'menu',
                    'action' => 'index', 'id' => $menu['Menu']['id'], '?' => array('page' => $value), 'ext' => 'html'), array('style' => 'font-size: 18px; color: red;', 'escape' => false));
                        ?></h5>
                                (Giá: <?php echo $this->Number->currency($menu['Menu']['price'], 'USD'); ?>)
                            </div>
                        </div> 
        <?php
    }
}
?>
            </div>
    </article>