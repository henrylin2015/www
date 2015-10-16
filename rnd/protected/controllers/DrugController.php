<?php
class DrugController extends BaseController{
	public function actionIndex()
	{
		//if(!empty($_REQUEST['target']) && $_REQUEST['target']=="approved"){
		//	$cookie=new CHttpCookie('target','approved');
		//	Yii::app()->request->cookies['target']=$cookie;
		//}else if(!empty($_REQUEST['target']) && $_REQUEST['target']=="investigational"){
		//	//Yii::app()->request->cookies['drug']['target']='investigational';
		//	$cookie=new CHttpCookie('target','investigational');
		//	Yii::app()->request->cookies['target']=$cookie;
		//}

		//category
		$drugCategory = Drg_category::model();
		$cri = new CDbCriteria();
		$cri->addCondition('id< :id');
		$cri->params[':id']=20;
		$cri->select=array('id','cnName','engName');
		$drugCategoryInfo = $drugCategory->findAll($cri);
		
		$module_type = "mrd_drug";
		$mrd_drug = Tools::getUserMyList($module_type);
		
		$this->render("drug_list",array('category'=>$drugCategoryInfo,"mrd_drug"=>$mrd_drug));
	}
	/**
	 * drug single
	 */
	public function actionSingle($id){
		$drugMain= Drg_main::model();
		$cri = new CDbCriteria();
		$cri->addCondition("mrd_drug_id = :id");
		$cri->params[":id"]=$id;
		
		$drugInfo = $drugMain->findAll($cri);
		$this->render("drug_single",array('model'=>$drugInfo[0]));
	}
	/**
	 * marketed product in china
	 */
	public function actionMarketedProductChina($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$app = Phmdrg_approved::model();
		$cri = new CDbCriteria();
		$cri->addCondition("mrd_drug_id = :id");
		$cri->params[':id']=$id;
		
		
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
		
		$total = $app->count($cri);
		
		$appInfo = $app->findAll($cri);
		
		$jsonData = array();
		if(!empty($appInfo)){
			foreach($appInfo as $drug){
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($drug->drugname_cn)){
						$temp['drugname_cn'] = $drug['drugname_cn'];
					}else{
						$temp['drugname_cn'] = $drug['drugname_en'];
					}	
				}else{
					if(!empty($drug->drugname_en)){
						$temp['drugname_cn'] = $drug['drugname_en'];
					}else{
						$temp['drugname_cn'] = $drug['drugname_cn'];
					}
				}
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($drug->compname_cn)){
						$temp['compname_cn'] = $drug['compname_cn'];
					}else{
						$temp['compname_cn'] = $drug['compname_en'];
					}	
				}else{
					if(!empty($drug->compname_en)){
						$temp['compname_cn'] = $drug['compname_en'];
					}else{
						$temp['compname_cn'] = $drug['compname_cn'];
					}
				}
				$temp['issuedate']=$drug['issuedate'];
				$temp['drugcat'] = $drug['drugcat'];
				if(!empty($drug['drug_origin']) && $drug['drug_origin']==0){
					$temp['drug_origin']="Domestic";
				}else{
					$temp['drug_origin']="Imported";
				}
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($drug->drugname_trade_cn)){
						$temp['drugname_trade_cn'] = $drug['drugname_trade_cn'];
					}else{
						$temp['drugname_trade_cn'] = $drug['drugname_trade_en'];
					}	
				}else{
					if(!empty($drug->drugname_trade_en)){
						$temp['drugname_trade_cn'] = $drug['drugname_trade_en'];
					}else{
						$temp['drugname_trade_cn'] = $drug['drugname_trade_cn'];
					}
				}
				$temp['doseform']=$drug['doseform'];
				$temp['strength']=$drug['strength'];
				$temp['num_appr']=$drug['num_appr'];
				array_push($jsonData,$temp);
			}
		}
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
	    echo CJSON::encode($arr_json);
	}
	
	
	
	public function actionJsondrug_index(){
		$drugMain = Drg_main::model();
		$cri = new CDbCriteria();
		//approved  status==9
		//echo $_COOKIE['drug']['target'];
		//if(!empty(Yii::app()->request->cookies['target']) && Yii::app()->request->cookies['target']=="approved"){
		//	$cri->addCondition("status =:status",'AND');
		//	$cri->params[':status']=9;
		//}else if(!empty(Yii::app()->request->cookies['target']) && Yii::app()->request->cookies['target']=="investigational"){
		//	$cri->addCondition("status < :status",'AND');
		//	$cri->params[':status']=9;
		//}
		//echo Yii::app()->request->cookies['target'];
		//search
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

	/**
	 * investigational product in chian
	 */
	public function actionInvestigationalProductChina($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$inv = Phmdrg_investigational::model();
		$cri = new CDbCriteria();
		$cri->addCondition("mrd_drug_id = :id");
		$cri->params[':id']=$id;
		if(!empty($_REQUEST['length'])){
	       $cri->limit=$_REQUEST['length'];
	    }else{
	       $cri->limit=30;
	    }
	    if(!empty($_REQUEST['start'])){
	       $cri->offset=$_REQUEST['start'];
	    }
	    if(!empty($_REQUEST['order'][0]['dir'])){
	       $cri->order=$_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
	    }
	   $total = $inv->count($cri);
	   $infos = $inv->findAll($cri);     
	
	    $jsonData =array();
	    if(!empty($infos)){
	      foreach ($infos as  $v) {
	        $t['drugname']=$v['drugname'];
	        $t['drugcat']=$v['drugcat'];
	        $t['regclass']=$v['regclass'];
	        if(!empty($v['status']) && $v['status']=='0'){
	          $t['status']='实验室';
	        }else if(!empty($v['status']) && $v['status']=='1'){
	          $t['status']='preclinical';
	        }else if(!empty($v['status']) && $v['status']=='2'){
	          $t['status']='IND';
	        }else if(!empty($v['status']) && $v['status']=='3'){
	          $t['status']='phase1';
	        }else if(!empty($v['status']) && $v['status']=='4'){
	          $t['status']='phase2';
	        }else if(!empty($v['status']) && $v['status']=='6'){
	          $t['status']='phase3';
	        }else if(!empty($v['status']) && $v['status']=='7'){
	          $t['status']='申请上市';
	        }else if(!empty($v['status']) && $v['status']=='9'){
	          $t['status']='上市';
	        }
	        $t['IND_appltype']=$v['IND_appltype'];
	        $t['IND_date_cdereceived']=$v['IND_date_cdereceived'];
	        $t['IND_status_new_overall']=$v['IND_status_new_overall'];
	        $t['IND_date_appr_delivery']=$v['IND_date_appr_delivery'];
	        $t['IND_num_accept']=$v['IND_num_accept'];
	        $t['count_Trials']=$v['count_Trials'];
	        $t['count_Trials_ongoing']=$v['count_Trials_ongoing'];
	        $t['count_Phase1']=$v['count_Phase1'];
	        $t['count_Phase2']=$v['count_Phase2'];
	        $t['count_Phase3']=$v['count_Phase3'];
	        $t['indication']=$v['indication'];
	        $t['NDA_appltype']=$v['NDA_appltype'];
	        $t['NDA_date_cdereceived']=$v['NDA_date_cdereceived'];
	        $t['NDA_status_new_overall']=$v['NDA_status_new_overall'];
	        $t['NDA_date_appr_delivery']=$v['NDA_date_appr_delivery'];
	        $t['NDA_num_accept']=$v['NDA_num_accept'];
	        array_push($jsonData,$t);
	      }
	    }
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
	    echo CJSON::encode($arr_json);
	}

	
	/**
	 * trials on this drug
	 * 这里链接数据表是view
	 */
	public function actionTrialsOnDrug($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$trialsDrug = Phmdrg_trial2::model();
		$cri = new CDbCriteria();
		$cri->addCondition("mrd_drug_id = :id");
		$cri->params[':id']=$id;
		if(!empty($_REQUEST['length'])){
	       $cri->limit=$_REQUEST['length'];
	    }else{
	       $cri->limit=30;
	    }
	    if(!empty($_REQUEST['start'])){
	       $cri->offset=$_REQUEST['start'];
	    }
	    if(!empty($_REQUEST['order'][0]['dir'])){
	       $cri->order=$_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
	    }
	   $total = $trialsDrug->count($cri);
	   $infos = $trialsDrug->findAll($cri);     
	
	    $jsonData =array();
	    if(!empty($infos)){
	      foreach ($infos as  $v) {
	      	if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
	      		if(!empty($v['sponsor_cn'])){
	      			$t['sponsor_en'] = $v['sponsor_cn'];
	      		}else{
	      			$t['sponsor_en'] = $v['sponsor_en'];
	      		}
	      	}else{
	      		if(!empty($v['sponsor_en'])){
	      			$t['sponsor_en'] = $v['sponsor_en'];
	      		}else{
	      			$t['sponsor_en'] = $v['sponsor_cn'];
	      		}
	      	}
	      	//phase_en
	      	if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
	      		if(!empty($v['phase_cn'])){
	      			$t['phase_en'] = $v['phase_cn'];
	      		}else{
	      			$t['phase_en'] = $v['phase_en'];
	      		}
	      	}else{
	      		if(!empty($v['phase_en'])){
	      			$t['phase_en'] = $v['phase_en'];
	      		}else{
	      			$t['phase_en'] = $v['phase_cn'];
	      		}
	      	}
			//Recruiting_en
			if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
	      		if(!empty($v['Recruiting_cn'])){
	      			$t['Recruiting_en'] = $v['Recruiting_cn'];
	      		}else{
	      			$t['Recruiting_en'] = $v['Recruiting_en'];
	      		}
	      	}else{
	      		if(!empty($v['Recruiting_en'])){
	      			$t['Recruiting_en'] = $v['Recruiting_en'];
	      		}else{
	      			$t['Recruiting_en'] = $v['Recruiting_cn'];
	      		}
	      	}
			//title_brief_en
			if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
	      		if(!empty($v['title_brief_cn'])){
	      			$t['title_brief_en'] = $v['title_brief_cn'];
	      		}else{
	      			$t['title_brief_en'] = $v['title_brief_en'];
	      		}
	      	}else{
	      		if(!empty($v['title_brief_en'])){
	      			$t['title_brief_en'] = $v['title_brief_en'];
	      		}else{
	      			$t['title_brief_en'] = $v['title_brief_cn'];
	      		}
	      	}
			//condition_en
			if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
	      		if(!empty($v['condition_cn'])){
	      			$t['condition_en'] = $v['condition_cn'];
	      		}else{
	      			$t['condition_en'] = $v['condition_en'];
	      		}
	      	}else{
	      		if(!empty($v['condition_en'])){
	      			$t['condition_en'] = $v['condition_en'];
	      		}else{
	      			$t['condition_en'] = $v['condition_cn'];
	      		}
	      	}
			//enrollment_anticipated
			$t['enrollment_anticipated'] = $v['enrollment_anticipated'];
			//date_first_enrolled
			$t['date_first_enrolled'] = $v['date_first_enrolled'];
			$t['date_complete'] = $v['date_complete'];
	        array_push($jsonData,$t);
	      }
	    }
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
	    echo CJSON::encode($arr_json);
	}
	
	
	/**
	 * publications on this drug
	 * 这里链接数据表的是drg_pub
	 */
	public function actionPublicationsOnDrug($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$pubDrug = Drg_pub::model();
		$cri = new CDbCriteria();
		$cri->addCondition("mrd_drug_id = :id");
		$cri->params[':id']=$id;
		if(!empty($_REQUEST['length'])){
	       $cri->limit=$_REQUEST['length'];
	    }else{
	       $cri->limit=30;
	    }
	    if(!empty($_REQUEST['start'])){
	       $cri->offset=$_REQUEST['start'];
	    }
	    if(!empty($_REQUEST['order'][0]['dir'])){
	       $cri->order=$_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
	    }
	   $total = $pubDrug->count($cri);
	   $infos = $pubDrug->findAll($cri);     
	
	    $jsonData =array();
	    if(!empty($infos)){
	      foreach ($infos as  $v) {
	      	//ArticleTitle
	      	$tem['ArticleTitle'] = $v['ArticleTitle'];
			$tem['Authors'] = $v['Authors'];
			$tem['Affiliations'] = $v['Affiliations'];
			$tem['ArticleDate'] = $v['ArticleDate'];
	        array_push($jsonData,$tem);
	      }
	    }
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
	    echo CJSON::encode($arr_json);
	}
	/**
     * 这个方法是查询drug_category中的数据
     * 功能：通过传入的父id，去数据表中查询他们的子id
     */
    public function getSubMrdCategory($pid){
        $drugCategory = Drg_category::model();
        $cri = new CDbCriteria();
        $cri->select=array('id');
        $cri->addCondition("supId='".$pid."'");
        return $drugCategory->findAll($cri);
    }
}