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
      timeFormat:  'H:mm',

      displayEventEnd: {
                    month: true,
                    basicWeek: true,
                    basicDay : true,
                    "default": true
                },
      
      events: [

      @foreach($demandes as $demande)

      {
        title: '{{$demande->titre}}',
        start: new Date('{{$demande->dateEvent}}'.replace(' ', 'T')),
        end: new Date('{{$demande->dateEndEvent}}'.replace(' ', 'T')),
        url: '/demande/edit/{{$demande->id}}',
        //color:'#f00',

      },

      @endforeach
      {
      	title: 'Long Event',
      	start: new Date(y-2, m, d-5,"16","30"),
      	end: new Date(y-2, m, d-5,"18","41")

      }
      ],
      editable: true
    });

  });

</script>



@stop