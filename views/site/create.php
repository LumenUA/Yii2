<h1>Редактор</h1>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h3>Создать</h3>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-6">
		<?= $form->field($model, 'post')->textInput() ?>
	</div>

	<div class="col-md-12">
		<?= Html::submitButton('Создать', ['class'=>'btn btn-success']) ?>
	</div>
</div>
<?php ActiveForm::end(); ?>
