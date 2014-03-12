<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">

        <div class="col-md-12" id="bar_chart_anchor">
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
                    <h3><i class="fa fa-bar-chart-o"></i> PERFORMANCE GRAPH</h3>
                </div>
                <div class="widget-content">

                    <form action="#" role="form" class="form-horizontal" method="post">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Type Of Graph</label>
                            <div class="col-md-4">
                                <select id="" name="" class="form-control rounded">
                                    <option>LINE</option>
                                    <option>PIE</option>
                                    <option>COLUMN</option>
                                    <option>BAR</option>
                                    <option>STACKED</option>
                                    <option>ROW</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-4">
                                <input id="username" name="username" class="form-control rounded" type="text" placeholder="Enter Username">
                            </div>
                        </div>

                        <div class="form-group">
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">KPI name</label>
                            <div class="col-md-4">

                                <?php
                                $selected = set_value('kpi_id');
                                ?>
                                <select id="kpi_name" name="kpi_name" class="form-control rounded">
                                    <option value="0">-----------------------SELECT--------------------------</option>
                                    <?php
                                    if (isset($kpiArr) && $kpiArr != array()) {
                                        foreach ($kpiArr as $key => $value) {
                                            $sel = "";
                                            if ($value->kpi_id == $selected)
                                                $sel = "selected";

                                            echo "<option value='" . $value->kpi_id . "' $sel>" . $value->kpi_name . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Time Period</label>
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <label class="control-label">FROM:</label>
                                    <input class="form-control" type="text" placeholder="01/01/2014">
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label">TO:</label>
                                    <input class="form-control" type="text" placeholder="01/01/2014">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-12">
                                <center><button type="submit" class="btn btn-primary">SUBMIT</button></center>
                            </div>

                        </div>

                        <div class="padded">
                            <div id="users_barchart" style="height: 330px; position: relative;">

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>