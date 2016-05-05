<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\blog\models\Post */

// $this->title = $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>
    <div class="panel panel-default">
        <div class="panel-heading"><?= $model->textprewie?></div>
        <div class="panel-body">
            <?= $model->post ?>
        </div>
    </div>

</div>
