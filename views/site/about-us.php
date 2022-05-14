<?php
/** $model app\models\OurMission */
/** $ourMissionModel app\models\About */
/** $reviews app\models\Reviews */
use app\models\Carousel;
use app\models\OurMission;

?>

<!--MAIN-BEGIN-->
<div class="title-top">
        <div class="title-top-img">
            <img src="/app/images/title-top.png" alt="">
        </div>
        <h2 class="title-top-item"><?php echo $model->title_uz;?></h2>
    </div>
<div class="container">
    <div class="about-text">
            <div class="delice-text">
                <p class="section-first-text">
                    <?php echo explode('/',$model->content_uz)[0]?>
                </p>
            </div>
            <div class="delice-text">
                <p class="section-first-text">
                    <?php echo explode("/",$model->content_uz)[1]?>
                </p>
            </div>
    </div>
</div>
<div class="de-about-wrap">
    <div class="de-about"></div>
    <div class="container">
        <div class="de-about-info">
            <div class="de-about-img">
                <img src=<?=Carousel::getImageLink($ourMissionModel->image);?> alt="">
            </div>
            <div class="de-about-info-item">
                <h4 class="de-about-info-title"><?= $ourMissionModel->title_uz?></h4>
                <div class="de-about-devider"></div>
                <div class="de-about-info-text">
                    <p><?=$ourMissionModel->content_uz?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-slider">
        <?php foreach($reviews as $item):?>
            <div class="main-slider-img">
                <div class="container">
                    <div class="main-slider-info">
                        <h2 class="section-first-title slider-margin">КАТАЛОГ ПРОДУКЦИИ</h2>
                        <div class="section-first-devider"></div>
                        <div class="main-slider-info-text">
                            <p><?=$item->content_uz?></p>
                        </div>
                        <h6 class="main-slider-title"><?=$item->title_uz?></h6>
                        <div class="main-slider-text">
                            <p><?=$item->position_uz?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>   
</div>
<!--MAIN-END-->

