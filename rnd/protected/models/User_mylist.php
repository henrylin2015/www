<?php
class User_mylist extends MyActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'user_mylist';
	}
	public function relations(){
		return array(
			//'drugbank' => array(self::BELONGS_TO, 'Drugs', 'drugbank_id'),
			'listCount' => array(self::HAS_MANY,'User_mylist_cont','mylist_id'),
		);
	}
}