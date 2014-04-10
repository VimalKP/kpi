<?php
$this->load->library('form_validation');
?>
<script>

    $(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = $('#calendar').fullCalendar({
            height: 750,
            width:300,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function(date) {
                var d = date.getDate();
                if(d<10)
                    d="0"+d;
                var m = date.getMonth();
                m = m+1;
                var y = date.getFullYear();
                var date = '';
                if(m >= 10){
                    date = y+"-"+m+"-"+d;
                }
                else{
                    date = y+"-0"+m+"-"+d;
                }
                $('#calendar').fullCalendar('renderEvent', {title: 'H',start: date,id:date });
                //                calendar.fullCalendar('unselect');
                setHoliday(date,'add');  
            }, eventClick: function(event) {
                var d = event.start.getDate();
                if(d<10)
                    d="0"+d;
                var m = event.start.getMonth();
                m = m+1;
                var y = event.start.getFullYear(); 
                var date = '';
                if(m >= 10){
                    date = y+"-"+m+"-"+d;
                }
                else{
                    date = y+"-0"+m+"-"+d;
                }
                $('#calendar').fullCalendar('removeEvents', date);
                setHoliday(date,'delete');  
            } ,
            eventSources: ['<?php echo base_url(); ?>holiday/prepareHolidayEvent'],
            eventRender: function (event, element) {
                element.find('.fc-event-title').html("<b style='font-size: 12px;padding-left: 2px;'>"+event.title+"</b>");
            }
        });

    });
    function setHoliday(date,action){
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>holiday/holidayhandle',
            data: {                   
                action:action,
                date:date
            },
            success:function(response){
                //            $("#exceptionDiv").html(response);
            }
        });
    }
</script>
<style>

    body {
        margin-top: 40px;
        /*		text-align: center;*/
        font-size: 14px;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    }

    #calendar {
        width: 50%;
        margin: 0 auto;
    }

</style>

<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="col-md-12">
            <div class="widget widget-blue">
                <div class="widget-title">
                    <div class="widget-controls">
                        <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                        <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
                        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                    </div>
                    <h3><i class="fa fa-calendar"></i> Calendar</h3>
                </div>
                <div class="widget-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>