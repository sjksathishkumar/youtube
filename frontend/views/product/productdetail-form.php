<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\productColor;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <?php  $color=array(); foreach($modelProductProperty as $property)
                  {
                            if($property->label=='color')
                            {
                            
                          $color[$property->optionlabel]=$property->optionlabel;
                            }
                  }?>

<?php $form = ActiveForm::begin(['id' => 'productdetail-form']); ?>
   
               <div class="input_box fl valid_star_non"> <?= $form->field($model, 'quantity')->textInput(['maxlength' => 100,'class'=>'txt','placeholder'=>'Quantity'])->label(false); ?></div>
                <?= $form->field($model, 'product_id')->hiddenInput()->label(false);?>
               <?php if(count($color)>1)
               {?>

          <div class="right_sec_frm fr">    <?php //echo $form->field($model, 'color')->dropDownList( ArrayHelper::map(productColor::find()->where(['fkProductID'=> $model->product_id])->all(), 'id', 'color'),

                               // ['prompt'=>'Choose Color','class'=>'chosen-select'])->label(false);?>
              <?php echo $form->field($model, 'color')->dropDownList( $color,

                                ['prompt'=>'Choose Color','class'=>'chosen-select'])->label(false);?>
          </div>
                <?php ActiveForm::end(); ?>
               <?php }?>
               <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/js/chosen.jquery.js" type="text/javascript"></script>

   <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"100%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
	</script>