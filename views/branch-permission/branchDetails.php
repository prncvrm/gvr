<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Branch;
use app\models\BranchPermission;
use yii\Helpers\ArrayHelper;
?>
<?php $_branches=ArrayHelper::map(BranchPermission::findAll(['Users'=>$UserId]),'id','Branch');?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions'=>['class'=>'Branches'],
        'columns' => [

            [
            'class' => 'yii\grid\CheckboxColumn', 
            'checkboxOptions' => function($model) use ($_branches) {
                foreach($_branches as $u){
                    if($u==$model->id)
                        return ["checked"=>1];
                }
                return [""];

            },
             ],       
            //'id',
            ['attribute'=>'value',
            'label'=>'Branch Name',   
            ],
            
        ],
    ]); ?>
<?= Html::button($content='Submit',$options=['class'=>'btn btn-primary','id'=>'add_role'])?>
<script type="text/javascript">
    $('#w1-success').css('display','none');
    $('#add_role').click(function(){
        $('tr.Branches').each(function(){
            var Branch=$(this).attr('data-key');
            var BranchValue=$(this).children().find('input[type="checkbox"]')[0].checked;
            if(BranchValue==true){
                $.ajax({
                    type:'POST',
                    url:'create',
                    data:{'Branch':Branch,'Users':$("#branchpermission-users").val()},
                    success:function(response){
                        console.log("updated");
                    }
                });
            }
            else{
                $.ajax({
                    type:'POST',
                    url:'delete',
                    data:{'Branch':Branch,'Users':$("#branchpermission-users").val()},
                    success:function(response){
                        console.log("delted");
                    }
                });   
            }
        });
        $('#w1-success').html('<i class="icon fa fa-check"></i> Updated Successfully');
        $('#w1-success').css('display','block');

    });
</script>
