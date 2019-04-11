<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $this->registerJs(
        '$("document").ready(function(){
            $("#new_user").on("pjax:end", function() {
            $.pjax.reload({container:"#users"});
        });
    });'
    );
?>

<div class="notes-form">
<?php Pjax::begin(['id' => 'new_user']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>
 
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
 
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Добавить'), ['class' => 'btn btn-primary']) ?>
    </div>
 
    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
 
</div>
