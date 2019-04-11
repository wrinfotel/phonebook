<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PhonebookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Телефонный справочник';
$this->params['breadcrumbs'][] = $this->title;

?>
<script>



</script>
<div class="phonebook-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="row">
		<div class="col-sm-6">
			<?= $this->render('_newUser', [
				'model' => $model,
			]) ?>
			<?php Pjax::begin(['id' => 'users']) ?>
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'rowOptions' => function ($model, $key, $index, $grid) {
					return ['id' => $model['id'], 'style' => "cursor: pointer", 'onclick' => 'openEdit(this.id);'];
				},
				'columns' => [
					
					'surname',
					'name',
				
				],
			]); ?>
			<?php Pjax::end() ?>
		</div>
		<div class="col-sm-6">
			<?php Pjax::begin(['id' => 'edit_user']) ?>
			
			<?php Pjax::end() ?>
		</div>
	</div>

</div>
