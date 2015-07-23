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
    public $components = ['Paginator', 'Session'];

    public function index() {
        //$this->Food->recursive = -1;
        //$this->set('foods', $this->Paginator->paginate());
        //$this->Food->unbindModel(array('belongsTo' => array('MenuFood')));
        //$this->set('foods',$this->Food->find('all',array('recursive' => 0)));
        $this->Paginator = $this->Components->load('Paginator');

        $this->Paginator->settings = array(
            'Food' => array(
                'recursive' => 0,
                'limit' => 8,
                'order' => array(
                    'Food.name' => 'ASC'
                ),
                'paramType' => 'querystring',
            )
        );
        $foods = $this->Paginator->paginate('Food');
        $this->set(compact('foods'));
    }
    
    public function trong_ngay()
    {
        $this->Paginator = $this->Components->load('Paginator');

        $this->Paginator->settings = array(
            'Food' => array(
                'recursive' => 0,
                'limit' => 8,
                'conditions'=> array('Food.in_day'=>1),
                'order' => array(
                    'Food.name' => 'ASC'
                ),
                'paramType' => 'querystring',
            )
        );
        $foods = $this->Paginator->paginate();
        $this->set(compact('foods'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function cung_loai($type = null, $id = null) {
        $this->Food->id = $id;
        if (!$this->Food->exists()) {
            $this->Flash->set('Đừng có chọc ngoáy URL');
            return $this->redirect(array('action' => 'index'), 301);
            
        }
        $this->Paginator->settings = array(
            'Food' => array(
                'recursive' => 0,
                'limit' => 8,
                'conditions' => array('Food.food_type_id' => $type,'Food.id !='=>$id),
                'order' => array(
                    'Food.name' => 'ASC'
                ),
                'paramType' => 'querystring',
            )
        );
        $foods = $this->Paginator->paginate('Food');
        $this->set(compact('foods'));
         $chi_tiet = $this->Food->find('first', array(
        'conditions' => array('Food.id' => $id)
    ));
        $this->set('id', $id);
        $this->set('type', $type);
        $this->set('chi_tiet', $chi_tiet);
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
