<!DOCTYPE html>
<html>
    <!-- Mirrored from saturn.pinsupreme.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 15 Jan 2014 08:41:23 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel='stylesheet' href='<?php echo base_url() ?>css/style.css' type='text/css'>
        <link rel='stylesheet' href='<?php echo base_url() ?>css/main.css' type='text/css'>

        <link rel='stylesheet' href='<?php echo base_url() ?>css/googlefonts.css' type='text/css'>
        <link rel='stylesheet' href='<?php echo base_url() ?>font-awesome/css/font-awesome.css' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style3.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/devheart-examples.css" media="screen" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style2.css" media="screen" />

        <link href="<?php echo base_url() ?>assets/favicon.ico" rel="shortcut icon">
        <link href="<?php echo base_url() ?>assets/apple-touch-icon.png" rel="apple-touch-icon">
        <link rel='stylesheet' href='<?php echo base_url() ?>css/menu_panel.css' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          @javascript html5shiv respond.min
        <![endif]-->


        <title>KPI Growth Management</title>

        <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>


        <script type="text/javascript">

            $(document).ready(function(){

                var counter = 2;

                $("#addButton").click(function () {

                    if(counter>10){
                        alert("Only 10 textboxes allow");
                        return false;
                    }

                    var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);

                    newTextBoxDiv.after().html('<label class="col-md-4 control-label">Add user type #'+ counter + ' </label>' +
                        '<input type="text" name="textbox' + counter +
                        '" id="textbox' + counter + '" value="" class="form-control rounded" >');

                    newTextBoxDiv.appendTo("#TextBoxesGroup");


                    counter++;
                });

                $("#removeButton").click(function () {
                    if(counter==2){
                        alert("No more textbox to remove");
                        return false;
                    }

                    counter--;

                    $("#TextBoxDiv" + counter).remove();

                });

                $("#getButtonValue").click(function () {

                    var msg = '';
                    for(i=1; i<counter; i++){
                        msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
                    }
                    alert(msg);
                });
            });
        </script>


        <script type="text/javascript">
            function addmore()
            {
                var no=document.getElementById("tb_no").value;
                var next=parseInt(no)+1;
                $("#tb_no").val(next);
                $("#lists").append('<input type="text" name="usertype_list[]" class="form-control rounded" style="margin-bottom: 5px;" value="" id="l'+(next)+'">');
            }
            //            function deleteTb(){
            //                var no=$("tb_no").val();
            //
            //            }
        </script>



    </head>
    <body class="glossed">
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','<?php echo base_url() ?>js/analytics.js','ga');

            ga('create', 'UA-42863888-4', 'pinsupreme.com');
            ga('send', 'pageview');



        </script>




        <div class="all-wrapper fixed-header left-menu">
            <div class="page-header">
                <div class="header-links hidden-xs">


                    <div class="top-search-w pull-right">
                        <input type="text" class="top-search" placeholder="Search"/>
                    </div>
                    <?php
                    $img = $this->session->userdata('profile_image');
                    if ($img == '') {
                        $img = 'no-avatar.png';
                    }
                    ?>


                    <div class="dropdown">
                        <?php
                        if ($this->session->userdata('user_type_id_fk') != '') {
                        ?>


                            <a href="#" class="header-link clearfix" data-toggle="dropdown">
                                <div class="avatar">
    <!--                                    <img src="<?php echo base_url() ?>images/no-avatar.png" alt="">-->

                                    <img src="<?php echo base_url() ?>images/profile_pic/<?= $img ?>">
    <!--                                    <img src="<?php // echo site_url("register/loadImg/")        ?>">-->

                                </div>

                                <div class="user-name-w">
                                <?php
                                if ($this->session->userdata('user_type_id_fk') != '') {
                                    $username = $this->session->userdata('username');
                                    print_r($username);
                                }
                                ?>
                            </div>

                            <i class="fa fa-caret-down"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
<!--                            <li><a href="<?php echo base_url(); ?>register/edit_user?id=<?= $row->user_id ?>">Profile</a></li>-->


                            <?php
                                if ($this->session->userdata('user_type_id_fk') != '') {
                            ?>


                                    <li>
                                        <a href="<?php echo base_url() ?>login/logout" data-toggle="tooltip" data-placement="right">Logout</a>
                                    </li>
                            <?php
                                }
                            ?>



                            </ul>
                        <?php
                            }
                        ?>

                        </div>

                    </div>

                    <a class="current logo hidden-xs" href="<?php echo base_url() ?>home"><i class="fa fa-rocket"></i></a>
<!--                <a class="menu-toggler" href="#"><i class="fa fa-bars"></i></a>-->
                <h1>KEY PERFORMANCE INDICATOR</h1>
            </div>