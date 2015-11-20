<?php

/**
 * This is the model class for table "valores".
 *
 * The followings are the available columns in table 'valores':
 * @property integer $idvalores
 * @property string $fecha
 * @property integer $valor
 * @property integer $sensor_idsensor
 *
 * The followings are the available model relations:
 * @property Sensor $sensorIdsensor
 */
class Valores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'valores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sensor_idsensor', 'required'),
			array('valor, sensor_idsensor', 'numerical', 'integerOnly'=>true),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idvalores, fecha, valor, sensor_idsensor', 'safe', 'on'=>'search'),
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
			'sensorIdsensor' => array(self::BELONGS_TO, 'Sensor', 'sensor_idsensor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idvalores' => 'Idvalores',
			'fecha' => 'Fecha',
			'valor' => 'Valor',
			'sensor_idsensor' => 'Sensor Idsensor',
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

		$criteria->compare('idvalores',$this->idvalores);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('sensor_idsensor',$this->sensor_idsensor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Valores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
