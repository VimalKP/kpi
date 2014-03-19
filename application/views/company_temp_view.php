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
        <h3><i class="fa fa-desktop"></i>Company Detail Form</h3>
    </div><div class="widget-content">
        <div class="modal-body">
            <form action="<?php echo base_url() ?>company/companydetail" role="form" method="POST" class="form-horizontal">

                <input type="hidden" value="1" name="tb_no" id="tb_no">

                <div class="form-group">
                    <label class="col-md-4 control-label">Company Name</label>
                    <div class="col-md-8">
                        <?php
                        if ((isset($data)) && $data[0]->company_name != '') {
                            $cmpname = $data[0]->company_name;
                        } else {
                            $cmpname = set_value('company_name');
                        }
                        ?>

                        <input id="company_name" name="company_name" type="text" class="form-control rounded" placeholder="Enter Name Of Company"  value="<?php echo $cmpname; ?>">
                        <span class="error"><?php echo form_error('company_name'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Company Address</label>
                    <div class="col-md-8">
                        <?php
                        if ((isset($data)) && $data[0]->company_address != '') {
                            $cmpname = $data[0]->company_address;
                        } else {
                            $cmpname = set_value('company_address');
                        }
                        ?>
                        <textarea class="form-control" rows="2" id="company_address" name="company_address" type="text" placeholder="Enter Company Address" value="<?php echo $cmpname; ?>"><?php echo $cmpname; ?></textarea>
                        <span class="error"><?php echo form_error('company_address'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Type Of Company</label>
                    <div class="col-md-8">

                        <?php
                        if ((isset($data)) && $data[0]->company_type != '') {
                            $cmpname = $data[0]->company_type;
                        } else {
                            $cmpname = set_value('company_type');
                        }
                        ?>
                        <?php
                        $selected = set_value('company_type');
                        ?>
                        <select class="form-control rounded"  name="company_type" value="<?php echo $cmpname; ?>">
                            <option value="0">-----------------------SELECT--------------------------</option>
                            <option value="organization" <?php echo ($cmpname == "organization") ? "selected" : ""; ?>>Organization</option>
                            <option value="factory" <?php echo ($cmpname == "factory") ? "selected" : ""; ?>>Factory</option>

                        </select>
                        <span class="error"><?php echo form_error('company_type'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Company Email-id</label>
                    <div class="col-md-8">

                        <?php
                        if ((isset($data)) && $data[0]->company_email != '') {
                            $cmpname = $data[0]->company_email;
                        } else {
                            $cmpname = set_value('company_email');
                        }
                        ?>
                        <input id="company_email" name="company_email" type="text" class="form-control rounded" placeholder="Enter E-mail ID Of Company   ex., username@example.com" value="<?php echo $cmpname; ?>">
                        <span class="error"><?php echo form_error('company_email'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Company Phone Number</label>
                    <div class="col-md-8">

                        <?php
                        if ((isset($data)) && $data[0]->company_phone != '') {
                            $cmpname = $data[0]->company_phone;
                        } else {
                            $cmpname = set_value('company_phone');
                        }
                        ?>
                        <input type="number" id="company_phone" name="company_phone" class="form-control rounded" placeholder="Enter Phone Number Of Company"  value="<?php echo $cmpname; ?>">
                        <span class="error"><?php echo form_error('company_phone'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Company Website</label>
                    <div class="col-md-8">

                        <?php
                        if ((isset($data)) && $data[0]->company_website != '') {
                            $cmpweb = $data[0]->company_website;
                        } else {
                            $cmpweb = set_value('company_website');
                        }
                        ?>
                        <input class="form-control rounded" id="company_website" type="text" name="company_website" placeholder="Enter Officeal Website Of Company   ex., www.example.com" value="<?php echo $cmpweb; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">User Type</label>
                    <div class="col-md-8">

                        <?php
                        // if ((isset($data)) && $data[0]->facebook_page != '') {
                        //   $cmpname = $data[0]->facebook_page;
                        //} else {
                        //    $cmpname = set_value('facebook_page');
                        // }
                        ?>
                        <input type="text" id="usertypearr" name="usertype" class="form-control rounded"   placeholder="Enter user type"  />  
<!--                        <input type="text" id="facebook_page" class="form-control rounded" placeholder="Enter Company's Facebook Page Link If Available" value="<?php // echo $cmpname;    ?>">-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Facebook Page Link</label>
                    <div class="col-md-8">

                        <?php
                        if ((isset($data)) && $data[0]->facebook_page != '') {
                            $cmpname = $data[0]->facebook_page;
                        } else {
                            $cmpname = set_value('facebook_page');
                        }
                        ?>
                        <input type="text" id="facebook_page" name="facebook_page" class="form-control rounded" placeholder="Enter Company's Facebook Page Link If Available" value="<?php echo $cmpname; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Twitter Page Link</label>
                    <div class="col-md-8">

                        <?php
                        if ((isset($data)) && $data[0]->twitter_page != '') {
                            $cmpname = $data[0]->twitter_page;
                        } else {
                            $cmpname = set_value('twitter_page');
                        }
                        ?>
                        <input type="text" id="twitter_page" name="twitter_page" class="form-control rounded" placeholder="Enter Company's Twitter Page Link If Available" value="<?php echo $cmpname; ?>">
                    </div>
                </div>



                <div class="form-group" style="display: none;">
                    <!--                <div class="form-group" style="display: none;" >-->
                    <label class="col-md-4 control-label">User Type</label>
                    <div class="col-md-6" id="lists">


                        <input type="text" name="usertype_list[]" class="form-control rounded" style="margin-bottom: 5px;" value="" id="l1">
                    </div>
                    <a href="javascript:addmore();">
                        <img alt="+" src="http://kpi.net16.net/site/images/add.png" width="29" height="29" style="padding: 0px; margin: 0px 0px -9px;">
                    </a>
                </div>


                <!--                                    <div class="form-group" id='TextBoxesGroup'>
                                                        <label class="col-md-4 control-label">Add user type #1</label>
                                                        <div class="col-md-8" id="TextBoxDiv1">
                                                            <input type="textbox" id="user_type" name="user_type" class="form-control rounded" >
                                                        </div>
                                                    </div>
    
                                                    <div class="form-group" id='TextBoxesGroup'>
                                                        <label class="col-md-4 control-label"></label>
                                                        <div class="col-md-8" id="TextBoxDiv1">
    
                                                            <img src="images/add.png" value='Add Button' id='addButton' width="29" height="29" style="padding: 0px; margin: 0px 0px -9px;">
                                                            <img src="images/remove.png" value='Remove Button' id='removeButton' width="29" height="29" style="padding: 0px; margin: 0px 0px -9px;">
    
                                                            <input type='button' value='Add Button' id='addButton'>
                                                            <input type='button' value='Remove Button' id='removeButton'>
                                                            <input type='button' value='Get TextBox Value' id='getButtonValue'>
                                                        </div>
                                                    </div>-->


                <!--                                    <div id='TextBoxesGroup'>
                                                        <div id="TextBoxDiv1">
                                                            <label>Textbox #1 : </label><input type='textbox' id='textbox1' >
                                                        </div>
                                                    </div>-->



                <div class="form-group">
                    <div class="col-md-offset-4 col-md-8">
                        <button type="submit"  class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--<script type="text/javascript">
    $(document).ready(function() {
        $("#usertypearr").tokenInput("http://shell.loopj.com/tokeninput/tvshows.php", {
            searchingText: "Meowing...",
            allowCustomEntry: true,
            preventDuplicates: true,
            tokenDelimiter: "|",
            theme: "facebook"
        });
    });
</script>-->