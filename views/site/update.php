<?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
 
$this->title = 'Update';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1>Update User Details</h1>
    <p>Please Change the details</p>
    <div class="row">
        <div class="col-lg-5">
 
            <?php $form = ActiveForm::begin(['id' => 'form-signup','options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'fname') ?>
                <?= $form->field($model, 'lname') ?>
                <?= $form->field($model, 'gender')->radio(['label' => 'Male' , 'value'=>'Male','uncheck' =>'Null']) ?>
                <?= $form->field($model, 'gender')->radio(['label' => 'Female' , 'value'=>'Female','uncheck' =>'Null']) ?>
                <?= $form->field($model, 'email') ?>
             
                <?= $form->field($model, 'photo')->fileInput() ?>
                <?= $form->field($model, 'dob')->widget(\yii\jui\DatePicker::className(), [
    // if you are using bootstrap, the following line will set the correct style of the input field
    'options' => ['class' => 'form-control'],
    // ... you can configure more DatePicker properties here
]) ?>
                <div class="form-group">
                    <?= Html::submitButton('update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
 
        </div>
    </div>
</div>