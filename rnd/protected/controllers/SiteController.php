<?php
class SiteController extends BaseController {
	/**
	 * site list page
	 */
	public function actionIndex() {
		// $user =Tools::User();
		// echo $user->id;
		/**
		$excel = Yii::createComponent('application.extensions.phpexcel.Excel');
		$objPHPExcel = Yii::createComponent('application.extensions.phpexcel.Classes.PHPExcel');
		// $objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A2', 'Miscellaneous glyphs')
		->setCellValue('B2', '中国人民')
		->setCellValue('C2', '中国人民')
		->setCellValue('D2', '中国人民');

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A3', 'Miscellaneous glyphs1')
		->setCellValue('B3', '中国人民1')
		->setCellValue('C3', '中国人民1')
		->setCellValue('D3', '中国人民1');

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A4', 'Miscellaneous glyphs2')
		->setCellValue('B4', '中国人民2')
		->setCellValue('C4', '中国人民2')
		->setCellValue('D4', '中国人民2');
		$excel->Excel1($objPHPExcel);
		exit();
		 */
		$ste_deptmoh   = Ste_deptmoh::model();
		$stedeptmohCri = new CDbCriteria();
		$stedeptmohCri->addCondition(" sort_no <>0  ORDER by sort_no");
		$deptments = $ste_deptmoh->findAll($stedeptmohCri);

		$module_type = "mrd_site";
		$mrd_site    = Tools::getUserMyList($module_type);
		$this->render("site_list", array("deptments" => $deptments, "mrd_site" => $mrd_site));
	}

	/**
	 * site single page
	 */
	public function actionSingle($id) {
		$steMail = Ste_main::model();
		$cri     = new CDbCriteria();
		$cri->addCondition("siteclin_id = :id ");
		$cri->params[":id"] = $id;
		$steInfos           = $steMail->findAll($cri);

		$this->render("site_single", array("model" => $steInfos[0]));
	}

	/**
	 * doctor investigator
	 */
	public function actionInvestigator($id) {
		$arr_json = array();
		if (empty($id)) {
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$inv = Ste_investigator::model();
		$cri = new CDbCriteria();
		$cri->addCondition("siteclin_id = :id");
		$cri->params[':id'] = $id;

		if (!empty($_REQUEST['length'])) {
			$cri->limit = $_REQUEST['length'];
		} else {
			$cri->limit = 20;
		}
		if (!empty($_REQUEST['start'])) {
			$cri->offset = $_REQUEST['start'];
		}
		if (!empty($_REQUEST['order'][0]['dir'])) {
			$cri->order = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
		}

		$total = $inv->count($cri);

		$Infos = $inv->findAll($cri);

		$jsonData = array();
		if (!empty($Infos)) {
			foreach ($Infos as $v) {
				$temp['name']                  = $v['name'];
				$temp['title_clinician']       = $v['title_clinician'];
				$temp['count_PItrials']        = $v['count_PItrials']."/".$v['count_leadPItrials'];
				$temp['count_PItrials_global'] = $v['count_PItrials_global']."/".$v['count_leadPItrials_global'];
				$temp['count_publication']     = $v['count_publication'];
				array_push($jsonData, $temp);
			}
		}
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['data']            = $jsonData;
		echo CJSON::encode($arr_json);
	}

	/**
	 * trials  on this site
	 * ste_trial2 view table
	 */
	public function actionTrialsOnThisSite($id) {
		$arr_json = array();
		if (empty($id)) {
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$trials = Ste_trial2::model();
		$cri    = new CDbCriteria();
		$cri->addCondition("siteclin_id = :id");
		$cri->params[':id'] = $id;

		if (!empty($_REQUEST['length'])) {
			$cri->limit = $_REQUEST['length'];
		} else {
			$cri->limit = 20;
		}
		if (!empty($_REQUEST['start'])) {
			$cri->offset = $_REQUEST['start'];
		}
		if (!empty($_REQUEST['order'][0]['dir'])) {
			$cri->order = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
		}

		$total = $trials->count($cri);

		$Infos = $trials->findAll($cri);

		$jsonData = array();
		if (!empty($Infos)) {
			foreach ($Infos as $v) {
				//title_official_en
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v->title_official_cn)) {
						$tp['title_official_en'] = $v['title_official_cn'];
					} else {
						$tp['title_official_en'] = $v['title_official_en'];
					}
				} else {
					if (!empty($v->title_official_en)) {
						$tp['title_official_en'] = $v['title_official_en'];
					} else {
						$tp['title_official_en'] = $v['title_official_cn'];
					}
				}
				//condition_en
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v->condition_cn)) {
						$tp['condition_en'] = $v['condition_cn'];
					} else {
						$tp['condition_en'] = $v['condition_en'];
					}
				} else {
					if (!empty($v->condition_en)) {
						$tp['condition_en'] = $v['condition_en'];
					} else {
						$tp['condition_en'] = $v['condition_cn'];
					}
				}
				//intervention_name_cn
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v->intervention_name_cn)) {
						$tp['intervention_name_cn'] = $v['intervention_name_cn'];
					} else {
						$tp['intervention_name_cn'] = $v['intervention_name_en'];
					}
				} else {
					if (!empty($v->intervention_name_en)) {
						$tp['intervention_name_cn'] = $v['intervention_name_en'];
					} else {
						$tp['intervention_name_cn'] = $v['intervention_name_cn'];
					}
				}
				//phase_en
				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($v->phase_cn)) {
						$tp['phase_en'] = $v['phase_cn'];
					} else {
						$tp['phase_en'] = $v['phase_en'];
					}
				} else {
					if (!empty($v->phase_en)) {
						$tp['phase_en'] = $v['phase_en'];
					} else {
						$tp['phase_en'] = $v['phase_cn'];
					}
				}
				//COUNTRY
				if (!empty($v->COUNTRY) && $v->COUNTRY == "China Only") {
					$tp['COUNTRY'] = "Local";
				} else if ($v->COUNTRY == "Both China and Non-China") {
					$tp['COUNTRY'] = "Global";
				} else {
					$tp['COUNTRY'] = "N/A";
				}
				//count_site
				$tp['count_site'] = $v['count_site'];
				//date_first_enrolled
				$tp['date_first_enrolled'] = $v['date_first_enrolled'];
				//date_complete
				$tp['date_complete'] = $v['date_complete'];
				//enrollment_anticipated
				$tp['enrollment_anticipated'] = $v['enrollment_anticipated'];
				//enrollment_actual
				$tp['enrollment_actual'] = $v['enrollment_actual'];
				array_push($jsonData, $tp);
			}
		}
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['data']            = $jsonData;
		echo CJSON::encode($arr_json);
	}

	/**
	 * same site area
	 */
	public function actionSameSiteArea($id) {
		$arr_json = array();
		if (empty($id)) {
			echo CJSON::encode($arr_json);
			return;
			exit();
		}
		$steSite = Ste_site2::model();
		$cri     = new CDbCriteria();
		$cri->addCondition("siteclin_id1 = :id");
		$cri->params[':id'] = $id;

		if (!empty($_REQUEST['length'])) {
			$cri->limit = $_REQUEST['length'];
		} else {
			$cri->limit = 20;
		}
		if (!empty($_REQUEST['start'])) {
			$cri->offset = $_REQUEST['start'];
		}
		if (!empty($_REQUEST['order'][0]['dir'])) {
			$cri->order = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data']."   ".$_REQUEST['order'][0]['dir'];
		}

		$total = $steSite->count($cri);

		$Infos = $steSite->findAll($cri);

		$jsonData = array();
		if (!empty($Infos)) {
			foreach ($Infos as $v) {
				$tm['TA_cert']     = $v['TA_cert'];
				$tm['hospname_cn'] = "<a href='".$this->createUrl('site/single'
					, array('id' => $v['siteclin_id2']))."' title='".$v['hospname_cn']."'>".$v['hospname_cn']."</a>";
				$tm['province']             = $v['province'];
				$tm['city']                 = $v['city'];
				$tm['issuedate_sitecert']   = $v['issuedate_sitecert'];
				$tm['expirdate_sitecert']   = $v['expirdate_sitecert'];
				$tm['count_trl_5completed'] = $v['count_trl_5completed'];
				$tm['count_trl_ongoing']    = $v['count_trl_ongoing'];
				$tm['count_trl_drug']       = $v['count_trl_drug'];
				$tm['count_trl_global']     = $v['count_trl_china']."/".$v['count_trl_global'];
				$tm['NewActivity']          = $v['NewActivity'];
				array_push($jsonData, $tm);
			}
		}
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['data']            = $jsonData;
		echo CJSON::encode($arr_json);
	}
	public function actionJsonsite_index() {
		$arr_json = array();
		$steMail  = Ste_main::model();
		$cri      = new CDbCriteria();

		$ste_deptmoh   = Ste_deptmoh::model();
		$stedeptmohCri = new CDbCriteria();
		$stedeptmohCri->addCondition(" sort_no <>0  ORDER by sort_no");
		$deptments = $ste_deptmoh->findAll($stedeptmohCri);
		//search
		if (!empty($_REQUEST['search_site'])) {
			$cri->addCondition(" keyword like :keyword ");
			$cri->params[':keyword'] = "%".trim($_REQUEST['search_site'])."%";
		}
		if (!empty($_REQUEST['search']['value'])) {
			$cri->addCondition(" keyword like :keyword ");
			$cri->params[':keyword'] = "%".trim($_REQUEST['search']['value'])."%";
		}

		if (!empty($_REQUEST['province']) && $_REQUEST['province'] != "undefined") {
			$cri->addCondition(" province like :province ");
			$cri->params[":province"] = $_REQUEST['province'];
		}

		//filter
		//1.therapetic area
		if (!empty($_REQUEST['ta'])) {
			$ta = $_REQUEST['ta'];
			if (count($ta) == 1) {
				$str = "";
				foreach ($deptments as $v) {
					if ($v->dept_cn == $ta[0] || $v->dept_en == $ta[0]) {
						$str = $v->code;
					}
				}
				$cri->addCondition("dept_moh LIKE '|".$str."%|'", 'AND');
			} elseif (count($ta) > 1) {
				$str = "";
				foreach ($ta as $v) {
					foreach ($deptments as $v1) {
						if ($v1->dept_cn == $v || $v1->dept_en == $v) {
							//$str = $v->code;
							$str .= "dept_moh LIKE '|".$v1->code."%|'  or  ";
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
					$str .= "city_level LIKE '%".$v."%'  or  ";
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

		$total    = $steMail->count($cri);
		$infos    = $steMail->findAll($cri);
		$jsonData = array();
		$jsonMap  = array();
		if (!empty($infos)) {
			foreach ($infos as $key => $value) {
				$temp['siteclin_id'] = '<input type="checkbox" class="checkboxes" name="id[]" value="'.$value['siteclin_id'].'"> <div id="site_'.$value['siteclin_id'].'"></div>';
				$temp['TA_cert']     = $value['TA_cert'];
				//$temp['hospname_cn'] = $value['hospname_cn'];

				if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
					if (!empty($value->hospname_cn)) {
						$temp['hospname_cn'] = "<a href='".$this->createUrl('site/single'
							, array('id' => $value['siteclin_id']))."' title='".$value['hospname_cn']."'>".$value['hospname_cn']."</a>";
					} else {
						$temp['hospname_cn'] = "<a href='".$this->createUrl('site/single'
							, array('id' => $value['siteclin_id']))."' title='".$value['hospname_en']."'>".$value['hospname_en']."</a>";
					}
				} else {
					if (!empty($value->hospname_en)) {
						$temp['hospname_cn'] = "<a href='".$this->createUrl('site/single'
							, array('id' => $value['siteclin_id']))."' title='".$value['hospname_en']."'>".$value['hospname_en']."</a>";
					} else {
						$temp['hospname_cn'] = "<a href='".$this->createUrl('site/single'
							, array('id' => $value['siteclin_id']))."' title='".$value['hospname_cn']."'>".$value['hospname_cn']."</a>";
					}
				}

				$temp['province']             = $value['province'];//??
				$temp['city']                 = $value['city'];//??
				$temp['issuedate_sitecert']   = $value['issuedate_sitecert'];
				$temp['expirdate_sitecert']   = $value['expirdate_sitecert'];
				$temp['count_trl_5completed'] = $value['count_trl_5completed'];
				$temp['count_trl_ongoing']    = $value['count_trl_ongoing'];
				$temp['count_trl_drug']       = $value['count_trl_drug'];
				$temp['count_trl_china']      = $value['count_trl_china'];
				$temp['NewActivity']          = $value['NewActivity'];//??
				if (!empty($value['lat']) && !empty($value['lng'])) {
					//$map['latLng']= "[".$value['lat'].",".$value['lng']."]";
					$map['latLng'][0] = $value['lat'];
					$map['latLng'][1] = $value['lng'];
					$map['id']        = $value['siteclin_id'];
					//hospitial name
					if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
						if (!empty($value->hospname_cn)) {
							$map['name'] = $value['hospname_cn'];
						} else {
							$map['name'] = $value['hospname_en'];
						}
					} else {
						if (!empty($value->hospname_en)) {
							$map['name'] = $value['hospname_en'];
						} else {
							$map['name'] = $value['hospname_cn'];
						}
					}
				}

				array_push($jsonData, $temp);
				array_push($jsonMap, $map);

			}

		}
		$arr_json['recordsTotal']    = $total;
		$arr_json['recordsFiltered'] = $total;
		$arr_json['jData']           = $jsonMap;
		$arr_json['data']            = $jsonData;
		echo CJSON::encode($arr_json);

	}

	/***
	 * print pdf php
	 */
	public function actionPrintPdf() {
		// $pdf = Yii::createComponent('application.extensions.tcpdf.Pdf');
		// $pdf->printPdf("site","<h1>中国人民</h1>");
		// exit();
		$html = $_POST['tableContent'];
		//echo $html;
		//$html = $_REQUEST['html'];
		$pdf = Yii::createComponent('application.extensions.tcpdf.Pdf');
		//echo $html."dddd";
		$pdf->printPdf("site", $html);
	}

}