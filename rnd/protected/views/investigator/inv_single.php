<!--start subTitle row-->
<div class="row profile">
    <div class="col-md-12">
        <div  id="header_nav">
            <div class="tabbable-line tabbable-full-width">
                <div class="nav-title pull-left">
                    <h1 class="title">
                        <?php
                         if(!empty($model->name)){
                         	echo $model->name;
                         }else{
                         	echo "N/A";
                         }
                        ?>
                    </h1>
                </div>
                <ul class="nav nav-tabs" id="nav-tabs">
                    <li class="current">
                        <a href="#tab_overview" data-toggle="tab">Overview</a>
                    </li>
                    <li>
                        <a href="#tab_trials" data-toggle="tab">Trail</a>
                    </li>
                    <li>
                    	<a href="#tab_pub" data-toggle="tab">Publication</a>
                    </li>
                    <li>
                    	<a href="#tab_collaborator" data-toggle="tab">Collaborators</a>
                    </li>
                    <li>
                    	<a href="#tab_association_post" data-toggle="tab">Association Post</a>
                    </li>
                </ul>
                <div class="tab-content not_bg no_padding"></div>
            </div>
        </div>
    </div>
</div>
<!--end subTitle row-->

<!--begin overview-->
<div class="section" id="tab_overview">
	<div class="row">
		<div class="col-md-8">
			<div class="portlet portlet-mrd-overview">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize">desciption</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="scroller" style="height: 400px;" data-rail-visible="1" data-handle-color="#a1b2bd">
						<p>
							<img src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/media/blog/6.jpg" alt="" class="img-body pull-left" />
							
							<?php
							if(!empty($model->brief)){
								echo $model->brief;
							}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="portlet portlet-mrd-left">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize">Clinical Experience</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="scroller" style="height: 400px;" data-rail-visible="1" data-handle-color="#a1b2bd">
						<p><strong>Specialized disease: </strong>
							<?php
							if(!empty($model->specialized_indication)){
								echo $model->specialized_indication;
							}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   overview-->

<!--begin trial involved-->
<div class="section" id="tab_trials">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('investigator','h_Trials_involved');?></span>
					</div>
					<div class="actions">
						<div class="btn-group">
							<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">Columns <i class="fa fa-angle-down"></i>
							</a>
							<div id="inv_trials_involved_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
								<label><input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", 'f_Products_name');?></label>
							</div>
						</div>
						<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
					</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="inv_trials_involved_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table id="inv_trials_involved" class="table table-mrd" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th><?php echo Yii::t('investigator','h_Role');?></th>
									<th><?php echo Yii::t('investigator','f_Trial_title');?></th>
									<th><?php echo Yii::t('investigator','f_Drug_name');?></th>
									<th><?php echo Yii::t('investigator','f_Indication');?></th>
									<th><?php echo Yii::t('investigator','f_Sponsor');?></th>
									<th><?php echo Yii::t('investigator','f_Type_of_trial');?></th>
									<th><?php echo Yii::t('investigator','f_Phase');?></th>
									<th><?php echo Yii::t('investigator','f_Recruitment_status');?></th>
									<th><?php echo Yii::t('investigator','f_Total_recruitment');?></th>
									<th><?php echo Yii::t('investigator','h_Collaborators');?></th>
									<th><?php echo Yii::t('investigator','h_Publications');?></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   trial involved-->


<!--begin publications-->
<div class="section" id="tab_pub">
	<div class="row">
	  <div class="col-md-12">
		<div class="portlet portlet-mrd-list">
			<div class="portlet-title">
				<div class="caption">
					<span class="capitalize"><?php echo Yii::t('investigator','h_Publications');?></span>
				</div>
				<div class="actions">
					<div class="btn-group">
						<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">Columns <i class="fa fa-angle-down"></i></a>
						<div id="inv_publications_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
							<label><input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", 'f_Products_name');?></label>
						</div>
					</div>
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
				</div>
		 </div>
		 <div class="portlet-body">
		 	<div class="loading" id="inv_publications_loading" style="display: none;"></div>
		 	<div class="table-responsive">
		 		<table id="inv_publications" class="table table-mrd" cellspacing="0" width="100%">
		 			<thead>
		 				<tr>
		 					<th><?php echo Yii::t('investigator','f_Article_title');?></th>
		 					<th><?php echo Yii::t('investigator','f_Publication_date');?></th>
		 					<th><?php echo Yii::t('investigator','f_Journal_name');?></th>
		 					<th><?php echo Yii::t('investigator','f_Journal_Impact_factor');?></th>
		 					<th><?php echo Yii::t('investigator','f_Author_list');?></th>
		 					<th><?php echo Yii::t('investigator','f_Abstract');?></th>
		 				</tr>
		 			</thead>
		 		</table>
		 	</div>
		</div>
	</div>
   </div>
  </div>
</div>
<!--end   publications-->


<!--begin Collaborators-->
<div class="section" id="tab_collaborator">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('investigator','f_Collaborators');?></span>
					</div>
					<div class="actions">
						<div class="btn-group">
							<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
							Columns <i class="fa fa-angle-down"></i></a>
							<div id="inv_publications_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
								<label><input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", 'f_Products_name');?></label>
							</div>
						</div>
						<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
					</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="table_inv_coll_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table id="table_inv_coll" class="table table-mrd" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th><?php echo Yii::t('investigator','f_Name');?></th>
									<th><?php echo Yii::t('investigator','f_Hospital');?></th>
									<th><?php echo Yii::t('investigator','f_Deparment');?></th>
									<th><?php echo Yii::t('investigator','f_Number_of_trials_collaborated');?></th>
									<th><?php echo Yii::t('investigator','f_Trials_collaborated');?></th>
									<th><?php echo Yii::t('investigator','f_Number_of_products_collaborated');?></th>
									<th><?php echo Yii::t('investigator','f_Products_collaborated');?></th>
									<th><?php echo Yii::t('investigator','f_Number_of_publications_collaborated');?></th>
									<th><?php echo Yii::t('investigator','f_Publications_collaborated');?></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end  Collaborators-->


<!--begin Association_post-->
<div class="section" id="tab_association_post">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('investigator','h_Association_post');?></span>
					</div>
					<div class="actions">
						<div class="btn-group">
							<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
								    	Columns <i class="fa fa-angle-down"></i> </a>
							<div id="table_inv_assn_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
								<label><input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", 'f_Products_name');?></label>
							</div>
						</div>
						<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
					</div>
				</div>
			<div class="portlet-body">
				<div class="loading" id="table_inv_assn_loading" style="display: none;"></div>
				<div class="table-responsive">
					<table id="table_inv_assn" class="table table-mrd" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th><?php echo Yii::t('investigator','f_Name');?></th>
									<th><?php echo Yii::t('investigator','h_Kol_Name');?></th>
									<th><?php echo Yii::t('investigator','h_Kol_Title');?></th>
									<th><?php echo Yii::t('investigator','f_Therapeutic_area');?></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end  Association_post-->

	
<!--begin script-->
<script>
	$(function () {
		var itUrl=<?php echo "'".$this->createUrl("investigator/trialsInvolved",array("id"=>$_REQUEST["id"]))."'";?>;
		var itData =[
			{"data":"role"},
			{"data":"title_official_en"},
			{"data":"intervention_name_en"},
			{"data":"condition_en"},
			{"data":"sponsor_en"},
			{"data":"COUNTRY"},
			{"data":"phase_en"},
			{"data":"Recruiting"},
			{"data":"enrollment_actual"},
			{"data":"investigator"},
			{"data":"PMID"},
		];
		dataTableAjax(itUrl,"","#inv_trials_involved",itData,"300");
		var ipUrl = <?php echo "'".$this->createUrl("investigator/publications",array("id"=>$_REQUEST["id"]))."'";?>; 
		var ipData = [
			{"data":"ArticleTitle"},
			{"data":"ArticleDate"},
			{"data":"JournalTitle"},
			{"data":"SCI_IF"},
			{"data":"AuthorList"},
			{"data":"ISSN"},
		];
		dataTableAjax(ipUrl,"","#inv_publications",ipData,"300");
		
		var collUrl=<?php echo "'".$this->createUrl("investigator/invColls",array("id"=>$_REQUEST["id"]))."'";?>;
		var collData = [
			{"data":"name"},
			{"data":"hospital"},
			{"data":"department"},
			{"data":"count_trial"},
			{"data":"trial"},
			{"data":"count_drug"},
			{"data":"drug"},
			{"data":"count_publication"},
			{"data":"publication"},
		];
		dataTableAjax(collUrl,"","#table_inv_coll",collData,"300");
		var assnUrl =<?php echo "'".$this->createUrl("investigator/invAssn",array("id"=>$_REQUEST["id"]))."'";?>;
		var assnData = [
			{"data":"name_cn"},
			{"data":"other_name"},
			{"data":"title_assn"},
			{"data":"system"},
		];
		dataTableAjax(assnUrl,"","#table_inv_assn",assnData,"300");
	});
</script>
<!--end   script-->





