<!DOCTYPE html>
<html>
<head>
  <title></title>

  <!-- put this within head tag, this location creates a validation error -->

  <link rel='stylesheet' href='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.css' />

</head>
<body>


  <div class="container">
    <div class="row">
      <div class="col-md-12">


        <div id='calendar'></div>


      </div>
    </div>

  </div>

  <script src="{{{ asset('bower_components/jquery/dist/jquery.min.js') }}}"></script>

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



</body>
</html>
