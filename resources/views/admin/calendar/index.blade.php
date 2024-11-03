
@extends('admin.layouts.layout')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
<div class="container mt-5">
    {{--For search--}}
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Search booking">
                <div class="input-group-append">
                    <button id="searchButton" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                <button id="exportButton" class="btn btn-success">Export Calendar</button>
            </div>
        </div>
    </div>
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

        //Deleting the event
        eventClick: function (info) {
            var eventTitle = info.event.title;
            var eventElement = info.event.element;
            if (confirm("Are you sure you want to delete this event?")) {
                var eventId = info.event.id;
                $.ajax({
                    method: 'DELETE',
                    url: '/admin/bookings/' + eventId,
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
        //Event Resizing
        eventResize: function (info) {
            var eventId = info.event.id;
            var newEndDate = info.event.end || newStartDate;
            var newEndDateUTC = newEndDate.toISOString().slice();
            $.ajax({
                method: 'PUT',
                url: '/admin/booking/' + eventId + 'resize',
                data: {
                    end_date: newEndDateUTC,
                },
                success: function () {
                    console.log('Event resized successfully.');
                    displayMessage('Event resized successfully.')
                },
                error: function (error) {
                    console.log('Error resized event:', error);

                }
            })
        },


    });
    calendar.render();

    document.getElementById('searchButton').addEventListener('click', function () {
        var searchKeywords = document.getElementById('searchInput').value.toLowerCase();
        filterAndDisplayEvents(searchKeywords);
    })

    function filterAndDisplayEvents(searchKeywords) {
        $.ajax({
            method: 'GET',
            url: `/admin/events/search?title=${searchKeywords}`,
            success: function (response) {
                calendar.removeAllEvents();
                calendar.addEventSource(response);
            },
            error: function (error) {
                console.log('Error searching events:', error);
            }
        })
    }

    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function () {
            $(".success").fadeOut();
        }, 1000);
    }

    //Exporting function
    document.getElementById('exportButton').addEventListener('click', function () {
        var events= calendar.getEvents().map(function (event) {
            return{
                title:event.title,
                start:event.start?event.start.toISOString():null,
                end:event.end?event.end.toISOString():null,
                color:event.backgroundColor,

            };
        });
        var wb=XLSX.utils.book_new();
        var ws=XLSX.utils.json_to_sheet(events);
        XLSX.utils.book_append_sheet(wb,ws,'Events');
        var arrayBuffer = XLSX.write(wb,{
            bookType: 'xlsx',
            type: 'array'
        });

        var blob = new Blob([arrayBuffer],{
            type:'application/vnd.openxmlformats-officedocument/spreadsheetml.sheet'
        });
        var downloadLink=document.createElement('a');
        downloadLink.href=URL.createObjectURL(blob);
        downloadLink.download='events.xlsx';
        downloadLink.click();
    })
</script>
@endsection


