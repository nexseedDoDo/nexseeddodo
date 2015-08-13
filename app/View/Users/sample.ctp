<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <form class="form-signin">
        <h1 class="form-signin-heading text-muted">Sign In</h1>
         <p><?php echo $this->Html->link('会員登録がまだの方はこちら', array('controller' => 'users','action' => 'add')); ?></p>
         <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        ?>
        <div class="btn btn-lg btn-primary btn-block" type="submit">
            <?php echo $this->Form->end(__('Login')); ?>
        </div>
    </form>

</div>



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


<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">
    <div class="row">
    <form class="form-signin">
        <h1 class="form-signin-heading text-muted">Sign In</h1>
        <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Email address" required="required" autofocus="">
        <input type="password" class="form-control" placeholder="Password" required="">
        </div>
        <div class="col-md-3">
        <button class="btn btn-lg btn-success btn-block" type="submit">
            Sign In
        </button>
        <a style="background-color:#3B5998;"class="btn btn-block btn-social btn-facebook">
            <i class="fa fa-facebook"></i> Sign in with Facebook
        </a>
        </div>
    </form>
    </div>
</div>