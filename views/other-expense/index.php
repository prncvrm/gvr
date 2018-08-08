<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OtherExpenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Other Expense';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-2">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
    <label>Purpose Of Travel : </label><br>
    <?= $GeneralInModel->PurposeOfTour;?><br>
    <label>From Date : </label><br>
    <?= $GeneralInModel->From;?><br>
    <label>To Date : </label><br>
    <?= $GeneralInModel->To;?><br>
</div>
</div>
</div>
</div>
    <?= $this->render('_form', [
        'model' => $model,'TGI_id'=>$GeneralInModel->id,
    ])?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Date',
            'Particulars',
            'Amount',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{delete}'],
        ],
    ]); ?>
