<?php

App::uses('AppModel', 'Model');

class Cart extends AppModel {

    public $useTable = false;

    /*
     * add a product to cart
     */

    public function addProduct($productId, $sl) {
        $allProducts = $this->readProduct();
        if (null != $allProducts) {
            if (array_key_exists($productId, $allProducts)) {
                $allProducts[$productId] = $allProducts[$productId] + $sl;
            } else {
                $allProducts[$productId] = $sl;
            }
        } else {
            $allProducts[$productId] = $sl;
        }

        $this->saveProduct($allProducts);
    }

    public function addMenu($menuId, $sl) {
        $this->loadModel('MenuFood');
        $listFood = $this->MenuFood->find('all', array(
            'recursive' => -1,
            'fields' => array('MenuFood.food_id',),
            'conditions' => array('MenuFood.menu_id' => $menuId)));
        for ($i = 0; $i < $sl; $i++) {
            $allProducts = $this->readProduct();
            foreach ($listFood as $food) {
                if (null != $allProducts) {
                    $id=$food[MenuFood][food_id];
                    if (array_key_exists($id, $allProducts)) 
                            
                    {
                        $allProducts[$food[MenuFood][food_id]] ++;
                    } else {
                        $allProducts[$food[MenuFood][food_id]] = 1;
                    }
                } else {
                    $allProducts[$food[MenuFood][food_id]] = 1;
                }
               $this->saveProduct($allProducts);
            }
        }
    }

    /*
     * get total count of products
     */

    public function getCount() {
        $allProducts = $this->readProduct();

        if (count($allProducts) < 1) {
            return 0;
        }

        $count = 0;
        foreach ($allProducts as $product) {
            $count = $count + $product;
        }

        return $count;
    }

    /*
     * save data to session
     */

    public function saveProduct($data) {
        return CakeSession::write('cart', $data);
    }

    /*
     * read cart data from session
     */

    public function readProduct() {
        return CakeSession::read('cart');
    }

}
