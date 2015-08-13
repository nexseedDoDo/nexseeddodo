<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset class="container">
        <div style="max-width:550px; margin:auto;">
        <legend><?php echo __('名前とメールアドレスとパスワードを入力して下さい'); ?></legend>
        <p><?php echo $this->Html->link('会員登録がまだの方はこちら', array('controller' => 'users','action' => 'add')); ?></p>
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
            ?>
        </div>
    </fieldset>
    <div style="max-width:300px; margin:auto; position:relative;bottom:-10px;left:-125px;">
    <?php echo $this->Form->end(array(
        'label' => 'Login',
        'class' => 'btn btn-success col-xs-9'
    ));?>
    </div>

    <?php //echo $this->Form->create('Fbconnect',array('controller' => 'fbconnect','action' => 'facebook')); ?>
    <?php //echo $this->Form->end(array(
    //     'label' => 'Connect with Facebook',
    //     'class' => 'btn btn-primary'));?>
    <!-- </div>  -->
</div>