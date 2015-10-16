<?
class MyRegistrationController extends BaseController{
	
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
		$module = "mrd_reg";
		
		
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
		
		$phmMain =  Reg_main::model();
		$phmCri = new CDbCriteria();
		$phmCri->addInCondition("num_accept", $dashBoardIdArray);
		$total = $phmMain->count($phmCri);
		$this->render("myRegistration_index",array('myList'=>$list,'countList'=>$countList,'total'=>$total,"module"=>$module));
	}

	/**
	 * list page 
	 */
	public function actionList(){
		
		$titleName = "";
		if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="module"){
			$titleName = "HMPL  Registration";
		}else if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			$user_mylist = User_mylist::model();
			$cri = new CDbCriteria();
			$cri->select = "name";
			$cri->addCondition("mylist_id = :myId");
			$cri->params[":myId"]=$_REQUEST["myId"];
			$info = $user_mylist->find($cri);
			$titleName = $info['name'];
		}
		$this->render("myRegistration_list",array("titleName"=>$titleName));
	}
	
	/**
	 * list ajax tabledata 
	 */
	public function actionAjaxList()
	{
		/*
		 * 公司id
		 * company_id 
		 */
		$company_id = 1;
		/**
		 * module
		 */
		$module = "mrd_reg";
		
		
		$arr_json = array();
    	$regMain = Reg_main::model();
    	$cri = new CDbCriteria();
		
		/**
		 * 判断是自己公司还是自己添加的数据
		 */
		if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
			/**
			 * 自己公司数组
			 */
			$arrayId = Helper::SelectModule($company_id, $module);
			
			$cri->addInCondition("num_accept", $arrayId);
		}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			/**
			 * 自己添加的数据
			 */
			$arrayId = Helper::SelectMyModule($module, $_REQUEST['myId']);
			$cri->addInCondition("num_accept", $arrayId);
		}
		
    	//orderby
    	if(!empty($_REQUEST['search_reg'])){
        	$cri->addCondition(" keyword like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search_reg'])."%";
        }
    	if(!empty($_REQUEST['search']['value'])){
        	$cri->addCondition(" keyword like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search']['value'])."%";
        }
        //search filter
        //1.Drug Type
        if(!empty($_REQUEST['dt'])){
          	$dt=$_REQUEST['dt'];
          	if( count($dt)== 1 && count($dt) >0){
            	if(!empty($dt)){
               		$cri->addCondition("drugcat LIKE :drugType ",'AND');
               		$cri->params[':drugType']='%'.$dt[0].'%';
            	}
          	}else if(count($dt)>1){
            	$str="";
            	foreach($dt as $v){
                	 $str .="(drugcat LIKE '%".$v."%' )  or  ";
            	}
             	$str = substr($str,0,-4);
             	$cri->addCondition($str,'AND');
          }
        }
        //2.Application Type
      	if(!empty($_REQUEST['at'])){
          $at=$_REQUEST['at'];
          if( count($at)== 1){
            if(!empty($at)){
                if($at[0]=='仿制&已有国家标准'){
                    $cri->addCondition("appltype LIKE '%".'仿制'."%' OR appltype LIKE '%".'已有国家标准'."%' ",'AND');
                }
                else{
                    $cri->addCondition("appltype LIKE '%".$at[0]."%' ",'AND');
                }
            }
        }else if(count($at)>1){
            $str="";
            foreach($at as $v){
                if($v=='仿制&已有国家标准'){
                    $str .="(appltype LIKE '%".'仿制'."%' OR appltype LIKE '%".'已有国家标准'."%')  or  ";
                }
                else{
                 	$str .="(appltype LIKE '%".$v."%')  or  ";
                }
            }
             $str = substr($str,0,-4);
             $cri->addCondition($str,'AND');
          }
        }

        //3.Review Category
        if(!empty($_REQUEST['rc'])){
          $rc=$_REQUEST['rc'];
          if( count($rc)== 1 && count($rc) >0){
            if(!empty($rc)){
               $cri->addCondition("newaccepted_reviewcat = :rc",'AND');
               $cri->params[':rc'] = $rc[0];
            }
          }else if(count($rc)>1){
            $str="";
            foreach($rc as $v){
                 $str .="(newaccepted_reviewcat = '".$v."')  or  ";
            }
             $str = substr($str,0,-4);
             $cri->addCondition($str,'AND');
          }
        }
        
    if(!empty($_REQUEST['length'])){
			$cri->limit=$_REQUEST['length'];
		}else{
			$cri->limit=20;
		}
		if(!empty($_REQUEST['start'])){
      		$cri->offset=$_REQUEST['start'];
    	}
        //$cri->offset=$start;
        
        if(!empty($_REQUEST['order'][0]['dir'])){
            $cri->order=$_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
        }else{
        	$cri->order="num_accept desc";
        }
        
        $total = $regMain->count($cri);
        $infos = $regMain->findAll($cri);
        $jsonData = array();
        if(!empty($infos)){
        	foreach ($infos as $value) {
        		$temp['num_accept_id'] = '<input type="checkbox" class="checkboxes" name="id[]" value="'.$value['num_accept'].'">';
        		if(!empty($value['drugname'])){
        			$temp['drugname'] = "<a href='".$this->createUrl('registration/single'
						,array('id'=>$value['num_accept']))."' title='".$value['drugname']."'>".$value['drugname']."</a>";
        		}else{
        			$temp['drugname'] ="N/A";
        		}
        		
        		if(!empty($value['compname_reg'])){
        			$temp['compname_reg']= $value['compname_reg'];
        		}else{
        			$temp['compname_reg']="N/A";
        		}
        		$temp['drugcat'] = $value['drugcat'];
        		$temp['appltype'] = $value['appltype'];
        		$temp['regclass'] = $value['regclass'];
        		$temp['newaccepted_reviewcat'] = $value['newaccepted_reviewcat'];
        		$temp['num_accept'] = $value['num_accept'];
        		$temp['date_cdereceived'] = $value['date_cdereceived'];
        		$temp['date_appr_delivery'] = $value['date_appr_delivery'];
        		if(!empty($value['status_new_overall'])){
        			$temp['status_new_overall'] = $value['status_new_overall'];
        		}else{
					$temp['status_new_overall'] ="N/A";
        		}
        		$temp['new_activity'] = "TMP";
        		array_push($jsonData,$temp);
        	}

        }
        $arr_json['recordsTotal']=$total;
   		$arr_json['recordsFiltered']=$total;
    	$arr_json['data']=$jsonData;
    	echo CJSON::encode($arr_json);
		
	}
	
}
















