@extends('layout')


@section('header')

<link rel='stylesheet' href='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.css' />

@stop

@section('content')

<hr>

<div id='calendar'></div>

@stop

@section('footer')

<script src='http://fullcalendar.io/js/fullcalendar-2.2.3/lib/moment.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.min.js'></script>



<script type="text/javascript">

	$(document).ready(function() {
    // page is now ready, initialize the calendar...
    // options and github  - http://fullcalendar.io/

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
    	header: {
    		left: 'prev,next today',
    		center: 'title',
    		right: 'month,basicWeek,basicDay'
    	},
    	aspectRatio: 2,
      eventLimit: true, // allow "more" link when too many events
      timeFormat: 'H:mm',
      
      events: [
      {
      	title: 'All Day Event',
      	start: new Date(y, m, 1)
      },
      {
      	title: 'Long Event',
      	start: new Date(y, m, d-5),
      	end: new Date(y, m, d-2)
      },
      {
      	id: 999,
      	title: 'Repeating Event',
      	start: new Date(y, m, d-3, 16, 0),
      	allDay: false
      },
      {
      	id: 999,
      	title: 'Repeating Event',
      	start: new Date(y, m, d+4, 16, 0),
      	allDay: false
      },
      {
      	title: 'Meeting',
      	start: new Date(y, m, d, 10, 30),
      	allDay: false
      },
      {
      	title: 'Lunch',
      	start: new Date(y, m, d, 12, 0),
      	end: new Date(y, m, d, 14, 0),
      	allDay: false
      },
      {
      	title: 'Travail',
      	start: new Date(y, m, d, 14, 0),
      	end: new Date(y, m, d, 18, 0),
      	allDay: false
      },
      {
      	title: 'Birthday Party',
      	start: new Date(y, m, d+1, 19, 0),
      	end: new Date(y, m, d+1, 22, 30),
      	allDay: false
      },
      {
      	title: 'Click for Google',
      	start: new Date(y, m, 28),
      	end: new Date(y, m, 29),
      	url: 'http://google.com/'
      }
      ],
      editable: true,
  });

});

</script>



@stop