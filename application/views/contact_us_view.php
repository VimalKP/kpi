<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">

    <div class="main-content">

        <div class="row">
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
                        <h3><i class="fa fa-phone"></i> Contact Us</h3>
                    </div>
                    <div class="widget-content">

                        <center><b><h3 style="font-family: Roboto Condensed;">*** You Can Contact Us Using The Below Form, Alternatively You Can Also Use Phone No., Email, Facebook OR Twitter Page Link ***</h3></b></center> <br>

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
                                        <h3><i class="fa fa-file-text"></i> Contact Us By Online Form</h3>
                                    </div>
                                    <div class="widget-content">
                                        <form action="<?php echo base_url() ?>contact/contactus" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Name</label>
                                                <div class="col-md-8">
                                                    <input id="name" name="name" class="form-control rounded" type="text" placeholder="Enter Your Name">
                                                    <span class="error"><?php echo form_error('name'); ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Email-id</label>
                                                <div class="col-md-8">
                                                    <input class="form-control rounded" id="email_id" type="text" name="email_id" placeholder="Enter Your E-mail ID   ex., username@example.com">
                                                    <span class="error"><?php echo form_error('email_id'); ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Message</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" type="text" id="message" rows="4" name="message" placeholder="Enter Your Message Here"></textarea>
                                                    <span class="error"><?php echo form_error('message'); ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label"></label>
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary">SEND</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

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
                                        <h3><i class="fa fa-mobile-phone"></i> Alternative Contact Information</h3>
                                    </div>
                                    <div class="widget-content">

                                        <img src="<?php echo base_url();?>images/mobile.png" style="height: 60px; width: 60px;"/>&nbsp;&nbsp;&nbsp; +91 9033556407 <br><br>
                                        <img src="<?php echo base_url();?>images/email.png" style="height: 60px; width: 60px;"/>&nbsp;&nbsp;&nbsp; kpisolutions12345@gmail.com <br><br>
                                        <img src="<?php echo base_url();?>images/twitter.png" style="height: 60px; width: 60px;"/>&nbsp;&nbsp;&nbsp; <a href="https://twitter.com/kpisolution" target="_blank"><b>Follow Us On Twitter </b></a> <br><br>
                                        <img src="<?php echo base_url();?>images/facebook.png" style="height: 60px; width: 60px;"/>&nbsp;&nbsp;&nbsp; <a href="https://www.facebook.com/pages/Kpisolution/1409270795987491" target="_blank"><b>Like Us On Facebook </b></a>

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