<?php
    /** @var $news app/models/News */

use app\models\Carousel;

?>
<div class="title-top">
    <div class="title-top-img">
        <img src="/app/images/title-top.png" alt="">
    </div>
    <h2 class="title-top-item">Новости</h2>
</div>
<!--Main Begin-->
<div class="container">
    <div class="de-about-block">
        <div class="de-about-block-img">
            <img src=<?=Carousel::getImageLink($news->image)?> alt="">
        </div>
        <div class="de-about-block-text">
            <h4 class="de-about-block-text-title"><?= $news->title_uz?></h4>
            <div class="de-about-block-sub-text">
                <p><?php echo date('d.m.Y',$news->updated_at?$news->updated_at:$news->created_at)?></p>
            </div>
            <p class="de-about-block-text-item"><?=$news->sub_content_uz?></p>
        </div>
    </div>
    <div class="news-in-text-one">
        <p>
            <?php echo explode('/',$news->content_uz)[0]?>
        </p>
    </div>
    <div class="news-in-text-one" style="margin-bottom: 40px">
        <p>
            <?php echo explode('/',$news->content_uz)[1]?>
        </p>
    </div>
</div>
<!--Main End-->
