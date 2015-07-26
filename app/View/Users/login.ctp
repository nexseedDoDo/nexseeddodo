<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('名前とメールアドレスとパスワードを入力して下さい'); ?></legend>
        <p><?php echo $this->Html->link('会員登録がまだの方はこちら', array('controller' => 'users','action' => 'add')); ?></p>
        <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>