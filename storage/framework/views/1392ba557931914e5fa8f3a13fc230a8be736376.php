<?php $__env->startSection('header'); ?>

<!--

<link rel='stylesheet' href='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.css' />
-->

<style type="text/css">

  .table-sortable tbody tr {
    cursor: move;
  }


</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<hr>
<h2>Nouveau Devis</h2>
<hr>

<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 table-responsive">
      <table class="table table-bordered table-hover table-sortable" id="tab_logic">
        <thead>
          <tr >
            <th class="text-center" width="30%">
              Designation
            </th>
            <th class="text-center">
              Qantité
            </th>
            <th class="text-center">
              Unité
            </th>
            <th class="text-center">
              Prix Unitaire
            </th>
            <th class="text-center">
              Total
            </th>
            <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
            </th>
            <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
            </th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Total:</th>
            <th><div id="total"></div></th>
            <th></th>
            <th></th>
          </tr>
          <tbody>
            <tr id='addr0' data-id="0">
              <td data-name="designation">
                <input id="designation0" type="text" name='designation0'  placeholder='designation' class="form-control"/>
              </td>
              <td data-name="qte">
                <input id="qte0" type="number" onkeypress='validate(event)' name='mail0' placeholder='Quantité' class="form-control"/>
              </td>
              <td data-name="unite">
                <input id="unite0" type="text" name='unite0' placeholder="unité" class="form-control"></textarea>
              </td>
              <td data-name="prixUnitaire">
                <input id="prixUnitaire0" type="number" name='prixUnitaire0' onkeypress='validate(event)' step="0.001" placeholder="prix unitaire" class="form-control"></textarea>
              </td>
              <td data-name="total">
               <div id="total0"></div>
             </td>
             <td data-name="">
              <button id="0" class="btn btn-success glyphicon glyphicon-ok"></button>
            </td>
            <td data-name="del">
              <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
            </td>

          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <a id="add_row" class="btn btn-default pull-right">Ajouter une ligne</a>
</div>


<!--

<hr>

<div id='calendar'></div>
-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<script type="text/javascript">

  $(document).ready(function() {
    $("#add_row").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
            newid = parseInt($(this).data("id"));
          }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
          var cur_td = $(this);

          var children = cur_td.children();

            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
              var td = $("<td></td>", {
                "data-name": $(cur_td).data("name")
              });


              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("").text("");
              c.attr("id", $(cur_td).data("name") + newid);
              c.attr("name", $(cur_td).data("name") + newid);
              c.prop('disabled', false);
              c.val("");
              c.appendTo($(td));
              td.appendTo($(tr));
            } else {
              var td = $("<td></td>", {
                'text': $('#tab_logic tr').length
              }).appendTo($(tr));
            }


          });
        
        // add delete button and td
        /*
        $("<td></td>").append(
            $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                .click(function() {
                    $(this).closest("tr").remove();
                })
        ).appendTo($(tr));
        */
        
        // add the new row
        $(tr).appendTo($('#tab_logic'));
        
        $(tr).find("td button.row-remove").on("click", function() {
         $(this).closest("tr").remove();
       });

        $("#"+newid).click(function() {
          var quantite = $("#qte"+newid).val();
          var prixUnitaire = $("#prixUnitaire"+newid).val();
          var valeur = quantite*prixUnitaire;
          $("#total"+newid).html("<strong>"+quantite*prixUnitaire+"&euro;</strong>");
          var total = $("#total").val();
          var somme = +valeur + +total;
          console.log(total);
          console.log(somme);
          $("#total").html("<strong>"+somme+"</strong>");
          $("#total").val(somme);
          this.disabled = true;

        });

      });




    // Sortable Code
    var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
        $(this).width($originals.eq(index).width())
      });

      return $helper;
    };



    //$("#add_row").trigger("click");
  });


  function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[0-9]|\./;
    if( !regex.test(key)  && theEvent.keyCode != 8) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }

  $('#0').click(function() {
    var quantite = $("#qte0").val();
    var prixUnitaire = $("#prixUnitaire0").val();
    var valeur = quantite*prixUnitaire;
    $("#total0").html("<strong>"+quantite*prixUnitaire+"&euro;</strong>");
    var total = $("#total").val();
    var somme = Number(valeur) + Number(total);
    $("#total").html("<strong>"+somme+"</strong>");
    $("#total").val(somme);

    this.disabled = true;

  });







</script>

<!--

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
      timeFormat: 'HH:mm',
      
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

-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>