<?
class MyPublicationController extends BaseController{
	
	/**
	 * my pharma list page
	 */
	public function actionIndex(){
		/*
		 * 公司id
		 * company_id 
		 */
		$company_id = 1;
		/**
		 * module
		 */
		$module = "mrd_pub";
		
		
		$user =Tools::User();
		$userMyList = User_mylist::model();
		$cri = new  CDbCriteria();
		$cri->addCondition('user_id =:id  AND  module = :module');
		$cri->params[':id']=$user->id;
		$cri->params[":module"] = $module;
		$userMylistInfos = $userMyList->findAll($cri);
		$list = array();
		if(!empty($userMylistInfos)){
			foreach ($userMylistInfos as $key => $lists) {
				$list[$lists->module][] =$lists;
			}
		}
		//select user_mylist_cont
		$mylistCount = User_mylist_cont::model();
		$countCri = new CDbCriteria();
		$countCri->addCondition("user_id=:id AND  module = :module");
		$countCri->params[':id'] = $user->id;
		$countCri->params[":module"] = $module;
		$listCountInfo = $mylistCount->findAll($countCri);
		$countList = array();
		$cartCount = array(); //save session cart list
		if(!empty($listCountInfo)){
			foreach ($listCountInfo as $ct) {
				$countList[$ct->mylist_id][] = $ct;
				$cartCount[$ct->module][] = $ct;
			}
		}
		
		//save session cart
		//mrd_pharma
		if(!empty($cartCount)){
			//pharma
			$pharma=new CHttpCookie($module,count($cartCount[$module]));  
			Yii::app()->request->cookies[$module]=$pharma;
		}
		
		//自己公司的数据
		/*
		 * 公司id
		 * company_id 
		 */
		$company_id = 1;
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
		
		$phmMain =  Inv_main::model();
		$phmCri = new CDbCriteria();
		$phmCri->addInCondition("doctor_id", $dashBoardIdArray);
		//$total = $phmMain->count($phmCri);
		$total = 0;
		$this->render("myPublication_list",array('myList'=>$list,'countList'=>$countList,'total'=>$total,"module"=>$module));
	}
}
















