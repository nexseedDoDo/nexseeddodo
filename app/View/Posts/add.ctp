<div style="min-height:400px"><h1>投稿</h1>
<?php
echo $this->Form->create('Post', array('enctype' => 'multipart/form-data' ));
echo $this->Form->input('title',array('label'=>'タイトル'));
echo $this->Form->input('category_id',array('options'=>$categories,'label'=>'カテゴリー'));
echo $this->Form->input('body', array('rows' => '3','label'=>'内容'));
echo $this->Form->input('picture',array('type'=>'file','label'=>'画像'));
echo $this->Form->input('user_id',array('type'=>'text','label'=>'IDを入力してください'));
echo $this->Form->input('type_id',array('type'=>'hidden','value'=>$type_id));
echo $this->Form->end('保存する');
?>
</div>