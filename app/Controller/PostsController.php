<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form','Session');
    public $uses = array('Post', 'Category','Image');//使うモデルを設定
    // public $components =array('Session');
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
	
	

    
    
    public function index($type_id=null) {
        $this->layout='yukikoLayout';
        $this->set('posts', $this->Post->find('all',array('conditions' =>array('Post.type_id'=>$type_id))));
        $this->set('categories',$this->_get_categories_append_count($type_id));
        // $this->Item->find('all', array('order' => array('Item.name DESC')));
        $cat_name = 'test';

        switch ($type_id) {
            case 1:
                $cat_name = 'Life Style';
                break;
             case 2:
                $cat_name = 'Activity';
                break;
             case 3:
                $cat_name = 'Restaurant';
                break;
            default:
                $cat_name = 'Category';
                break;
        }
//viewでも使えるようにセットする
        $this->set(compact('cat_name','images','type_id'));
        // $images = $this->Image->find('all',array('conditions' =>array('Post.type_id'=>$type_id)));
                
    }
     public function category_index($type_id,$category_id=null){
        $this->layout='yukikoLayout';
        
        if($category_id==null){
            $this->set('posts', $this->Post->find('all',array('conditions' =>array('Post.type_id'=>$type_id))));
            
        }else{
            $this->set('posts', $this->Post->find('all',array('conditions' =>array('Post.type_id'=>$type_id,'Post.category_id'=>$category_id))));
        
        }
        $this->set('categories',$this->_get_categories_append_count($type_id));
        
        $cat_name = 'test';

        switch ($type_id) {
            case 1:
                $cat_name = 'Life Style';
                break;
             case 2:
                $cat_name = 'Activity';
                break;
             case 3:
                $cat_name = 'Restaurant';
                break;
            default:
                $cat_name = 'Category';
                break;
        }
//viewでも使えるようにセットする
        $this->set(compact('cat_name'));
        
    } 
    public function view($id = null) {
        $this->layout='yukikoLayout';
        if (!$id) {
            throw new NotFoundException(__('記事が見つかりません。'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('記事がありません。'));
        }
        $this->set('post', $post);
    }
    public function add($type_id=null) {
        $this->layout='yukikoLayout';

        $categories = $this->Category->find('list',array('conditions' =>array('Category.type_id'=>$type_id)));

        $this->set(compact('categories','type_id'));
    
       
        if ($this->request->is('post')) {
            
            // debug($_FILES);
            $image =date('YmdHis') . $_FILES['data']['name']['Post']['picture'];//ファイル名を設定
            //場所を設定
            move_uploaded_file($_FILES['data']['tmp_name']['Post']['picture'], '/var/www/html/dodo/app/webroot/img/post_thumbnail/'.$image);
     
            
       
            //imagesテーブルにファイル名を保存


            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $picture['Image']['filename'] = $image;
                $picture['Image']['post_id']=$this->Post->getLastInsertID();//一番新しいIDを取得
                $this->Image->save($picture);
                $this->Session->setFlash(__('投稿されました！'));
                return $this->redirect(array('action' => 'index',$type_id));
            }
            $this->Session->setFlash(__('投稿できませんでした。'));
        }

    
        
    }

    public function edit($id = null,$type_id=null,$category_id=null) {
        $this->layout='yukikoLayout';
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $image =date('YmdHis') . $_FILES['data']['name']['Post']['picture'];//ファイル名を設定
            //場所を設定
            move_uploaded_file($_FILES['data']['tmp_name']['Post']['picture'], '/var/www/html/dodo/app/webroot/img/post_thumbnail/'.$image);


            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Image->deleteAll(array('Image.post_id'=>$id));

                $picture['Image']['filename'] = $image;
                $picture['Image']['post_id']=$id;
                $this->Image->save($picture);
                $this->Session->setFlash(__('変更されました！'));
                return $this->redirect(array('action' => 'index',$type_id));
            }
            $this->Session->setFlash(__('変更できませんでした。'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }

        $categories = $this->Category->find('list',array('conditions' =>array('Category.type_id'=>$type_id)));
        $post = $this->Post->findById($id);

        $this->set(compact('categories','type_id','post'));

    }
    public function delete($id,$type_id=null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(
                __('削除しました！', h($id))
            );
        } else {
            $this->Session->setFlash(
                __('削除できませんでした。', h($id))
            );
        }

        return $this->redirect(array('action' => 'index',$type_id));
    }
    private function _get_categories_append_count($type_id=null){
        $this->layout='yukikoLayout';
        $categories = $this->Category->find('all',array('conditions' =>array('Category.type_id'=>$type_id)));
        $index = 0;
        foreach ($categories as $category) {
            $postcount = $this->Post->find('count',array('conditions'=>array('category_id'=>$category['Category']['id'])));
            //debug($postcount);
            $categories[$index]['Category']['count'] = $postcount;
            $index++;
        }
        return $categories;
    }

}
?>