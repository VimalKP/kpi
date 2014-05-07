<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="modal-dialog">
            <!--            <div class="modal-content">-->
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
                        <h3><i class="fa fa-users"></i> List Of Users For Attendance</h3>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table style="text-align: center;" class="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th><center>Username</center></th>
                                        <th><center>First name</center></th>
                                        <th><center>Last name</center></th>
                                        <th><center>Action</center></th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (isset($usergetArr) && $usergetArr != array()) {

                                        foreach ($usergetArr as $key => $value) {
                                            echo"<tr>";
                                    ?>

                                        <td>
                                    <?php
                                            echo $value->username;
                                    ?>
                                        </td>

                                        <td>
                                    <?php
                                            echo $value->firstname;
                                    ?>
                                        </td>

                                        <td>
                                    <?php
                                            echo $value->lastname;
                                    ?>
                                        </td>

                                        <td> <input type="checkbox" id="attendance_<?= $value->user_id ?>" onchange="absent(this.id); " <?php echo ( in_array($value->user_id, $absentuserids)) ? "checked='checked'" : ""; ?>> </td>

                                <?php
                                        }
                                    }
                                    echo "</tr>";
                                ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="main">
                    <div class="widget widget-red">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                                <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                            </div>
                            <h3><i class="fa fa-user"></i> Your Attendance ( Last 30 Days )</h3>
                        </div>
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table style="text-align: center;" class="table table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th><center> No. Of Absent</center></th>
                                            <th><center> Absent Date</center></th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    if (isset($detail) && $detail != array()) {

                                        foreach ($detail as $key => $value) {

                                            echo"<tr>";
//                                            echo "<pre>";
//                                            print_r($a);
//                                            echo "</pre>";
//                                            exit();
                                    ?>
                                        <td>
                                    <?php echo $key + 1; ?>
                                        </td>        

                                        <td>
                                    <?php
                                            echo date("d-m-Y", strtotime($value->attendance_date));
                                    ?>
                                        </td>





                                <?php
                                        }
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
</div>
<!--</div>-->