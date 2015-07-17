<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
                echo $this->fetch('addcss');
                echo $this->Html->meta('icon');
		echo $this->Html->css('reset');
                echo $this->Html->css('style');
                echo $this->Html->css('layout');
                
                echo $this->Html->script('jquery-1.7.1.min');
                echo $this->Html->script('cufon-yui');
                echo $this->Html->script('cufon-replace');
                echo $this->Html->script('Dynalight_400.font');
                echo $this->Html->script('FF-cash');
                echo $this->Html->script('tms-0.3');
                echo $this->Html->script('tms_presets');
                echo $this->Html->script('jquery.easing.1.3');
                echo $this->Html->script('jquery.equalheights');
                echo $this->Html->script('navibar');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                echo $this->fetch('javascript1');
	?>
</head>
<body id="<?php echo $this->fetch('page')?>">
	<!--==============================header=================================-->
  <header>
    	<div class="row-top">
        	<div class="main">
            	<div class="wrapper">
                	<h1><?php echo $this->Html->link("Nhahanghoasen<span>.vn</span>",array('controller' => 'pages', 'action' => 'display', 'home'),array('escape'=>false));?></h1>
                    <nav style="font-size: 29px;">
                        <ul class="menu" >
                            <li> <?php echo $this->Html->link('Thực đơn',array('controller'=>'menus'),array("id"=>"a1"));?></li>
                            <li> <?php echo $this->Html->link('Món ăn',array('controller'=>'foods','action'=>'index'),array("id"=>"a2"));?></li>
                            <li> <?php echo $this->Html->link('Món ăn trong ngày',array('controller'=>'foods','action'=>'trong_ngay'),array("id"=>"a3"));?></li>
                            <li> <?php echo $this->Html->link('Món ăn theo mùa',array('controller'=>'foods','action'=>'theo_mua'),array("id"=>"a4"));?></li>
                            <li> <?php echo $this->Html->link('Liên hệ',array('controller'=>'contacts'),array("id"=>"a5"));?></li>
                            <li> <?php echo $this->Html->link('Tin tức',array('controller'=>'news'),array("id"=>"a6"));?></li>
                            <li> <?php echo $this->Html->link('Giỏ hàng',array('controller'=>'shoppingcarts','action'=>'index'),array("id"=>"a7"));?></li>
                        
                        </ul>
                    </nav>
                </div>
            </div>
            <?php echo $this->fetch('search') ?>
        </div>
        <div class="row-bot">
        	<div class="row-bot-bg">
            	<div class="main">
                	<h2>Impressive Selection <span>for any Occasion</span></h2>
                              <?php echo $this->fetch('slide'); ?>
                </div>
            </div>
        </div>

    </header>
    
	<!--==============================content================================-->
        <section id="content" style="<?php echo $this->fetch('StyleContent'); ?>"><div class="ic">More Website Templates @ TemplateMonster.com - January 23, 2012!</div>
        <div class="main">
      <?php echo $this->fetch('content');?>
        </div>
    </section>
    
	<!--==============================footer=================================-->
    <footer style="background-color:#006B1C ">
        <div class="main">
        	<div class="aligncenter">
            	<span>Catering.com &copy; 2012</span>
                <a rel="nofollow" class="link" target="_blank" href="http://www.templatemonster.com/">Website Template</a> by TemplateMonster.com | <a rel="nofollow" class="link" target="_blank" href="http://www.html5xcss3.com/">html5xcss3.com</a>
            </div>
        </div>
    </footer>
    <script type="text/javascript"> Cufon.now(); </script>
    <script type="text/javascript">
		$(window).load(function() {
			$('.slider')._TMS({
				duration:1000,
				easing:'easeOutQuint',
				preset:'slideDown',
				slideshow:7000,
				banners:false,
				pauseOnHover:true,
				pagination:true,
				pagNums:false
			});
		});
    </script>

</body>
</html>