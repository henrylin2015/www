<?php
/**
 * 这个类是帮助查询自己公司的数据和自己添加的数据帮助类
 */
class Helper{
	/**
	 * this is method select my company data
	 * 这个方法是查询自己公司的数据
	 * return company id
	 * 返回公司数据的id
	 * 主要查询的是user_dashboard这个表的数据
	 */
	public static function SelectModule($company_id,$module){
		$dashboard = User_dashboard::model();
		$dbCri = new CDbCriteria();
		$dbCri->select = "module_id";
		$dbCri->addCondition("usercomp_id = :company_id  AND  module = :module");
		$dbCri->params[":company_id"] = $company_id;
		$dbCri->params[":module"] = $module;
		$infos = $dashboard->findAll($dbCri);
		$dashBoardIdArray = array();
		if(!empty($infos)){
			foreach ($infos as $v) {
				$dashBoardIdArray[]= $v['module_id'];
			}
		}
		return $dashBoardIdArray;
	}
	
	/**
	 * this is method select user_mylist_cont数据
	 * 返回module_id组成的数组（这个提供下面查询）
	 */
	public static function SelectMyModule($module,$myId){
		/**
		 * 1.取出用户信息
		 */
		$user =Tools::User();
		//select user_mylist_cont
		$mylistCount = User_mylist_cont::model();
		$countCri = new CDbCriteria();
		$countCri->select = "module_id";
		$countCri->addCondition("user_id=:id AND  module = :module AND mylist_id = :list_id");
		$countCri->params[':id'] = $user->id;
		$countCri->params[":module"] = $module;
		$countCri->params[":list_id"] = $myId;
		$infos = $mylistCount->findAll($countCri);
		$array_ids = array();
		if(!empty($infos)){
			foreach ($infos as $v) {
				$array_ids[]= $v['module_id'];
			}
		}
		return $array_ids;
	}
	
}






