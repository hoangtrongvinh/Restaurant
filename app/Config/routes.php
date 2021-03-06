<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
        Router::parseExtensions('html', 'rss');
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
        
        Router::connect('/about', array('controller' => 'pages', 'action' => 'about'));
        Router::connect('/service', array('controller' => 'pages', 'action' => 'service'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/menu', array('controller' => 'menus', 'action' => 'index'));
        
        Router::connect('/menu/:id', array('controller' => 'menus', 'action' => 'thuc_don'),array('pass' => array('id'),
        'id' => '[0-9]+'));
        
        
        Router::connect('/food', array('controller' => 'foods', 'action' => 'index'));
        
        Router::connect('/food/cung_loai/:type/:id', array('controller' => 'foods', 'action' => 'cung_loai'),array('pass' => array( 'type','id')));
        
        Router::connect('/food/trong_ngay', array('controller' => 'foods', 'action' => 'trong_ngay')); 
        
        Router::connect('/food/theo_mua', array('controller' => 'foods', 'action' => 'theo_mua'));
        
        Router::connect('/search', array('controller' => 'searchs', 'action' => 'index'));
        
        Router::connect('/contact', array('controller' => 'contacts', 'action' => 'index'));
        
        
        Router::connect('/new', array('controller' => 'news', 'action' => 'index'));
        
        Router::connect('/cart', array('controller' => 'carts', 'action' => 'view'));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
