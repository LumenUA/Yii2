
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\blog\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Главная страница</h1>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    </p>
 <div class="row">
    <?php foreach ($model as $arr) { ?>
  <div class="col-sm-6 col-md-8">
    <div class="thumbnail">
<img src="<?=$arr->img?>">
      <div class="caption">
        <h3><?= $arr->textprewie ?></h3>
        <p><?=$arr->username?></p>
        <p><?=$arr->data?></p>
        <p><a href="/site/view?id=<?= $arr->id ?>" class="btn btn-primary" role="button">Button</a> </p>
      </div>
    </div>
  </div>
   <?php } ?>
</div>
</div>