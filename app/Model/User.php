<?php

/* -----------------------------------------------------------------------------------------
  VamShop - http://vamshop.com
  -----------------------------------------------------------------------------------------
  Copyright (c) 2014 VamSoft Ltd.
  License - http://vamshop.com/license.html
  --------------------------------------------------------------------------------------- */
App::uses('Model', 'AppModel');

class User extends AppModel {

    public $name = 'User';
     public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id'
        )
    );

    public function hashPasswords($data) {
        return $data;
    }

    public function _validationRules() {
        $this->validate = array(
            'fullname' => array(
                'rule' => 'notEmpty',
                'message' => __('Name must only contain letters and numbers.', true)
            ),
            'password' => array(
                'passwordlength' => array(
                    'rule' => 'notEmpty',
                    'message' => __('Password can not be blank', true)
                ),
                'passwordequal' => array(
                    'rule' => 'checkpasswords',
                    'message' => __('Passwords don\'t match', true)
                ),
            ),
            'username' => array(
                'email' => array(
                    'rule' => array('email', true),
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => __('Please, input correct e-mail address', true)
                ),
                'unique' => array(
                    'rule' => 'isUnique',
                    'message' => __('This email has already been taken.', true)
                ),
            ),
            'email' => array(
                'email' => array(
                    'rule' => array('email', true),
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => __('Please, input correct e-mail address', true)
                ),
                'unique' => array(
                    'rule' => 'isUnique',
                    'message' => __('This email has already been taken.', true)
                ),
            ),
        );
    }

}
