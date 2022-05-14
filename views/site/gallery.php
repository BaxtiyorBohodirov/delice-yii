<?php 
/** @var $productImages  app/models/ProductImages */
/** @var $product app/models/Products */
use app\models\Carousel;

?>

<div class="title-top">
    <div class="title-top-img">
        <img src="/app/images/title-top.png" alt="">
    </div>
    <h2 class="title-top-item">Галерея</h2>
</div>
<div class="container">
    <div class="de-slider">
        <div class="de-slider-main">
            <img id="featured" src=<?=Carousel::getImageLink($productImages[0]->image)?> alt="">
        </div>

        <div class="de-slider-item">
            <?php for($j=1; $j<count($productImages); $j++ ):?>
                <div class="de-slider-item-img">
                     <img class="thumbnail" src=<?=Carousel::getImageLink($productImages[$j]->image)?> alt="">
                </div>  
            <?php endfor;?>  
        
      
            <div class="de-slider-icon-left">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 490.787 490.787" style="enable-background:new 0 0 490.787 490.787;" xml:space="preserve">
                    <path  d="M362.671,490.787c-2.831,0.005-5.548-1.115-7.552-3.115L120.452,253.006
	c-4.164-4.165-4.164-10.917,0-15.083L355.119,3.256c4.093-4.237,10.845-4.354,15.083-0.262c4.237,4.093,4.354,10.845,0.262,15.083
	c-0.086,0.089-0.173,0.176-0.262,0.262L143.087,245.454l227.136,227.115c4.171,4.16,4.179,10.914,0.019,15.085
	C368.236,489.664,365.511,490.792,362.671,490.787z"/>
                    <path d="M362.671,490.787c-2.831,0.005-5.548-1.115-7.552-3.115L120.452,253.006c-4.164-4.165-4.164-10.917,0-15.083L355.119,3.256
	c4.093-4.237,10.845-4.354,15.083-0.262c4.237,4.093,4.354,10.845,0.262,15.083c-0.086,0.089-0.173,0.176-0.262,0.262
	L143.087,245.454l227.136,227.115c4.171,4.16,4.179,10.914,0.019,15.085C368.236,489.664,365.511,490.792,362.671,490.787z"/>
                </svg>
            </div>
            <div class="de-slider-icon-right">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 511.995 511.995" style="enable-background:new 0 0 511.995 511.995;" xml:space="preserve">
		<path d="M381.039,248.62L146.373,3.287c-4.083-4.229-10.833-4.417-15.083-0.333c-4.25,4.073-4.396,10.823-0.333,15.083
			L358.56,255.995L130.956,493.954c-4.063,4.26-3.917,11.01,0.333,15.083c2.063,1.979,4.729,2.958,7.375,2.958
			c2.813,0,5.604-1.104,7.708-3.292L381.039,263.37C384.977,259.245,384.977,252.745,381.039,248.62z"/>
               </svg>
            </div>
        </div>
    </div>
    <div class="de-about-info-item de-gallery-info">
        <h4 class="de-about-info-title"><?=$product->catalog->title_uz?></h4>
        <div class="de-about-devider"></div>
        <div class="de-about-info-text de-text">
            <p>
                <?=$product->content_uz?>
            </p>
        </div>
    </div>
</div>

