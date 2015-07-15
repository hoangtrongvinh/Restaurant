<?php
$this->assign('title', 'Menu');
$this->assign('page', 'page2');
$this->assign('search',$this->element("search"));
$this->Html->script('jquery.bxSlider',array('inline'=>false));
?>
<?php 
echo $this->element("menu_left");
echo $this->element('menu_right', array());
?>

<script type="text/javascript">
		$(document).ready(function() {
			$('#slider').bxSlider({
				pager: true,
				controls: false,
				moveSlideQty: 1,
				displaySlideQty: 3
			});
		}); 
</script>