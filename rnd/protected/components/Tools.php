<?php
class Tools{

	/**
	 * 用来保存用户的信息
	 */
	public static function User(){
		$userUser = User_user::model();
		$cri = new CDbCriteria();
		$cri->addCondition("txn_id = :key");
		$cri->params[':key']=Yii::app()->session['userKey'];
		$info = $userUser->find($cri);
		return $info;
	}
	/**
	 * 这个方法是当添加和修改是的更新cookie
	 */
	public static function getCookies($modile_type){
		$mylistCount = User_mylist_cont::model();
		$countCri = new CDbCriteria();
		$countCri->addCondition("user_id=:id");
		$countCri->params[':id'] = Tools::User()->id;
		$listCountInfo = $mylistCount->findAll($countCri);
		$cartCount = array(); //save session cart list
		if(!empty($listCountInfo)){
			foreach ($listCountInfo as $ct) {
				$cartCount[$ct->module][] = $ct;
			}
		}
		if(!empty($cartCount)){
			$cookies=new CHttpCookie($modile_type,count($cartCount[$modile_type]));  
			Yii::app()->request->cookies[$modile_type]=$cookies; 
		}
	}
	
	/***
	 * 这个方法是获取每个模块包含的自己添加的的数据
	 */
	public static function getUserMyList($module_type){
		$userMyList = User_mylist::model();
        $userCri = new CDbCriteria();
		$userCri->select = "mylist_id,name";
        $userCri->addCondition(" module = :module AND user_id = :user_id  ORDER BY mylist_id ");
		$userCri->params[':module'] = $module_type;
		$userCri->params[':user_id'] = Tools::User()->id;
        $userMyListInfo = $userMyList->findAll($userCri);
		return $userMyListInfo;
	}
	
}





