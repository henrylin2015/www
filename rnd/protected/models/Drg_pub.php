<?php
class Drg_pub extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'drg_pub';
	}
}