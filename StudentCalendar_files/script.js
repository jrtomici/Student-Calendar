        var customSearch = {
            user:""
        };
        $('.change-select').change(function(){
            $('#calendar').fullCalendar( 'refetchEvents' );
        });
        var bindPageForm = function(fm){

            fm.find('.timepicker').datetimepicker({format: 'h:mm a', stepping: 15}).on('dp.show', function(event) {
                var inp = $(this).find('input');
                if(inp.val()=="12:00 am") {
                    switch (inp.prop("name")) {
                        case "time_start":
                            $(this).data("DateTimePicker").date("06:00 am");
                            break;
                        case "time_end":
                            $(this).data("DateTimePicker").date("10:00 pm");
                            break;
                    }
                }

            });

            fm.find('.calendar').datetimepicker({format: 'MM/DD/YYYY'});
            fm.find('select[name="lid"]').change(function(){
                if($(this).val()=='other'){
                    fm.find('input[name="location"]').prop('disabled',false);
                }
                else {
                    fm.find('input[name="location"]').prop('disabled',true);
                }
            });

        };



        var openEventWindow = function(event) {
            var eventProp = event.split(":");
            var uLoad,
                uSave,
                eName,
                eProp;
            if(eventProp[0]=="task"){
                uLoad = "/html/task.card.php";
                uSave = "/json/task.php";
                eName = "Task";
                eProp = {'tid':eventProp[1]};
            }
            else {
                uLoad = "/html/schedule.card.php";
                uSave = "/json/set-user-schedule.php";
                eName = "Event";
                eProp = {'id':eventProp[1]};
            }

            var btn = {
                "Save":function(dlg){
                    var fm = dlg.find('form');
                    var err = checkRequired(fm);
                    if(err) {
                        showError(err);
                    }
                    else {
                        $.ajax({
                            type: "post",
                            url: uSave,
                            dataType: 'json',
                            data: fm.serialize(),
                            success: function(jsn){
                                if(jsn.error){
                                    showError(jsn.error);
                                }
                                else {
                                    dlg.modal('hide');
                                    $('#calendar').fullCalendar('refetchEvents');
                                }
                            }
                        });
                    }

                }
            };
            var dlg = makeModal(eName,btn, 'sm');

        };




                $('#calendar').fullCalendar({
                    customButtons: {
                        addEvent: {
                            text: 'Add Event',
                            click: function() {
                                openEventWindow('add');
                            }
                        }
                    },
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaFourDay,agendaDay'
                    },
                    views: {
                        agendaFourDay: {
                            type: 'agenda',
                            duration: { days: 4 },
                            buttonText: '4 day'
                        }
                    },

                    defaultView: 'month',

                    defaultDate: moment().add(-2, 'days'),
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
        {
            title  : 'event1',
            start  : '2017-04-28',
			url: 'http://turing.manhattan.edu/~jcostanzo01/CMPT456/StudentCalendar/assignments.php'
        },
        {
            title  : 'event2',
            start  : '2017-04-29',
            end    : '2017-04-30',
			url: 'http://turing.manhattan.edu/~jcostanzo01/CMPT456/StudentCalendar/assignments.php'
        },
        {
            title  : 'event3',
            start  : '2017-05-01T12:30:00',
            allDay : false, // will make the time show,
			url: 'http://turing.manhattan.edu/~jcostanzo01/CMPT456/StudentCalendar/assignments.php'
        },
		{
            title  : 'asdf',
            start  : '2017-04-30T12:30:00',
            allDay : true, // will make the time show
			url: 'http://turing.manhattan.edu/~jcostanzo01/CMPT456/StudentCalendar/assignments.php'

        }
    ],
                    eventClick: function(calEvent, jsEvent, view) {
                        var event_id = calEvent.id;
                        openEventWindow(event_id);
                    }
                });
