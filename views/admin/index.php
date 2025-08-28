<?php
/* @var $this \humhub\components\View */
/* @var $model \humhubContrib\auth\konnect\models\ConfigureForm */

use humhub\modules\ui\form\widgets\IconPicker;
use humhub\widgets\form\ActiveForm;
use yii\helpers\Html;

?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AuthKonnectModule.base', '<strong>Kopano Connect</strong> Sign-In configuration') ?></div>

        <div class="panel-body">
            <p>
                <?= Html::a(Yii::t('AuthKonnectModule.base', 'Kopano Connect Documentation'), 'https://documentation.kopano.io/user_manual_webapp//settings.html', ['class' => 'btn btn-primary float-end btn-sm', 'target' => '_blank']); ?>
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

            <div class="mb-3">
                <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
