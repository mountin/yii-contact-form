<?php
/* @var $this AddressController */

$this->breadcrumbs=array(
	'Address'=>array('/address'),
	'Add',
);
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/jquery.mask.min.js');
$cs->registerScriptFile($baseUrl.'/js/task1.js');
$cs->registerScriptFile("https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initAutocomplete", CClientScript::POS_END,array('async defer'));
$cs->registerCssFile("https://fonts.googleapis.com/css?family=Roboto:300,400,500");

?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	Adding new address
<div id="formResult" style="color:green; font-size: 24px"></div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', [
    'id'=>'my-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation' => true,
    'clientOptions'=>[
        'validateOnSubmit'=>true,
        'afterValidate' => 'js:ajaxCheckOrder',
    ]
]); ?>
<?php echo $form->errorSummary($model); ?>
<div class="row">
    <?php echo $form->labelEx($model,'address1'); ?>
    <?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>128, "class"=>'autocomplete')); ?>
    <?php echo $form->error($model,'address1'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'address2'); ?>
    <?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->error($model,'address2'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'city'); ?>
    <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->error($model,'city'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'state'); ?>
    <?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->error($model,'state'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'zip'); ?>
    <?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->error($model,'zip'); ?>
</div>

    <div class="row">
        <?php echo $form->labelEx($model,'extrafield'); ?>
        <?php echo $form->textField($model,'extrafield',array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'extrafield'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'phone'); ?>
        <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>128, 'data-mask'=> "00/00/0000")); ?>
        <?php echo $form->error($model,'phone'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'url'); ?>
        <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128, 'data-mask'=> "00/00/0000")); ?>
        <?php echo $form->error($model,'url'); ?>
    </div>



    <div class="row buttons">
</div>


<div    class="row">
    <?php echo CHtml::SubmitButton('Save Changes');?>
    <?php $this->endWidget(); ?>

</div>
</div>
<!-- form -->

</p>
