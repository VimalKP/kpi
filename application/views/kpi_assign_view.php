<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.custom.min.js"></script>
<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="col-md-12">
            <div class="widget widget-green">
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

                    <h3> KPI ASSIGN </h3>
                </div>

                <div class="widget-content">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Select User For Assign KPI</label>
                        <div class="col-md-8">
                            <select id="user_type_id_fk" name="user_type_id_fk" class="form-control rounded">
                                <option>-----------------------SELECT--------------------------</option>
                                <option>Ramesh</option>
                                <option>Suresh</option>
                                <option>Mahesh</option>
                                <option>Ram</option>
                                <option>Shyam</option>
                            </select>
                        </div>
                    </div>


                    <div id="center-wrapper">
                        <div class="dhe-example-section" id="ex-1-3">

                            <div class="dhe-example-section-header"><br/>
                                <h3 class="dhe-h3 dhe-example-title">*** Select The KPI To Assign User ***</h3>
                            </div>

                            <div class="dhe-example-section-content">

                                <!-- BEGIN: XHTML for example 1.3 -->

                                <div id="example-1-3">

                                    <div class="column left first">

                                        <h4><label class="kpiname">Available KPI :-</label></h4>

                                        <ul class="sortable-list">
                                            <li class="sortable-item" id="KPI 1">KPI Name1</li>
                                            <li class="sortable-item" id="KPI 2">KPI Name2</li>
                                            <li class="sortable-item" id="KPI 3" >KPI Name3</li>
                                            <li class="sortable-item" id="KPI 4">KPI Name4</li>
                                        </ul>

                                    </div>

                                    <div class="column left">

                                        <h4><label class="kpiname">Assign KPI :-</label></h4>

                                        <ul class="sortable-list">

                                        </ul>

                                    </div>

                                    <div class="clearer">&nbsp;</div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-8">
                                        <!--                                    <button id="focusedInput" type="submit" class="">SIGN UP</button>-->

<!--                                    <input type="submit" class="input-button" id="btn-get" value="Get items" />-->


                                        <input type="submit" class="btn btn-primary" id="btn-get" value="Assign" />
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
<script type="text/javascript">

    $(document).ready(function(){
        // Example 1.3: Sortable and connectable lists with visual helper
        $('#example-1-3 .sortable-list').sortable({
            connectWith: '#example-1-3 .sortable-list',
            placeholder: 'placeholder'
            //                    containment: "parent"
        });
        $('#btn-get').click(function(){
            alert(getItems('#example-1-3'));

        });

    });
    function getItems(exampleNr)
    {
        var columns = [];
        //toArray Serializes the sortable's item id's into an array of string.
        $(exampleNr + ' ul.sortable-list').each(function(){
            columns.push($(this).sortable('toArray').join(','));
        });

        return columns.join(' <-- is available KPI  |  Assign KPI is --> ');
    }
</script>