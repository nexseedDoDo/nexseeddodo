  <div class="row">

            <div class="col-md-3">
                <div class="lead-1"><p class="catname"><?php echo $cat_name; ?></p></div>
                <div class="list-group">

                <?php foreach ($categories as $category): ?>
                    <?php echo $this->Html->link($category['Category']['name'], array('action' => 'category_index', $type_id,$category['Category']['id']), array('class' => 'list-group-item')); ?>

                    <!-- <a href="<?php echo '/dodo/posts/category_index/'.$category['Category']['id']; ?>" class="list-group-item"><?php echo $category['Category']['name']; ?></a> -->
                    <?php endforeach; ?>

                </div>
                <p><?php //echo $this->Form->end('投稿する'); ?><?php echo $this->Html->link('<button>投稿する</button>', array('action' => 'add',$type_id),array('escape' => false )); ?></p>
            </div>

            <?php 
            switch ($type_id){
                case 1:
                    $folder = 'life';
                    break;
                 case 2:
                    $folder = 'activity';
                    break;
                 case 3:
                    $folder = 'restaurant';
                    break;
                default:
                    $folder = 'life';
                    break;
            }


            ?>
            <div class="col-md-9">

                <div class="row carousel-holder">
                    <br>
                    <br>
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="/dodo/img/dodoindexslide/<?php echo $folder; ?>/1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="/dodo/img/dodoindexslide/<?php echo $folder; ?>/2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="/dodo/img/dodoindexslide/<?php echo $folder; ?>/3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                <?php foreach ($posts as $post): ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="/dodo/img/post_thumbnail/<?php echo $post['Image']['filename']; ?>" alt="" class="image">
                            <div class="caption">
                               
                                <h4><a href="#">
                                
                                    <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
                                    </a>
                                </h4>
                                <small>
                                    <?php echo date('Y年n月j日　H時i分',strtotime($post['Post']['created']))
                                ; ?><?php //echo date('Y年n月j日　H時i分')?>
                                </small>

                                 <p>
                                    <?php echo h($post['Post']['body']); ?><!-- <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a> -->
                                </p>
                            </div>
                           
                        </div>
                    </div>
                 <?php endforeach; ?>
  
        
                </div>

            </div>

        </div>






