<!DOCTYPE html>
<html>
<head>
    <title>How to Create Event Calendar in Laravel 10 - Techsolutionstuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <div id="calendar" style="width: 100%"></div>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendarEl = document.getElementById('calendar');
    var event = [];
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
        },
        initialView: 'dayGridMonth',
        timeZone: 'UTC',
        events: '/admin/events',
        editable: true,


        /* eventClick: function (event) {
             var deleteMsg = confirm("Do you really want to delete?");
             if (deleteMsg) {
                 $.ajax({
                     type: "DELETE",
                     url:'/admin/booking/',
                     data: "&id=" + event.id,
                     success: function (response) {
                         if(parseInt(response) > 0) {
                             $('#calendar').fullCalendar('removeEvents', event.id);
                             displayMessage("Deleted Successfully");
                         }
                     }
                 });
             }
         }*/


        //Deleting the event
        eventClick: function (info) {
            var eventTitle = info.event.title;
            var eventElement = info.event.element;
            if (confirm("Are you sure you want to delete this event?")) {
                var eventId = info.event.id;
                $.ajax({
                    method: 'DELETE',
                    url: '/admin/booking/' + eventId,
                    success: function (response) {
                        console.log('Event deleted successfully');
                        calendar.refetchEvents();//Refresh Events after deletion
                    },
                    error: function (error) {
                        console.log('Error deleting event', error);
                    }
                });
            }
            return {
                domNodies: [eventElement]
            }

        },
        //Drag and Drop
        eventDrop: function (info) {
            var eventId = info.event.id;
            var newStartDate = info.event.start;
            var newEndDate = info.event.end || newStartDate;
            var newStartDateUTC = newStartDate.toISOString().slice();
            var newEndDateUTC = newEndDate.toISOString().slice();


            $.ajax({
                method: 'PUT',
                url: '/admin/booking/' + eventId,
                data: {
                    start_date: newStartDateUTC,
                    end_date: newEndDateUTC,
                },
                success: function () {
                    console.log('Event moved successfully.');
                },
                error: function (error) {
                    console.log('Error moving event:', error);
                }
            })
        },


        /* eventContent: function (info) {
             var eventTitle = info.event.title;
             var eventElement = document.createElement('div');
             eventElement.innerHTML = '<span style="cursor:pointer;">x</i></span>' + eventTitle;

             eventElement.querySelector('span').addEventListener('click', function () {
                 if (confirm("Are you sure you want to delete this event?")) {
                     var eventId = info.event.id;
                     $.ajax({
                         method: 'DELETE',
                         url: '/admin/booking/' + eventId,
                         success: function (response) {
                             console.log('Event deleted successfully');
                             calendar.refetchEvents();//Refresh Events after deletion
                         },
                         error:function (error) {
                             console.log('Error deleting event', error);
                         }
                     });
                 }
             });
             return{
                 domNodies:[eventElement]
             }
         }*/

    });
    calendar.render();

    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function () {
            $(".success").fadeOut();
        }, 1000);
    }
</script>
//Techsolutionstuff
</body>
</html>

