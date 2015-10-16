<?php
class 	CommonController extends  BaseController{
	
	/**
	 * save mylist data 
	 */
	 
	public function actionSaveUserMylist(){
		if(!empty($_POST['mrd_name']) && !empty($_POST['mrd_listIds']) && !empty($_POST['module_type']) && !empty($_POST['controller']) && !empty($_POST['action'])){
			$tableUserMyList = $this->SaveUserMyList($_POST['module_type'], $_POST['mrd_name']);
			if($tableUserMyList != 0){
				$userMyListCont = $this->getArrayUserMyListCont($tableUserMyList, $_POST['mrd_listIds'], $_POST['module_type'],array());
				//添加
				if($userMyListCont != 0 && $this->SaveManyUserMyListCont("user_mylist_cont", $userMyListCont)){
					Tools::getCookies($_POST['module_type']);
					Yii::app()->user->setFlash("success","操作成功！！！");
					$this->redirect(array($_POST['controller']."/".$_POST['action']));
				}else{
					Yii::app()->user->setFlash("error","操作失败！！！");
					$this->redirect(array($_POST['controller']."/".$_POST['action']));
				}
			}else{
				Yii::app()->user->setFlash("error","操作失败！！！");
				$this->redirect(array($_POST['controller']."/".$_POST['action']));
			}
		}else{
			Yii::app()->user->setFlash("error","操作失败！！！");
			$this->redirect(array($_POST['controller']."/".$_POST['action']));
		}
	}
	
	/**
	 * update mylist data 
	 */
	 
	public function actionUpdateUserMylist(){
		if(!empty($_POST['mrd_addIds']) && ($_POST['mrd_addIds'] !=0) && !empty($_POST['mrd_listIds']) && !empty($_POST['module_type']) && !empty($_POST['controller']) && !empty($_POST['action'])){
			//更新前先判断是否这些id在这个模块中添加过
			$selectUserMyListContArr = $this->getArray2ToArray($this->getSelectUserMyListCont($_POST['mrd_addIds']));
			$userMyListCont = $this->getArrayUserMyListCont($_POST['mrd_addIds'], $_POST['mrd_listIds'], $_POST['module_type'], $selectUserMyListContArr);
			if(!empty($userMyListCont) && ($userMyListCont !=0) && $this->SaveManyUserMyListCont("user_mylist_cont", $userMyListCont)){
				Tools::getCookies($_POST['module_type']);
				Yii::app()->user->setFlash("success","操作成功！！！");
				$this->redirect(array($_POST['controller']."/".$_POST['action']));
				exit();
			}
		}else{
			Yii::app()->user->setFlash("error","操作失败！！！");
			$this->redirect(array($_POST['controller']."/".$_POST['action']));
			exit();
		}
		Yii::app()->user->setFlash("error","操作失败！！！");
		$this->redirect(array($_POST['controller']."/".$_POST['action']));
		exit();
	}
	
	
	/****
	 * 操作user_mylist表中的数据
	 * 根据用户提交过来的id来更新这个id所对应的name的值
	 * 
	 */ 
	public function actionUpdataByIdUserList(){
		if(!empty($_POST['mrd_name']) && !empty($_POST['mrd_listId']) && !empty($_POST['controller']) && !empty($_POST['action'])){
			if(($this->updateByIdUserMyList($_POST['mrd_listId'], $_POST['mrd_name']))==1){
				Yii::app()->user->setFlash("success","操作成功！！！");
				$this->redirect(array($_POST['controller']."/".$_POST['action']));
				exit();
			}
		}
		Yii::app()->user->setFlash("error","操作失败！！！");
		$this->redirect(array($_POST['controller']."/".$_POST['action']));
		exit();
	}
	
	/**
	 * 操作user_mylist表中的数据
	 * 根据客户端提交过来的id来删除数据
	 */
	public function actionDeleteByIdUserList($mrd_id){
		$userMyList = User_mylist::model();
		$info = $userMyList->findByPk($mrd_id);
		if(!empty($info)){
			if($info->delete()){
				Tools::getCookies($_REQUEST['module_type']);
				Yii::app()->user->setFlash("success","操作成功！！！");
				$this->redirect(array($_REQUEST['controller']."/".$_REQUEST['action']));
				exit();
			}
		}
		Yii::app()->user->setFlash("error","操作失败！！！");
		$this->redirect(array($_REQUEST['controller']."/".$_REQUEST['action']));
		exit();
	}
	
	
	/**
	 * 这个方法是操作user_mylist表中的数据
	 * 通过接受id，name 来修改表中name的值
	 * 
	 */
	private function updateByIdUserMyList($id,$mrd_name){
		$userMyList = User_mylist::model()->findByPk($id);
		$userMyList->name = $mrd_name;
		return $userMyList->update()>0 ? 1:0;
	}
	
	/***
	 * this is method save table user_mylist data
	 * return id(last save id)
	 */
	public function SaveUserMyList($module,$name){
		$userMyList = new User_mylist();
		$userMyList->user_id = Tools::User()->id;
		$userMyList->module = $module;
		$userMyList->name = $name;
		if($userMyList->save()>0){
			return $userMyList->attributes['mylist_id'];
		}else{
			return 0;
		}
	}

	/***
	 * save many data table(user_mylist_cont)
	 * 	params:
	 *  $_files = array(
     *    array('name' => 'abc', 'size' => '12000'),
     *     array('name' => 'abc2', 'size' => '12000'),
     *     array('name' => 'abc3', 'size' => '12000')
     *   );
	 *  
	 *  $tableName： table name
	 *  这个方法是向user_mylist_cont添加模块的飞方法
	 */
    public function SaveManyUserMyListCont($tableName,$_files){
	    $db = Yii::app()->db2;
	    $transaction = $db->beginTransaction();
	    $command = $db->createCommand();
	    try {
	       if ($_files) {
	          foreach ($_files as $files) {
	            $command->reset();
	            foreach ($files as $k => $v) {
	              $columArray[$k] = $v;
	            }
	            $command->insert($tableName, $columArray);
	          }
	        }
	        $transaction->commit();
	        return true;
	     }catch (Exception $e) {
	        $transaction->rollback(); // 如果操作失败, 数据回滚
	        return false;
	     }
  	}
	
	/***
	 * 这个方法是把字符串转化为数组
	 * 转化后的格式为：
	 * $result = array(
	 *  	array('name'=>'zhangsan','sex'=>'男','size'=>'1200'),
	 * 		array('name'=>'lisi','sex'=>'女','size'=>'1200'),
	 * 		......
	 * );
	 * params:
	 * $string: string(字符串)
	 * 
	 * 
	 * 这个主要转化的是表为(user_mylist_cont)
	 */
	 public function getArrayUserMyListCont($addId,$string,$module_type,$arr){
	 	//把接受到的数据转换成数组
      	$array = explode(",", $string);
		$data = array();
		if(!empty($array)){
	        foreach($array as $k=>$v){
	        	 if(!(in_array($v,$arr))){
		          	$data[$k]['mylist_id'] = $addId;
		          	$data[$k]['user_id'] = Tools::User()->id;
		          	$data[$k]['module'] = $module_type;
		          	$data[$k]['module_id'] = $v;
				 }
	        }
      	}
		return !empty($data) ? $data : 0;
	 }
	 
	/***
	 * 根据module 和 user_id 来查询数据
	 */
	public function getSelectUserMyListCont($mrdAddId){
		$userMyListCont = User_mylist_cont::model();
		$cri = new CDbCriteria();
		$cri->select = "module_id";
		$cri->addCondition(" mylist_id = :id");
		$cri->params[":id"] = $mrdAddId;
		return $userMyListCont->findAll($cri);
	}
	
	/***
	 * 把二维数组转化为一维数组 这个是转化表为(user_mylist_cont)
	 */
	public function getArray2ToArray($array)
	{
		$arr = array();
		if(!empty($array)){
			foreach ($array as $k => $v) {
				$arr[$k] = $v->module_id;
			}
		}
		return $arr;
	}
}







