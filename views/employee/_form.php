<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content">
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#generalInformation" data-toggle="tab">New User</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>
 <div class="row"><div class="col-md-6">
    <?= $form->field($model, 'EmployeeCode')->textInput(['maxlength' => true]) ?>
  </div><div class="col-md-6">
    <?= $form->field($model, 'EmployeeName')->textInput(['maxlength' => true]) ?>
</div></div>
<div class="row"><div class="col-md-6">
    <?= $form->field($model, 'DeviceName')->textInput(['maxlength' => true]) ?>
</div><div class="col-md-6">
    <?= $form->field($model, 'MacAddress')->textInput(['maxlength' => true]) ?>
</div></div>
    <div class="form-group">
        <?= Html::submitButton('Register', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


    
    


                </div>
</div>


              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

              
              <!-- /.tab-pane -->
            </div>
</section>


