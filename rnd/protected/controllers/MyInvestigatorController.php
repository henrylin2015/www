<?
class MyInvestigatorController extends BaseController{
	
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
		$module = "mrd_doctor";
		
		
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
		
		$phmMain =  Inv_main::model();
		$phmCri = new CDbCriteria();
		$phmCri->addInCondition("doctor_id", $dashBoardIdArray);
		$total = $phmMain->count($phmCri);
		$this->render("myInvestigator_index",array('myList'=>$list,'countList'=>$countList,'total'=>$total,"module"=>$module));
	}

	
	/**
	 * list page 
	 */
	public function actionList(){
		
		$titleName = "";
		if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="module"){
			$titleName = "HMPL  Investigator";
		}else if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			$user_mylist = User_mylist::model();
			$cri = new CDbCriteria();
			$cri->select = "name";
			$cri->addCondition("mylist_id = :myId");
			$cri->params[":myId"]=$_REQUEST["myId"];
			$info = $user_mylist->find($cri);
			$titleName = $info['name'];
		}
		$this->render("myInvestigator_list",array("titleName"=>$titleName));
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
		$module = "mrd_doctor";
		
		
		$arr_json = array();
		$invMain = Inv_main::model();
		$cri = new CDbCriteria();

	
	
		/**
		 * 判断是自己公司还是自己添加的数据
		 */
		if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
			/**
			 * 自己公司数组
			 */
			$arrayId = Helper::SelectModule($company_id, $module);
			
			$cri->addInCondition("doctor_id", $arrayId);
		}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			/**
			 * 自己添加的数据
			 */
			$arrayId = Helper::SelectMyModule($module, $_REQUEST['myId']);
			$cri->addInCondition("doctor_id", $arrayId);
		}
		
		
		if(!empty($_REQUEST['search']['value'])){
        	$cri->addCondition(" name like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search']['value'])."%";
        }
        if(!empty($_REQUEST['search_investigator'])){
        	$cri->addCondition(" name like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search_investigator'])."%";
        }
        //search filter
        //1.Department
        if(!empty($_REQUEST['de'])){
          $de=$_REQUEST['de'];
          if( count($de)== 1 && count($de) >0){
              $cri->addCondition("department like :dept ",'AND');
              $cri->params[':dept'] = "%".$de[0]."%"; 
          }elseif(count($de)>1) 
          {
            $str="";
            foreach($de as $dt){
              $str .=" department like "."'%".$dt."%'  or  ";
            }
            $str = substr($str,0,-4);
            $cri->addCondition($str,'AND');
          }
        }
        //2.level  城市级别
        if (!empty($_REQUEST['level'])) {
            $level = $_REQUEST['level'];
            if (count($level) == 1) {
                $cri->addCondition("hospitals.city_level=" . "'" . $level[0] . "'", 'AND');
            } elseif (count($level) > 1) {
                $str = "";
                $str1 = "";
                foreach ($level as $v) {
                    $str .=" hospitals.city_level =" . "'" . $v . "'  or  ";
                }
                $str = substr($str, 0, -4);
                $cri->addCondition($str, 'AND');
            }
        }
        //3.is_kol
        if (!empty($_REQUEST['is_kol'])) {
            $is_kol = $_REQUEST['is_kol'];
                if($is_kol=="YES"){
                    $cri->addCondition("kol_tag is not null", 'AND');
                }
                else{
                    $cri->addCondition("kol_tag is null", 'AND');
                }
        }
        //4.$kol_tag
        if (!empty($_REQUEST['kol_tag'])) {
            $kol_tag = $_REQUEST['kol_tag'];
            if (count($kol_tag) == 1) {
                $cri->addCondition("kol_tag LIKE '%".$kol_tag[0]."%'", 'AND');
            } elseif (count($kol_tag) > 1) {
                $str = "";
                foreach ($kol_tag as $v) {
                    $str .="kol_tag LIKE '%".$kol_tag[0]."%'  or  ";
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
    	if(!empty($_REQUEST['order'][0]['dir'])){
            $cri->order=$_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
        }
        $total = $invMain->count($cri);
        $infos = $invMain->findAll($cri);
        $jsonData = array();
        if(!empty($infos)){
        	foreach ($infos as $key => $value) {
        		$temp['doctor_id']='<input type="checkbox" class="checkboxes" name="id[]" value="'.$value['doctor_id'].'">';
        		$temp['hospital_id'] = '??'; //??
        		$temp['name'] = "<a href='".$this->createUrl('investigator/single'
						,array('id'=>$value['doctor_id']))."' title='".$value['name']."'>".$value['name']."</a>";
        		$temp['hospital'] = $value['hospital'];
        		$temp['department'] = $value['department'];
        		$temp['kol_tag'] = $value['kol_tag'];
        		$temp['title_clinician'] = $value['title_clinician'];
        		$temp['Trial_disease'] = '??'; //??
        		$temp['specialized_indication']= $value['specialized_indication'];
        		$temp['count_5leadPItrials'] = $value['count_5leadPItrials']."/".$value['count_5PItrials'];
        		$temp['count_publication'] = $value['count_publication'];
        		$temp['awards'] = $value['awards'];//??
        		$temp['profess_involve'] =$value['profess_involve']; //??
        		$temp['trial_exp'] = "??"; //??
        		array_push($jsonData, $temp);
        	}
        }
        $arr_json['recordsTotal']=$total;
   		$arr_json['recordsFiltered']=$total;
    	$arr_json['data']=$jsonData;
    	echo CJSON::encode($arr_json);
		
	}
	
	
}
















