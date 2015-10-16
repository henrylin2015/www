<!-- BEGIN CONTENT -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li> <i class="fa fa-home"></i>
            <a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo $this->createUrl("pharma/index");?>">Companies</a><i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">
                <?php
                if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
                    if(!empty($model->mrd_pharma_cn)){
                        echo $model->mrd_pharma_cn;   
                    }else{
                        echo $model->mrd_pharma_en;
                    }
                }else{
                    if(!empty($model->mrd_pharma_en)){
                        echo $model->mrd_pharma_en;   
                    }else{
                        echo $model->mrd_pharma_cn;
                    }
                }
                ?>
            </a>
        </li>
    </ul>
</div>
<div class="bottom-margin"></div>
<!-- END CONTENT -->
<!--start row-->
<div class="row profile">
    <div class="col-md-12">
        <div  id="header_nav">
            <div class="tabbable-line tabbable-full-width">
                <div class="nav-title pull-left">
                    <h1 class="title">
                        <?php
                        if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
                            if(!empty($model->mrd_pharma_cn)){
                                echo $model->mrd_pharma_cn;   
                            }else{
                                echo $model->mrd_pharma_en;
                            }
                        }else{
                           if(!empty($model->mrd_pharma_en)){
                                echo $model->mrd_pharma_en;   
                            }else{
                                echo $model->mrd_pharma_cn;
                            }
                        }
                        ?>
                    </h1>
                </div>
                <ul class="nav nav-tabs" id="nav-tabs">
                    <li class="active current">
                        <a href="#tab_overview" data-toggle="tab">Overview</a>
                    </li>
                    <li>
                        <a href="#tab_products" data-toggle="tab">Products</a>
                    </li>
                    <li>
                        <a href="#tab_trials" data-toggle="tab">Trials</a>
                    </li>
                    <li>
                        <a href="#tab_patent" data-toggle="tab">Patent</a>
                    </li>
                    <li>
                        <a href="#tab_reqistration" data-toggle="tab">Reqistration</a>
                    </li>
                    <li>
                        <a href="#tab_chinaSub" data-toggle="tab">China subsidiaries</a>
                    </li>
                </ul>
                <div class="tab-content not_bg no_padding"></div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<!--start row-->
<div class="row" id="tab_overview">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light port_border margin-r margin_button8">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <span class="caption-subject font-blue-madison bold uppercase"><?php echo Yii::t('pharma','f_Description');?></span>
                            <span class="caption-helper"></span>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="portlet-body not_top_padding">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="portlet no_margin_buttom light port_border margin_border_r border_right">
                                    <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                                        <p>
                                            <?php
                                                if(!empty($model->description)){
                                                echo substr($model->description,0,800);
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="portlet light port_border margin_border_rl border_right no_margin_buttom">
                                    <div class="portlet-body not_top_padding portlet_height">
                                        <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                                            <p><strong>Global operation</strong></p>
                                            <p class="tileP">
                                                <?php echo Yii::t('pharma','f_Headquarter_address');?>:
                                                <?php
                                                    if(!empty($model->addr_hq_global)){
                                                    echo $model->addr_hq_global;
                                                    }
                                                ?>
                                            </p>
                                            <p class="tileP">
                                                <?php echo Yii::t('pharma','f_Website');?>:
                                                <?php
                                                    if(!empty($model->website)){
                                                    echo $model->website;
                                                    }
                                                ?>
                                            </p>
                                            <p class="tileP">
                                                <?php echo Yii::t('pharma','f_Founded');?>:
                                                <?php
                                                    if(!empty($model->date_founded_global)){
                                                    echo $model->date_founded_global;
                                                    }
                                                ?>
                                            </p>
                                            <p class="tileP">
                                                <?php echo Yii::t('pharma','f_Total_Employee');?>:
                                                <?php
                                                    if(!empty($model->number_employee)){
                                                    echo $model->number_employee;
                                                    }
                                                ?>
                                            </p>
                                            <p class="tileP">
                                                <?php echo Yii::t('pharma','f_Global_coverage');?>:
                                                <?php
                                                    if(!empty($model->global_coverage)){
                                                    echo $model->global_coverage;
                                                    }
                                                ?>
                                            </p>
                                            <p class="tileP">
                                                <?php echo Yii::t('pharma','f_Stock_exchange_listing');?>:
                                                <?php
                                                if(!empty($model->Listing)){
                                                    echo $model->Listing;
                                                }
                                                ?>
                                            </p>
                                            <p class="tileP">
                                                <?php echo Yii::t('pharma','f_Market_cap');?>:
                                                <?php
                                                    // if(!empty($model->Listing)){
                                                    //    echo $model->Listing;
                                                    // }
                                                ?>
                                                <span style="color:red;">??</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="portlet no_margin_buttom light port_border margin_border_l">
                                    <div class="portlet-body not_top_padding portlet_height">
                                        <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                                            <p><strong>China companies</strong></p>
                                            <p class="tileP">
                                                <?php echo Yii::t('pharma','f_Headquarter_address');?>:
                                                <?php
                                                if(!empty($model->ddr_hq_china)){
                                                    echo $model->addr_hq_china;
                                                }
                                               ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="portlet light port_border margin-l margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase"><?php echo Yii::t('pharma','h_Company_news');?></span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-bpdy" style="height:218px;">
                <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                    <ul class="feeds">
                        <?php
                            if(!empty($model->news)){
                                foreach($model->news as $new){
                        ?>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col2">
                                        <div class="desc cont_desc">
                                            <a href="<?php echo $this->
                                                createUrl('news/single',array('id'=>$new->phm_news_id))?>" title="
                                                <?php echo $new->nws_title;?>">
                                                <?php echo $new->nws_title;?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                    <?php echo $new->publication_date;?></div>
                            </div>
                        </li>
                        <?php
                                }
                            }
                        ?>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<!--start row-->
<div class="row">
    <div class="col-md-8">
        <div class="portlet light port_border margin-r margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">product</span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-body portlet_height218">
                <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="" id="chart_5" style="height:200px;"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="interactive" class="chart" style="height:200px;"></div>
                        </div>

                    </div>
                    <p><?php echo Yii::t('pharma','f_Number_of_marketed_products');?>: 148</p>
                    <p><?php echo Yii::t('pharma','f_Number_of_pipeline_products');?>: 24</p>
                    <p><?php echo Yii::t('pharma','f_Specialty_therapeutic_areas');?>: ??</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="portlet light port_border margin-l margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase"><?php echo Yii::t('pharma','h_Global_Financial');?></span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-body portlet_height218">
                <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                    <div id="pharma_chart" style="height:250px"></div>
                    <p><?php echo Yii::t('pharma','f_Number_of_marketed_products');?>: 148</p>
                    <p><?php echo Yii::t('pharma','f_Number_of_pipeline_products');?>: 24</p>
                    <p><?php echo Yii::t('pharma','f_Specialty_therapeutic_areas');?>: ??</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<!--start row-->
<div class="row">
    <div class="col-md-4">
        <div class="portlet light port_border margin-r margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">Trials</span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-body portlet_height">
                <p>Trials</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="portlet light port_border margin-rl margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">Registration</span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-body portlet_height">
                <p>Registration</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="portlet light port_border margin-l margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">Patents</span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-body portlet_height">
                <p>Patents</p>
            </div>
        </div>
    </div>
</div>
<!--end row-->


<!--start product row-->
<div class="row" id="tab_products">
    <div class="col-md-12">
        <div class="portlet light port_border margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase"><?php echo Yii::t('pharma','h_Marketed_products');?></span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
                            Columns <i class="fa fa-angle-down"></i>
                        </a>
                        <div id="pharma_single_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                            <label>
                                <input type="checkbox" checked data-column="1"><?php echo Yii::t('pharma','f_Product_type');?></label>
                            <label>
                                <input type="checkbox" checked data-column="2"><?php echo Yii::t('pharma','f_Product_origin');?></label>
                            <label>
                                <input type="checkbox" checked data-column="3"><?php echo Yii::t('pharma','f_Trade_name');?></label>
                            <label>
                                <input type="checkbox" checked data-column="4"><?php echo Yii::t('pharma','f_Formulation');?></label>
                            <label>
                                <input type="checkbox" checked data-column="5"><?php echo Yii::t('pharma','f_Strength');?></label>
                            <label>
                                <input type="checkbox" checked data-column="6"><?php echo Yii::t('pharma','f_Approval_date');?></label>
                            <label>
                                <input type="checkbox" checked data-column="7"><?php echo Yii::t('pharma','f_Approval_number');?></label>
                            <label>
                                <input type="checkbox" checked data-column="8"><?php echo Yii::t('pharma','f_Manufacturer');?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="loading" id="pharma_single_loading" style="display: none;">
                    <!-- <span>loading...</span>     -->
                </div>
                <div class="table-responsive">
                    <table id="pharma_single" class="table table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo Yii::t('pharma','f_Products_name');?></th>
                                <th><?php echo Yii::t('pharma','f_Product_type');?></th>
                                <th><?php echo Yii::t('pharma','f_Product_origin');?></th>
                                <th><?php echo Yii::t('pharma','f_Trade_name');?></th>
                                <th><?php echo Yii::t('pharma','f_Formulation');?></th>
                                <th><?php echo Yii::t('pharma','f_Strength');?></th>
                                <th><?php echo Yii::t('pharma','f_Approval_date');?></th>
                                <th><?php echo Yii::t('pharma','f_Approval_number');?></th>
                                <th><?php echo Yii::t('pharma','f_Manufacturer');?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end product row-->

<!--start Investigational product row-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light port_border margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase"><?php echo Yii::t('pharma','h_Investigational_Products');?></span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
                            Columns <i class="fa fa-angle-down"></i>
                        </a>
                        <div id="pharma_single_investigational_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                <label>
                                <input type="checkbox" checked data-column="1"><?php echo Yii::t('pharma','f_Drug_type');?></label>
                                <label>
                                <input type="checkbox" checked data-column="2"><?php echo Yii::t('pharma','f_Registration_class');?></label>
                                <label>
                                <input type="checkbox" checked data-column="3"><?php echo Yii::t('pharma','f_Development_status');?></label>
                                <label>
                                <input type="checkbox" checked data-column="4"><?php echo Yii::t('pharma','f_Application_type');?></label>
                                <label>
                                <input type="checkbox" checked data-column="5"><?php echo Yii::t('pharma','f_Submission_date');?></label>
                                <label>
                                <input type="checkbox" checked data-column="6"><?php echo Yii::t('pharma','f_Registration_status');?></label>
                                <label>
                                <input type="checkbox" checked data-column="7"><?php echo Yii::t('pharma','f_Approval_date');?></label>
                                <label>
                                <input type="checkbox" checked data-column="8"><?php echo Yii::t('pharma','f_Acceptance_number');?></label>
                                <label>
                                <input type="checkbox" checked data-column="9"><?php echo Yii::t('pharma','f_Total_trials');?></label>
                                <label>
                                <input type="checkbox" checked data-column="10"><?php echo Yii::t('pharma','f_Trial_ongoing');?></label>
                                <label>
                                <input type="checkbox" checked data-column="11"><?php echo Yii::t('pharma','f_Phase_1');?></label>
                                <label>
                                <input type="checkbox" checked data-column="12"><?php echo Yii::t('pharma','f_Phase_2');?></label>
                                <label>
                                <input type="checkbox" checked data-column="13"><?php echo Yii::t('pharma','f_Phase_3');?></label>
                                <label>
                                <input type="checkbox" checked data-column="14"><?php echo Yii::t('pharma','f_Indications');?></label>
                                <label>
                                <input type="checkbox" checked data-column="15"><?php echo Yii::t('pharma','f_Application_type');?></label>
                                <label>
                                <input type="checkbox" checked data-column="16"><?php echo Yii::t('pharma','f_Submission_date');?></label>
                                <label>
                                <input type="checkbox" checked data-column="17"><?php echo Yii::t('pharma','f_Registration_status');?></label>
                                <label>
                                <input type="checkbox" checked data-column="18"><?php echo Yii::t('pharma','f_Approval_date');?></label>
                                <label>
                                <input type="checkbox" checked data-column="19"><?php echo Yii::t('pharma','f_Acceptance_number');?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="loading" id="investigational_loading" style="display: none;">
                    <!-- <span>loading...</span>     -->
                </div>
                <div class="table-responsive">
                    <table id="pharma_single_investigational" class="table table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo Yii::t('pharma','f_Drug_name');?></th>
                                <th><?php echo Yii::t('pharma','f_Drug_type');?></th>
                                <th><?php echo Yii::t('pharma','f_Registration_class');?></th>
                                <th><?php echo Yii::t('pharma','f_Development_status');?></th>
                                <th><?php echo Yii::t('pharma','f_Application_type');?></th>
                                <th><?php echo Yii::t('pharma','f_Submission_date');?></th>
                                <th><?php echo Yii::t('pharma','f_Registration_status');?></th>
                                <th><?php echo Yii::t('pharma','f_Approval_date');?></th>
                                <th><?php echo Yii::t('pharma','f_Acceptance_number');?></th>
                                <th><?php echo Yii::t('pharma','f_Total_trials');?></th>
                                <th><?php echo Yii::t('pharma','f_Trial_ongoing');?></th>
                                <th><?php echo Yii::t('pharma','f_Phase_1');?></th>
                                <th><?php echo Yii::t('pharma','f_Phase_2');?></th>
                                <th><?php echo Yii::t('pharma','f_Phase_3');?></th>
                                <th><?php echo Yii::t('pharma','f_Indications');?></th>
                                <th><?php echo Yii::t('pharma','f_Application_type');?></th>
                                <th><?php echo Yii::t('pharma','f_Submission_date');?></th>
                                <th><?php echo Yii::t('pharma','f_Registration_status');?></th>
                                <th><?php echo Yii::t('pharma','f_Approval_date');?></th>
                                <th><?php echo Yii::t('pharma','f_Acceptance_number');?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end Investigational product row-->

<!--start trials row-->
<div class="row" id="tab_trials">
    <div class="col-md-12">
        <div class="portlet light port_border margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase"><?php echo Yii::t('pharma','h_Clinical_Trials');?></span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
                            Columns <i class="fa fa-angle-down"></i>
                        </a>
                        <div id="pharma_single_trials_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                            <label>
                                <input type="checkbox" checked data-column="1"><?php echo Yii::t('pharma','f_Phase');?></label>
                            <label>
                                <input type="checkbox" checked data-column="2"><?php echo Yii::t('pharma','f_Recruitment_status');?></label>
                            <label>
                                <input type="checkbox" checked data-column="3"><?php echo Yii::t('pharma','f_Title');?></label>
                            <label>
                                <input type="checkbox" checked data-column="4"><?php echo Yii::t('pharma','f_Condition');?></label>
                            <label>
                                <input type="checkbox" checked data-column="5"><?php echo Yii::t('pharma','f_Target_recruitment');?></label>
                            <label>
                                <input type="checkbox" checked data-column="6"><?php echo Yii::t('pharma','f_Trial_start');?></label>
                            <label>
                                <input type="checkbox" checked data-column="7"><?php echo Yii::t('pharma','f_Trial_completion');?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="loading" id="pharma_single_trials_loading" style="display: none;">
                </div>
                <div class="table-responsive">
                    <table id="pharma_single_trials" class="table table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="myTabTit"><?php echo Yii::t('pharma','f_Drug_name');?></th>
                                <th class="myTabTit"><?php echo Yii::t('pharma','f_Phase');?></th>
                                <th class="myTabTit"><?php echo Yii::t('pharma','f_Recruitment_status');?></th>
                                <th class="myTabTit"><?php echo Yii::t('pharma','f_Title');?></th>
                                <th class="myTabTit"><?php echo Yii::t('pharma','f_Condition');?></th>
                                <th class="myTabTit"><?php echo Yii::t('pharma','f_Target_recruitment');?></th>
                                <th class="myTabTit"><?php echo Yii::t('pharma','f_Trial_start');?></th>
                                <th class="myTabTit"><?php echo Yii::t('pharma','f_Trial_completion');?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end trials row-->

<!--start patent row-->
<div class="row" id="tab_patent">
    <div class="col-md-12">
        <div class="portlet light port_border margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">Patent</span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-body portlet_height218">
                <h1>Patent</h1>
            </div>
        </div>
    </div>
</div>
<!--end patent row-->

<!--start patent row-->
<div class="row" id="tab_chinaSub">
    <div class="col-md-12">
        <div class="portlet light port_border margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase"><?php echo Yii::t('pharma','h_China_Companies');?></span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
                            Columns <i class="fa fa-angle-down"></i>
                        </a>
                        <div id="pharma_single_china_sub_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                            <label>
                                <input type="checkbox" checked data-column="1"><?php echo Yii::t('pharma','f_Phase');?></label>
                            <label>
                                <input type="checkbox" checked data-column="2"><?php echo Yii::t('pharma','f_Recruitment_status');?></label>
                            <label>
                                <input type="checkbox" checked data-column="3"><?php echo Yii::t('pharma','f_Title');?></label>
                            <label>
                                <input type="checkbox" checked data-column="4"><?php echo Yii::t('pharma','f_Condition');?></label>
                            <label>
                                <input type="checkbox" checked data-column="5"><?php echo Yii::t('pharma','f_Target_recruitment');?></label>
                            <label>
                                <input type="checkbox" checked data-column="6"><?php echo Yii::t('pharma','f_Trial_start');?></label>
                            <label>
                                <input type="checkbox" checked data-column="7"><?php echo Yii::t('pharma','f_Trial_completion');?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="loading" id="pharma_single_china_sub_loading" style="display: none;">
                </div>
                <div class="table-responsive">
                    <table id="pharma_single_china_sub" class="table table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo Yii::t('pharma','f_Company');?></th>
                                <th><?php echo Yii::t('pharma','f_Business_area');?></th>
                                <th><?php echo Yii::t('pharma','f_Proportion_of_company_shares');?></th>
                                <th><?php echo Yii::t('pharma','f_Registered_capital');?></th>
                                <th><?php echo Yii::t('pharma','f_Asset_size');?></th>
                                <th><?php echo Yii::t('pharma','f_Owners\'_equity');?></th>
                                <th><?php echo Yii::t('pharma','f_Operating_income');?></th>
                                <th><?php echo Yii::t('pharma','f_Net_profit');?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end patent row-->


<!--start Reqistration row-->
<div class="row" id="tab_reqistration">
    <div class="col-md-12">
        <div class="portlet light port_border margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">Marketed products</span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-body portlet_height218">
                <h1>Reqistration</h1>
            </div>
        </div>
    </div>
</div>
<!--end Reqistration row-->

<!--start row-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light port_border margin_button8">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">Comparable companies</span>
                    <span class="caption-helper"></span>
                </div>
                <div class="actions"></div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="portlet light port_border margin_border_r no_margin_buttom">
                            <div class="portlet-body not_top_padding portlet_height">
                                <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                                    <p>Headquarter address: 美国新泽西州新布鲁斯威克强生广场</p>
                                    <p>Tel: 732-5240400</p>
                                    <p>Website: www.jnj.com</p>
                                    <p>Founded: 2014-07-07</p>
                                    <p>Total Employee:</p>
                                    <p>Global coverage: ??</p>
                                    <p>Stock exchange listing: NYSE</p>
                                    <p>Market cap:</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portlet light port_border margin_border_rl no_margin_buttom">
                            <div class="portlet-body not_top_padding portlet_height">
                                <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                                    <p>Headquarter address: 美国新泽西州新布鲁斯威克强生广场</p>
                                    <p>Tel: 732-5240400</p>
                                    <p>Website: www.jnj.com</p>
                                    <p>Founded: 2014-07-07</p>
                                    <p>Total Employee:</p>
                                    <p>Global coverage: ??</p>
                                    <p>Stock exchange listing: NYSE</p>
                                    <p>Market cap:</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portlet light port_border margin_border_l no_margin_buttom">
                            <div class="portlet-body not_top_padding portlet_height">
                                <div class="scroller" style="height: 200px;" data-rail-visible="1" data-handle-color="#a1b2bd">
                                    <p>Headquarter address: 美国新泽西州新布鲁斯威克强生广场</p>
                                    <p>Tel: 732-5240400</p>
                                    <p>Website: www.jnj.com</p>
                                    <p>Founded: 2014-07-07</p>
                                    <p>Total Employee:</p>
                                    <p>Global coverage: ??</p>
                                    <p>Stock exchange listing: NYSE</p>
                                    <p>Market cap:</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->


<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/myplugins/pages/jquery.nav.js"></script>
<script>
    $(document).ready(function() {
        $('#nav-tabs').onePageNav();
        $(document).scroll(function(){
            var h = $(document).scrollTop();
            if(h >=53){
                $("#header_nav").addClass("header_nav");
            }else{
                $("#header_nav").removeClass("header_nav");
            }
        });      
     });
</script>
<!--product-->
<script type="text/javascript">
    single();
    pharma_single_investigational();
    pharma_single_trials();
    pharma_single_china_sub();
function single(){
    var grid = new Datatable();
        grid.init({
            src: $("#pharma_single"),
            onSuccess: function (grid) {
                // execute some code after table records loaded
                //$(".loading").show();
                $("#pharma_single_loading").hide();
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
                 $("#pharma_single_loading").hide();
            },
            processing: true,
            serverSide: true,
            loadingMessage: 'Loading...----',
            dataTable: { 
                //"dom": "<'row'<'col-md-6 col-sm-12'Rpli>r><'table-scrollable't><'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>", // datatable layout
                "dom":"<'row'<'col-md-12' Rf>><'dataTables_scroll't><'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
                //"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                // "lengthMenu": [
                //     [10, 20, 50, 100, 150, -1],
                //     [10, 20, 50, 100, 150, "All"] // change per page values here
                // ],
                "pageLength": 20, // default record count per page
                "ajax": {
                    "url": <?php echo "'".$this->createUrl("pharma/Jsonproduct",array("id"=>$model->mrd_pharma_id))."'";?>, // ajax source
                    'type':'get',
                    'beforeSend':function(){
                        $("#pharma_single_loading").show();
                    },
                },
                "columns": [
                    { "data": "drugname_en" }, 
                    { "data": "drugcat" },
                    { "data": "drug_origin" },
                    { "data": "drugname_trade_en" },
                    { "data": "doseform" },
                    { "data": "strength" },
                    { "data": "issuedate" },
                    { "data": 'cndc'},
                    { "data": 'compname_cn'}
                ],
                "scrollY": "300px",
                "scrollX": true,
                // "order": [
                //     [1, "asc"]
                // ],// set first column as a default sort by asc,
                "destroy": true,
                "order": [
                    [2, 'asc']
                ],

            }
        });
       
        var tableWrapper = $('#pharma_single'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
        /* handle show/hide columns*/
         var tableColumnToggler = $('#pharma_single_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $('#pharma_single').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $("#pharma_single_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#pharma_single_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#pharma_single_filter input[type=search]").attr("class","form-control input-circle");
        $("#pharma_single_filter input[type=search]").attr("placeholder","Search within found...");
}
function pharma_single_investigational(){
    

    var grid = new Datatable();
        grid.init({
            src: $("#pharma_single_investigational"),
            onSuccess: function (grid) {
                // execute some code after table records loaded
                //$(".loading").show();
                $("#investigational_loading").hide();
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
                 $("#investigational_loading").hide();
            },
            processing: true,
            serverSide: true,
            loadingMessage: 'Loading...----',
            dataTable: { 
                //"dom": "<'row'<'col-md-6 col-sm-12'Rpli>r><'table-scrollable't><'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>", // datatable layout
                "dom":"<'row'<'col-md-12' Rf>><'dataTables_scroll't><'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
                //"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                // "lengthMenu": [
                //     [10, 20, 50, 100, 150, -1],
                //     [10, 20, 50, 100, 150, "All"] // change per page values here
                // ],
                "pageLength": 20, // default record count per page
                "ajax": {
                    "url": <?php echo "'".$this->createUrl("pharma/Jsoninvestigational",array("id"=>$model->mrd_pharma_id))."'";?>, // ajax source
                    'type':'get',
                    'beforeSend':function(){
                        $("#investigational_loading").show();
                    },
                },
                "columns": [
                    { "data": "drugname" }, 
                    { "data": "drugcat" },
                    { "data": "regclass" },
                    { "data": "status" },
                    { "data": "IND_appltype" },
                    { "data": 'IND_date_cdereceived'},
                    { "data": 'IND_status_new_overall'},
                    { "data": 'IND_date_appr_delivery'},
                    { "data": 'IND_num_accept'},
                    { "data": 'count_Trials'},
                    { "data": 'count_Trials_ongoing'},
                    { "data": "count_Phase1" },
                    { "data": "count_Phase2" },
                    { "data": "count_Phase3" },
                    { "data": 'indication'},
                    { "data": 'NDA_appltype'},
                    { "data": 'NDA_date_cdereceived'},
                    { "data": 'NDA_status_new_overall'},
                    { "data": 'NDA_date_appr_delivery'},
                    { "data": 'NDA_num_accept'},
                    // 
                ],
                "scrollY": "300px",
                "scrollX": true,
                // "order": [
                //     [1, "asc"]
                // ],// set first column as a default sort by asc,
                "destroy": true,
                "order": [
                    [2, 'asc']
                ],

            }
        });
       
        var tableWrapper = $('#pharma_single_investigational'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2();
        /* handle show/hide columns*/
         var tableColumnToggler = $('#pharma_single_investigational_column_toggler');
         var table = $('#pharma_single_investigational').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $("#pharma_single_investigational_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#pharma_single_investigational_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#pharma_single_investigational_filter input[type=search]").attr("class","form-control input-circle");
        $("#pharma_single_investigational_filter input[type=search]").attr("placeholder","Search within found...");
}
function pharma_single_trials(){
    

    var grid = new Datatable();
        grid.init({
            src: $("#pharma_single_trials"),
            onSuccess: function (grid) {

                $("#pharma_single_trials_loading").hide();
            },
            onError: function (grid) {
            },
            onDataLoad: function(grid) {
                 $("#pharma_single_trials_loading").hide();
            },
            processing: true,
            serverSide: true,
            loadingMessage: 'Loading...----',
            dataTable: { 
                "dom":"<'row'<'col-md-12' Rf>><'dataTables_scroll't><'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
                "pageLength": 20, 
                "ajax": {
                    "url": <?php echo "'".$this->createUrl("pharma/Jsontrials",array("id"=>$model->mrd_pharma_id))."'";?>, // ajax source
                    'type':'get',
                    'beforeSend':function(){
                        $("#pharma_single_trials_loading").show();
                    },
                },
                "columns": [
                    { "data": "intervention_name_cn" }, 
                    { "data": "phase_en" },
                    { "data": "Recruiting_en" },
                    { "data": "title_brief_en" },
                    { "data": "condition_en" }, 
                    { "data": "enrollment_anticipated" },
                    { "data": "date_first_enrolled" },
                    { "data": "date_complete" },
                ],
                "scrollY": "300px",
                "scrollX": true,
                // "order": [
                //     [1, "asc"]
                // ],// set first column as a default sort by asc,
                "destroy": true,
                "order": [
                    [2, 'asc']
                ],

            }
        });
       
        var tableWrapper = $('#pharma_single_trials');
        tableWrapper.find('.dataTables_length select').select2();
         var tableColumnToggler = $('#pharma_single_trials_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $('#pharma_single_trials').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        $("#pharma_single_trials_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#pharma_single_trials_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#pharma_single_trials_filter input[type=search]").attr("class","form-control input-circle");
        $("#pharma_single_trials_filter input[type=search]").attr("placeholder","Search within found...");
}

function pharma_single_china_sub(){
    

    var grid = new Datatable();
        grid.init({
            src: $("#pharma_single_china_sub"),
            onSuccess: function (grid) {

                $("#pharma_single_china_sub_loading").hide();
            },
            onError: function (grid) {
            },
            onDataLoad: function(grid) {
                 $("#pharma_single_china_sub_loading").hide();
            },
            processing: true,
            serverSide: true,
            loadingMessage: 'Loading...----',
            dataTable: { 
                "dom":"<'row'<'col-md-12' Rf>><'dataTables_scroll't><'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
                "pageLength": 20, 
                "ajax": {
                    "url": <?php echo "'".$this->createUrl("pharma/Jsonchinasub",array("id"=>$model->mrd_pharma_id))."'";?>, // ajax source
                    'type':'get',
                    'beforeSend':function(){
                        $("#pharma_single_china_sub_loading").show();
                    },
                },
                "columns": [
                    { "data": "mrd_pharma_cn" }, 
                    { "data": "business_type" },
                    { "data": "parent_Company_proportion" },
                    { "data": "reg_capital" },
                    { "data": "asset_size" }, 
                    { "data": "Owner_equity" },
                    { "data": "Operating_income" },
                    { "data": "Net_profit" },
                ],
                "scrollY": "300px",
                "scrollX": true,
                // "order": [
                //     [1, "asc"]
                // ],// set first column as a default sort by asc,
                "destroy": true,
                "order": [
                    [2, 'asc']
                ],

            }
        });
       
        var tableWrapper = $('#pharma_single_china_sub');
        tableWrapper.find('.dataTables_length select').select2();
         var tableColumnToggler = $('#pharma_single_china_sub_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $('#pharma_single_china_sub').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        $("#pharma_single_china_sub_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#pharma_single_china_sub_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#pharma_single_china_sub_filter input[type=search]").attr("class","form-control input-circle");
        $("#pharma_single_china_sub_filter input[type=search]").attr("placeholder","Search within found...");
}
</script>
<!--end-->
<script type="text/javascript">
require.config({
        paths:{
            echarts:'<?php echo Yii::app()->request->baseUrl;?>/public/admin/charts/echarts' 
        }
    });
     require(
        [
            'echarts',
            'echarts/chart/bar'
        ],
        //回调函数
        DrawEChart
        );
    function DrawEChart(ex){
        //图表渲染的容器对象
        var chartContainer = document.getElementById("pharma_chart");
        //加载图表
        var myChart = ex.init(chartContainer);
        myChart.setOption({
                    title : {
                       // text: '某地区蒸发量和降水量1',
                       // subtext: '纯属虚构'
                    },
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['Revenue','Net Income']
                    },
                   
                    calculable : true,
                    xAxis : [
                        {
                            type : 'category',
                            data : <?php echo "[".$reg['year']."]";?>
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:'Revenue',
                            type:'bar',
                            data:<?php echo "[".$reg['Y1']."]";?>,

                        },
                        {
                            name:'Net Income',
                            type:'bar',
                            data:<?php echo "[".$reg['Y2']."]";?>,

                        }
                    ]
                });
    }
</script>
<script type="text/javascript">
    chart5();
    chart6();
    function chart5() {
                // if ($('#chart_5').size() != 1) {
                //     return;
                // }
                var d1 = [
                    [0,1],[1,3],[2,4],[3,5]
                ];
                // for (var i = 0; i <= 1; i += 1){
                //      d1.push([i, parseInt(Math.random() * 30)]);
                //     console.log(d1);
                // }
                   
                var d2 = [
                    [0,5],[1,7],[2,4],[3,5]
                ];
                // for (var i = 0; i <= 2; i += 1)
                //     d2.push([i, parseInt(Math.random() * 30)]);

                var d3 = [
                    [0,13],[1,3],[2,4],[3,5]
                ];
                // for (var i = 0; i <= 2; i += 1)
                //     d3.push([i, parseInt(Math.random() * 30)]);
                // console.log(d1);
                // console.log(d2);
                // console.log(d3);
                var stack = 0,
                    bars = true,
                    lines = false,
                    steps = false;

                function plotWithOptions() {
                    $.plot($("#chart_5"),
                        [{
                            label: "sales",
                            data: d1,
                            lines: {
                                lineWidth: 1,
                            },
                            shadowSize: 0
                        }, {
                            label: "tax",
                            data: d2,
                            lines: {
                                lineWidth: 1,
                            },
                            shadowSize: 0
                        }, {
                            label: "profit",
                            data: d3,
                            lines: {
                                lineWidth: 1,
                            },
                            shadowSize: 0
                        }]

                        , {
                            series: {
                                stack: stack,
                                lines: {
                                    show: lines,
                                    fill: true,
                                    steps: steps,
                                    lineWidth: 0, // in pixels
                                },
                                bars: {
                                    show: bars,
                                    barWidth: 0.5,
                                    lineWidth: 0, // in pixels
                                    shadowSize: 0,
                                    align: 'center'
                                }
                            },
                            grid: {
                                tickColor: "#eee",
                                borderColor: "#eee",
                                borderWidth: 1
                            }
                        }
                    );
                }
                plotWithOptions();
    }
    function chart6(){
        var data = [];
            var series = Math.floor(Math.random() * 10) + 1;
            series = series < 5 ? 5 : series;

            for (var i = 0; i < series; i++) {
                data[i] = {
                    label: "Series" + (i + 1),
                    data: Math.floor(Math.random() * 100) + 1
                };
            }
         if ($('#interactive').size() !== 0) {
                $.plot($("#interactive"), data, {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                });
                $("#interactive").bind("plothover", pieHover);
                $("#interactive").bind("plotclick", pieClick);
            }

            function pieHover(event, pos, obj) {
                if (!obj)
                    return;
                percent = parseFloat(obj.series.percent).toFixed(2);
                $("#hover").html('<span style="font-weight: bold; color: ' + obj.series.color + '">' + obj.series.label + ' (' + percent + '%)</span>');
            }

            function pieClick(event, pos, obj) {
                if (!obj)
                    return;
                percent = parseFloat(obj.series.percent).toFixed(2);
                alert('' + obj.series.label + ': ' + percent + '%');
            }
    }
</script>