<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\blog\models\Post */
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
