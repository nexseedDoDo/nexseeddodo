<div style="min-height:400px">
    <br>
    <br>

   <!--  <div class="col-sm-4 col-lg-4 col-md-4"> -->
        <!-- <div class="thumbnail"> -->
            <img src="/dodo/img/post_thumbnail/<?php echo $post['Image']['filename']; ?>" alt="" class="image">
            <!-- <div class="caption"> -->
                
                <h1>
                	 <?php echo h($post['Post']['title']); ?>
                </h1>
                <p>
                	登録日時: <?php echo date('Y年n月j日　H時i分',strtotime($post['Post']['created'])); ?>
                	
                </p>
                <p>
                	<?php echo h($post['Post']['body']); ?>
                </p>
                <p><?php echo $this->Html->link('<button>編集、削除</button>', array('action' => 'edit', $post['Post']['id'],$post['Post']['type_id']),array('escape' => false )); ?>
                </p>
                   
</div>



















