<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
/* @var $users */
$this->title = 'Все пользователи';
$this->params['breadcrumbs'][0] = "Панель Администратора";
$this->params['breadcrumbs'][1]= $this->title;
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php
                foreach ($users as $model) {
                    $status = $model->isAdmin==1?"admin":"user";
                    echo ("<div>$model->name $model->surname Статус:$status<a class='btn btn-default' href='?action=deleteUser&id=$model->id'>X</a></div>");
                }
                echo($point);
            ?>
        </div>

    </div>
</div>
