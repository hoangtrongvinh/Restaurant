<?php

App::uses('AppController', 'Controller');

/**
 * Foods Controller
 *
 * @property Food $Food
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FoodsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    public $paginate = array(
        'limit' => 8,
        'order' => array(
            'Food.name' => 'asc'
        )
    );

    public function index() {
        //$this->Food->recursive = -1;
        //$this->set('foods', $this->Paginator->paginate());
         //$this->Food->unbindModel(array('belongsTo' => array('MenuFood')));
        $this->set('foods',$this->Food->find('all',array('recursive' => 0)));
       
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Food->exists($id)) {
            throw new NotFoundException(__('Invalid food'));
        }
        $options = array('conditions' => array('Food.' . $this->Food->primaryKey => $id));
        $this->set('food', $this->Food->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Food->create();
            if ($this->Food->save($this->request->data)) {
                $this->Session->setFlash(__('The food has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The food could not be saved. Please, try again.'));
            }
        }
        $foodTypes = $this->Food->FoodType->find('list');
        $menuFoods = $this->Food->MenuFood->find('list');
        $this->set(compact('foodTypes', 'menuFoods'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Food->exists($id)) {
            throw new NotFoundException(__('Invalid food'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Food->save($this->request->data)) {
                $this->Session->setFlash(__('The food has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The food could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Food.' . $this->Food->primaryKey => $id));
            $this->request->data = $this->Food->find('first', $options);
        }
        $foodTypes = $this->Food->FoodType->find('list');
        $menuFoods = $this->Food->MenuFood->find('list');
        $this->set(compact('foodTypes', 'menuFoods'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Food->id = $id;
        if (!$this->Food->exists()) {
            throw new NotFoundException(__('Invalid food'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Food->delete()) {
            $this->Session->setFlash(__('The food has been deleted.'));
        } else {
            $this->Session->setFlash(__('The food could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
