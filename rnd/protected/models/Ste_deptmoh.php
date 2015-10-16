<?php
class Ste_deptmoh extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'ste_deptmoh';
	}
}