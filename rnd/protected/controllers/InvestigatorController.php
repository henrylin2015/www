<?php
class InvestigatorController extends BaseController{
	public function actionIndex(){
		$deptments=array();
        $steDeptMoh = Ste_deptmoh::model();
        $stedeptmohCri = new CDbCriteria();
        $stedeptmohCri->addCondition(" sort_no <>0  ORDER by sort_no");
        $deptments = $steDeptMoh->findAll($stedeptmohCri);
		
		$module_type = "mrd_doctor";
		$mrd_doctor = Tools::getUserMyList($module_type);
		
		$this->render('inv_list',array("deptments"=>$deptments,"mrd_doctor"=>$mrd_doctor));
	}
	
	/***
	 * single page  
	 */
	public function actionSingle($id){
		$invMain = Inv_main::model();
		$cri = new CDbCriteria();
		$cri->addCondition("doctor_id = :id");
		$cri->params[":id"]=$id;
		$infos = $invMain->findAll($cri);
		$this->render("inv_single",array("model"=>$infos[0]));
	}	 
	 
	 
	 /***
	  * Investigators in trials involved
	  * model view inv_trial2 table
	  */
	 public function  actionTrialsInvolved($id){
	 	$arr_json = array();
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$invTrials =  Inv_trial2::model();
		$cri = new CDbCriteria();
		$cri->addCondition("doctor_id = :id");
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
		
		$total = $invTrials->count($cri);
		
		$infos = $invTrials->findAll($cri);
		
		$jsonData = array();
		if(!empty($infos)){
			foreach($infos as $v){
				$temp["role"] = $v['role'];
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($v->title_official_cn)){
						$temp['title_official_en'] = $v['title_official_cn'];
					}else{
						$temp['title_official_en'] = $v['title_official_en'];
					}	
				}else{
					if(!empty($v->title_official_en)){
						$temp['title_official_en'] = $v['title_official_en'];
					}else{
						$temp['title_official_en'] = $v['title_official_cn'];
					}
				}
				
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($v->intervention_name_cn)){
						$temp['intervention_name_en'] = $v['intervention_name_cn'];
					}else{
						$temp['intervention_name_en'] = $v['intervention_name_en'];
					}	
				}else{
					if(!empty($v->intervention_name_en)){
						$temp['intervention_name_en'] = $v['intervention_name_en'];
					}else{
						$temp['intervention_name_en'] = $v['intervention_name_cn'];
					}
				}
				
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($v->condition_cn)){
						$temp['condition_en'] = $v['condition_cn'];
					}else{
						$temp['condition_en'] = $v['condition_en'];
					}	
				}else{
					if(!empty($v->condition_en)){
						$temp['condition_en'] = $v['condition_en'];
					}else{
						$temp['condition_en'] = $v['condition_cn'];
					}
				}
				//sponsor_en
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($v->sponsor_cn)){
						$temp['sponsor_en'] = $v['sponsor_cn'];
					}else{
						$temp['sponsor_en'] = $v['sponsor_en'];
					}	
				}else{
					if(!empty($v->sponsor_en)){
						$temp['sponsor_en'] = $v['sponsor_en'];
					}else{
						$temp['sponsor_en'] = $v['sponsor_cn'];
					}
				}
				//COUNTRY
				if(!empty($v->COUNTRY) && $v->COUNTRY=="China Only"){
					$temp["COUNTRY"] = 'Local';
				}else if(!empty($v->COUNTRY) && $v->COUNTRY=="Both China and Non-China"){
					$temp["COUNTRY"] = 'Global';
				}else{
					$temp["COUNTRY"] = 'N/A';
				}
				
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($v->phase_cn)){
						$temp['phase_en'] = $v['phase_cn'];
					}else{
						$temp['phase_en'] = $v['phase_en'];
					}	
				}else{
					if(!empty($v->phase_en)){
						$temp['phase_en'] = $v['phase_en'];
					}else{
						$temp['phase_en'] = $v['phase_cn'];
					}
				}
				
				$temp["Recruiting"] = $v['Recruiting']; //？？
				$temp["enrollment_actual"] = $v['enrollment_actual'];
				$temp["investigator"] = $v['investigator'];
				$temp["PMID"] = $v['PMID'];
				array_push($jsonData,$temp);
			}
		}
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
	    echo CJSON::encode($arr_json);
		
	 }
	 
	 
	 
	 /**
	  * investigator in publication
	  * inv_publication
	  */
	  public function actionPublications($id){
	  	$arr_json = array();
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$invPublication = Inv_publication::model();
		$cri = new CDbCriteria();
		$cri->addCondition("doctor_id = :id");
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
		
		$total = $invPublication->count($cri);
		
		$infos = $invPublication->findAll($cri);
		
		$jsonData = array();
		if(!empty($infos)){
			foreach($infos as $v){
				$temp["ArticleTitle"] = $v['ArticleTitle'];
				$temp["ArticleDate"] = $v['ArticleDate'];
				$temp["JournalTitle"] = $v['JournalTitle'];
				$temp["SCI_IF"] = $v['SCI_IF'];
				$temp["AuthorList"] = $v['AuthorList'];
				$temp["ISSN"] = $v['ISSN'];
				array_push($jsonData,$temp);
			}
		}
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
	    echo CJSON::encode($arr_json);
	  }

	
	/**
	 * investigator in collaborators
	 * inv_collaborator2 view table
	 */
	 public function actionInvColls($id){
	 	$arr_json = array();
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$colls =  Inv_collaborator2::model();
		$cri = new CDbCriteria();
		$cri->addCondition("doctor_id1 = :id");
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
		
		$total = $colls->count($cri);
		
		$infos = $colls->findAll($cri);
		
		$jsonData = array();
		if(!empty($infos)){
			foreach($infos as $v){
				$temp['name'] = $v['name'];
				$temp['hospital'] = $v['hospital'];
				$temp['department'] = $v['department'];
				$temp['count_trial'] = $v['count_trial'];
				$temp['trial'] = $v['trial'];
				$temp['count_drug'] = $v['count_drug'];
				$temp['drug'] = $v['drug'];
				$temp["count_publication"] = $v['count_publication'];
				$temp["publication"] = $v['publication'];
				array_push($jsonData,$temp);
			}
		}
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
	    echo CJSON::encode($arr_json);
	 }


	/**
	 * investigator in assn
	 * inv_assn view table
	 */
	 public function actionInvAssn($id){
	 	$arr_json = array();
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$assn = Inv_assn2::model();
		$cri = new CDbCriteria();
		$cri->addCondition("doctor_id = :id");
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
		
		$total = $assn->count($cri);
		
		$infos = $assn->findAll($cri);
		
		$jsonData = array();
		if(!empty($infos)){
			foreach($infos as $v){
				//name_cn
				if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
					if(!empty($v->name_cn)){
						$temp['name_cn'] = $v['name_cn'];
					}else{
						$temp['name_cn'] = $v['name_en'];
					}	
				}else{
					if(!empty($v->name_en)){
						$temp['name_cn'] = $v['name_en'];
					}else{
						$temp['name_cn'] = $v['name_cn'];
					}
				}
				$temp["other_name"] = $v['other_name'];
				$temp["title_assn"] = $v['title_assn'];
				$temp["system"] = $v['system'];
				array_push($jsonData,$temp);
			}
		}
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
	    echo CJSON::encode($arr_json);
	 }
		 
	 /****
	  * ajax list data
	  */
	public function actionJsoninvestigator_index(){
		$arr_json = array();
		$invMain = Inv_main::model();
		$cri = new CDbCriteria();

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