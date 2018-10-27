<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
$this->title = 'Создание Пользователя';
$this->params['breadcrumbs'][0] = "Панель Администратора";
$this->params['breadcrumbs'][1]= $this->title;
if($addition!=null)
    echo("<h2>$addition</h2>");
?>
<div class="UserForm">

    <?php $form = ActiveForm::begin(['id'=>'form-signup']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus'=>true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'surname') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'isAdmin')->checkbox(['value'=>'1']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- UserW -->
