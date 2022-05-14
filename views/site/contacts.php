<?php 
    /** @var $contact app/models/Contacts */

use yii\bootstrap4\Html;
use yii\helpers\Html as HelpersHtml;
use yii\widgets\ActiveForm;

?>
<div class="title-top">
    <div class="title-top-img">
        <img src="/app/images/title-top.png" alt="">
    </div>
    <h2 class="title-top-item">Контакты</h2>
</div>
<!--Main
==========================-->
<div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 ag-main-contact-blog delice-contacts">
                    <div class="ag-main-contact">
                        <div class="ag-main-contact-title-div">
                            <p class="ag-main-contact-title">Адрес: </p>
                        </div>
                        <div class="ag-main-contact-phone">
                            <p><?=$contact->adress_uz?></p>
                        </div>
                    </div>
                    <div class="ag-main-contact">
                        <div class="ag-main-contact-title-div">
                            <p class="ag-main-contact-title">телефон: </p>
                        </div>
                        <div class="ag-main-contact-phone">
                            <a href="tel: <?=$contact->phone?>"><?=$contact->phone?></a>
                        </div>
                    </div>
                    <div class="ag-main-contact">
                        <div class="ag-main-contact-title-div">
                            <p class="ag-main-contact-title">Email: </p>
                        </div>
                        <div class="ag-main-contact-phone">
                            <p><?=$contact->email?></p>
                        </div>
                    </div>

                </div>
                    <div class="col-xl-6 col-lg-6 ag-main-contact-blog">
                        <?php $form=ActiveForm::begin(['id'=>'formContact','action'=>'/adminpanel/contacts-form/create','enableAjaxValidation'=>false,'method'=>'post'])?>
                            <input type="text" id="contactsform-name" class="ag-main-contact-input" name="ContactsForm[name]" placeholder="ФИО">   
                            <input type="text" id="contactsform-phone" class="ag-main-contact-input" name="ContactsForm[phone]" placeholder="Телефон">  
                            <input type="text" id="contactsform-email" class="ag-main-contact-input" name="ContactsForm[email]" aria-invalid="false" placeholder="Email">
                            <textarea id="contactsform-content" class="ag-main-contact-textarea" name="ContactsForm[content]" rows="10" placeholder="Комментарий"></textarea>  
                            <div class="de-contacts-btn">
                                <?= Html::submitButton('Submit', ['class' => 'contacts-button']) ?>
                            </div>
                        <?php ActiveForm::end()?>
                        </div>
            </div>
        </div>

    <div class="ag-map" id="map"></div>
   

<!--Main
==========================-->
