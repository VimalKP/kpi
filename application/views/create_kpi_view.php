<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">

    <div class="main-content">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="main">

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

                            <h3><i class="fa  fa-pencil"></i>Create KPI</h3>
                        </div>

                        <div class="widget-content">
                            <div class="modal-body">
                                <form action="<?php echo base_url() ?>create_kpi/createkpi" role="form" method="POST" class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Name Of KPI</label>
                                        <div class="col-md-8">
                                            <input id="kpi_name" name="kpi_name" type="text" class="form-control rounded" placeholder="Enter Name Of KPI"  value="<?php echo set_value('kpi_name'); ?>">
                                            <span class="error"><?php echo form_error('kpi_name'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Frequency Of KPI</label>
                                        <div class="col-md-8">
                                            <?php
                                            $selected= set_value('frequency');
                                            ?>
                                            <select id="frequency" name="frequency" class="form-control rounded" >
                                                <option value="0">-----------------------SELECT--------------------------</option>
                                                <option value="daily" <?php echo ($selected=="daily")?"selected":""; ?>>Daily</option>
                                                <option value="weekly" <?php echo ($selected=="weekly")?"selected":""; ?>>Weekly</option>
                                                <option value="monthly" <?php echo ($selected=="monthly")?"selected":""; ?>>Monthly</option>
                                                <option value="yearly" <?php echo ($selected=="yearly")?"selected":""; ?>>Yearly</option>
                                            </select>
                                            <span class="error"><?php echo form_error('frequency'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Type Of KPI</label>
                                        <div class="col-md-8">
                                            <?php
                                            $selected= set_value('kpi_type');
                                            ?>
                                            <select id="kpi_type" name="kpi_type" class="form-control rounded">
                                                <option value="0">-----------------------SELECT--------------------------</option>
                                                <option value="integer" <?php echo ($selected=="integer")?"selected":""; ?>>Integer</option>
                                                <option value="boolean" <?php echo ($selected=="boolean")?"selected":""; ?>>Boolean</option>
                                                
                                            </select>
                                            <span class="error"><?php echo form_error('kpi_type'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>