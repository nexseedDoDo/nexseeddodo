<div style="min-height:400px"><h1>編集</h1>
<br>
<br>
 <img src="/dodo/img/post_thumbnail/<?php echo $post['Image']['filename']; ?>" alt="" class="image">
<?php
	echo $this->Form->create('Post', array('enctype' => 'multipart/form-data' ));
	echo $this->Form->input('title',array('label'=>'タイトル'));
	echo $this->Form->input('category_id',array('options'=>$categories,'label'=>'カテゴリー'));
	echo $this->Form->input('body', array('rows' => '3','label'=>'内容'));
	echo $this->Form->input('picture',array('type'=>'file','label'=>'画像'));
	echo $this->Form->input('id', array('type' => 'hidden')); 
?>
	<br>
<?php
	echo $this->Form->end('変更する'); 
?>
<br>
<?php echo $this->Form->postlink('<button>削除する</button>',array('action' => 'delete', $post['Post']['id'],$type_id),array('escape' => false ,'confirm' => '削除しますか？')); ?>

</div>
 