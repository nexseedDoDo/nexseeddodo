<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <div style="max-width:550px; margin:auto;">
        <legend><?php echo __('新規登録'); ?></legend>
        <?php
        echo $this->Form->input('username',
            array('type' => 'text',
                  'placeholder' => '名前を入力して下さい。',
                  'class' => 'form-control'));
        echo $this->Form->input('email',
            array('type' => 'text',
                  'placeholder' => 'emailを入力して下さい。',
                  'class' => 'form-control'));
        echo $this->Form->input('password',
            array('type' => 'password',
                  'placeholder' => 'パスワードを入力して下さい。',
                  'class' => 'form-control'));
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    	?>
        </div>
    </fieldset>
<div style="max-width:300px; margin:auto; position:relative;bottom:-10px;left:-125px;">
<?php echo $this->Form->end(array(
    'label' => '登録',
    'class' => 'btn btn-success col-xs-9'
));?>
</div>