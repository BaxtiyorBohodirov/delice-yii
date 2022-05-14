
<?php
/** @var $ourMissionModel app\models\OurMission */
/** @var $productsCatalog app\models\ProductsCatalog */
/** @var $products app\models\Products */
/** @var $productsGallery app\models\Products */
/** @var $news app\models\News */
/** @var $reviews app\models\News */
use app\models\Carousel;
use app\models\ContactsForm;
use yii\bootstrap4\Html;
use yii\helpers\Html as HelpersHtml;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$contactsForm=new ContactsForm();
?>
<style>
    .section-first::after{
        background: url(<?php echo Carousel::getImageLink(explode("/",$ourMissionModel->image)[1])." no-repeat"?>);
    }
    .section-first::before{
        background: url(<?php echo Carousel::getImageLink(explode("/",$ourMissionModel->image)[0])." no-repeat"?>);

    }
</style>
<!--MAIN BEGIN-->
<div class="main">
    <div class="section-first">
            <div class="container">
                <h2 class="section-first-title"><?php echo $ourMissionModel->title_uz?></h2>
                <div class="section-first-devider"></div>
                <div class="delice-text">
                    <p class="section-first-text">
                        <?php echo explode('/',$ourMissionModel->content_uz)[0]?>
                    </p>
                </div>
                <div class="delice-text">
                    <p class="section-first-text">
                        <?php echo explode("/",$ourMissionModel->content_uz)[1]?>
                    </p>
                </div>
                <a href="#" class="section-first-link">УЗНАТЬ БОЛЬШЕ
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;"
                        xml:space="preserve">
            <path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
                c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
                c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
                c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
            </svg>
            </a>
        </div>
    </div>
    <div class="section-two">
        <div class="container">
            <h2 class="section-first-title">КАТАЛОГ ПРОДУКЦИИ</h2>
            <div class="section-first-devider"></div>
            <ul class="section-two-menu">
                <?php foreach($productsCatalog as $item):?>  
                    <li class="section-two-menu-item">
                        <a data-method="POST" data-pjax="1" class="active"
                           href="#" id=<?php echo $item->id?>>
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
                <a href="#" class="section-two-link">Перейти в каталог
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;"
                         xml:space="preserve">
		<path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
			c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
			c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
			c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
        </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="delice-grid">
            <?php for($i=0;$i<=2;$i++):?>
                       
                <div class="delice-grid-inner d-grid-<?=$i+1?>">
                <?php for($j=$i*3;$j<=($i+1)*3&&$j<8;$j++):?>            
                    <?php if($j===$i*3||$j%3===2):?><div class="delice-grid-item<?php echo $i===2?"-to":""?>"><?php endif;?>
                            <div class="delice-grid-item-img img-<?php $img=($j%3===0&&$j!==$i*3)?(8-$i-1):$j; echo $i===2?"last":$img+1;?>">
                                <div class="delice-grid-before">
                                    <img src="<?php echo Carousel::getImageLink($productsGallery[$img]->image)?>" alt="">
                                    <div class="product-collection-column-info">
                                        <div class="product-collection-column-info-title"><?php echo $productsGallery[$img]->title_uz?></div>
                                        <div class="product-collection-column-info-devider"></div>
                                        <p class="product-collection-column-info-text"><?php echo $productsGallery[$img]->sub_content_uz?></p>
                                    </div>
                                </div>
                            </div>
                    <?php if($j===$i*3+1||($j%3===0&&$j!==$i*3)):?></div><?php endif;?>
                <?php endfor;?>
                </div>
            <?php endfor;?>
    </div>
    <div class="section-news">
        <div class="container">
            <h2 class="section-first-title">КАТАЛОГ ПРОДУКЦИИ</h2>
            <div class="section-first-devider"></div>
            <div class="section-news-block row">
            <?php $str="bounceInLeft/pulse/bounceInRight"; for($i=0;$i<3;$i++):?>    
                <div class="section-news-block-item wow <?php echo explode('/',$str)[$i];?> col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12" data-wow-duration="2s">
                    <div class="section-news-block-item-img">
                        <img src="<?php echo Carousel::getImageLink($news[$i]->image);?>" alt="">
                    </div>
                    <div class="section-news-block-item-info">
                        <p class="section-news-block-item-info-date">
                        <?php 
                            echo $news[$i]->updated_at? date('d.m.Y',$news[$i]->updated_at):date('d.m.Y',$news[$i]->created_at);
                        ?>
                        </p>
                        <h2 class="section-news-block-item-info-title"><?=$news[$i]->title_uz?></h2>
                        <p class="section-news-block-item-info-text"><?=$news[$i]->sub_content_uz;?></p>
                    </div>
                </div>
            <?php endfor;?>
        </div>
            <a href="#" class="section-first-link">УЗНАТЬ БОЛЬШЕ
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;"
                     xml:space="preserve">
		<path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
			c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
			c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
			c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
        </svg>
            </a>
        </div>
    </div>
    <div class="main-slider">
        <?php foreach($reviews as $item):?>
            <div class="main-slider-img" style="background: url(<?php echo Carousel::getImageLink('main-slider.png')?>) no-repeat">
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
    <div class="contacts">
        <div class="container">
            <h2 class="section-first-title">Обратная связь</h2>
            <div class="section-first-devider"></div>
                <?php $form=ActiveForm::begin(['action'=>'/adminpanel/contacts-form/create','enableAjaxValidation' => false,'id'=>'formContact','method'=>'POST']);?>
                <div class="contacts-item row">
                    <div class="contacts-input col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <input type="text" id="contactsform-name" class="contacts-item-input" name="ContactsForm[name]" placeholder="ФИО">   
                    </div>
                    <div class="contacts-input col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <input type="text" id="contactsform-phone" class="contacts-item-input" name="ContactsForm[phone]" placeholder="Телефон">  
                    </div>
                    <div class="contacts-input col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <input type="text" id="contactsform-email" class="contacts-item-input" name="ContactsForm[email]" aria-invalid="false" placeholder="Email">
                    </div>
                </div>
                    <div class="contacts-area">
                        <textarea id="contactsform-content" class="contacts-area-item" name="ContactsForm[content]" rows="10" placeholder="Комментарий"></textarea>  
                    </div>
                    <div class="contacts-button-inner">
                        <?= Html::submitButton('Submit', ['class' => 'contacts-button']) ?>
                    </div>
                <?php $form->end()?>    
</div>
    </div>
</div>

<?php
	
?>