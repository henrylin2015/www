<?php
class Trl_main extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'trl_main';
	}
}