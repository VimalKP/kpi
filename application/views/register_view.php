<?php
$this->load->library('form_validation');
?>
<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="main">
                    <div class="widget widget-blue">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                                <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
                                <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
                                <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                                    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Set Widget Color</li>
                                        <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
                                        <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
                                        <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
                                        <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
                                        <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                                <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
                            </div>

                            <h3><i class="fa fa-ok-circle"></i> Registration Form</h3>
                        </div>

                        <div class="widget-content">
                            <div class="modal-body">
                                <form action="<?php echo base_url() ?>register/reg" role="form" class="form-horizontal" method="post">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Type Of User</label>
                                        <div class="col-md-8">
                                            <select id="user_type_id_fk" name="user_type_id_fk" class="form-control rounded">
                                                <option>-----------------------SELECT--------------------------</option>
                                                <option>Admin</option>
                                                <option>manager</option>
                                                <option>Employee</option>
                                                <option>Worker</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">First Name</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" type="text" id="firstname" name="firstname" placeholder="Enter Your First Name" value="<?php echo set_value('firstname'); ?>">
                                            <span class="error"><?php echo form_error('firstname'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Last Name</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" type="text" id="lastname" name="lastname" placeholder="Enter Your Last Name" value="<?php echo set_value('lastname'); ?>">
                                            <span class="error"><?php echo form_error('lastname'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Username</label>
                                        <div class="col-md-8">
                                            <input id="username" name="username" class="form-control rounded" type="text" placeholder="Choose Your Username" value="<?php echo set_value('username'); ?>">
                                            <span class="error"><?php echo form_error('username'); ?></span>
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Password</label>
                                        <div class="col-md-8">
                                            <input id="password" name="password" type="password" class="form-control rounded" placeholder="Choose Your Password" value="<?php echo set_value('password'); ?>">
                                            <span class="error"><?php echo form_error('password'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Re-Password</label>
                                        <div class="col-md-8">
                                            <input id="cpassword" name="cpassword" type="password" class="form-control rounded" placeholder="Re-Enter Your Password" value="<?php echo set_value('cpassword'); ?>">
                                            <span class="error"><?php echo form_error('cpassword'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email-id</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" id="email_id" type="text" name="email_id" placeholder="Enter Your E-mail ID    ex., username@example.com" value="<?php echo set_value('email_id'); ?>">
                                            <span class="error"><?php echo form_error('email_id'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Phone Number</label>
                                        <div class="col-md-8">
                                            <input type="number" id="phone_number" name="phone_number" class="form-control rounded" placeholder="Enter Your Phone Number" value="<?php echo set_value('phone_number'); ?>">
                                            <span class="error"><?php echo form_error('phone_number'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Address</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" type="text" id="address" rows="2" name="address" placeholder="Enter Your Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Birth Date</label>
                                        <div class="col-md-8">
                                            <input class="form-control input-datepicker" id="birthdate" name="birthdate" type="datetime" placeholder="Select Your Birthdate" value="<?php echo set_value('birthdate'); ?>">
                                            <span class="error"><?php echo form_error('birthdate'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Gender</label>
                                        <div class="col-md-8">
                                            <input id="optionsRadios1" type="radio" value="option2" name="gender">Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input id="optionsRadios2" type="radio" value="option2" name="gender">Female
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Profile Image</label>
                                        <div class="col-md-8">
                                            <input type="file" name="profile_image" id="profile_image">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <div class="col-md-8">
                                                <label>
                                                    <input type="checkbox"> Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="submit" class="btn btn-primary">SIGN UP</button>
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