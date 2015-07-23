<?php

App::uses('AppController', 'Controller');

class CartsController extends AppController {

    public $uses = array('Food', 'Cart', 'MenuFood');

    public function add() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->Cart->addProduct($this->request->data['Cart']['product_id'], $this->request->data['Cart']['SL']);
        }
        echo $this->Cart->getCount();
    }

    public function addMenu() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $menuId = $this->request->data['Cart']['menu_id'];
            $listFood = $this->MenuFood->find('all', array(
                'recursive' => -1,
                'fields' => array('MenuFood.food_id',),
                'conditions' => array('MenuFood.menu_id' => $menuId)));
            $this->Cart->addMenu($listFood, $this->request->data['Cart']['SL']);
        }
        echo $this->Cart->getCount();
    }

    public function view() {
        $carts = $this->Cart->readProduct();
        $foods = array();
        if (null != $carts) {
            foreach ($carts as $foodId => $count) {
                $food = $this->Food->findById($foodId);
                $food['Food']['count'] = $count;
                $foods[] = $food;
            }
        }
        $this->set('foods', $foods);
    }

    public function update() {

        if ($this->request->is('post')) {
            if (!empty($this->request->data)) {
                $cart = array();
                foreach ($this->request->data['Cart']['count'] as $index => $count) {
                    if ($count > 0) {
                        $productId = $this->request->data['Cart']['food_id'][$index];
                        $cart[$productId] = $count;
                    }
                }
                $this->Cart->saveProduct($cart);
            }
        }
        $this->redirect(array('action' => 'view'));
    }

    public function delete($id) {
        $carts = $this->Cart->readProduct();
        pr($carts);
        unset($carts[$id]);
        $this->Cart->saveProduct($carts);
        $this->redirect(array('action' => 'view'));
    }

}
