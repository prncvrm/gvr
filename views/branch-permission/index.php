<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Users;
use app\models\Branch;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BranchPermissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branch Permissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-permission-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'UserName',
            /*['attribute'=>'UsersName',
            'label'=>'User Name',
            'value'=>function($model){
                return ;
            }
            ],*/
            /*only god and me knew back then while coding this part, now, no one does */
            ['attribute'=>'UserType',
            'label'=>'Branches',
             //'contentOptions' => ['class'=>'badge badge-success'],
             'value'=>function($model) use($_model){
                //print_r($_model);
                $UserType=\yii\helpers\ArrayHelper::map(Branch::find()->all(),'id','value');
                $rtn =""; 
                if(array_key_exists($model->id,(\yii\helpers\ArrayHelper::map($_model->branches, 'id', 'Branch','Users')))){
                    foreach((\yii\helpers\ArrayHelper::map($_model->branches, 'id', 'Branch','Users')[$model->id]) as $ty)
                        $rtn=$rtn.", ||".$UserType[$ty]." ||"; 
                 //$rtn = $rtn.",".Html::tag('span', $UserType[$ty], ['class'=>'badge badge-success']);
                }
                return $rtn;
               // return $model->id;
            },
            ],

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template'=>'{update}',
            'buttons'=>[
                'update'=>function($url,$model){
                    //passing user id here to update
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>','add-branch?id='.$model->id,['title'=>'Configure']);
                }
            ],
            ],
        ],
    ]); ?>
</div>
