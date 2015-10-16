<?php
class Phm_subcomp extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'phm_subcomp';
	}
	public function relations(){
		return array(
			'phmMain'=>array(self::BELONGS_TO,'Phm_main','mrd_pharma_id'),
		);
	}
}