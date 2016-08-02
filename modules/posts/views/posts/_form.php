<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form yii\widgets\ActiveForm */
$c =  \app\models\Category::find()->all();
foreach($c as $v){
    $category[(string)$v['_id']] = $v['title'];
}
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'category_id')->dropDownList($category); ?>


    <?= $form->field($model, 'content')
    ->widget(\yii\redactor\widgets\Redactor::className(),['clientOptions'=>[
            'lang'=>'zh_cn',
        ]]);
    //->textarea(['rows'=>3]); 

    ?>

    <?php
    /*echo  $form->field($model, 'create_at')->widget(DatePicker::className(), ['clientOptions' => [
    'defaultDate' => date('Y-m-d',time()),
    'dateFormat' => 'yyyy-MM-dd',
    ]]) */  ?>

    

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'status')->dropDownList( [
            1=>yii::t('app','Yes'),
            0=>yii::t('app','No'),
        
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
