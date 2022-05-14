<?php 
    /** @var $products app/models/Products */

use app\models\Carousel;

?>
<div class="title-top">
    <div class="title-top-img">
        <img src="/app/images/title-top.png" alt="">
    </div>
    <h2 class="title-top-item">Результаты поиска</h2>
</div>
<!--Main-Begin-->
<div class="container">
    <h4 class="search-r-title">Количество результатов: <span><?=count($products)?></span></h4>
            <div class="section-two-block row search-r-block">
                <?php foreach($products as $item):?>
                    <div class="section-two-block-item col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="section-two-block-item-img">
                            <img src=<?=Carousel::getImageLink($item->image)?> alt="">
                            <div class="section-two-block-item-img-button-div">
                                <button type="type" class="section-two-block-item-img-button">Подробнее</button>
                            </div>
                        </div>
                        <h6 class="section-two-block-item-title"><?=$item->title_uz?></h6>
                        <p class="section-two-block-item-text"><?=$item->sub_content_uz?></p>
                        <p class="section-two-block-item-sum"><span><?=$item->price?></span>сум</p>
                    </div>
                <?php endforeach;?>
            </div>
</div>
<!--Main-End-->
