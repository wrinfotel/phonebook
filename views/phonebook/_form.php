<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phonebook-form" >
	<div class="alert alert-success" style="display: none">
	  <strong>Изменения сохранены</strong>
	</div>
	<?php Pjax::begin(['id' => 'update_user']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true, 'class' => 'update-form'], 'action' => Url::to(['phonebook/update', 'id' => $model->id])]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-success', 'onclick' => 'saveChanges(); return false;']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	<?php Pjax::end(); ?>
</div>
