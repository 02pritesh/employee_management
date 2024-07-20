@extends('admin.main.main')

@section('admin-content')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>

<a href="{{url('user-attendence')}}/{{$data[0]->user_id}}" class=" btn btn-success">Back</a>
    <h4 class="text-center"> "{{$data[0]->name}}" Attendance</h4>
    <div id="calendar"></div>

</div>
    <style>
        .fc-daygrid-event-harness {
    display: flex;
    justify-content: center;
}
        .attendance-status-0,
    .attendance-status-1,
    .attendance-status-2 {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        line-height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border:none;
    }
        .attendance-status-0 {
            background-color: red!important;
        }

        .attendance-status-1 {
            background-color: green!important;
        }

        .attendance-status-2 {
            background-color: purple!important;
        }
    </style>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const data = @json($data);
        const events = [];
        data.forEach(item => {
            let statusText = '';
            if (item.attendence_status == 0) {
                statusText = 'A';
            } else if (item.attendence_status == 1) {
                statusText = 'P';
            }

            events.push({
                title: statusText,
                date: item.date,
                className: 'attendance-status-' + item.attendence_status
            });
        });

        // Add logic to automatically add "P" for Sundays
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth() + 1; // Months are 0-indexed
        const daysInMonth = new Date(year, month, 0).getDate();

        for (let day = 1; day <= daysInMonth; day++) {
            const date = `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
            const dayOfWeek = new Date(date).getDay();

            if (dayOfWeek === 0) { // Sunday
                events.push({
                    title: 'P',
                    date: date,
                    className: 'attendance-status-1'
                });
            }
        }

        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: events,
            eventContent: function(info) {
                return {
                    html: '<div class="calendar-event">' + info.event.title + '</div>',
                    display: 'block'
                };
            },
            dayRender: function(info) {
                const cellDate = info.date.toISOString().split('T')[0];
                const matchingEvent = events.find(event => event.date === cellDate);
                if (matchingEvent) {
                    const eventStatusClass = 'attendance-status-' + matchingEvent.attendence_status;
                    const eventContent = '<div class="calendar-event ' + eventStatusClass + '">' +
                        matchingEvent.title + '</div>';
                    const customHTML = '<div class="fc-daygrid-day-event ' + eventStatusClass + '">' +
                                       eventContent +
                                       '</div>';
                    info.el.innerHTML += customHTML;
                }
            }
        });

        calendar.render();
    });
    </script>>
@endsection



