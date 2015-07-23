<?php
$this->assign('title', 'Trong ngay');
$this->assign('search',$this->element("search"));
echo $this->element('mon_an',array('$foods'=>$foods));
?>
