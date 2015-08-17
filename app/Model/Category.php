<?php
class Category extends AppModel {
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
}