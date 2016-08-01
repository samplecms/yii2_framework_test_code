<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Albums */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Albums',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Albums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="albums-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
