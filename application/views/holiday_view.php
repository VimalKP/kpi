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
            select: function(start, end, allDay) {
                var title = "H";
                if (title) {
                    calendar.fullCalendar('renderEvent',
                    {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true // make the event "stick"
                );
                }
                calendar.fullCalendar('unselect');
            }
//            editable: true
            //			events: [
            //				{
            //					title: 'All Day Event',
            //					start: new Date(y, m, 1)
            //				},
            //				{
            //					title: 'Long Event',
            //					start: new Date(y, m, d-5),
            //					end: new Date(y, m, d-2)
            //				},
            //				{
            //					id: 999,
            //					title: 'Repeating Event',
            //					start: new Date(y, m, d-3, 16, 0),
            //					allDay: false
            //				},
            //				{
            //					id: 999,
            //					title: 'Repeating Event',
            //					start: new Date(y, m, d+4, 16, 0),
            //					allDay: false
            //				},
            //				{
            //					title: 'Meeting',
            //					start: new Date(y, m, d, 10, 30),
            //					allDay: false
            //				},
            //				{
            //					title: 'Lunch',
            //					start: new Date(y, m, d, 12, 0),
            //					end: new Date(y, m, d, 14, 0),
            //					allDay: false
            //				},
            //				{
            //					title: 'Birthday Party',
            //					start: new Date(y, m, d+1, 19, 0),
            //					end: new Date(y, m, d+1, 22, 30),
            //					allDay: false
            //				},
            //				{
            //					title: 'Click for Google',
            //					start: new Date(y, m, 28),
            //					end: new Date(y, m, 29),
            //					url: 'http://google.com/'
            //				}
            //			]
        });

    });

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