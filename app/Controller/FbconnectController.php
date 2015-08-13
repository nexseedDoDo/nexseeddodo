<?php
 
//【1】facebook認証
App::uses('AppController', 'Controller');
App::import('Vendor','facebook',array('file' => 'facebook'.DS.'src'.DS.'facebook.php'));

use Facebook\GraphUser;
use Facebook\FacebookRequestException;

class FbconnectController extends AppController {
    public $name = 'Fbconnect';
    public function beforeFilter(){
    parent::beforeFilter();
    
    $this->Auth->allow();
    }

    function showdata(){//トップページ
        $facebook = $this->createFacebook(); //【2】アプリに接続
        $myFbData = $this->Session->read('mydata');       //【3】facebookのデータ
        $this->set('myFbData', $myFbData);
    }
 
    //facebookの認証処理部分
    public function facebook(){
        $this->autoRender = false;
        $this->facebook = $this->createFacebook();
        $user = $this->facebook->getUser();       //【4】ユーザ情報取得
        if($user){//認証後
            $me = $this->facebook->api('/me','GET',array('locale'=>'ja_JP'));  //【5】ユーザ情報を日本語で取得
            $this->Session->write('mydata',$me);      //【6】ユーザ情報をセッションに保存
            $this->redirect(array('controller' => 'users','action' => 'main'));
        }else{//認証前
            $url = $this->facebook->getLoginUrl(array(
            'scope' => 'email,user_birthday','canvas' => 1,'fbconnect' => 0));   //【7】スコープの確認
            // debug($url);
            $this->redirect($url);
        }
    }
 
    private function createFacebook() {        //【8】appID, secretを記述
        return new Facebook(array(
            'appId' => '681869725248436',
            'secret' => '6ebcc0cc52813ab0948ab78f0e4fa636'
        ));
    }
}