<?php
class PostsController extends AppController {
	public function isAuthorized($user) {
    // 登録済ユーザーは投稿できる
    if ($this->action === 'add') {
        return true;
    }

    // 投稿のオーナーは編集や削除ができる
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Post->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}
	
	public function index(){

	}
	public function add(){
    if ($this->request->is('post')) {
        $this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been saved.'));
            $this->redirect(array('action' => 'index'));
        }
    }
}

	}
	public function view(){

	}
	public function edit(){

	}
	public function delete(){

	}

	
}
?>