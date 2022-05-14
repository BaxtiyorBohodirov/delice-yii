<?php 
/** @var $products app/models/Products */
/** @var $productsCatalog app/models/ProductsCatalog */

use app\models\Carousel;
use yii\helpers\Url;


?>
<div class="title-top">
    <div class="title-top-img">
        <img src="/app/images/title-top.png" alt="">
    </div>
    <h2 class="title-top-item">Продукция</h2>
</div>
<!--main-->
<?php 
    if(isset($_POST['prs']))
    {
        print_r($_POST['prs']);
    }
?>
<div class="catalog">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <ul class="catalog-menu">
                    <?php for($i=0; $i< count($productsCatalog); $i++):?>  
                        <li class="catalog-menu-item">
                            <a  href="#" id=<?=$productsCatalog[$i]->id?> 
                                data-method="POST" data-pjax="1" class=<?=$i===0?"active":"";?>>
                                <?php echo $productsCatalog[$i]->title_uz;?>
                            </a>
                        </li>
                    <?php endfor;?>
                </ul>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-6-col-12">
                <div class="section-two-block row">
                    <?php foreach( $products as $item):?>
                        <div class="section-two-block-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
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
                    
                </div>
            </div>
        </div>
        <div class="pagination">
            <div class="pagination-arrow-left">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve">
		<path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
			c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
			c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
			c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
               </svg>
            </div>
            <div class="pagination-number">1</div>
            <div class="pagination-number active">2</div>
            <div class="pagination-number">3</div>
            <div class="pagination-arrow-right">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve">
		<path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
			c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
			c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
			c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
               </svg>
            </div>
        </div>
    </div>
</div>
<!--main-->

