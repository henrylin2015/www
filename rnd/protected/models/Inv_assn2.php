<?php
class Inv_assn2 extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'inv_assn2';
	}
}