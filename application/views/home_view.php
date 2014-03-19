<html>

    <head>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/style1.css" >
        <link rel="stylesheet" type="text/css" href="css/style2.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/devheart-examples.css" media="screen" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" >
<!--         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.tokeninput.js"></script>

        <link rel="stylesheet" href="<?php echo base_url() ?>css/token-input.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>css/token-input-facebook.css" type="text/css" />-->
     
    </head>

    <body class="glossed" data-savefrom-link-count="182">
        <?php
        $this->load->library('form_validation');
        ?>

        <div class="all-wrapper fixed-header left-menu">

            <div class="main-content">

                <div class="row">
                    <div class="widget widget-green" id="widget_profit_chart">
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
                            <h3><i class="fa fa-bar-chart-o"></i> Profit Chart</h3>
                        </div>
                        <div class="widget-content">

                            <div class="widget-content-tp">
                                <div class="padded-no-sides">
                                    <div id="areachart" style="height: 250px;">



                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="widget widget-red" id="widget_profit_chart">
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
                            <h3><i class="fa fa-user"></i> About KPI</h3>
                        </div>
                        <div class="widget-content">


                            <center><h1>Concept</h1></center>




                            <h2>kpi.com for Business</h2>
                            <strong>
                                We deliver a comprehensive, integrated, business support infrastructure:
                                Customer Relationship Management, Project Management, HR, Payroll, e-Commerce, Basic Accounting,
                                MIS and Reporting. Our cloud solution delivers all elements of the business are connected.
                                All data is available immediately from any location and can be shared across the organisation.
                            </strong>


                            <h2>Google Apps Integration</h2>
                            <strong>
                                kpi.com is now available on Google Apps Marketplace.
                                Any user of Google can integrate kpi.com with Google apps, as Calendar or Google Docs.
                            </strong>

                            <iframe width="420" height="315" src="//www.youtube.com/embed/ezhnbxgEObE" frameborder="0" allowfullscreen></iframe>

                        </div>
                    </div>
                </div>

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
                                <h3><i class="fa fa-twitter"></i> Twitter Tweets</h3>
                            </div>

                            <div class="widget-content">
                                <ul class="chat-messages-list">
                                    <?php
                                    if (isset($twitterdata)) {
                                        for ($i = 0; $i < count($twitterdata); $i++) {
                                            $content = $twitterdata[$i]['content'];
                                            $brand = $twitterdata[$i]['brand'];
                                            $posted = date('M d', strtotime($twitterdata[$i]['posted']));
                                            ?>
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-2">
                                                        <div class="avatar">
                                                            <img src="images/no-avatar.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-10">
                                                        <div class="chat-bubble chat-bubble-right">
                                                            <div class="bubble-arrow"></div>
                                                            <div class="meta-info"><a href="#">@<?= ucfirst($brand) ?></a> on <?= $posted ?></div>
                                                            <p><?= $content ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <!--
                                                                        <li>
                                                                            <div class="row">
                                                                                <div class="col-xs-2">
                                                                                    <div class="avatar">
                                                                                        <img src="images/no-avatar.png" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xs-10">
                                                                                    <div class="chat-bubble chat-bubble-right">
                                                                                        <div class="bubble-arrow"></div>
                                                                                        <div class="meta-info"><a href="#">@johnronald</a> on Jun 26</div>
                                                                                        <p>Leave Management Page Is Start Soon.</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                    
                                                                        <li>
                                                                            <div class="row">
                                                                                <div class="col-xs-2">
                                                                                    <div class="avatar">
                                                                                        <img src="images/no-avatar.png" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xs-10">
                                                                                    <div class="chat-bubble chat-bubble-right">
                                                                                        <div class="bubble-arrow"></div>
                                                                                        <div class="meta-info"><a href="#">@johnronald</a> on Jun 27</div>
                                                                                        <p>CONGRATULATION, Company Won Best Company Award Of Year 2013.</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>-->

                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
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
                                <h3><i class="fa fa-facebook"></i> FACEBOOK POSTs</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="chat-messages-list">

                                    <li>
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <div class="chat-bubble chat-bubble-left">
                                                    <div class="bubble-arrow"></div>
                                                    <div class="meta-info">
                                                        <a href="#">JOHN RONALD</a>
                                                        on Jun 25
                                                    </div>
                                                    <p>Mr. Rajesh Patel (Salse Department) Won Gold Medal In Final Year Of Master Of Management.</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="avatar">
                                                    <img src="images/no-avatar.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <div class="chat-bubble chat-bubble-left">
                                                    <div class="bubble-arrow"></div>
                                                    <div class="meta-info">
                                                        <a href="#">JOHN RONALD</a>
                                                        on Jun 26
                                                    </div>
                                                    <p>Leave Management Page Is Start Soon.</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="avatar">
                                                    <img src="images/no-avatar.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <div class="chat-bubble chat-bubble-left">
                                                    <div class="bubble-arrow"></div>
                                                    <div class="meta-info">
                                                        <a href="#">JOHN RONALD</a>
                                                        on Jun 27
                                                    </div>
                                                    <p>CONGRATULATION, Company Won Best Company Award Of Year 2013.</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="avatar">
                                                    <img src="images/no-avatar.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">  <?php
                                    $company_id = $this->session->userdata('company_id');
//                                    echo '<pre>';
//                                    print_r($company_id);
//                                    echo '</pre>';
//                                    exit();
                                    if ($company_id == '') {
                                        $this->load->view('company_temp_view');
                                    }
                                    ?></div>
            </div>

        </div>
    </body>
</html>