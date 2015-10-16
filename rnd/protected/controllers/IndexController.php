<?php
class IndexController extends BaseController{
	public function actionIndex(){
		$this->PageTitle="welcome  index";
		if(!empty(Yii::app()->session['userKey'])){
			$userKey =  Yii::app()->session['userKey'];
		}
		$user =Tools::User();
		$userMyList = User_mylist::model();
		$cri = new  CDbCriteria();
		$cri->addCondition('user_id =:id');
		$cri->params[':id']=$user->id;
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
		$countCri->addCondition("user_id=:id");
		$countCri->params[':id'] = $user->id;
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
			$pharma=new CHttpCookie('mrd_pharma',count($cartCount['mrd_pharma']));  
			Yii::app()->request->cookies['mrd_pharma']=$pharma; 
			//product
			$product=new CHttpCookie('mrd_drug',count($cartCount['mrd_drug']));  
			Yii::app()->request->cookies['mrd_drug']=$product;
			//site
			$site=new CHttpCookie('mrd_site',count($cartCount['mrd_site']));  
			Yii::app()->request->cookies['mrd_site']=$site;
			//doctor
			$doctor=new CHttpCookie('mrd_doctor',count($cartCount['mrd_doctor']));  
			Yii::app()->request->cookies['mrd_doctor']=$doctor;
			//trials
			$trial=new CHttpCookie('mrd_trial',count($cartCount['mrd_trial']));  
			Yii::app()->request->cookies['mrd_trial']=$trial;
			//reg
			$reg=new CHttpCookie('mrd_reg',count($cartCount['mrd_reg']));  
			Yii::app()->request->cookies['mrd_reg']=$reg;
		}
		$this->render("index",array('userKey'=>$userKey,'myList'=>$list,'countList'=>$countList));
	}
}