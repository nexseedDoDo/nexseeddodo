<?php
class UsersController extends AppController {
	public $facebook;
	public $helpers = array('Html', 'Form','Session');

	public $components = array('Session', 'Auth');

	public function beforeFilter(){
    parent::beforeFilter();
	
	$this->Auth->allow('login','add');
    }

	public function top() {
	}

	public function add() {
		if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('登録できました。'));
                $this->redirect(array('action' => 'main'));
            } else {
                $this->Session->setFlash(__('登録できませんでした。もう１度お願いします。'));
            }
        }
	}

	public function login() {
		if($this->request->is('post')) {
	        if($this->Auth->login()){
	           $this->redirect($this->Auth->redirect());
	        } else {
	        $this->Session->setFlash('ログイン失敗');
	    	}
	    }
	}

	public function main(){
		$this->set('user', $this->Auth->user());
		//ログイン後にリダイレクトされるアクション
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}

}
?>