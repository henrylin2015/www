<?php
class Inv_collaborator2 extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'inv_collaborator2';
	}
}