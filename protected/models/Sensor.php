<?php

/**
 * This is the model class for table "sensor".
 *
 * The followings are the available columns in table 'sensor':
 * @property integer $idsensor
 * @property string $descripcion
 * @property integer $minimo
 * @property integer $maximo
 *
 * The followings are the available model relations:
 * @property Valores[] $valores
 */
class Sensor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sensor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'required', 'except' => 'buscar'),
			array('minimo, maximo', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>45),
                    
			array('idsensor', 'required', 'on' => 'buscar'),
                    
			array('idsensor, descripcion, minimo, maximo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'valores' => array(self::HAS_MANY, 'Valores', 'sensor_idsensor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idsensor' => 'Sensor',
			'descripcion' => 'Descripcion',
			'minimo' => 'Minimo',
			'maximo' => 'Maximo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idsensor',$this->idsensor);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('minimo',$this->minimo);
		$criteria->compare('maximo',$this->maximo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sensor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        static function getListSensor(){
            $models = Sensor::model()->findAll(
                 array('order' => 'idsensor'));
            $list = CHtml::listData($models, 
                'idsensor', 'descripcion');
            return $list;
        }
        
        static function getSensorValores($idsensor = 1){
            $criteria=new CDbCriteria;
            $criteria->addCondition("t.sensor_idsensor=$idsensor");
            $criteria->limit = 7;   
            $model = Valores::model()->findAll($criteria);
            return $model;
        }
}
