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

                            <h3><i class="fa fa-book"></i> Register New User</h3>
                        </div>

                        <div class="widget-content">
                            <div class="modal-body">
                                <form action="<?php echo base_url() ?>register/reg" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?php
                                    if ((isset($data)) && $data[0]->user_id != '') {
                                        $userid = $data[0]->user_id;
                                    } else {
                                        $userid = '';
                                    }
                                    ?>
                                    <input type="hidden" name="userid" id="userid" value="<?= $userid ?>">


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Type Of User</label>
                                        <div class="col-md-8">

                                            <?php
                                            if ((isset($data)) && $data[0]->user_type_id_fk != '') {
                                                $cmpname = $data[0]->user_type_id_fk;
                                            } else {
                                                $cmpname = set_value('user_type_id_fk');
                                            }
                                            ?>

                                            <?php
                                            $selected = set_value('user_type_id_fk');
                                            ?>
                                            <select  name="user_type_id_fk" class="form-control rounded">
                                                <option value="0">-----------------------SELECT--------------------------</option>
                                                <?php
                                                if (isset($usertypeArr) && $usertypeArr != array()) {
                                                    foreach ($usertypeArr as $key => $value) {
                                                        $sel = "";
//                                                        echo $key.'--'.$value->user_type_id.'--'.$data[0]->user_type_id_fk.'<br/>';
                                                        if ($value->user_type_id == $data[0]->user_type_id_fk)
                                                            $sel = "selected";

                                                        echo "<option value='" . $value->user_type_id . "' $sel>" . $value->user_type . "</option>";
                                                    }
                                                }
                                                ?>

                                            </select>
                                            <span class="error"><?php echo form_error('user_type_id_fk'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">First Name</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->firstname != '') {
                                                $cmpname = $data[0]->firstname;
                                            } else {
                                                $cmpname = set_value('firstname');
                                            }
                                            ?>

                                            <input class="form-control rounded" type="text" id="firstname" name="firstname" placeholder="Enter Your First Name" value="<?php echo $cmpname; ?>">
                                            <span class="error"><?php echo form_error('firstname'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Last Name</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->lastname != '') {
                                                $cmpname = $data[0]->lastname;
                                            } else {
                                                $cmpname = set_value('lastname');
                                            }
                                            ?>
                                            <input class="form-control rounded" type="text" id="lastname" name="lastname" placeholder="Enter Your Last Name" value="<?php echo $cmpname; ?>">
                                            <span class="error"><?php echo form_error('lastname'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Username</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->username != '') {
                                                $cmpname = $data[0]->username;
                                            } else {
                                                $cmpname = set_value('username');
                                            }
                                            ?>

                                            <input id="username" name="username" class="form-control rounded" type="text" placeholder="Choose Your Username" value="<?php echo $cmpname; ?>">
                                            <span class="error"><?php echo form_error('username'); ?></span>
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Password</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->password != '') {
                                                $password = $data[0]->password;
                                            } else {
                                                $password = set_value('password');
                                            }
                                            ?>
                                            <input id="password" name="password" type="password" class="form-control rounded" placeholder="Choose Your Password" value="<?php echo $password; ?>">
                                            <span class="error"><?php echo form_error('password'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Re-Password</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->password != '') {
                                                $password = $data[0]->password;
                                            } else {
                                                $password = set_value('password');
                                            }
                                            ?>

                                            <input id="cpassword" name="cpassword" type="password" class="form-control rounded" placeholder="Re-Enter Your Password" value="<?php echo $password; ?>">
                                            <span class="error"><?php echo form_error('cpassword'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email-id</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->email_id != '') {
                                                $password = $data[0]->email_id;
                                            } else {
                                                $password = set_value('email_id');
                                            }
                                            ?>
                                            <input class="form-control rounded" id="email_id" type="text" name="email_id" placeholder="Enter Your E-mail ID    ex., username@example.com" value="<?php echo $password; ?>">
                                            <span class="error"><?php echo form_error('email_id'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Parent User</label>
                                        <div class="col-md-8">

                                            <?php
                                            if ((isset($data)) && $data[0]->parent_id != '') {
                                                $cmpname = $data[0]->parent_id;
                                            } else {
                                                $cmpname = set_value('parent_id');
                                            }
                                            ?>

                                            <?php
                                            $selected = set_value('parent_id');
                                            ?>
                                            <select  name="parent_id" class="form-control rounded">
                                                <option value="$$">-----------------------SELECT--------------------------</option>
                                                <?php
                                                if (isset($userArr) && $userArr != array()) {
                                                    foreach ($userArr as $key => $value) {
                                                        $sel = "";

                                                        if ($value->user_id == $data[0]->parent_id)
                                                            $sel = "selected";

                                                        echo "<option value='" . $value->user_id . "' $sel>" . $value->username . "</option>";
                                                    }
                                                }
                                                ?>

                                            </select>
                                            <span class="error"><?php echo form_error('parent_id'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Phone Number</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->phone_number != '') {
                                                $password = $data[0]->phone_number;
                                            } else {
                                                $password = set_value('phone_number');
                                            }
                                            ?>
                                            <input type="number" id="phone_number" name="phone_number" class="form-control rounded" placeholder="Enter Your Phone Number" value="<?php echo $password; ?>">
                                            <span class="error"><?php echo form_error('phone_number'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Address</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->address != '') {
                                                $password = $data[0]->address;
                                            } else {
                                                $password = set_value('address');
                                            }
                                            ?>
                                            <textarea class="form-control" type="text" id="address" rows="2" name="address" placeholder="Enter Your Address" value="<?php echo $password; ?>"><?= $password ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Birth Date</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->birthdate != '') {
                                                $password = $data[0]->birthdate;
                                            } else {
                                                $password = set_value('birthdate');
                                            }
                                            ?>
                                            <input class="form-control input-datepicker" id="birthdate" name="birthdate" type="datetime" placeholder="Select Your Birthdate" value="<?php $password; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Gender</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->gender != '') {
                                                $password = $data[0]->gender;
                                            } else {
                                                $password = set_value('gender');
                                            }
                                            ?>
                                            <input id="optionsRadios1" type="radio" value="m" name="gender" checked="checked" >Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input id="optionsRadios2" type="radio" value="f" name="gender">Female
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Profile Image</label>
                                        <div class="col-md-8">
                                            <?php
                                            if ((isset($data)) && $data[0]->profile_image != '') {
                                                $password = $data[0]->profile_image;
                                            } else {
                                                $password = set_value('profile_image');
                                            }
                                            ?>
                                            <?php // echo form_open_multipart()?>
                                            <input type="file" name="profile_image" id="profile_image" >
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="col-md-4">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary">SAVE</button> &nbsp;
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <div class="col-md-offset-2">
                                        <a href="<?php echo base_url(); ?>register/get_register"><button class="btn btn-primary">BACK</button></a>
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