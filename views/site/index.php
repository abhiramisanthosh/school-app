<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\User;
use yii\helpers\Html; 

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    
    <div class="body-content">
    <?php
    if(Yii::$app->user->identity!=''){?>
     <h1>Welcome <?=Yii::$app->user->identity->username?></h1>
     
    <table border="1px" width="100%">
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Date of Birth</td>
            <td>Email</td>
            <td>Gender</td>
            <tD>Action</td>
        </tr>
        <tr>
        <?php
        $user_id = Yii::$app->user->identity->id;
        ?>
         <td><?=Yii::$app->user->identity->attributes['fname']?></td>
         <td><?=Yii::$app->user->identity->attributes['lname']?></td>
         <td><?=Yii::$app->user->identity->attributes['dob']?></td>
         <td><?=Yii::$app->user->identity->attributes['email']?></td>
         <td><?=Yii::$app->user->identity->attributes['gender']?></td>

         
         <td><?php echo Html::a('Update Details', array('site/update', 'id'=>$user_id), array('class'=>'icon icon-trash')); ?></td>
        </tr>
        <?php
        
        //echo"<pre>";
        //print_r(Yii::$app->user->identity->attributes);
        ?>
    </table>
    <?php }?>
    </div>
</div>
