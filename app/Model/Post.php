<?php
class Post extends AppModel {
	public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
	 public $belongsTo ='Category';
	 public $hasOne='Image';

}
?>