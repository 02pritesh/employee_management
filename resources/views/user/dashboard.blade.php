@extends('user.main.main')

@section('user-content')
@if (Session::has('success'))
<div id ="success-message" class="alert alert-success" role="alert">
       {{Session::get('success')}}
   </div>
   @elseif(Session::has('fail'))
   <div  id ="success-message" class="alert alert-danger " role="alert">
    {{Session::get('fail')}}
</div>
      @endif
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>

    <!-- <div class="row"> -->
    <h4 class="text-center">Holiday Calender</h4>
    <div id="calendar-container" class="calander-container">

        <div id="calendar">

        </div>
    </div>
    </div>
    <style>
        .calander-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
            width: 100%;
        }

        #calendar-container #calendar {
            max-width: 100%;
            /* Set the maximum width of the calendar to 100% */
            width: 100%;
            height: 100%;
            /* Make the calendar take up the entire height of the container */
        }

        .fc-event-holiday {
            background-color: red;
            color: white;
            border-color: red;
        }

        .fc-h-event {
            display: block;
            border: 1px solid #3788d8;
            border: 1px solid var(--fc-event-border-color, #3788d8);
            background-color: #3788d8;
            background-color: red;
            color: white;
            height: 65px;
            margin-top: -30px !important;
            z-index: 99;
        }

        .fc .fc-daygrid-day-number {
            position: relative;
            z-index: 71;
            padding: 4px;
            color: white;
        }

        .fc-h-event .fc-event-main {
            padding-top: 20px;
            padding-left: 10px
        }

        .fc .fc-daygrid-day-number {
            color: black;

        }

        .fc .fc-col-header-cell-cushion {
            color: black;
        }
        a#fc-dom-64 {
    color: white;
}
        /* ... CSS styles ... */
    </style>
    <!-- ... Your previous code ... -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const events = @json($data);

            events.forEach(event => {
                event.className = (event.className || '') + ' fc-event-holiday';
                event.title = event.name;; // Append description to the title
                if (event.name) {
                    event.fontSize = '3px'; // Set the font size for local holidays
                }
            });

            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Set the default view as month
                events: events, // Assign the fetched holiday data to the calendar
                dateCellContent: function(arg) {
                    const date = new Date(arg.date);
                    const isSunday = date.getDay() === 0;

                    if (isSunday) {
                        const dateCell = arg.el.querySelector('.fc-daygrid-day-top');
                        dateCell.classList.add('sunday');
                    }
                }
            });

            calendar.render();
        });
    </script>


@endsection
