<?php
$this->assign('title', 'Home');
$this->assign('page', 'page1');
$this->start('slide');
?>
<div class="slider-wrapper">
    <div class="slider" style="position: relative; z-index: 1; overflow: hidden;left: -10px;top: -11px;">
        <ul class="items">
            <li>
                <img src="/images/slider-img1.jpg" alt="" />
            </li>
            <li>
                <img src="/images/slider-img2.jpg" alt="" />
            </li>
            <li>
                <img src="/images/slider-img3.jpg" alt="" />
            </li>
        </ul>
    </div>
</div>
<?php $this->end(); ?>
<div class="wrapper img-indent-bot">
    <article class="col-1">
        <a href="#"><img class="img-border" src="/images/banner-1.jpg" alt=""></a>
    </article>
    <article class="col-1">
        <a href="#"><img class="img-border" src="/images/banner-2.jpg" alt=""></a>
    </article>
    <article class="col-2">
        <a href="#"><img class="img-border" src="/images/banner-3.jpg" alt=""></a>
    </article>
</div>
<div class="wrapper">
    <article class="column-1">
        <div class="indent-left">
            <div class="maxheight indent-bot">
                <h3>Dịch vụ</h3>
                <ul class="list-1">
                    <li><a href="#">Phục vụ các món ăn theo yêu cầu</a></li>
                    <li><a href="#">Nấu ăn phục vụ các sự kiện </a></li>
                    <li><a href="#">Tổ chức tiệc chiêu đãi</a></li>
                    <li><a href="#">Phục vũ tiệc cưới</a></li>
                    <li><a href="#">Tổ chức các sự kiện</a></li>
                    <li><a href="#">Cơm trưa văn phòng</a></li>
                    <li><a href="#">Ngoài ra còn vô số các tiện ích khác</a></li>
                </ul>
            </div>
                    <?php
        echo $this->Html->link('Read More', array(
            'controller' => 'pages',
            'action' => 'service',
            'ext' => 'html'
                ), array('class' => 'button-1'));
        ?>
        </div>
    </article>
    <article class="column-2">
        <div class="maxheight indent-bot">
            <h3 class="p1">Giới thiệu về chúng tôi</h3>
            <h6 class="p2">Tọa lạc tại khu vực quận Bình Tân, Fenix Palace là trung tâm hội nghị – tiệc cưới – nhà hàng mang phong cách Hồng Kông riêng biệt từ sảnh tiệc, cách trang trí, cung cách dịch vụ, món ăn… Với tổng diện tích xây dựng 10.600 m2 gồm 6 tầng lầu và 1 tầng hầm, Fenix Palace được đầu tư nhằm tổ chức sự kiện, yến tiệc, hội nghị, tiệc cưới, À La Carte…</h6>
            Với niềm tin vào ý nghĩa sâu sa, trung tâm hội nghị nhà hàng tiệc cưới Fenix Palace hứa hẹn sẽ là nơi đem đến những tiệc cưới may mắn nhất, thăng hoa nhất, là nơi khởi đầu tốt đẹp nhất cho chặng đường hạnh phúc lứa đôi tại khu vực quận Bình Tân.
        </div>
        <?php
        echo $this->Html->link('Read More', array(
            'controller' => 'pages',
            'action' => 'about',
            'ext' => 'html'
                ), array('class' => 'button-2'));
        ?>
    </article>
</div>