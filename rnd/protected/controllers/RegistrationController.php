<?php 
class RegistrationController extends BaseController{
   	/**
	 *page list  
	 */
    public function actionIndex()
    {
    	$module_type = "mrd_reg";
		$mrd_reg = Tools::getUserMyList($module_type);
		
    	$this->render("reg_list",array("mrd_reg"=>$mrd_reg));
    }
	
	/**
	 * page single details
	 */
	public function actionSingle($id){
		$reg = Reg_main::model();
		$cri = new	CDbCriteria();
		$cri->addCondition("num_accept = :id");
		$cri->params[":id"]= $id;
		$regInfo = $reg->findAll($cri);
		$this->render("reg_single",array("model"=>$regInfo[0]));
	}
	
	/**
	 * Same company
	 */
	public function actionSameCompany($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		/**
		 * 5=company,4=drug,1=target,2=ATCcode,3=condition
		 */
		$link_by = 5;
		$arr_json = $this->getRegRelates($id, $link_by);
	    echo CJSON::encode($arr_json);
	}
	
	/**
	 * Same Drug
	 */
	public function actionSameDrug($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		/**
		 * 5=company,4=drug,1=target,2=ATCcode,3=condition
		 */
		$link_by = 4;
		$arr_json = $this->getRegRelates($id, $link_by);
	    echo CJSON::encode($arr_json);
	}
	
	
	/**
	 * Same Target
	 */
	public function actionSameTarget($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		/**
		 * 5=company,4=drug,1=target,2=ATCcode,3=condition
		 */
		$link_by = 1;
		$arr_json = $this->getRegRelates($id, $link_by);
	    echo CJSON::encode($arr_json);
	}
	
	/**
	 * Same Target
	 */
	public function actionSameIndication($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		/**
		 * 5=company,4=drug,1=target,2=ATCcode,3=condition
		 */
		$link_by = 3;
		$arr_json = $this->getRegRelates($id, $link_by);
	    echo CJSON::encode($arr_json);
	} 
	
	
	/**
	 * ATC code
	 */
	public function actionAtcCode($id){
		$arr_json= array();
		if(empty($id)){
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		/**
		 * 5=company,4=drug,1=target,2=ATCcode,3=condition
		 */
		$link_by = 2;
		$arr_json = $this->getRegRelates($id, $link_by);
	    echo CJSON::encode($arr_json);
	}
	
	
	/***
	 * 这个方法是返回一个查询得到的数组，查询的是reg_relates view表中的数据
	 * return array
	 */
	public function getRegRelates($id,$link_by){
		$reg_relate = Reg_related2::model();
		$cri = new CDbCriteria();
		$cri->addCondition("num_accept1 =:num_accept  AND link_by =:link_by");
		$cri->params[":num_accept"] = $id;
		/**
		 * 5=company,4=drug,1=target,2=ATCcode,3=condition
		 */
		$cri->params[":link_by"] =$link_by;
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
        	$cri->order="num_accept1 desc";
        }
		
		$total = $reg_relate->count($cri);
		$infos = $reg_relate->findAll($cri);
		$jsonData = array();
		if(!empty($infos)){
			foreach($infos as $v){
				$temp['compname_reg'] = $v['compname_reg'];
				$temp['drugname'] = $v['drugname'];
				$temp['drugcat'] = $v['drugcat'];
				$temp['appltype'] = $v['appltype'];
				$temp['regclass'] = $v['regclass'];
				$temp['newaccepted_reviewcat'] = $v['newaccepted_reviewcat'];
				$temp['mark'] = $v['mark'];
				$temp['status_new_overall'] = $v['status_new_overall'];
				$temp['num_accept1'] = $v['num_accept1'];
				$temp['date_cdereceived'] = $v['date_cdereceived'];
				$temp['date_appr_delivery'] = $v['date_appr_delivery'];
				array_push($jsonData,$temp);
			}
		}
	    $arr_json['recordsTotal']=$total;
	    $arr_json['recordsFiltered']=$total;
	    $arr_json['data']=$jsonData;
		return $arr_json;
	}
	
    public function actionJsonregistration_index(){
    	$arr_json = array();
    	$regMain = Reg_main::model();
    	$cri = new CDbCriteria();
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