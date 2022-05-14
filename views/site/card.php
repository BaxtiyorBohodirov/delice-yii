<?php
    /** @var $productImages app/models/ProductImages*/
    /** @var $productDetails app/models/ProductDetails*/
    /** @var $sameProducts app/models/Products*/

use app\models\Carousel;
use yii\helpers\Url;

?>
<div class="title-top">
    <div class="title-top-img">
        <img src="/app/images/title-top.png" alt="">
    </div>
    <h2 class="title-top-item">Магазин</h2>
</div>
<!--Main-->
<div class="container">
    <div class="card" style="border:none;">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 card-block">
                <div class="card-item">
                    <div class="card-img-block">
                        <div class="card-img-block-first">
                            <img src=<?php echo Carousel::getImageLink($productImages[0]->image)?> alt="">
                        </div>
                    </div>
                </div>
                <div class="card-item">
                    <div class="card-img-block-second">
                       <?php for($i=1; $i<=3; $i++):?>
                            <div class="card-img-block-second-img-<?=$i?>">
                                <img src=<?=Carousel::getImageLink($productImages[$i]->image)?> alt="">
                            </div>
                        <?php endfor;?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="card-info">
                    <h4 class="card-info-title"><?=$productImages[0]->product->title_uz ?></h4>
                    <div class="card-info-sub-text">
                        <p><?= $productImages[0]->product->sub_content_uz?></p>
                    </div>
                    <div class="card-info-text">
                        <p><?=$productImages[0]->product->content_uz?></p>
                    </div>
                    <div class="card-button-block">
                        <div class="card-info-counter c-counter">
                            <div class="card-info-counter-item">1</div>
                            <div class="card-info-counter-block">
                                <button class="card-info-counter-block-plus">+</button>
                                <button class="card-info-counter-block-plus">-</button>
                            </div>
                        </div>
                        <button type="button" class="card-info-button">добавить в корзину</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-about">
        <ul class="card-about-menu">
            <?php for($i=0;$i<count($productDetails);$i++):?>
                <li class="card-about-menu-item">
                    <a href="#"id=<?=$productDetails[$i]->id; ?> 
                        class="card-about-menu-link <?=$i===0?'active':""?>"><?=$productDetails[$i]->title_uz?>
                    </a>
                </li>
            <?php endfor;?>
        </ul>
        <div class="card-about-text">
            <p>
                <?=$productDetails[0]->content_uz?>
            </p>
        </div>
    </div>
</div>
<div class="section-two-card">
    <div class="container">
        <h2 class="section-first-title">Похожие товары</h2>
        <div class="section-first-devider"></div>
        <div class="section-two-card-block row">
            <?php foreach($sameProducts as $item):?>
                <div class="section-two-card-block-item col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
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
</div>
<!--Main-->
