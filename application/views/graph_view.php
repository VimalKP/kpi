<?php
$this->load->library('form_validation');
?>
<script type="text/javascript">
    var baseurl="http://localhost/kpi/";
    function selectkpishow(){
        $("#kpi_combo_div").fadeOut(300);
        var userid=($("#user_name_combo").val());
        $.ajax({
            url:baseurl+"graph/fetchKpiOfUSer",
            type:'POST',
            data:  { "userid": userid },
            success:function(data){
                if(data!=''){
                    $("#kpi_name_combo").html(data);
                    $("#kpi_combo_div").fadeIn(300);
                }
            }
        });
    }
</script>   
<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">

        <div class="col-md-12" id="bar_chart_anchor">
            <div class="widget widget-orange">
                <div class="widget-title">
                    <div class="widget-controls">
                        <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                        <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>

                        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                    </div>
                    <h3><i class="fa fa-bar-chart-o"></i> PERFORMANCE GRAPH</h3>
                </div>
                <div class="widget-content">

                    <form action="javascript:void(0)" role="form" class="form-horizontal" method="post">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Type Of Graph</label>
                            <div class="col-md-4">
                                <select id="chartType" name="chartType" class="form-control rounded">
                                    <option value="column">Column</option>
                                    <option value="bar">Bar</option>
                                    <option value="area">Area</option>
<!--                                    <option value="pie">Pie</option>-->
                                    <option value="line">Line</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-4">
                                <?php
                                $selected = set_value('user_id');
                                ?>
                                <select id="user_name_combo" name="user_name" class="form-control rounded" onchange="selectkpishow()">
                                    <option value="0">-----------------------SELECT--------------------------</option>
                                    <?php
                                    if (isset($usergetArr) && $usergetArr != array()) {
                                        foreach ($usergetArr as $key => $value) {
                                            $sel = "";
                                            if ($value->user_id == $selected)
                                                $sel = "selected";

                                            echo "<option value='" . $value->user_id . "' $sel>" . $value->username . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="kpi_combo_div" style="display: none;">
                            <label class="col-md-4 control-label">KPI name</label>
                            <div class="col-md-4">

                                <?php
                                $selected = set_value('kpi_id');
                                ?>
                                <select id="kpi_name_combo" name="kpi_name" class="form-control rounded">
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
                                    <input class="form-control  input-datepicker" type="text" id="fromdate" placeholder="01/01/2014">
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label">TO:</label>
                                    <input class="form-control  input-datepicker" type="text" id="todate" placeholder="01/01/2014">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-12">
                                <center><button type="submit" class="btn btn-primary" onclick="chart();" > SUBMIT </button></center>
                            </div>
                        </div>

                        <div class="padded">
                            <div id="users_barchart" style="height: 400px; position: relative;">
                                <?php // include_once 'chart_container_view.php'; ?>
                                <div id="container">

                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
