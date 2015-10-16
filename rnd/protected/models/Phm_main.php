<?php
class Phm_main extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'phm_main';
	}
	public function relations(){
		return array(
			//'drugbank' => array(self::BELONGS_TO, 'Drugs', 'drugbank_id'),
			//'siteTrials'=>array(self::HAS_MANY,'SteTrials','mrd_trial_id'),
			'sub'=>array(self::HAS_MANY,'Phm_subcomp','parent_id'),
			'news'=>array(self::HAS_MANY,'Phm_news','mrd_pharma_id'),
			'approved'=>array(self::HAS_MANY,'Phmdrg_approved','mrd_pharma_id'),
			'investigational'=>array(self::HAS_MANY,'Phmdrg_investigational','mrd_pharma_id'),
		);
	}
}