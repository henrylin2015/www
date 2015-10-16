<?php
class Phm_news extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'phm_news';
	}
	public function relations(){
		return array(
			'phmMain'=>array(self::BELONGS_TO,'Phm_main','mrd_pharma_id'),
		);
	}
}