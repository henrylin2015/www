<?
class MySiteController extends BaseController{
	
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
		$module = "mrd_site";
		
		
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
		
		$phmMain =  Ste_main::model();
		$phmCri = new CDbCriteria();
		$phmCri->addInCondition("siteclin_id", $dashBoardIdArray);
		$total = $phmMain->count($phmCri);
		$this->render("mySite_index",array('myList'=>$list,'countList'=>$countList,'total'=>$total,"module"=>$module));
	}
	
	
	/**
	 * list page 
	 */
	public function actionList(){
		
		$titleName = "";
		if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="module"){
			$titleName = "HMPL  Site";
		}else if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			$user_mylist = User_mylist::model();
			$cri = new CDbCriteria();
			$cri->select = "name";
			$cri->addCondition("mylist_id = :myId");
			$cri->params[":myId"]=$_REQUEST["myId"];
			$info = $user_mylist->find($cri);
			$titleName = $info['name'];
		}
		$ste_deptmoh = Ste_deptmoh::model();
        $stedeptmohCri = new CDbCriteria();
        $stedeptmohCri->addCondition(" sort_no <>0  ORDER by sort_no");
        $deptments = $ste_deptmoh->findAll($stedeptmohCri);
		
		$this->render("mySite_list",array("titleName"=>$titleName,"deptments"=>$deptments));
	}
	
	/**
	 * list ajax tabledata 
	 */
	public function actionAjaxList(){
		/*
		 * 公司id
		 * company_id 
		 */
		$company_id = 1;
		/**
		 * module
		 */
		$module = "mrd_site";
		
		$arr_json = array();
		$steMail = Ste_main::model();
		$cri = new CDbCriteria();
		
		
		/**
		 * 判断是自己公司还是自己添加的数据
		 */
		if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
			/**
			 * 自己公司数组
			 */
			$arrayId = Helper::SelectModule($company_id, $module);
			
			$cri->addInCondition("siteclin_id", $arrayId);
		}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			/**
			 * 自己添加的数据
			 */
			$arrayId = Helper::SelectMyModule($module, $_REQUEST['myId']);
			$cri->addInCondition("siteclin_id", $arrayId);
		}

		$ste_deptmoh = Ste_deptmoh::model();
        $stedeptmohCri = new CDbCriteria();
        $stedeptmohCri->addCondition(" sort_no <>0  ORDER by sort_no");
        $deptments = $ste_deptmoh->findAll($stedeptmohCri);
		//search 
		if(!empty($_REQUEST['search_site'])){
        	$cri->addCondition(" keyword like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search_site'])."%";
        }
		if(!empty($_REQUEST['search']['value'])){
        	$cri->addCondition(" keyword like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search']['value'])."%";
        }
        //filter
        //1.therapetic area
        if (!empty($_REQUEST['ta'])) {
            $ta = $_REQUEST['ta'];
            if (count($ta) == 1) {
            	$str="";
            	foreach($deptments as $v){
            		if($v->dept_cn==$ta[0] || $v->dept_en==$ta[0]){
            			$str = $v->code;
            		}
            	}
                $cri->addCondition("dept_moh LIKE '|".$str."%|'", 'AND');
            } elseif (count($ta) > 1) {
                $str = "";
                foreach ($ta as $v) {
                	foreach($deptments as $v1){
            		if($v1->dept_cn==$v || $v1->dept_en==$v){
            			//$str = $v->code;
            			$str .="dept_moh LIKE '|".$v1->code."%|'  or  ";
            		}

            	}
                    
                }
                $str = substr($str, 0, -4);
                $cri->addCondition($str, 'AND');
            }
        }
        //3.City
        if (!empty($_REQUEST['cl'])) {
            $cl = $_REQUEST['cl'];
            if (count($cl) == 1) {
                $cri->addCondition("city_level LIKE '%".$cl[0]."%'", 'AND');
            } elseif (count($cl) > 1) {
                $str = "";
                foreach ($cl as $v) {
                	$str .="city_level LIKE '%".$v."%'  or  "; 
                }
                $str = substr($str, 0, -4);
                $cri->addCondition($str, 'AND');
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
        }

        $total = $steMail->count($cri);
		$infos = $steMail->findAll($cri);
		$jsonData = array();
		$jsonMap = array();
		$strObj = "";
		if(!empty($infos)){
			foreach ($infos as $key => $value) {
				$temp['siteclin_id'] = '<input type="checkbox" class="checkboxes" name="id[]" value="'.$value['siteclin_id'].'">';
				$temp['TA_cert'] = $value['TA_cert'];
				//$temp['hospname_cn'] = $value['hospname_cn'];
				$temp['hospname_cn'] = "<a href='".$this->createUrl('site/single'
				,array('id'=>$value['siteclin_id']))."' title='".$value['hospname_cn']."'>".$value['hospname_cn']."</a>";
				$temp['province'] = $value['province']; //??
				$temp['city'] = $value['city']; //??
				$temp['issuedate_sitecert'] = $value['issuedate_sitecert'];
				$temp['expirdate_sitecert'] = $value['expirdate_sitecert'];
				$temp['count_trl_5completed'] = $value['count_trl_5completed'];
				$temp['count_trl_ongoing'] = $value['count_trl_ongoing'];
				$temp['count_trl_drug'] = $value['count_trl_drug'];
				$temp['count_trl_china'] = $value['count_trl_china'];
				$temp['NewActivity'] = $value['NewActivity']; //??
				if(!empty($value['lat']) && !empty($value['lng'])){
					$map['latLng'][0] = $value['lat'];
					$map['latLng'][1] = $value['lng'];
					//hospitial name
					if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
						if(!empty($value->hospname_cn)){
							$map['name'] = $value['hospname_cn'];
						}else{
							$map['name'] = $value['hospname_en'];
						}	
					}else{
						if(!empty($value->hospname_en)){
							$map['name'] = $value['hospname_en'];
						}else{
							$map['name'] = $value['hospname_cn'];
						}
					}
				}
				
				array_push($jsonData,$temp);
				array_push($jsonMap,$map);
				
			}
			
		}

		$arr_json['recordsTotal']=$total;
   		$arr_json['recordsFiltered']=$total;
		$arr_json['jData']=$jsonMap;
    	$arr_json['data']=$jsonData;
    	echo CJSON::encode($arr_json);
		
	}

}



















