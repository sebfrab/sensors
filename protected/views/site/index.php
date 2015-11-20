<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certificado-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
        
        <div class="form-group">
            <b>Certificado de alumno regular: </b>
            <i>Certifica la calidad de ser alumno regular en la Escuela Naval "Arturo Prat".</i>
        </div>
    
	<div class="form-group">
		<?php echo $form->labelEx($modelSensor,'idsensor', array('class'=>'control-label')); ?>
                <?php echo $form->dropDownList($modelSensor, 'idsensor', Sesor::model()->getListSensor(),
                        array('empty'=>'seleccione sensor', 'class'=>'form-control')); ?>
		<?php echo $form->error($modelSensor,'idsensor', array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Solicitar' : 'Solicitar', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



<div>
    <div>
        <canvas id="canvas"></canvas>
    </div>
</div>

<script>
    var lineChartData = {       
        labels : [<?php foreach($model as $m){ echo "'".$m->fecha."',";}?>],
            datasets : [
                {
                label: "My First dataset",
                fillColor : "rgba(220,220,220,0.2)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(220,220,220,1)",
                data : [<?php foreach($model as $m){ echo "'".$m->valor."',";}?>]
                },
            ]
    }

    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
	window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });
    }
</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/Chart.js"></script>