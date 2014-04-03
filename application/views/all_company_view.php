<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">


    <div class="main-content">

<!--        <h4> <a href="<?php echo base_url() ?>register" style="color: red;"> ADD NEW USER</a></h4>-->
        <br><br>
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
                    <h3><i class="fa fa-briefcase"></i> Company List</h3>
                </div>
                <div class="widget-content">
                    <div class="table-responsive">
                        <table style="text-align: center;" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><center>Company Id</center></th>
                                    <th><center>Company Name</center></th>
                                    <th><center>Company Address</center></th>
                                    <th><center>Company Email ID</center></th>
                                    <th><center>Company Phone NO.</center></th>
                                    <th><center>Company Website</center></th>
                                    <th><center>Company Facebook Page</center></th>
                                    <th><center>Company Twitter page</center></th>
                                    <th><center>Company Status</center></th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                foreach ($companyArr as $row) {
                                    echo"<tr>";
                                ?>

                                <td> <?php echo $row->company_id; ?> </td>
                                <td> <?php echo $row->company_name; ?> </td>
                                <td> <?php echo $row->company_address; ?> </td>
                                <td> <?php echo $row->company_email; ?> </td>
                                <td> <?php echo $row->company_phone; ?></td>
                                <td> <?php echo $row->company_website; ?></td>
                                <td> <?php echo $row->facebook_page; ?></td>
                                <td> <?php echo $row->twitter_page; ?></td>


                                <!--                                 echo "<option value='" . $value->user_id . "' $sel>" . $value->username . "</option>";-->

                                                                                        <!--                                <td><a href="<?php echo base_url(); ?>register/edit_user"> Edit</a> <a href="<?php echo base_url(); ?>register/delete_user">Delete</a>   </td>-->
                            <?php if ($row->company_status == 0) {
                            ?>
                                        <td><span id="users_<?= $row->company_id ?>" class="label label-success" style="cursor: pointer" onclick="changestatuscompany(this.id);">Active</span></td>
                            <?php } else {
                            ?>
                                        <td><span id="users_<?= $row->company_id ?>" class="label label-danger" style="cursor: pointer" onclick="changestatuscompany(this.id);">Deactive</span></td>
                            <?php } ?>

                                    <td class="text-right">
                                        <center> <a href="<?php echo base_url(); ?>company/edit_company?id=<?= $row->company_id ?>" class="btn btn-default btn-xs">edit</a></center>
           <!--                                    <a href="<?php // echo base_url();              ?>register/delete_user?id=<? //= $row->user_id              ?>" class="btn btn-danger btn-xs "><i class="fa fa-times"></i></a>-->
                                    </td>

                                <!--                                <td><a href="<?php echo base_url(); ?>register/edit_user?id=<?= $row->user_id ?>"> Edit</a> <a href="<?php echo base_url(); ?>register/delete_user?id=<?= $row->user_id ?>">Delete</a>   </td>-->



                            <?php
                                }
                                echo "</tr>";
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>