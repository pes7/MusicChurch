<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Media */
/* @var $form ActiveForm */
?>
<div class="MediaW">
    <?php if(isset($succes)){echo("<h2>$succes</h2>");}?>
    <?php $form = ActiveForm::begin(['id'=>'form-signup']); ?>
        
        <?= $form->field($model, 'referenceIdPartitura') ?>
        <?= $form->field($model, 'referenceIdNews') ?>
        <?= $form->field($model, 'referenceIdGallery') ?>
        <?= $form->field($model, 'caption') ?>
        <?= $form->field($model, 'src') ?>


        <?= $form->field($model, 'con')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- MediaW -->
