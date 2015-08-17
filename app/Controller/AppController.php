<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $helpers = array(
            'Session',
            'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
            'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
            'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
     );
    
	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'main'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller')
            // 'authenticate' => array(
            //                                 'Form' => array(
            //                                         'userModel' => 'Admins', // 「userModelに騙されて」
            //                                         'scope' => array('Admins.status' => 1),
            //                                         'fields' => array(
            //                                                 'username' => 'username',
            //                                                 'password' => 'password',
            //                                                 'status' => 'status',
            //                                         ),
            //                                         'passwordHasher' => array(
            //                                                 'className' => 'Simple',
            //                                                 'hashType' => 'sha256',
            //                                         ),
            //                                 ),
            //                         ),
        )
    );

    public function isAuthorized($user) {
    // if (isset($user['role']) && $user['role'] === 'admin') {
    //     return true;
    // }

    // デフォルトは拒否
    return true;
    }

    public function beforeFilter() {
        $this->Auth->allow('main'); //ここの()の中をからにするとURLをいじってどこでもリンクできるようになる
    }
}