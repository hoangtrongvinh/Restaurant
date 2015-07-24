Admin header 
<?php if($this->Session->check('Message.flash')) echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

Admin Footer