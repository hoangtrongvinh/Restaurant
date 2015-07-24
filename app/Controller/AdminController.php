<?php

/* -----------------------------------------------------------------------------------------
  VamShop - http://vamshop.com
  -----------------------------------------------------------------------------------------
  Copyright (c) 2014 VamSoft Ltd.
  License - http://vamshop.com/license.html
  --------------------------------------------------------------------------------------- */

class AdminController extends AppController {

    public $name = 'Admin';
    public $uses = array('User');
    public $helpers = array('Html', 'Js', 'Admin', 'Form');

    public function index() {
        $this->redirect('/users/admin_login/');
    }

    public function admin_top($level = 1) {
        $this->set('title_for_layout', __('Dashboard', true));
    }

}

?>