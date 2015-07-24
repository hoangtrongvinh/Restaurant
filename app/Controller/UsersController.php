<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP UsersController
 * @author Hoang Vinh
 */
class UsersController extends AppController {

    public $name = 'Users';
    public $uses = array('User');

    public function index($id) {
        
    }

    public function admin_logout() {
        $this->layout = 'admin';

        $this->Session->delete('User');
        $this->Session->setFlash(__('You have logged out.', true));
        $this->redirect('/users/admin_login');
    }

    public function admin_login() {

        $this->layout = 'admin';
        $this->set('current_crumb', __('Login', true));
        $this->set('title_for_layout', __('Login', true));
        if (empty($this->data)) {
            // Redirect the user if we're logged in
            if ($this->Session->check('User.username'))
                $this->redirect('/admin/admin_top/');
        }
        else {
            $admin_user = $this->User->find('first', array('conditions' => array('username' => $this->data['User']['username'], 'password' => Security::hash($this->data['User']['password'], 'sha1', true))));

            if (empty($admin_user)) {
                // If there was an error set the flash and render
                $this->Session->setFlash(__('No match for Username and/or Password.', true));
            }

            if (!empty($admin_user)) {
                // Write to the session and redirect
                $this->Session->write('User', $admin_user['User']);
                $this->redirect('/admin/admin_top/');
            }
        }
    }

    public function admin() {
        $this->set('current_crumb', __('Admins Listing', true));
        $this->set('title_for_layout', __('Admins Listing', true));
        $this->set('users', $this->User->find('all'));
    }

    public function admin_delete($user_id) {
        if ($user_id == $this->Session->read('User.id')) {
            $this->Session->setFlash(__('Could not delete that account.', true));
        } else {
            $this->User->delete($user_id);
            $this->Session->setFlash(__('Record deleted.', true));
        }
        $this->redirect('/users/admin/');
    }

    public function admin_new() {
        $this->set('current_crumb', __('New Admin', true));
        $this->set('title_for_layout', __('New Admin', true));
        if (empty($this->data)) {
            $dataRoles = $this->User->Role->find('list', array('conditions' => array(), 'recursive' => -1, 'fields' => array('Role.id', 'Role.role_name'),));
            $this->set('dataRoles', $dataRoles);
        } else {
            // Redirect if the user pressed cancel
            if (isset($this->data['cancelbutton'])) {
                $this->redirect('/users/admin/');
                die();
            }

            // Check for other users with this username
            $check_username = $this->User->find('count', array('conditions' => array('username' => $this->data['User']['username'])));

            if ($check_username > 0) {
                $this->Session->setFlash(__('Could not create user account. User exists.', true));
                $this->redirect('/users/admin/');
                die();
            }


            $this->request->data['User']['password'] = Security::hash($this->data['User']['password'], 'sha1', true);
            $this->User->save($this->data);

            // Set some default preferences
            $user_id = $this->User->getLastInsertId();

            $this->Session->setFlash(__('Record created.', true));
            $this->redirect('/users/admin/');
        }
    }

}
