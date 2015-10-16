<!--start subTitle row-->
<div class="row profile">
    <div class="col-md-12">
        <div  id="header_nav">
            <div class="tabbable-line tabbable-full-width">
                <div class="nav-title" style="width: 100%;">
                    <h1 class="title">
                        <?php
                         if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
                         	if(!empty($model->title_official_cn)){
                         		echo $model->title_official_cn;
                         	}else{
                         		echo $model->title_official_en;
                         	}
                         }else{
                         	if(!empty($model->title_official_en)){
                         		echo $model->title_official_en;
                         	}else{
                         		echo $model->title_official_cn;
                         	}
                         }
                        ?>
                    </h1>
                </div>
                <!-- <ul class="nav nav-tabs" id="nav-tabs">
                    <li class="current">
                        <a href="#tab_overview" data-toggle="tab">Overview</a>
                    </li>
                    <li>
                        <a href="#tab_same_company" data-toggle="tab">Same Company</a>
                    </li>
                    <li>
                        <a href="#tab_same_drug" data-toggle="tab">Same Drug</a>
                    </li>
                    <li>
                        <a href="#tab_same_target" data-toggle="tab">Same Target</a>
                    </li>
                    <li>
                        <a href="#tab_same_indication" data-toggle="tab">Same Indication</a>
                    </li>
                    <li>
                        <a href="#tab_atc_code" data-toggle="tab">ATC Code</a>
                    </li>
                    <li>
                        <a href="#tab_other_company" data-toggle="tab">Generics companies</a>
                    </li>
                </ul> -->
                <div class="tab-content not_bg no_padding"></div>
            </div>
        </div>
    </div>
</div>
<!--end subTitle row-->

<!---->
<div class="section" id="">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-body">
					<div class="tabbable-custom nav-justified">
						<ul class="nav nav-tabs  nav-justified">
							<li class="active"><a href="#trial_details" data-toggle="tab" aria-expanded="true">Trial details</a></li>
							<li><a href="#study_details" data-toggle="tab" aria-expanded="true">Study details from cde</a></li>
							<li><a href="#study_location" data-toggle="tab" aria-expanded="true">Study location</a></li>
							<li><a href="#study_results" data-toggle="tab" aria-expanded="true">Study Results</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="trial_details">
								<p class="title"><strong><?php echo Yii::t('trials','f_Purpose');?></strong></p>
								<p>
									<pre>
										<?php //echo $model->BRIEF_SUMMARY;?>
									</pre>
								</p>
							</div>
							<div class="tab-pane" id="study_details">
								
							</div>
							<div class="tab-pane" id="study_location">
								
							</div>
							<div class="tab-pane" id="study_results">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!---->




