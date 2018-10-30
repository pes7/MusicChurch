<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Панель Администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <table borders = "1">
            <tr>
                <td>
                    <div calss="row">
                        <b><h3>Меню:</h3></b>
                        </div>
                    <div class="row">
                        <p><a class="btn btn-default" href="?action=createNewUser">Create New User</a></p>
                    </div>
                    <div class="row">
                        <p><a class="btn btn-default" href="?action=showAllUsers">Show All Users</a></p>
                    </div>
                    <div class="row">
                        <p><a class="btn btn-default" href="?action=createNewMedia">Add media</a></p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>