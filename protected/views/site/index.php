
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            
            <h3>Visualizador de sensores</h3>
            
            <div class="form">
                <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'certificado-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                )); ?>
                        <?php //echo $form->errorSummary($modelSensor); ?>

                        <div class="input-group">
                            <?php echo $form->dropDownList($modelSensor, 'idsensor', Sensor::model()->getListSensor(),
                                        array('empty'=>'seleccione sensor', 'class'=>'form-control',
                                            'options'=> array($idSensor=>array('selected'=>'selected')) )); ?>
                            <span class="input-group-btn">
                                <?php echo CHtml::submitButton('Seleccionar', array('class'=>'btn btn-default')); ?>
                            </span>
                        </div>

                        <div class="form-group">
                                <?php echo $form->error($modelSensor,'idsensor', array('class'=>'alert alert-danger')); ?>
                        </div>

                <?php $this->endWidget(); ?>
                </div>
        </div>
    </div>
</div>





<div>
    <div>
        <canvas id="canvas"></canvas>
    </div>
</div>

<script>
    var lineChartData = {       
        labels : [<?php if(!empty($model)){ foreach($model as $m){ echo "'".$m->fecha."',";}}?>],
            datasets : [
                {
                label: "My First dataset",
                fillColor : "rgba(220,220,220,0.2)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(220,220,220,1)",
                data : [<?php if(!empty($model)){ foreach($model as $m){ echo "'".$m->valor."',";}}?>]
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