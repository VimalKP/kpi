<style type="text/css">
    #kpiicon{
        background-color: #3E94C9!important;
        width: 54px!important;
    }
</style>
<div class="side">
    <div class="sidebar-wrapper">
        <ul>
            <li>
                <a href="<?php echo base_url() ?>home" data-toggle="tooltip" data-placement="right" title="" data-original-title="Home">
                    <i class="fa fa-home"></i>
                </a>
            </li>

            <?php
            if ($this->session->userdata('parent_id') == 0 && $this->session->userdata('user_id') != '' && $this->session->userdata('company_id') != 0) {//parent id =0
            ?>
                <li>
                    <a href="<?php echo base_url() ?>register/get_register" data-toggle="tooltip" data-placement="right" title="" data-original-title="Users">
                        <i class="fa fa-users"></i>
                    </a>
                </li>
            <?php
            }

            if ($this->session->userdata('user_id') == '') {
//            if ($this->session->userdata('user_type_id_fk') == '' && $this->session->userdata('user_id') != '') {
            ?>
                <li>
                    <a href="<?php echo base_url() ?>login" data-toggle="tooltip" data-placement="right" title="" data-original-title="Login">
                        <i class="fa fa-sign-in"></i>
                    </a>
                </li>
            <?php
            }

            if ($this->session->userdata('company_id') == 0 && $this->session->userdata('user_id') == 0 && $this->session->userdata('user_id') != '') {//parentid
            ?>
                <li>
                    <a href="<?php echo base_url() ?>company/get_company" data-toggle="tooltip" data-placement="right" title="" data-original-title="All Company">
                        <i class="fa fa-briefcase"></i>
                    </a>
                </li>
            <?php
            }

            if ($this->session->userdata('parent_id') == 0 && $this->session->userdata('user_id') != '' && $this->session->userdata('company_id') != 0) {//parent_id =0
            ?>
                <li>
                    <a href="<?php echo base_url() ?>company" data-toggle="tooltip" data-placement="right" title="" data-original-title="Company Details">
                        <span class="badge"></span>
                        <i class="fa fa-desktop"></i>
                    </a>
                </li>
            <?php
            }

            if ($this->session->userdata('user_id') != '' && $this->session->userdata('company_id') != 0) {
            ?>

                <div id='cssmenu'>
                    <ul>
                        <li class=''>
    <!--                            <a href="<?php echo base_url() ?>login" data-toggle="tooltip" data-placement="right" title="" data-original-title="">-->
                            <a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="" id="kpiicon">
                                <span class="badge"></span>
                                <i class="fa fa-arrow-circle-o-right"></i>
                            </a>

                            <ul style="display: block;">

                            <?php
                            if ($this->session->userdata('parent_id') == 0) {
                            ?>

                                <li>

                                    <a href="<?php echo base_url() ?>create_kpi"><span>Create KPI</span></a>
                                </li>

                            <?php
                            }
                            ?>
                            <?php if ($this->session->userdata('parentcheck') == 'yes') {
                            ?>
                                <li>
                                    <a href="<?php echo base_url() ?>kpi_assign"><span>Assign KPI</span></a>
                                </li>
                            <?php } ?>


                            <?php if ($this->session->userdata('parentcheck') == 'yes') {
                            ?>
                                <li>
                                    <a href="<?php echo base_url() ?>target_assign"><span>Target KPI</span></a>
                                </li>
                            <?php } ?>


                            <?php
                            if ($this->session->userdata('parent_id') != 0) {
                            ?>
                                <li>
                                    <a href="<?php echo base_url() ?>kpi_entry"><span>KPI Entry</span></a>
                                </li>
                            <?php
                            }
                            ?>

                            <?php if ($this->session->userdata('parentcheck') == 'yes') {
                            ?>
                                <li>
                                    <a href="<?php echo base_url() ?>kpi_approve"><span>Approve KPI</span></a>
                                </li>
                            <?php } ?>

                        </ul>

                    </li>
                </ul>
            </div>

            <?php
                        }


                        if ($this->session->userdata('user_id') != '' && $this->session->userdata('company_id') != 0) {
            ?>
                            <li>
                                <a href="<?php echo base_url() ?>attendance" data-toggle="tooltip" data-placement="right" title="Attendance" data-original-title="Attendance">
                                    <i class="fa fa-user"></i>
                                </a>
                            </li>

            <?php
                        }

                        if ($this->session->userdata('user_id') != '' && $this->session->userdata('company_id') != 0) {
            ?>
                            <li>
                                <a href="<?php echo base_url() ?>graph" data-toggle="tooltip" data-placement="right" title="Analysis" data-original-title="Analysis">
                                    <i class="fa fa-bar-chart-o"></i>
                                </a>
                            </li>

            <?php
                        }

                        if ($this->session->userdata('parent_id') == 0 && $this->session->userdata('user_id') != '' && $this->session->userdata('company_id') != 0) {
            ?>

                            <li>
                                <a href="<?php echo base_url() ?>holiday" data-toggle="tooltip" data-placement="right" title="Set Holiday" data-original-title="Holiday">
                                    <i class="fa fa-calendar"></i>
                                </a>
                            </li>

            <?php
                        }

                        if ($this->session->userdata('user_type_id_fk') != '') {
            ?>

                            <li>
                                <a href="<?php echo base_url() ?>register/change_pwd" data-toggle="tooltip" data-placement="right" title="Change Password" data-original-title="Change Password">
                                    <i class="fa fa-star"></i>
                                </a>
                            </li>

            <?php
                        }
                        if ($this->session->userdata('parent_id') == 0 && $this->session->userdata('user_id') != '' && $this->session->userdata('company_id') != 0) {//parent_id =0
            ?>
                            <li>
                                <a href="<?php echo base_url() ?>message" data-toggle="tooltip" data-placement="right" title="" data-original-title="Message">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </li>
            <?php
                        }

                        if ($this->session->userdata('user_id') == '') {
            ?>
                            <li>
                                <a href="<?php echo base_url() ?>contact" data-toggle="tooltip" data-placement="right" title="" data-original-title="Contact Us">
                                    <i class="fa fa-phone"></i>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url() ?>about" data-toggle="tooltip" data-placement="right" title="" data-original-title="About Us">
                                    <i class="fa fa-flag"></i>
                                </a>
                            </li>
            <?php
                        }
            ?>

        </ul>
    </div>
</div>