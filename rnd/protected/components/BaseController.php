<?php
class BaseController extends Controller{
	
	 public function init()
	{
		if (isset($_GET['lang']) && $_GET['lang'] != "") {  //通过lang参数识别语言

	      Yii::app()->language = $_GET['lang'];
	      $cookie = new CHttpCookie('lang', $_GET['lang']);
	      Yii::app()->request->cookies['lang'] = $cookie;
	    } elseif (isset(Yii::app()->request->cookies['lang']->value) && Yii::app()->request->cookies['lang']->value != "") {  //通过$_COOKIE['lang']识别语言
	      Yii::app()->language = Yii::app()->request->cookies['lang']->value;
	    }else{
	      //获取网站默认的语言
	      $lg = Yii::app()->language;
	      $cookie = new CHttpCookie('lang', $lg);
	      Yii::app()->request->cookies['lang'] = $cookie;
	    }
	    //login
	    if(!empty(Yii::app()->session['userKey'])){
	    	$userUser = User_user::model();
			$cri = new CDbCriteria();
			$cri->addCondition("txn_id = :key");
			$cri->params[':key']=Yii::app()->session['userKey'];
			$info = $userUser->find($cri);
			if($info ===null){
				$this->redirect(array("login/index"));
				exit();
			}
	    }else if(Yii::app()->session['userKey'] ==""){
				$this->redirect(array("login/index"));
				exit();
	    }
	    //loading
	    //$user =Tools::User();
	    //echo $user->first_name;
	}
}