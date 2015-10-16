<?php
class Phmdrg_investigational extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'phmdrg_investigational';
	}
	public function relations(){
		return array(
			//'drugbank' => array(self::BELONGS_TO, 'Drugs', 'drugbank_id'),
			//'siteTrials'=>array(self::HAS_MANY,'SteTrials','mrd_trial_id'),
			'phmMain'=>array(self::BELONGS_TO,'Phm_main','mrd_pharma_id'),
		);
	}
}