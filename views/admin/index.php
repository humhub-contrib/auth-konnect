<?php

use humhub\modules\ui\form\widgets\IconPicker;
use humhub\widgets\bootstrap\Button;
use humhub\widgets\bootstrap\Link;
use humhub\widgets\form\ActiveForm;
use humhubContrib\auth\konnect\models\ConfigureForm;

/* @var $model ConfigureForm */
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AuthKonnectModule.base', '<strong>Kopano Connect</strong> Sign-In configuration') ?></div>

        <div class="panel-body">
            <p>
                <?= Link::primary(Yii::t('AuthKonnectModule.base', 'Kopano Connect Documentation'))
                    ->link('https://documentation.kopano.io/user_manual_webapp//settings.html')
                    ->blank()->loader(false)
                    ->right()->sm() ?>
                <?= Yii::t('AuthKonnectModule.base', 'Please follow the Kopano Connect instructions to create the required <strong>OAuth client</strong> credentials.'); ?>
                <br/>
            </p>
            <br/>

            <?php $form = ActiveForm::begin(['id' => 'configure-form', 'enableClientValidation' => false, 'enableClientScript' => false]); ?>

            <?= $form->field($model, 'enabled')->checkbox(); ?>

            <br/>
            <?= $form->field($model, 'clientId'); ?>
            <?= $form->field($model, 'clientSecret'); ?>

            <br/>
            <?= $form->field($model, 'issuerUrl')->textInput(); ?>

            <?= $form->field($model, 'cssIcon')->widget(IconPicker::class); ?>

            <?= $form->field($model, 'buttonLabel')->textInput(); ?>


            <br/>
            <?= $form->field($model, 'redirectUri')->textInput(['readonly' => true]); ?>
            <br/>

            <?= Button::save()->submit() ?>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
