<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <? foreach ($articles as $article):?>
                    <article class="post">
                    <div class="post-thumb">
                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]);?>"><img src="<?= $article->getImage();?>" alt=""></a>

                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]);?>" class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">View Post</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]);?>"> <?= $article->category->title;?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id]);?>"><?= $article->title;?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p><?= $article->description;?></p>

                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]);?>" class="more-link">Continue Reading</a>
                            </div>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize">By <?= $article->user->name;?> On <?= $article->getDate();?></span>
                            <ul class="text-center pull-right">
                                <li><i class="fa fa-eye s-facebook"></i></li> <?= (int)$article->viewed;?>
                            </ul>
                        </div>
                    </div>
                </article>
                <? endforeach;?>
                <?
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                ?>
            </div>
            <?= $this->render('/partionals/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->