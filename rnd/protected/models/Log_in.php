<?php
class Log_in extends MyActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'log_in';
	}
}