<?php
class MyDrugController extends  BaseController{
	/**
	 * my drug list page
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
		$module = "mrd_drug";
		
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
		
		$drgMain =  Drg_main::model();
		$drgCri = new CDbCriteria();
		$drgCri->addInCondition("mrd_drug_id", $dashBoardIdArray);
		$total = $drgMain->count($drgCri);
		$this->render("myDrug_index",array('myList'=>$list,'countList'=>$countList,'total'=>$total));
	}

	/**
	 * list page 
	 */
	public function actionList(){
		
		$titleName = "";
		if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="module"){
			$titleName = "HMPL  Drug";
		}else if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			$user_mylist = User_mylist::model();
			$cri = new CDbCriteria();
			$cri->select = "name";
			$cri->addCondition("mylist_id = :myId");
			$cri->params[":myId"]=$_REQUEST["myId"];
			$info = $user_mylist->find($cri);
			$titleName = $info['name'];
		}
		$this->render("myDrug_list",array("titleName"=>$titleName));
	}
	
	/**
	 * ajax list
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
		$module = "mrd_drug";
		
		$drugMain = Drg_main::model();
		$cri = new CDbCriteria();
		
		
		/**
		 * 判断是自己公司还是自己添加的数据
		 */
		if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
			/**
			 * 自己公司数组
			 */
			$arrayId = Helper::SelectModule($company_id, $module);
			
			$cri->addInCondition("mrd_drug_id", $arrayId);
		}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			/**
			 * 自己添加的数据
			 */
			$arrayId = Helper::SelectMyModule($module, $_REQUEST['myId']);
			$cri->addInCondition("mrd_drug_id", $arrayId);
		}
		
		if(!empty($_REQUEST['search']['value'])){
        	$cri->addCondition(" keyword like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search']['value'])."%";
        }
        if(!empty($_REQUEST['search_drug'])){
        	$cri->addCondition(" keyword like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search_drug'])."%";
        }
        //filter
        //1.Approval status
        if(!empty($_REQUEST['as'])){
        	$as = $_REQUEST['as'];
        	if(count($as)==1){
				if($as[0]=="Approved"){
					
        			$cri->addCondition('status =:status','AND');
        			$cri->params[':status']= 9;
        		}else if($as[0]=="Investigational"){
        			$cri->addCondition('status < :status','AND');
        			$cri->params[':status']= 9;
        		}else{
					$cri->addCondition('status =:status or status < :status','AND');
					$cri->params[':status']= 9;
				}
        	}
        }
        //2.Drug origin
        if(!empty($_REQUEST['do'])){
        	$do = $_REQUEST['do'];
        	if(count($do)==1){
        		if($do[0]=="Domestic"){
        			$cri->addCondition('drug_origin =:drug_origin','AND');
        			$cri->params[':drug_origin']= 1;
        		}else if($do[0]=="Imported"){
        			$cri->addCondition('drug_origin =:drug_origin','AND');
        			$cri->params[':drug_origin']= 2;
        		}
        	}else{
        		$cri->addCondition('drug_origin =:drug_origin','AND');
        		$cri->params[':drug_origin']= 3;
        	}
        }
        //3.Marketing Status
        if(!empty($_REQUEST['ms'])){
        	$ms = $_REQUEST['ms'];
        	if(count($ms)==1){
        		if($ms[0]=="Prescription"){
        			$cri->addCondition('is_otc =:is_otc','AND');
        			$cri->params[':is_otc']= 0;
        		}else if($ms[0]=="OTC"){
        			$cri->addCondition('is_otc =:is_otc','AND');
        			$cri->params[':is_otc']= 1;
        		}
        	}else{
        		$cri->addCondition('is_otc =:is_otc or is_otc =:is_otc1','AND');
        		$cri->params[':is_otc']= 1;
        		$cri->params[':is_otc1']= 0;
        	}
        }
        //4.Drug category
        if(!empty($_REQUEST['dc'])){
        	$dc = $_REQUEST['dc'];
        	if(count($dc)==1){
        		if($dc[0]=="Small molecule"){
        			$cri->addCondition('drugcat like :drugcat ','AND');
        			$cri->params[':drugcat']='%'.$dc[0].'%';
        		}else if($dc[0]=="Biologics"){
        			$cri->addCondition('drugcat like :drugcat ','AND');
        			$cri->params[':drugcat']='%'.$dc[0].'%';
        		}else if($dc[0]=="TCM"){
        			$cri->addCondition('drugcat like :drugcat ','AND');
        			$cri->params[':drugcat']='%'.$dc[0].'%';
        		}else if($dc[0]=="Nutraceutical"){
        			$cri->addCondition('drugcat like :drugcat ','AND');
        			$cri->params[':drugcat']='%'.$dc[0].'%';
        		}
        	}else if(count($dc)>1){
        		$str="";
        		foreach ($dc as  $v) {
	        		$str .='drugcat like "%'.$v.'%" OR  ';
        		}
        		$str = substr($str,0,-4);
            	$cri->addCondition($str,'AND');
        	}
        }
        //5.Product tag
        if(!empty($_REQUEST['pt'])){
        	$pt = $_REQUEST['pt'];
        	if(count($pt)==1){
        		if($pt[0]=="Patented drug"){
        			$cri->addCondition('is_patented =:is_patented','AND');
        			$cri->params[':is_patented']=1;
        		}else{
        			$cri->addCondition('is_patented =:is_patented','AND');
        			$cri->params[':is_patented']=0;
        		}
        	}else{
        		$cri->addCondition('is_patented =:is_patented OR is_patented =:is_patented1','AND');
        		$cri->params[':is_patented']=0;
        		$cri->params[':is_patented1']=1;
        	}
        }
        //6.Category
        if(!empty($_REQUEST['drg_cat']))
	      {
	        $category=$_REQUEST['drg_cat'];
	          if( count($category)== 1){
	            $category_ids = $this->getSubMrdCategory($category[0]);
	            $sqlStr="";
	            if(!empty($category_ids)){
	                foreach ($category_ids as $v){
	                    $sqlStr .=" category_id like '%,".$v['id'].",%'  or  ";
	                }
	                $sqlStr .=" category_id like '%,".$category[0].",%'  or  ";
	                 $sqlStr = substr($sqlStr,0,-4);
	            }
	            $cri->addCondition($sqlStr,"AND");
	          }else if(count($category)>1){
	            $str="";
	            foreach($category as $cate){
	                $categoryIds=$this->getSubMrdCategory($cate);
	                if(!empty($categoryIds)){
	                    foreach($categoryIds as $v){
	                        $str .="  category_id like '%,".$v['id'].",%'  or  ";
	                    }
	                }
	                $str .="  category_id like '%,".$cate.",%'  or  ";
	                
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
        }
        $total = $drugMain->count($cri);
        $drugInfo = $drugMain->findAll($cri);
        $jsonData = array();
        if(!empty($drugInfo)){
        	foreach($drugInfo as $drug){
        		$temp['mrd_drug_id'] ='<input type="checkbox" class="checkboxes" name="id[]" value="'.$drug['mrd_drug_id'].'">';
        		if(!empty($drug['api_cn'])){
					$temp['api_cn']="<a href='".$this->createUrl('drug/single'
						,array('id'=>$drug['mrd_drug_id']))."' title='".$drug['api_cn']."'>".$drug['api_cn']."</a>";
				}else{
					$temp['api_cn']="<a href='".$this->createUrl('drug/single'
						,array('id'=>$drug['mrd_drug_id']))."' title='".$drug['api_en']."'>".$drug['api_en']."</a>";
				}
				if(!empty($drug['status']) && $drug['status']==9){
					$temp['status']='Approved';
				}else if(!empty($drug['status']) && $drug['status'] < 9){
					$temp['status']='Investigational';
				}else{
					$temp['status']='--';
				}
				//drugcat
				$temp['drugcat'] = $drug['drugcat'];
				//is_patented
				if(!empty($drug['is_patented']) && $drug['is_patented']==1){
					$temp['is_patented'] = 'yes';
				}else{
					$temp['is_patented'] = 'no';
				}
				$temp['count_drug']=($drug['count_drug']."/".$drug['count_manuf']);
				$temp['count_drug_idl']=($drug['count_drug_idl']."/".$drug['count_manuf_idl']);
				$temp['count_drug_lml']=($drug['count_drug_lml']."/".$drug['count_manuf_lml']);
				if(!empty($drug['NewTrial'])){
					$arr= explode(",", $drug['NewTrial']);
					$str="";
					foreach ($arr as $v) {
						$arr1= explode(":", $v);
						$str .="<a href='".$this->createUrl('trials/singe',array('id'=>$arr1[0]))."' title='".$arr1[1]."'>"
						.$arr1[1]."</a><br>";
					}
					$temp['NewTrial'] = $str;
				}else{
					$temp['NewTrial'] = $drug['NewTrial'];
				}
				
				$temp['Competitor'] = $drug['Competitor'];
        		array_push($jsonData,$temp);
        	}
        }
        $arr_json= array();
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;

	    echo CJSON::encode($arr_json);
	}
}















