<?php
$this->load->library('form_validation');
?>
<div class="all-wrapper fixed-header left-menu">

    <div class="main-content">

        <div class="modal-dialog">
            <div class="modal-content">
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

                        <h3><i class="fa fa-pencil"></i> Message</h3>
                    </div>
                    <div class="widget-content">
                        <div class="modal-body">

                            <form action="<?php echo base_url() ?>message/message_sent" method="POST" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Message</label>
                                    <div class="col-md-9">
                                        <?php
                                    if ((isset($msgarr)) && $msgarr[0]->message_text != '') {
                                        $msg = $msgarr[0]->message_text;
                                    }else
                                    {
                                        $msg = set_value('message_text');
                                    }
                                    ?>
                                        <textarea   class="form-control" type="text" id="message_text" rows="3" name="message_text" placeholder="Enter Your Message Here" value="<?php echo $msg; ?>"><?= $msg ?> </textarea>
                                    </div>
                                </div>

                                <!--                                <div class="form-group">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox"> Remember me
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>-->

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">Send To All</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <span class="error"><?php echo form_error('message_text'); ?></span>
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
