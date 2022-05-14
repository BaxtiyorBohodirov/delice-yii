<?php 
    
    use app\models\Carousel;

    /** @var $news app/models/News */
?>
<!--Main Begin-->
<div class="container">
        <div class="section-news-block row de-news">

        <?php $str="bounceInLeft/pulse/bounceInRight"; for($i=0;$i<9;$i++):?>    
                <div class="section-news-block-item wow <?php echo explode('/',$str)[$i%3];?> col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12" data-wow-duration="2s">
                    <div class="section-news-block-item-img">
                        <img src="<?php echo Carousel::getImageLink($news[$i%3]->image);?>" alt="">
                    </div>
                    <div class="section-news-block-item-info">
                        <p class="section-news-block-item-info-date">
                        <?php 
                            echo $news[$i%3]->updated_at? date('d.m.Y',$news[$i%3]->updated_at):date('d.m.Y',$news[$i%3]->created_at);
                        ?>
                        </p>
                        <h2 class="section-news-block-item-info-title"><?=$news[$i%3]->title_uz?></h2>
                        <p class="section-news-block-item-info-text"><?=$news[$i%3]->sub_content_uz;?></p>
                    </div>
                </div>
            <?php endfor;?>
            
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
<!--Main End-->
