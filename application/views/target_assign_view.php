<?php
$this->load->library('form_validation');
?>
<style type="text/css">
    .btn {
        margin-bottom: 8px;
        padding: 8px 10px;
    }
</style>
<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="col-md-12">
            <div class="widget widget-purple">
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
                    <h3><i class="fa fa-gavel"></i> Target Assign</h3>
                </div>
                <!--                </div>-->


                <div class="widget-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget widget-orange">
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
                                    <h3><i class="fa fa-users"></i> All Child Users</h3>
                                </div>

                                <div class="widget-content">

                                    <?php
                                    $selected = set_value('user_id');
                                    ?>

                                    <?php
                                    if (isset($usergetArr) && $usergetArr != array()) {

                                        foreach ($usergetArr as $key => $value) {
                                            $sel = "";
                                            if ($value->user_id == $selected)
                                                $sel = "selected";
                                            ?>

                                            <input id="target_<?= $value->user_id ?>" class="" type="radio" name="user" style="cursor: pointer" onclick="kpigetname(this.id);">

                                            <?php
                                            echo "<label for='target_$value->user_id'>".$value->username . "</label></br>";
                                        }
                                    }
                                    ?>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
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
                                    <h3><i class="fa fa-book"></i> Assigned KPI's Target</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="form-group" id="assign_kpi">




                                        <!--                                        <label class="col-md-3 control-label">test</label>
                                        
                                        
                                        
                                        
                                                                                <div class="col-xs-5">
                                                                                    <input id="" name="" type="text" class="form-control rounded" value="<?php // echo set_value('');  ?>">
                                                                                </div>
                                        
                                                                                <button type="submit" class="btn btn-primary">SAVE</button> &nbsp;
                                                                                <button type="submit" class="btn btn-default">Cancel</button>-->


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