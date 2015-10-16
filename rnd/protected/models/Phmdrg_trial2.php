
<?php
class Phmdrg_trial2 extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'phmdrg_trial2';
	}
	public function relations(){
		return array(
		);
	}
}