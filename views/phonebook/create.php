<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */

$this->title = 'Create Phonebook';
$this->params['breadcrumbs'][] = ['label' => 'Phonebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
