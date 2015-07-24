<?php

/* -----------------------------------------------------------------------------------------
  VamShop - http://vamshop.com
  -----------------------------------------------------------------------------------------
  Copyright (c) 2014 VamSoft Ltd.
  License - http://vamshop.com/license.html
  --------------------------------------------------------------------------------------- */

App::uses('Model', 'AppModel');

class Role extends AppModel {

    public $name = 'Role';
    public $hasMany = array('User');

    public function _validationRules() {
        $this->validate = array(
            'role_name' => array(
                'rule' => 'notEmpty',
                'message' => __('Name must only contain letters and numbers.', true)
            )
        );
    }

}
