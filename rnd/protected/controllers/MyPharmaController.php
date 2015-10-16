<?
class MyPharmaController extends BaseController{
	
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
		$module = "mrd_pharma";
		
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
		
		$phmMain =  Phm_main::model();
		$phmCri = new CDbCriteria();
		$phmCri->addInCondition("mrd_pharma_id", $dashBoardIdArray);
		$total = $phmMain->count($phmCri);
		$this->render("myPharma_index",array('myList'=>$list,'countList'=>$countList,'total'=>$total));
	}
	
	/**
	 * list page 
	 */
	public function actionList(){
		
		$titleName = "";
		if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="module"){
			$titleName = "HMPL  Pharma";
		}else if(!empty($_REQUEST["type"]) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			$user_mylist = User_mylist::model();
			$cri = new CDbCriteria();
			$cri->select = "name";
			$cri->addCondition("mylist_id = :myId");
			$cri->params[":myId"]=$_REQUEST["myId"];
			$info = $user_mylist->find($cri);
			$titleName = $info['name'];
		}
		$this->render("myPharma_list",array("titleName"=>$titleName));
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
		$module = "mrd_pharma";
		
		
		$phmMain = Phm_main::model();
		$cri = new CDbCriteria();
		
		/**
		 * 判断是自己公司还是自己添加的数据
		 */
		if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
			/**
			 * 自己公司数组
			 */
			$arrayId = Helper::SelectModule($company_id, $module);
			
			$cri->addInCondition("mrd_pharma_id", $arrayId);
		}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			/**
			 * 自己添加的数据
			 */
			$arrayId = Helper::SelectMyModule($module, $_REQUEST['myId']);
			$cri->addInCondition("mrd_pharma_id", $arrayId);
		}
		

        if(!empty($_REQUEST['search_pharma'])){
        	$cri->addCondition(" keyword like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search_pharma'])."%";
        }

        if(!empty($_REQUEST['search']['value'])){
        	$cri->addCondition(" keyword like :keyword ");
        	$cri->params[':keyword']="%".trim($_REQUEST['search']['value'])."%";
        }

        //search params

        //2.Product portfolio
        if(!empty($_REQUEST['mes'])){
        	$mes = $_REQUEST['mes'];
        	if(count($mes)==1){
        		if($mes[0]=='With Marketed Product'){
        			$cri->addCondition(" count_Approved_drug <> 0 ",'AND');
        		}else if($mes[0]=="With product in market  registration"){
        			$cri->addCondition('count_Investigational_API <> 0','AND');
        		}else if($mes[0]=="With product in clinical studies"){
        			$cri->addCondition('count_Trials_ongoing <> 0','AND');
        		}else if($mes[0]=="With IND on file"){
        			$cri->addCondition('count_IND <> 0','AND');
        		}
        	}else if(count($mes)>1){
        		$str="";
	            foreach($mes as $v){
	              if($v=='With Marketed Product'){
	                 $str .="(count_Approved_drug <> 0)  or  ";
	              }
	              if($v=="With product in market  registration"){
	                $str .="(count_Investigational_API <> 0)  or  ";
	              }
	              if($v=="With product in clinical studies"){
	                $str .="(count_Trials_ongoing <> 0)  or  ";
	              }
	              if($v=="With IND on file"){
	                $str .="(count_IND <> 0)  or  ";
	              }
	            }
	            $str = substr($str,0,-4);
	            //echo $str;
	            $cri->addCondition($str,'AND');
        	}
        }
        //3.Manufacturing capabilities
        if(!empty($_REQUEST['mc'])){
            $mc=$_REQUEST['mc'];
            if( count($mc)== 1){
            if($mc[0]=='R&D'){
               $cri->addCondition("corporation_type like :type ",'AND');
               $cri->params[':type']='%R&D center%';
            }else if($mc[0]=='Manufacturing'){
              $cri->addCondition("function like :manufacturing ",'AND');
              $cri->params[':manufacturing']='%manufpermit%';
            }else if($mc[0]=='Distribution'){
              $cri->addCondition("function like :distribution",'AND');
              $cri->params[':distribution']='%salespermit%';
            }else if($mc[0]=='Pharmacy'){
              $cri->addCondition("function like :pharmacy",'AND');
              $cri->params[':pharmacy']='%pharmacy%';
            }
          }else if(count($mc)>1){
            $str="";
            foreach($mc as $v){
              if($v=='R&D'){
                 $str .="(corporation_type like '%R&D center%')  or  ";
              }
              if($v=="Manufacturing"){
                $str .="function like '%manufpermit%'  or  ";
              }
              if($v=="Distribution"){
                $str .="function like '%salespermit%'  or  ";
              }
              if($v=="Pharmacy"){
                $str .="function like '%pharmacy%'  or  ";
              }
            }
             $str = substr($str,0,-4);
             $cri->addCondition($str,'AND');
          }
        }

        //4.Domestic Company(RMB)
        if(!empty($_REQUEST['dc'])){
            $dc=$_REQUEST['dc'];
            if( count($dc)== 1){
            if($dc[0]=='>10 billion'){
               $cri->addCondition("(revenue > 10)",'AND');
            }else if($dc[0]=='1-10 billion'){
              $cri->addCondition("(revenue < 10 AND revenue > 1)",'AND');
            }else if($dc[0]=='0.5-1 billion'){
              $cri->addCondition("(revenue < 1 AND revenue > 0.5 ) ",'AND');
            }else if($dc[0]=='0-0.5 billion'){
              $cri->addCondition("(revenue < 0.5 AND revenue > 0 )",'AND');
            }
          }else if(count($dc)>1){
            $str="";
            foreach($dc as $v){
              if($v=='>10 billion'){
                 $str .="(revenue > 10)  or  ";
              }
              if($v=="1-10 billion"){
                $str .="(revenue < 10 AND revenue > 1)  or  ";
              }
              if($v=="0.5-1 billion"){
                $str .="(revenue < 1 AND revenue > 0.5 ) or  ";
              }
              if($v=="0-0.5 billion"){
                $str .="(revenue < 0.5 AND revenue > 0 )  or  ";
              }
            }
             $str = substr($str,0,-4);
             $cri->addCondition($str,'AND');
          }
        }

        //5.Listed Domestic Company
        if(!empty($_REQUEST['ldc'])){
	        $ldc=$_REQUEST['ldc'];
	          if( count($ldc)== 1){
	            $cri->addCondition(" Listing like '%".$ldc[0]."%' ","AND");
	          }else if(count($ldc)>1){
	            $str="";
	            foreach($ldc as $v){
	              $str .=" phmBasic.exchange = '%".$v."%'  or  ";
	            }
	             $str = substr($str,0,-4);
	             $cri->addCondition($str,'AND');
	          }
	    }
	    //6.Manufacturing scope
	    if(!empty($_REQUEST['mfc'])){
            $mfc=$_REQUEST['mfc'];
            if( count($mfc)== 1){
            if($mfc[0]=='Small Molecule'){
               $cri->addCondition(" manuf_catcode like '%H%'",'AND');
            }else if($ms[0]=='TCM'){
              $mfc->addCondition("manuf_catcode like '%Z%'",'AND');
            }else if($ms[0]=='Biologics'){
              $mfc->addCondition("manuf_catcode like '%S%'",'AND');
            }else if($ms[0]=='Diagnostics'){
              $mfc->addCondition("manuf_catcode like '%T%'",'AND');
            }else if($ms[0]=='Misc'){
              $mfc->addCondition("manuf_catcode like '%Y%'",'AND');
            }
          }else if(count($mfc)>1){
            $str="";
            foreach($mfc as $v){
              if($v=='Small Molecule'){
                 $str .="(manuf_catcode like '%H%')  or  ";
              }
              if($v=="TCM"){
                $str .="(manuf_catcode like '%Z%')  or  ";
              }
              if($v=="Biologics"){
                $str .="(manuf_catcode like '%S%')  or  ";
              }
              if($v=="Diagnostics"){
                $str .="(manuf_catcode like '%T%')  or  ";
              }
              if($v=="Misc"){
                $str .="(manuf_catcode like '%Y%')  or  ";
              }
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
        //echo $_REQUEST['order'][0]['dir']."<br>";
        //var_dump($cri);
   		$total = $phmMain->count($cri);
		$listInfo = $phmMain->findAll($cri);
		//echo $total."<br>";
		//echo "<pre>";
		//var_dump($phmMain->findAll($cri));
		$jsonData=array();
		if(!empty($listInfo)){
			foreach ($listInfo as $key => $value) {
				$temp['mrd_pharma_id']='<input type="checkbox" class="checkboxes" name="id[]" value="'.$value['mrd_pharma_id'].'">';
				if(!empty($value['mrd_pharma_cn'])){
					$temp['mrd_pharma_cn']="<a href='".$this->createUrl('pharma/single'
						,array('id'=>$value['mrd_pharma_id']))."' title='".$value['mrd_pharma_cn']."'>".$value['mrd_pharma_cn']."</a>";
				}else{
					$temp['mrd_pharma_cn']="<a href='".$this->createUrl('pharma/single'
						,array('id'=>$value['mrd_pharma_id']))."' title='".$value['mrd_pharma_en']."'>".$value['mrd_pharma_en']."</a>";
				}
				$temp['Listing']=$value['Listing'];
				$temp['Revenue']=$value['Revenue'];
				$temp['count_IND']=$value['count_IND'];
				$temp['count_Trials_ongoing']=$value['count_Trials_ongoing'];
				$temp['count_Phase1']=$value['count_Phase1'];
				$temp['count_Phase2']=$value['count_Phase2'];
				$temp['count_Phase3']=$value['count_Phase3'];
				$temp['count_Preclinical']=$value['count_Preclinical'];
        $temp['parent_id'] = $value['mrd_pharma_id'];
        if(!empty($value['corporation_type']) && $value['corporation_type']=="Parent"){
          $temp['parent_html']='<i class="fa fa-arrow-circle-down"></i>';
        }else{
          $temp['parent_html']='<i class="">&nbsp;&nbsp;</i>';
        }
        
				array_push($jsonData,$temp);
			}
		}
		$arr_json= array();
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
		// echo "<pre>";
		// var_dump($listInfo);
		echo CJSON::encode($arr_json);
	}
}
















