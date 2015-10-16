
<?php
class User_dashboard extends MyActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'user_dashboard';
	}
	public function relations(){
		return array(
			//'drugbank' => array(self::BELONGS_TO, 'Drugs', 'drugbank_id'),
			//'myList' => array(self::BELONGS_TO,'User_mylist','mylist_id'),
		);
	}
}