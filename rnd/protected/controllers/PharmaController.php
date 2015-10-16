<?php
class PharmaController extends BaseController {
	public function actionIndex() {
		$module_type = "mrd_pharma";
		$mrd_pharma  = Tools::getUserMyList($module_type);
		$this->render("pharma_index", array("mrd_pharma" => $mrd_pharma));
	}
    function actionInt_pub(){
          $this->render("int_pub");
    }
    public function actionInt_pri(){
                $this->render("int_pri");
    }
    public function actionDom_pub(){
                $this->render("dom_pub");            
    }
	public function actionSingle($id) {
		$phmMain = Phm_main::model();
		$cri     = new CDbCriteria();
		$cri->addCondition("mrd_pharma_id =:id");
		$cri->params[':id'] = $id;
		$phmMainInfo        = $phmMain->findAll($cri);
		//sub company
		$subs = array();
		if (!empty($phmMainInfo[0]->sub)) {
			foreach ($phmMainInfo[0]->sub as $sub) {
				if (strstr($sub->country, "中国")) {
					$subs[] = $sub;
				}
			}
		}
		$reg         = array();
		$reg['year'] = "'2013','2012','2012','2011'";
		$reg['Y1']   = "'71312.00','67224.00','65030.00','61587.00'";
		$reg['Y2']   = "'13831.00','10853.00','9672.00','13334.00'";
		$this->render("pharma_single", array('model' => $phmMainInfo[0], 'reg' => $reg, 'subs' => $subs));
	}

	//marketed product
	public function actionJsonproduct($id) {
		$phmMain = Phm_main::model();
		$cri     = new CDbCriteria();
		$cri->addCondition("mrd_pharma_id =:id");
		$cri->params[':id'] = $id;
		$phmMainInfo        = $phmMain->findAll($cri);
		$phmdrg_approved    = Phmdrg_approved::model();
		$phmCri             = new CDbCriteria();
		$infos              = array();
		$total              = 0;
		if (!empty($phmMainInfo[0]->approved)) {
			$infos = $phmMainInfo[0]->approved;
		} else if (!empty($phmMainInfo[0]->sub_pharma_id)) {
			$temp = explode(',', $phmMainInfo[0]->sub_pharma_id);
			$phmCri->addInCondition("mrd_pharma_id", $temp);
			if (!empty($_REQUEST['search']['value'])) {
				$phmCri->addCondition(" drugname_cn like :keyword1 Or drugname_en like :keyword2");
				$phmCri->params[':keyword1'] = "%".trim($_REQUEST['search']['value'])."%";
				$phmCri->params[':keyword2'] = "%".trim($_REQUEST['search']['value'])."%";
			}
			if (!empty($_REQUEST['length'])) {
				$phmCri->limit = $_REQUEST['length'];
			} else {
				$phmCri->limit = 30;
			}
			if (!empty($_REQUEST['start'])) {
				$phmCri->offset = $_REQUEST['start'];
			}
			//$cri->offset=$start;
			if (!empty($_REQUEST['order'][0]['dir'])) {
				$phmCri->order = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
			}
			//echo $_REQUEST['order'][0]['dir']."<br>";
			//var_dump($cri);
			$total = $phmdrg_approved->count($phmCri);
			$infos = $phmdrg_approved->findAll($phmCri);
		}
		$jsonData = array();
		if (!empty($infos)) {
			foreach ($infos as $v) {
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['drugname_cn'])) {
						$tp['drugname_en'] = $v['drugname_cn'];
					} else {
						$tp['drugname_en'] = $v['drugname_en'];
					}
				} else {
					if (!empty($v['drugname_en'])) {
						$tp['drugname_en'] = $v['drugname_en'];
					} else {
						$tp['drugname_en'] = $v['drugname_cn'];
					}
				}

				$tp['drugcat'] = $v['drugcat'];

				if ($v['drug_origin'] == 0) {
					$tp['drug_origin'] = 'Domestic';
				} else {
					$tp['drug_origin'] = 'Imported';
				}

				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['drugname_trade_cn'])) {
						$tp['drugname_trade_en'] = $v['drugname_trade_cn'];
					} else {
						$tp['drugname_trade_en'] = $v['drugname_trade_en'];
					}
				} else {
					if (!empty($v['drugname_trade_en'])) {
						$tp['drugname_trade_en'] = $v['drugname_trade_en'];
					} else {
						$tp['drugname_trade_en'] = $v['drugname_trade_cn'];
					}
				}

				$tp['doseform']  = $v['doseform'];
				$tp['strength']  = $v['strength'];
				$tp['issuedate'] = $v['issuedate'];
				$tp['cndc']      = $v['cndc'];

				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['compname_cn'])) {
						$tp['compname_cn'] = $v['compname_cn'];
					} else {
						$tp['compname_cn'] = $v['compname_en'];
					}
				} else {
					if (!empty($v['compname_en'])) {
						$tp['compname_cn'] = $v['compname_en'];
					} else {
						$tp['compname_cn'] = $v['compname_cn'];
					}
				}
				array_push($jsonData, $tp);
			}
		}
		$arr_json                    = array();
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['data']            = $jsonData;
		echo CJSON::encode($arr_json);
	}

	//product investigational
	public function actionJsoninvestigational($id) {
		$phmMain = Phm_main::model();
		$cri     = new CDbCriteria();
		$cri->addCondition("mrd_pharma_id =:id");
		$cri->params[':id']     = $id;
		$phmMainInfo            = $phmMain->findAll($cri);
		$phmdrg_investigational = Phmdrg_investigational::model();
		$phmCri                 = new CDbCriteria();
		$infos                  = array();
		$total                  = 0;
		if (!empty($phmMainInfo[0]->investigational)) {
			$infos = $phmMainInfo[0]->investigational;
		} else if (!empty($phmMainInfo[0]->sub_pharma_id)) {
			$temp = explode(',', $phmMainInfo[0]->sub_pharma_id);
			$phmCri->addInCondition("mrd_pharma_id", $temp);
			if (!empty($_REQUEST['search']['value'])) {
				$phmCri->addCondition(" drugname like :keyword1 Or drugcat like :keyword2");
				$phmCri->params[':keyword1'] = "%".trim($_REQUEST['search']['value'])."%";
				$phmCri->params[':keyword2'] = "%".trim($_REQUEST['search']['value'])."%";
			}
			if (!empty($_REQUEST['length'])) {
				$phmCri->limit = $_REQUEST['length'];
			} else {
				$phmCri->limit = 30;
			}
			if (!empty($_REQUEST['start'])) {
				$phmCri->offset = $_REQUEST['start'];
			}
			//$cri->offset=$start;
			if (!empty($_REQUEST['order'][0]['dir'])) {
				$phmCri->order = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
			}
			//echo $_REQUEST['order'][0]['dir']."<br>";
			//var_dump($cri);
			$total = $phmdrg_investigational->count($phmCri);
			$infos = $phmdrg_investigational->findAll($phmCri);
		}

		$jsonData = array();
		if (!empty($infos)) {
			foreach ($infos as $v) {
				$t['drugname'] = $v['drugname'];
				$t['drugcat']  = $v['drugcat'];
				$t['regclass'] = $v['regclass'];
				if (!empty($v['status']) && $v['status'] == '0') {
					$t['status'] = '实验室';
				} else if (!empty($v['status']) && $v['status'] == '1') {
					$t['status'] = 'preclinical';
				} else if (!empty($v['status']) && $v['status'] == '2') {
					$t['status'] = 'IND';
				} else if (!empty($v['status']) && $v['status'] == '3') {
					$t['status'] = 'phase1';
				} else if (!empty($v['status']) && $v['status'] == '4') {
					$t['status'] = 'phase2';
				} else if (!empty($v['status']) && $v['status'] == '6') {
					$t['status'] = 'phase3';
				} else if (!empty($v['status']) && $v['status'] == '7') {
					$t['status'] = '申请上市';
				} else if (!empty($v['status']) && $v['status'] == '9') {
					$t['status'] = '上市';
				}
				$t['IND_appltype']           = $v['IND_appltype'];
				$t['IND_date_cdereceived']   = $v['IND_date_cdereceived'];
				$t['IND_status_new_overall'] = $v['IND_status_new_overall'];
				$t['IND_date_appr_delivery'] = $v['IND_date_appr_delivery'];
				$t['IND_num_accept']         = $v['IND_num_accept'];
				$t['count_Trials']           = $v['count_Trials'];
				$t['count_Trials_ongoing']   = $v['count_Trials_ongoing'];
				$t['count_Phase1']           = $v['count_Phase1'];
				$t['count_Phase2']           = $v['count_Phase2'];
				$t['count_Phase3']           = $v['count_Phase3'];
				$t['indication']             = $v['indication'];
				$t['NDA_appltype']           = $v['NDA_appltype'];
				$t['NDA_date_cdereceived']   = $v['NDA_date_cdereceived'];
				$t['NDA_status_new_overall'] = $v['NDA_status_new_overall'];
				$t['NDA_date_appr_delivery'] = $v['NDA_date_appr_delivery'];
				$t['NDA_num_accept']         = $v['NDA_num_accept'];
				array_push($jsonData, $t);
			}
		}
		$arr_json                    = array();
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['data']            = $jsonData;
		echo CJSON::encode($arr_json);
	}

	//clinical trials
	public function actionJsonTrials($id) {
		$phmdrgTrial2 = Phmdrg_trial2::model();
		$cri          = new CDbCriteria();
		$cri->addCondition("mrd_pharma_id =:id");
		$cri->params[":id"] = $id;

		if (!empty($_REQUEST['search']['value'])) {
			$cri->addCondition(" drugname like :keyword1 Or drugcat like :keyword2");
			$cri->params[':keyword1'] = "%".trim($_REQUEST['search']['value'])."%";
			$cri->params[':keyword2'] = "%".trim($_REQUEST['search']['value'])."%";
		}
		if (!empty($_REQUEST['length'])) {
			$cri->limit = $_REQUEST['length'];
		} else {
			$cri->limit = 30;
		}
		if (!empty($_REQUEST['start'])) {
			$cri->offset = $_REQUEST['start'];
		}
		//$cri->offset=$start;
		if (!empty($_REQUEST['order'][0]['dir'])) {
			$cri->order = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
		}
		$total    = $phmdrgTrial2->count($cri);
		$infos    = $phmdrgTrial2->findAll($cri);
		$jsonData = array();
		if (!empty($infos)) {
			foreach ($infos as $v) {
				//intervention_name_cn
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['intervention_name_cn'])) {
						$tp['intervention_name_cn'] = $v['intervention_name_cn'];
					} else {
						$tp['intervention_name_cn'] = $v['intervention_name_en'];
					}
				} else {
					if (!empty($v['intervention_name_en'])) {
						$tp['intervention_name_cn'] = $v['intervention_name_en'];
					} else {
						$tp['intervention_name_cn'] = $v['intervention_name_cn'];
					}
				}
				//phase_en
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['phase_cn'])) {
						$tp['phase_en'] = $v['phase_cn'];
					} else {
						$tp['phase_en'] = $v['phase_en'];
					}
				} else {
					if (!empty($v['phase_en'])) {
						$tp['phase_en'] = $v['phase_en'];
					} else {
						$tp['phase_en'] = $v['phase_cn'];
					}
				}
				//Recruiting_en
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['Recruiting_cn'])) {
						$tp['Recruiting_en'] = $v['Recruiting_cn'];
					} else {
						$tp['Recruiting_en'] = $v['Recruiting_en'];
					}
				} else {
					if (!empty($v['Recruiting_en'])) {
						$tp['Recruiting_en'] = $v['Recruiting_en'];
					} else {
						$tp['Recruiting_en'] = $v['Recruiting_cn'];
					}
				}
				//title_brief_en
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['title_brief_cn'])) {
						$tp['title_brief_en'] = $v['title_brief_cn'];
					} else {
						$tp['title_brief_en'] = $v['title_brief_en'];
					}
				} else {
					if (!empty($v['title_brief_en'])) {
						$tp['title_brief_en'] = $v['title_brief_en'];
					} else {
						$tp['title_brief_en'] = $v['title_brief_cn'];
					}
				}
				//condition_en
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['condition_cn'])) {
						$tp['condition_en'] = $v['condition_cn'];
					} else {
						$tp['condition_en'] = $v['condition_en'];
					}
				} else {
					if (!empty($v['condition_en'])) {
						$tp['condition_en'] = $v['condition_en'];
					} else {
						$tp['condition_en'] = $v['condition_cn'];
					}
				}
				//enrollment_anticipated
				$tp['enrollment_anticipated'] = $v['enrollment_anticipated'];
				//date_first_enrolled
				$tp['date_first_enrolled'] = $v['date_first_enrolled'];
				//date_complete
				$tp['date_complete'] = $v['date_complete'];

				array_push($jsonData, $tp);
			}
		}

		$arr_json                    = array();
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['data']            = $jsonData;
		echo CJSON::encode($arr_json);
	}

	//china Companies
	public function actionJsonchinasub($id) {
		$phmSub = Phm_subcomp::model();
		$cri    = new CDbCriteria();
		$cri->addCondition("parent_id = :id AND country like :country");
		$cri->params[":id"]      = $id;
		$cri->params[":country"] = '%中国%';

		if (!empty($_REQUEST['search']['value'])) {
			$cri->addCondition(" drugname like :keyword1 Or drugcat like :keyword2");
			$cri->params[':keyword1'] = "%".trim($_REQUEST['search']['value'])."%";
			$cri->params[':keyword2'] = "%".trim($_REQUEST['search']['value'])."%";
		}
		if (!empty($_REQUEST['length'])) {
			$cri->limit = $_REQUEST['length'];
		} else {
			$cri->limit = 30;
		}
		if (!empty($_REQUEST['start'])) {
			$cri->offset = $_REQUEST['start'];
		}
		//$cri->offset=$start;
		if (!empty($_REQUEST['order'][0]['dir'])) {
			$cri->order = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
		}
		$total = $phmSub->count($cri);
		$infos = $phmSub->findAll($cri);

		$jsonData = array();
		if (!empty($infos)) {
			foreach ($infos as $v) {
				//mrd_pharma_cn
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v['mrd_pharma_cn'])) {
						$tp['mrd_pharma_cn'] = $v['mrd_pharma_cn'];
					} else {
						$tp['mrd_pharma_cn'] = $v['mrd_pharma_en'];
					}
				} else {
					if (!empty($v['mrd_pharma_en'])) {
						$tp['mrd_pharma_cn'] = $v['mrd_pharma_en'];
					} else {
						$tp['mrd_pharma_cn'] = $v['mrd_pharma_cn'];
					}
				}
				//business_type
				$tp['business_type'] = $v['business_type'];
				//parent_Company_proportion
				$tp['parent_Company_proportion'] = $v['parent_Company_proportion'];
				//reg_capital
				$tp['reg_capital'] = $v['reg_capital'];
				//asset_size
				$tp['asset_size'] = $v['asset_size'];
				//Owner_equity
				$tp['Owner_equity'] = $v['Owner_equity'];
				//Operating_income
				$tp['Operating_income'] = $v['Operating_income'];
				//Net_profit
				$tp['Net_profit'] = $v['Net_profit'];
				array_push($jsonData, $tp);
			}
		}
		$arr_json                    = array();
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['data']            = $jsonData;
		echo CJSON::encode($arr_json);

	}
	public function actionJsonpharma_index() {
		$phmMain = Phm_main::model();
		$cri     = new CDbCriteria();

		$cri->addCondition("corporation_type=:type OR corporation_type=:type1");
		$cri->params[':type']  = 'Parent';
		$cri->params[':type1'] = 'single';

		if (!empty($_REQUEST['search_pharma'])) {
			$cri->addCondition(" keyword like :keyword ");
			$cri->params[':keyword'] = "%".trim($_REQUEST['search_pharma'])."%";
		}

		if (!empty($_REQUEST['search']['value'])) {
			$cri->addCondition(" keyword like :keyword ");
			$cri->params[':keyword'] = "%".trim($_REQUEST['search']['value'])."%";
		}

		//search params

		//2.Product portfolio
		if (!empty($_REQUEST['mes'])) {
			$mes = $_REQUEST['mes'];
			if (count($mes) == 1) {
				if ($mes[0] == 'With Marketed Product') {
					$cri->addCondition(" count_Approved_drug <> 0 ", 'AND');
				} else if ($mes[0] == "With product in market  registration") {
					$cri->addCondition('count_Investigational_API <> 0', 'AND');
				} else if ($mes[0] == "With product in clinical studies") {
					$cri->addCondition('count_Trials_ongoing <> 0', 'AND');
				} else if ($mes[0] == "With IND on file") {
					$cri->addCondition('count_IND <> 0', 'AND');
				}
			} else if (count($mes) > 1) {
				$str = "";
				foreach ($mes as $v) {
					if ($v == 'With Marketed Product') {
						$str .= "(count_Approved_drug <> 0)  or  ";
					}
					if ($v == "With product in market  registration") {
						$str .= "(count_Investigational_API <> 0)  or  ";
					}
					if ($v == "With product in clinical studies") {
						$str .= "(count_Trials_ongoing <> 0)  or  ";
					}
					if ($v == "With IND on file") {
						$str .= "(count_IND <> 0)  or  ";
					}
				}
				$str = substr($str, 0, -4);
				//echo $str;
				$cri->addCondition($str, 'AND');
			}
		}
		//3.Manufacturing capabilities
		if (!empty($_REQUEST['mc'])) {
			$mc = $_REQUEST['mc'];
			if (count($mc) == 1) {
				if ($mc[0] == 'R&D') {
					$cri->addCondition("corporation_type like :type ", 'AND');
					$cri->params[':type'] = '%R&D center%';
				} else if ($mc[0] == 'Manufacturing') {
					$cri->addCondition("function like :manufacturing ", 'AND');
					$cri->params[':manufacturing'] = '%manufpermit%';
				} else if ($mc[0] == 'Distribution') {
					$cri->addCondition("function like :distribution", 'AND');
					$cri->params[':distribution'] = '%salespermit%';
				} else if ($mc[0] == 'Pharmacy') {
					$cri->addCondition("function like :pharmacy", 'AND');
					$cri->params[':pharmacy'] = '%pharmacy%';
				}
			} else if (count($mc) > 1) {
				$str = "";
				foreach ($mc as $v) {
					if ($v == 'R&D') {
						$str .= "(corporation_type like '%R&D center%')  or  ";
					}
					if ($v == "Manufacturing") {
						$str .= "function like '%manufpermit%'  or  ";
					}
					if ($v == "Distribution") {
						$str .= "function like '%salespermit%'  or  ";
					}
					if ($v == "Pharmacy") {
						$str .= "function like '%pharmacy%'  or  ";
					}
				}
				$str = substr($str, 0, -4);
				$cri->addCondition($str, 'AND');
			}
		}

		//4.Domestic Company(RMB)
		if (!empty($_REQUEST['dc'])) {
			$dc = $_REQUEST['dc'];
			if (count($dc) == 1) {
				if ($dc[0] == '>10 billion') {
					$cri->addCondition("(revenue > 10)", 'AND');
				} else if ($dc[0] == '1-10 billion') {
					$cri->addCondition("(revenue < 10 AND revenue > 1)", 'AND');
				} else if ($dc[0] == '0.5-1 billion') {
					$cri->addCondition("(revenue < 1 AND revenue > 0.5 ) ", 'AND');
				} else if ($dc[0] == '0-0.5 billion') {
					$cri->addCondition("(revenue < 0.5 AND revenue > 0 )", 'AND');
				}
			} else if (count($dc) > 1) {
				$str = "";
				foreach ($dc as $v) {
					if ($v == '>10 billion') {
						$str .= "(revenue > 10)  or  ";
					}
					if ($v == "1-10 billion") {
						$str .= "(revenue < 10 AND revenue > 1)  or  ";
					}
					if ($v == "0.5-1 billion") {
						$str .= "(revenue < 1 AND revenue > 0.5 ) or  ";
					}
					if ($v == "0-0.5 billion") {
						$str .= "(revenue < 0.5 AND revenue > 0 )  or  ";
					}
				}
				$str = substr($str, 0, -4);
				$cri->addCondition($str, 'AND');
			}
		}

		//5.Listed Domestic Company
		if (!empty($_REQUEST['ldc'])) {
			$ldc = $_REQUEST['ldc'];
			if (count($ldc) == 1) {
				$cri->addCondition(" Listing like '%".$ldc[0]."%' ", "AND");
			} else if (count($ldc) > 1) {
				$str = "";
				foreach ($ldc as $v) {
					$str .= " phmBasic.exchange = '%".$v."%'  or  ";
				}
				$str = substr($str, 0, -4);
				$cri->addCondition($str, 'AND');
			}
		}
		//6.Manufacturing scope
		if (!empty($_REQUEST['mfc'])) {
			$mfc = $_REQUEST['mfc'];
			if (count($mfc) == 1) {
				if ($mfc[0] == 'Small Molecule') {
					$cri->addCondition(" manuf_catcode like '%H%'", 'AND');
				} else if ($ms[0] == 'TCM') {
					$mfc->addCondition("manuf_catcode like '%Z%'", 'AND');
				} else if ($ms[0] == 'Biologics') {
					$mfc->addCondition("manuf_catcode like '%S%'", 'AND');
				} else if ($ms[0] == 'Diagnostics') {
					$mfc->addCondition("manuf_catcode like '%T%'", 'AND');
				} else if ($ms[0] == 'Misc') {
					$mfc->addCondition("manuf_catcode like '%Y%'", 'AND');
				}
			} else if (count($mfc) > 1) {
				$str = "";
				foreach ($mfc as $v) {
					if ($v == 'Small Molecule') {
						$str .= "(manuf_catcode like '%H%')  or  ";
					}
					if ($v == "TCM") {
						$str .= "(manuf_catcode like '%Z%')  or  ";
					}
					if ($v == "Biologics") {
						$str .= "(manuf_catcode like '%S%')  or  ";
					}
					if ($v == "Diagnostics") {
						$str .= "(manuf_catcode like '%T%')  or  ";
					}
					if ($v == "Misc") {
						$str .= "(manuf_catcode like '%Y%')  or  ";
					}
				}
				$str = substr($str, 0, -4);
				$cri->addCondition($str, 'AND');
			}
		}
		if (!empty($_REQUEST['length'])) {
			$cri->limit = $_REQUEST['length'];
		} else {
			$cri->limit = 20;
		}
		if (!empty($_REQUEST['start'])) {
			$cri->offset = $_REQUEST['start'];
		}
		//$cri->offset=$start;
		if (!empty($_REQUEST['order'][0]['dir'])) {
			$cri->order = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
		}
		//echo $_REQUEST['order'][0]['dir']."<br>";
		//var_dump($cri);
		$total    = $phmMain->count($cri);
		$listInfo = $phmMain->findAll($cri);
		//echo $total."<br>";
		//echo "<pre>";
		//var_dump($phmMain->findAll($cri));
		$jsonData = array();
		if (!empty($listInfo)) {
			foreach ($listInfo as $key => $value) {
				$temp['mrd_pharma_id'] = '<input type="checkbox" class="checkboxes" name="id[]" value="'.$value['mrd_pharma_id'].'">';
				if (!empty($value['mrd_pharma_cn'])) {
					$temp['mrd_pharma_cn'] = "<a href='".$this->createUrl('pharma/single'
						, array('id' => $value['mrd_pharma_id']))."' title='".$value['mrd_pharma_cn']."'>".$value['mrd_pharma_cn']."</a>";
				} else {
					$temp['mrd_pharma_cn'] = "<a href='".$this->createUrl('pharma/single'
						, array('id' => $value['mrd_pharma_id']))."' title='".$value['mrd_pharma_en']."'>".$value['mrd_pharma_en']."</a>";
				}
				$temp['Listing']              = $value['Listing'];
				$temp['Revenue']              = $value['Revenue'];
				$temp['count_IND']            = $value['count_IND'];
				$temp['count_Trials_ongoing'] = $value['count_Trials_ongoing'];
				$temp['count_Phase1']         = $value['count_Phase1'];
				$temp['count_Phase2']         = $value['count_Phase2'];
				$temp['count_Phase3']         = $value['count_Phase3'];
				$temp['count_Preclinical']    = $value['count_Preclinical'];
				$temp['parent_id']            = $value['mrd_pharma_id'];
				if (!empty($value['corporation_type']) && $value['corporation_type'] == "Parent") {
					$temp['parent_html'] = '<i data-target ="'.$value['mrd_pharma_id'].'"  class="fa fa-arrow-circle-down"></i>';
				} else {
					$temp['parent_html'] = '<i class=""  data-target ="'.$value['mrd_pharma_id'].'" >&nbsp;&nbsp;</i>';
				}

				array_push($jsonData, $temp);
			}
		}
		$arr_json                    = array();
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['data']            = $jsonData;
		// echo "<pre>";
		// var_dump($listInfo);
		echo CJSON::encode($arr_json);
	}
	//search filter sub company
	public function actionJsonsubcompany($parent_id) {
		$phmMain        = Phm_main::model();
		$cri            = new CDbCriteria();
		$cri->condition = "parent_id = '".$parent_id."'";
		$infos          = $phmMain->findAll($cri);

		$jsonData = array();
		if (!empty($infos)) {
			foreach ($infos as $key => $value) {
				$temp['mrd_pharma_id'] = '<input type="checkbox" class="checkboxes" name="id[]" value="'.$value['mrd_pharma_id'].'">';
				if (!empty($value['mrd_pharma_cn'])) {
					$temp['mrd_pharma_cn'] = "<a href='".$this->createUrl('pharma/single'
						, array('id' => $value['mrd_pharma_id']))."' title='".$value['mrd_pharma_cn']."'>".$value['mrd_pharma_cn']."</a>";
				} else {
					$temp['mrd_pharma_cn'] = "<a href='".$this->createUrl('pharma/single'
						, array('id' => $value['mrd_pharma_id']))."' title='".$value['mrd_pharma_en']."'>".$value['mrd_pharma_en']."</a>";
				}
				$temp['Listing']              = $value['Listing'];
				$temp['Revenue']              = $value['Revenue'];
				$temp['count_IND']            = $value['count_IND'];
				$temp['count_Trials_ongoing'] = $value['count_Trials_ongoing'];
				$temp['count_Phase1']         = $value['count_Phase1'];
				$temp['count_Phase2']         = $value['count_Phase2'];
				$temp['count_Phase3']         = $value['count_Phase3'];
				$temp['count_Preclinical']    = $value['count_Preclinical'];
				$temp['parent_id']            = $value['mrd_pharma_id'];
				if (!empty($value['corporation_type']) && $value['corporation_type'] == "Parent") {
					$temp['parent_html'] = '<i class="fa fa-arrow-circle-down"></i>';
				} else {
					$temp['parent_html'] = '<i class="">&nbsp;&nbsp;</i>';
				}

				array_push($jsonData, $temp);
			}
		}
		echo CJSON::encode($jsonData);
	}

}