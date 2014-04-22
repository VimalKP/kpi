<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="col-md-12">


            <div class="widget widget-blue">
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

                    <h3><i class="fa fa-keyboard-o"></i> KPI Entry</h3>
                </div>

                <div class="widget-content">
                    <div class="modal-body">
                        <form class="form-horizontal">
<!--                        <form action="<?php // echo base_url()           ?>kpi_approve" role="form" class="form-horizontal" method="post">-->

                            <?php
                            for ($i = 0; $i < count($get_target); $i++) {
                                if ($get_target[$i]['update_status'] == 1) {
                                    echo 'your target is changed';
                                } else {
                                    echo '';
                                }
                            }
                            ?>

                            <div class="form-group">
                                <label class="col-md-4 control-label">User Name</label>
                                <div class="col-xs-6">

                                    <?php
                                    if ((isset($data)) && $data[0]->username != '') {
                                        $username = $data[0]->username;
                                    } else {
                                        $username = set_value('username');
                                    }
                                    ?>

                                    <input class="form-control rounded" type="text" id="" name=""  value="<?php echo $username; ?>" disabled="disabled">

                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <h4 class="widget-header">*** Enter The Work For Approve ***</h4>
                            </div>

                            <!--                            <div class="dhe-example-section-header"><br/>
                                                            <h3 class="dhe-h3 dhe-example-title">*** Enter The Work For Approve ***</h3>
                                                        </div>-->

                            <div class="form-group">
                                <label class="col-md-3 control-label" style="font-size: 15px;">Task Name</label>
                                <div class="col-md-8">
                                    <label class="col-md-6 control-label" style="font-size: 15px;">Entry Of Work (With Assigned Work)</label>
                                </div>
                            </div>




                            <div class="form-group">
                                <?php
                                $kpiname = array();
                                if (isset($get_target) && $get_target != array()) {
                                    for ($i = 0; $i < count($get_target); $i++) {
                                        $kpi_id = $get_target[$i]['kpi_id'];
//                                        echo '<pre>';
//                                        print_r($kpi_id);
//                                        echo '</pre>';
//                                        exit();
                                        $value_of_target = $get_target[$i]['value_of_target'];
                                        $user_id_fk = $get_target[$i]['user_id_fk'];
                                        $trueselected = '';
                                        $falseselected = '';
                                        $trueselecteddb = '';
                                        $falseselecteddb = '';
                                        $comment = '';
                                        $class = 'add';
                                        $lable = 'ADD';
                                        $disabled = '';
                                        if ($value_of_target == 'true') {
                                            $trueselecteddb = 'selected';
                                        } else {
                                            $falseselecteddb = 'selected';
                                        }
                                        $val = '';
                                        if (isset($fetchentry) && $fetchentry != array()) {
                                            if (@$fetchentry[$kpi_id]) {
                                                $val = $fetchentry[$kpi_id]['kpi_value'];
                                                if ($val == 'true') {
                                                    $trueselected = 'selected';
                                                } else {
                                                    $falseselected = 'selected';
                                                }
                                                $class = 'update';
                                                $lable = 'UPDATE';
                                                $disabled = 'disabled';
                                                $comment = $fetchentry[$kpi_id]['comment'];
                                            }
                                        }
                                        ?>
                                        <label class="col-md-3 control-label"><?= $get_target[$i]['kpi_name'] ?></label>

                                        <div class="row bottom-margin">
                                            <?php if ($get_target[$i]['kpi_type'] == 'boolean') { ?>
                                                <div class="col-xs-2"><select  <?= $disabled ?> class="form-control rounded" id="kpi_<?= $kpi_id ?>" name=""><option <?= $trueselected ?> value="true">Yes</option><option  <?= $falseselected ?> value="false">No</option></select></div>

                                                <div class="col-xs-2"><select disabled="disabled" class="form-control rounded" id="kpitarget_<?= $kpi_id ?>" name=""><option value="true" <?= $trueselecteddb ?>>Yes</option><option value="false"  <?= $falseselecteddb ?>>No</option></select></div> 
                                            <?php } else { ?>
                                                <div class="col-xs-2">
                                                    <input class="form-control" id="kpi_<?= $kpi_id ?>" type="text" value="<?= $val ?>" <?= $disabled ?> >
                                                </div>

                                                <div class="col-xs-2">
                                                    <input class="form-control" type="text" id="kpitarget_<?= $kpi_id ?>" placeholder="<?= $value_of_target ?>" value="<?= $value_of_target ?>" disabled="disabled">
                                                </div>
                                            <?php } ?>
                                            <div class="col-xs-2">
                                                <div class="input-group">
                                                    <textarea class="form-control"  <?= $disabled ?> id="comment_<?= $kpi_id ?>" rows="1" type="text" placeholder="Comment..."><?= $comment ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-xs-2">
                                                <button id="button_<?= $kpi_id ?>" type="button" class="btn btn-primary <?= $class ?>" onclick="entrykpi('<?= $kpi_id ?>','<?= $user_id_fk ?>')"><?= $lable ?></button>
                                            </div>

                                        </div>




                                        <?php
                                    }
                                }
                                ?>
                            </div>





                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>