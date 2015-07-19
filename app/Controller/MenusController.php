<?php

App::uses('AppController', 'Controller');

/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property PaginatorComponent $Paginator
 * @property nComponent $n
 * @property SessionComponent $Session
 */
class MenusController extends AppController {

    /**
     * Helpers
     *
     * @var array
     */
    public $uses = array('Food', 'Menu', 'MenuFood');

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        /*
          $id = $this->Menu->find('first', array(
          'fields' => array('Menu.id'),
          'recursive' => -1,
          'order' => array(
          'Menu.name' => 'ASC'
          )));

          $this->MenuFood->unbindModel(array('belongsTo' => 'Menu'));
          $ds_mon_an = $this->MenuFood->find('all', array(
          'recursive' => 1,
          'fields' => array('Food.id', 'Food.name','Food.food_type_id','Food.excerpt','Food.image'),
          'conditions' => array('MenuFood.menu_id' => $id['Menu']['id']),
          ));
          $chi_tiet = $this->Menu->find('first', array(
          'recursive' => -1,
          'conditions' => array('Menu.id' => $id['Menu']['id']),
          'order' => array(
          'Menu.name' => 'ASC')));
          $this->Paginator->settings = array(
          'Menu' => array(
          'recursive' => -1,
          'limit' => 6,
          'conditions' => array('Menu.id !=' => $id['Menu']['id']),
          'paramType' => 'querystring',
          )
          );
          $ds_thuc_don = $this->Paginator->paginate('Menu');
          $this->set(compact('ds_thuc_don'));
          $this->set('chi_tiet', $chi_tiet);
          $this->set('ds_mon_an', $ds_mon_an); */

        $this->Paginator->settings = array(
            'Menu' => array(
                'recursive' => -1,
                'limit' => 7,
                'paramType' => 'querystring',
            )
        );
        $ds_thuc_don = $this->Paginator->paginate('Menu');
        $this->set(compact('ds_thuc_don'));
    }
    public function thuc_don($id) {
        $this->Paginator->settings = array(
            'Menu' => array(
                'recursive' => -1,
                'limit' => 6,
                'conditions' => array('Menu.id !=' => $id),
                'paramType' => 'querystring',
            )
        );
        $thuc_don = $this->Menu->find('first', array(
            'recursive' => -1,
            'limit' => 6,
            'conditions' => array('Menu.id' => $id),
            'paramType' => 'querystring',
                ));
        $ds_thuc_don = $this->Paginator->paginate('Menu');
        $this->set(compact('ds_thuc_don'));
        $this->set('thuc_don', $thuc_don);
    }

    public function chi_tiet_thuc_don($id) {
        $this->MenuFood->unbindModel(array('belongsTo' => 'Menu'));
        return $ds_mon_an = $this->MenuFood->find('all', array(
            'recursive' => 1,
            'fields' => array('Food.id', 'Food.name', 'Food.food_type_id', 'Food.excerpt', 'Food.image'),
            'conditions' => array('MenuFood.menu_id' => $id),
        ));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundException(__('Invalid menu'));
        }
        $options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
        $this->set('menu', $this->Menu->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Menu->create();
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('The menu has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundException(__('Invalid menu'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('The menu has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
            $this->request->data = $this->Menu->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Menu->id = $id;
        if (!$this->Menu->exists()) {
            throw new NotFoundException(__('Invalid menu'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Menu->delete()) {
            $this->Session->setFlash(__('The menu has been deleted.'));
        } else {
            $this->Session->setFlash(__('The menu could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Menu->recursive = 0;
        $this->set('menus', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundException(__('Invalid menu'));
        }
        $options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
        $this->set('menu', $this->Menu->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Menu->create();
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('The menu has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundException(__('Invalid menu'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('The menu has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
            $this->request->data = $this->Menu->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Menu->id = $id;
        if (!$this->Menu->exists()) {
            throw new NotFoundException(__('Invalid menu'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Menu->delete()) {
            $this->Session->setFlash(__('The menu has been deleted.'));
        } else {
            $this->Session->setFlash(__('The menu could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
