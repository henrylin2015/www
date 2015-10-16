<?php
class Drg_category extends  CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public  function tableName()
	{
		return 'drg_category';
	}
}