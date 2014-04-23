<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="col-md-12">
            <div class="widget widget-red">
                <div class="widget-title">
                    <div class="widget-controls">
                        <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                        <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>

                        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>

<!--                                <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
                                <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                                    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Set Widget Color</li>
                                        <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
                                        <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
                                        <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
                                        <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
                                        <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
                                    </ul>
                                </div>-->



<!--                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>

                                <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>-->
                    </div>
                    <h3><i class="fa fa-check"></i> Approve KPI</h3>
                </div>
                <!--                </div>-->


                <div class="widget-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="widget widget-orange">
                                <div class="widget-title">
                                    <div class="widget-controls">
                                        <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                                        <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>

                                        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                                    </div>
                                    <h3><i class="fa fa-users"></i> To Be Approve</h3>
                                </div>

                                <?php
                                $approvedIndex = 0;
                                $approvedArr = array();
                                if (isset($childusersArr) && count($childusersArr) > 0) {
                                    foreach ($childusersArr as $keyuserid => $valueusername) {
                                ?>
                                        <div class="widget-content">
                                            <div id="user" class="form-group">
                                                <span class="col-md-12"><?php echo $valueusername; ?></span>
                                            </div>
                                    <?php
                                        if (isset($childkpisArr[$keyuserid])) {
                                            $kpiValuesArr = array();
                                            $kpiValuesArr = $childkpisArr[$keyuserid];
                                            if (isset($kpiValuesArr) && count($kpiValuesArr) > 0) {

                                                foreach ($kpiValuesArr as $keykpiid => $valuekpi) {

                                                    if ($valuekpi['approved_status'] == 0) {
                                    ?>
                                                        <div id="assign_kpi" class="form-group">
                                                            <label class="col-md-2 control-label"><?php echo $valuekpi['kpiName']; ?></label>
                                                            <label class="col-md-1 control-label"><?php echo $valuekpi['kpiValue']; ?></label>
                                                            <label class="col-md-1 control-label" style="margin-right: 10px;"><?php echo $valuekpi['value_of_target']; ?></label>

                                                            <div class="col-xs-2">
                                                                <input class="form-control" type="text" id="final_<?= $keykpiid ?>" name="final" value="<?php echo $valuekpi['kpiValue']; ?>">
                                                            </div>

                                                            <div class="col-xs-2">
                                                                <textarea class="form-control col-md-2" style="height: 40px; margin-right: 10px;" rows="1" name="" disabled="disabled"><?php echo $valuekpi['kpiComment']; ?></textarea>
                                                            </div>

                                                            <div class="col-xs-2">
                                                                <textarea class="form-control col-md-2" style="height: 40px;" cols="20" type="text" id="comment_<?= $keykpiid ?>" rows="1" name="comment_<?= $keykpiid ?>" placeholder="comment"></textarea>
                                                            </div>
                                                            <a href="javascript:void(0)" onclick="approvekpivalue(<?= $keyuserid; ?>,<?= $keykpiid ?>);" style="padding-left: 26px;"> <img title="Approve" src="<?php echo base_url(); ?>images/approve.png" width="30" height="30"></a>
                                                        </div>


                                                        <!--                                                            <div id="assign_kpi" class="form-group">
                                                                                                                        <label class="col-md-3 control-label"><?php echo $valuekpi['kpiName']; ?></label>
                                                                                                                        <label class="col-md-2 control-label"><?php echo $valuekpi['kpiValue']; ?></label>
                                                                                                                        <textarea class="form-control col-md-6" style="width: 40%!important;height: 40px;" cols="20" type="text" id="comment_<?= $keykpiid ?>" rows="1" name="comment_<?= $keykpiid ?>" placeholder="comment"></textarea>
                                                                                                                        <a href="javascript:void(0)" onclick="approvekpivalue(<?= $keyuserid; ?>,<?= $keykpiid ?>);" style="padding-left: 46px;"> <img title="Approve" src="<?php echo base_url(); ?>images/approve.png" width="30" height="30"></a>
                                                                                                                    </div>-->
                                    <?php
                                                    } else {
                                                        $approvedArr[$approvedIndex]['userid'] = $keyuserid;
                                                        $approvedArr[$approvedIndex]['username'] = $valueusername;
                                                        $approvedArr[$approvedIndex]['kpiid'][] = $keykpiid;
                                                        $approvedArr[$approvedIndex]['kpis_' . $keykpiid] = $valuekpi;
                                                    }
                                                }
                                            }
                                        }
                                        $approvedIndex++;
                                    ?>

                                    </div>
                                <?php
                                    }
                                } else {
                                    echo "Not Entry Found to Approve";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget widget-green">
                                <div class="widget-title">
                                    <div class="widget-controls">
                                        <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                                        <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
                                        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                                    </div>
                                    <h3><i class="fa fa-check"></i> Approved KPI value</h3>
                                </div>
                                <?php
                                if (count($approvedArr) > 0) {
                                    foreach ($approvedArr as $value) {
                                ?>
                                        <div class="widget-content">
                                            <div id="user" class="form-group">
                                                <span class="col-md-12"><?php echo $value['username'] ?></span>
                                            </div>
                                    <?php
                                        $totalkpis = count($value['kpiid']);
                                        for ($i = 0; $i < $totalkpis; $i++) {
                                            $kpiid = $value['kpiid'][$i];
                                    ?>
                                            <div id="assign_kpi" class="form-group col-md-12">        
                                                <label class="col-md-3 control-label"><?php echo $value['kpis_' . $kpiid]['kpiName']; ?></label>
                                                <label class="col-md-2 control-label"><?php echo $value['kpis_' . $kpiid]['kpiValue']; ?></label>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                <?php
                                    }
                                } else {
                                    echo "Not approved Till!";
                                }
                                ?>


                                <div class="widget-content">
                                    <div class="form-group" id="assign_kpi">

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