<?php
/** @var $productsCatalog  app\models\ProductsCatalog */
/** @var $products app\models\Products */
use app\models\Carousel;
use yii\helpers\Url;

?>
        <ul class="section-two-menu">
            <?php foreach($productsCatalog as $item):?>  
                <li class="section-two-menu-item">
                    <a data-method="POST" data-pjax="1" 
                        href=<?php echo Url::to(['/site/get-products','id'=>$item->id])?>>
                        <?php echo $item->title_uz;?>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
        <div class="section-two-block row">
            <?php foreach( $products as $item):?>
                <div class="section-two-block-item col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="section-two-block-item-img">
                        <img src="<?php echo Carousel::getImageLink($item->image);?>" alt="">
                        <div class="section-two-block-item-img-button-div">
                            <button type="type" class="section-two-block-item-img-button">Подробнее</button>
                        </div>
                    </div>
                    <h6 class="section-two-block-item-title"><?php echo $item->title_uz?></h6>
                    <p class="section-two-block-item-text"><?php echo $item->sub_content_uz?></p>
                    <p class="section-two-block-item-sum"><span><?php echo $item->price?></span>сум</p>
                </div>
            <?php endforeach;?>