<?php
class Dis_main extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'dis_main';
	}
}