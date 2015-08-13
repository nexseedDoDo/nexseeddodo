<?php
class UsersController extends AppController {
	public $helpers = array('Html', 'Form','Session');

	// public $components = array('Session', 'Auth');

	public function beforeFilter(){
    parent::beforeFilter();
	
	$this->Auth->allow('login','add');
    }

	public function top() {
	}

	public function add() {
		$this -> layout = 'sampleLayout';
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
			// debug($this->request->data);
			// debug($this->Auth->login($this->request->data));
	        if($this->Auth->login()){
	           $this->redirect($this->Auth->redirect(array('action'=>'main')));
	        } else {
	        $this->Session->setFlash('ログイン失敗');
	    	}
	    }
	}
	    


	public function main(){
		$myFbData = $this->Session->read('mydata');
		// debug($myFbData);
		// debug($this->Auth->user('id'));
	}

	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}

}
?>