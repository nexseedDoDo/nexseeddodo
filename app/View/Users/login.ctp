<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('名前とメールアドレスとパスワードを入力して下さい'); ?></legend>
        <p><?php echo $this->Html->link('会員登録がまだの方はこちら', array('controller' => 'users','action' => 'add')); ?></p>
        <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
        echo $this->Form->input('password');
    ?>
    </fieldset>
</div>
<div>
<?php echo $this->Form->end(__('Login')); ?>
<?php echo $this->Form->create('Fbconnect',array('controller' => 'fbconnects','action' => 'facebook')); ?>
<?php echo $this->Form->end('submit'); ?>
</div>