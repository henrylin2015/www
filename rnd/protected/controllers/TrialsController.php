<?php
class TrialsController extends BaseController{
	public function actionIndex(){
		$DiseaseInfo=array();
        $DiseaseList=Dis_main::model();
        $disCri=new CDbCriteria();
        $disCri->addCondition("disease_id < 25");
        $DiseaseInfo=$DiseaseList->findAll($disCri);
		
		$module_type = "mrd_trial";
		$mrd_trial = Tools::getUserMyList($module_type);
		
		$this->render("trials_list",array("DiseaseInfo"=>$DiseaseInfo,"mrd_trial"=>$mrd_trial));
	}
	
	
	/***
	 * trilas single page
	 */
	public function actionSingle($id){
		$triMain = Trl_main::model();
		$cri = new CDbCriteria();
		$cri->addCondition("mrd_trial_id = :mrd_id");
		$cri->params[":mrd_id"] = $id;
		
		$infos = $triMain->findAll($cri);
		$this->render("trials_single",array("model"=>$infos[0]));
	}
	
	
	public function actionJsontrials_index(){
		$arr_json = array();
		$triMain = Trl_main::model();
		$cri = new CDbCriteria();

		if(!empty($_REQUEST['search']['value'])){
        	$cri->addCondition(" title_brief_cn like :keyword OR title_brief_en like :keyword1");
        	$cri->params[':keyword']="%".trim($_REQUEST['search']['value'])."%";
        	$cri->params[':keyword1']="%".trim($_REQUEST['search']['value'])."%";
        }
        if(!empty($_REQUEST['search_trials'])){
        	$cri->addCondition(" title_brief_cn like :keyword OR title_brief_en like :keyword1");
        	$cri->params[':keyword']="%".trim($_REQUEST['search_trials'])."%";
        	$cri->params[':keyword1']="%".trim($_REQUEST['search_trials'])."%";
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
        //search filting
        //1.Trial region
        if(!empty($_REQUEST['tr'])){
        	$tr = $_REQUEST['tr'];
        	if(count($tr)==1){
        		$cri->addCondition(' COUNTRY = :COUNTRY ','AND');
        		$cri->params[':COUNTRY']=$tr[0];
        	}else if(count($tr) > 0){
        		$str="";
        		foreach ($tr as $v) {
        			if($v=="China Only"){
        				$str .=' COUNTRY = "'.$v.'"  OR  ';
        			}
        			if($v=="Non-China Only"){
        				$str .=' COUNTRY = "'.$v.'"  OR  ';
        			}
        			if($v=="Both China and Non-China"){
        				$str .=' COUNTRY = "'.$v.'"  OR  ';
        			}
        		}
        		$str = substr($str,0,-4);
            	$cri->addCondition($str,'AND');
        	}
        }
        //2.Recruiting status
        if(!empty($_REQUEST['re'])){
            $re=$_REQUEST['re'];
            if( count($re)== 1){
            if($re[0]=='Recruiting'){
                $cri->addCondition("Recruiting_en ='Recruiting' or Recruiting_cn like '%招募中%'",'AND');
            }else if($re[0]=='Not yet recruiting'){
                $cri->addCondition("Recruiting_en ='Not yet recruiting' or Recruiting_cn like '%尚未招募%'",'AND');
            }else if($re[0]=='Active, not recruiting'){
                $cri->addCondition("Recruiting_en ='Active, not recruiting' or Recruiting_cn like '%进行中 （尚未招募）%'",'AND');
            }else if($re[0]=='Completed'){
                $cri->addCondition("Recruiting_en ='Completed' or Recruiting_cn like '%已完成%'",'AND');
            }else if($re[0]=='Other'){
                $cri->addCondition("(Recruiting_en !='Recruiting' and Recruiting_en !='Not yet recruiting' and Recruiting_en !='Active, not recruiting' and Recruiting_en !='Completed') and (Recruiting_cn not like '%招募中%' and Recruiting_cn not like '%尚未招募%' and Recruiting_cn not like '%进行中 （尚未招募）%') and Recruiting_cn not like '%已完成%'",'AND');
            }
	        }else if(count($re)>1){
	            $str="";
	            foreach($re as $v){
	              	if($v=='Recruiting'){
	                	 $str .="(Recruiting_en ='Recruiting' or Recruiting_cn like '%招募中%')  or  ";
	              	}
	              	if($v=="Not yet recruiting"){
	                	$str .="(Recruiting_en ='Not yet recruiting' or Recruiting_cn like '%尚未招募%')  or  ";
	              	}
	              	if($v=="Active, not recruiting"){
	                	$str .="(Recruiting_en ='Active, not recruiting' or Recruiting_cn like '%进行中 （尚未招募）%')  or  ";
	              	}
	              	if($v=="Completed"){
	                	$str .="(Recruiting_en ='Completed' or Recruiting_cn like '%已完成%')  or  ";
	              	}
	              	if($v=="Other"){
	                	$str .="((Recruiting_en !='Recruiting' and Recruiting_en !='Not yet recruiting' and Recruiting_en !='Active, not recruiting' and Recruiting_en !='Completed') and (Recruiting_cn not like '%招募中%' and Recruiting_cn not like '%尚未招募%' and Recruiting_cn not like '%进行中 （尚未招募）%') and Recruiting_cn not like '%已完成%')  or  ";
	              	}
	            }
	            $str = substr($str,0,-4);
	            $cri->addCondition($str,'AND');
	          }
        }
        //3.Study results
        if(!empty($_REQUEST['sr'])){
            $sr=$_REQUEST['sr'];
            if( count($sr)== 1){
	            if($sr[0]=='Study_with_results'){
	                $cri->addCondition("iswith_studyresult is not null and iswith_studyresult <>0",'AND');
	            }else if($sr[0]=='study_without_results'){
	                $cri->addCondition("iswith_studyresult IS NULL or iswith_studyresult =0",'AND');
	            }
          	}else if(count($sr)>1){
	            $str="";
	            foreach($sr as $v){
	              if($v=='Study with results'){
	                 $str .="(iswith_studyresult is not null and iswith_studyresult <>0)  or  ";
	              }
	              if($v=="study without results"){
	                $str .="(iswith_studyresult IS NULL or iswith_studyresult =0)  or  ";
	              }
	            }
	             $str = substr($str,0,-4);
	             $cri->addCondition($str,'AND');
          	}
        }
        //4.Study type
        //cde的还没有判断
        if(!empty($_REQUEST['st'])){
            $st=$_REQUEST['st'];
            if( count($st)== 1){
	            if($st[0]=='Interventional'){
	              $cri->addCondition("Study_Type_en = 'Interventional' OR (Study_Type_cn <>'其他' AND Study_Type_cn IS NOT NULL)",'AND');
	            }else if($st[0]=='Observational'){
	              $cri->addCondition("Study_Type_en LIKE '%Observational%'",'AND');
	            }else if($st[0]=='Expanded access'){
	              $cri->addCondition("Study_Type_en = 'Expanded Access'",'AND');
	            }
          }else if(count($st)>1){
	            $str="";
	            foreach($st as $v){
	              if($v=='Interventional'){
	                 $str .="(Study_Type_en = 'Interventional' OR (Study_Type_cn <>'其他' AND Study_Type_cn IS NOT NULL))  or  ";
	              }
	              if($v=="Observational"){
	                $str .="(Study_Type_en LIKE '%Observational%')  or  ";
	              }
	              if($v=="Expanded access"){
	                $str .="(Study_Type_en = 'Expanded Access')  or  ";
	              }
	            }
	            $str = substr($str,0,-4);
	            $cri->addCondition($str,'AND');
          }
        }
        //5.Phase
        if(!empty($_REQUEST['ph'])){
            $ph=$_REQUEST['ph'];
            if( count($ph)== 1){
	            if($ph[0]=='PhaseI'){
	              $cri->addCondition("phase_en like '%Phase 1%' or phase_cn = 'I期'",'AND');
	            }else if($ph[0]=='PhaseII'){
	              $cri->addCondition("phase_en like '%Phase 2%' or phase_cn = 'II期'",'AND');
	            }else if($ph[0]=='PhaseIII'){
	              $cri->addCondition("phase_en like '%Phase 3%' or phase_cn = 'III期'",'AND');
	            }else if($ph[0]=='PhaseIV'){
	              $cri->addCondition("phase_en like '%Phase 4%' or phase_cn = 'IV期'",'AND');
	            }
          }else if(count($ph)>1){
	            $str="";
	            foreach($ph as $v){
		              if($v=='PhaseI'){
		                 $str .="(phase_en like '%Phase 1%' or phase_cn = 'I期')  or  ";
		              }
		              if($v=="PhaseII"){
		                $str .="(phase_en like '%Phase 2%' or phase_cn = 'II期')  or  ";
		              }
		              if($v=="PhaseIII"){
		                $str .="(phase_en like '%Phase 3%' or phase_cn = 'III期')  or  ";
		              }
		              if($v=="PhaseIV"){
		                $str .="(phase_en like '%Phase 4%' or phase_cn = 'IV期')  or  ";
		              }
	            }
	            $str = substr($str,0,-4);
	            $cri->addCondition($str,'AND');
          }
        }
        //6.Conditions 
        if(!empty($_REQUEST['con'])){
            $con=$_REQUEST['con'];
	        if( count($con)== 1){
	                $cri->addCondition("root_disease_id LIKE '%,".$con[0].",%'",'AND');
	        }else if(count($con)>1){
	            $str="";
	            foreach($con as $v){
	                $str .="root_disease_id LIKE '%,".$con[0].",%'  or  "; 
	            }
	            $str = substr($str,0,-4);            
	            $cri->addCondition($str,'AND');
	        }
        }
		$total = $triMain->count($cri);
		$infos = $triMain->findAll($cri);
		$jsonData = array();
		if(!empty($infos)){
			foreach ($infos as $key => $value) {
				$temp['mrd_trial_id'] = '<input type="checkbox" class="checkboxes" name="id[]" value="'.$value['mrd_trial_id'].'">';
				if(!empty($value['title_brief_cn'])){
					$temp['title_brief_cn'] ="<a href='".$this->createUrl('trials/single'
						,array('id'=>$value['mrd_trial_id']))."' title='".$value['title_brief_cn']."'>".$value['title_brief_cn']."</a>";
				}else{
					$temp['title_brief_cn'] ="<a href='".$this->createUrl('trials/single'
						,array('id'=>$value['mrd_trial_id']))."' title='".$value['title_brief_en']."'>".$value['title_brief_en']."</a>";
				}
				if(!empty($value['phase_cn'])){
					$temp['phase_cn'] = $value['phase_cn'];
				}else{
					$temp['phase_cn'] = $value['phase_en'];
				}
				if(!empty($value['condition_cn'])){
					$temp['condition_cn'] = $value['condition_cn'];
				}else{
					$temp['condition_cn'] = $value['condition_en'];
				}
				if(!empty($value['intervention_name_cn'])){
					$temp['intervention_name_cn'] = $value['intervention_name_cn'];
				}else{
					$temp['intervention_name_cn'] = $value['intervention_name_en'];
				}
				if(!empty($value['Recruiting_cn'])){
					$temp['Recruiting_cn'] = $value['Recruiting_cn'];
				}else{
					$temp['Recruiting_cn'] = $value['Recruiting_en'];
				}
				if(!empty($value['sponsor_cn'])){
					$temp['sponsor_cn'] = $value['sponsor_cn'];
				}else{
					$temp['sponsor_cn'] = $value['sponsor_en'];
				}
				$temp['number'] = '??';
				$temp['new_trials']="TPM";
				$temp['new_trials_1'] = "TPM";
				array_push($jsonData,$temp);
			}
		}
		$arr_json['recordsTotal']=$total;
   		$arr_json['recordsFiltered']=$total;
    	$arr_json['data']=$jsonData;
    	echo CJSON::encode($arr_json);
	}
}