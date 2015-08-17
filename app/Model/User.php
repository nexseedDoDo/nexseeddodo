<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $useTable = 'users';

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();
	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }
	    return true;
	}
	
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '名前は必須です。'
            )
        ),
        // 'email' => array(
        //     'required' => array(
        //         'rule' => array('notEmpty'),
        //         'message' => 'メールアドレスは必須です。'
        //     )
        // ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'パスワードは必須です。'
            )
        )
        // 'role' => array(
        //     'valid' => array(
        //         'rule' => array('inList', array('admin', 'author')),
        //         'message' => 'Please enter a valid role',
        //         'allowEmpty' => false
        //     )
        // )
    );
}
?>