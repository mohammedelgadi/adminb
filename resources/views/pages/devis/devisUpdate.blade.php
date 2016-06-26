@extends('layout')


@section('header')

<style type="text/css">
  .table-sortable tbody tr {
    cursor: move;
  }
  
  .panel{
    height: 100%;
  }

</style>


@stop

@section('content')
<br/>
<form method="POST" action="/devis/update/{{$devis->id}}">
    <div class="row">
      <div class="col-lg-6">
        <!-- -->
        <div class="panel panel-primary" style="height:260px;">
          <div class="panel-heading">
            <h4 class="panel-title">
              Interpreteur
            </h4>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-3">
                <img class="img-circle" src="http://www.lawyersweekly.com.au/images/LW_Media_Library/594partner-profile-pic-An.jpg" style="width: 100px;height:100px;">
              </div>
              <div class="col-lg-9">
                <h3>{{$devis->interpreteur->nom}} {{$devis->interpreteur->prenom}}</h3>
                <span class="glyphicon glyphicon-phone-alt"> {{$devis->interpreteur->tel_portable}} </span><br/>
                <span class="glyphicon glyphicon-earphone"> {{$devis->interpreteur->tel_fixe}}</span><br/>
                <span class="glyphicon glyphicon-globe"> {{$devis->interpreteur->email}}</span><br/>
                <span class="glyphicon glyphicon-home"> {{$devis->interpreteur->adresse->adresse}}</span><br/>
                <span class="glyphicon glyphicon-edit"><a href="/interpreteur/edit/{{$devis->interpreteur->id}}"> Edit</a> </span><br/>
              </div>
            </div>
          </div>
        </div>
        <!-- -->
      </div>
      <div class="col-lg-6">
        <!-- -->
        <div class="panel panel-primary" style="height:260px;">
          <div class="panel-heading">
            <h4 class="panel-title">
              Devis information 
            </h4>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                <label>Date de creation du devis</label>
                <input type="text" class="form-control" value="{{date('D d M Y h:m:s',strtotime($devis->created_at))}}" disabled></input>
              </div>
              <div class="col-lg-6">
                <label>Date de creation de la demande</label>
                <input type="text" class="form-control" value="{{date('D d M Y h:m:s',strtotime($devis->demande->created_at))}}" disabled></input>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <label>Date debut de l'evenement</label>
                <input type="text" class="form-control" value="{{date('D d M Y h:m:s',strtotime($devis->demande->dateEvent))}}" disabled></input>
              </div>
              <div class="col-lg-6">
                <label>Date de fin de l'evenement</label>
                <input type="text" class="form-control" value="{{date('D d M Y h:m:s',strtotime($devis->demande->dateEndEvent))}}" disabled></input>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label>Titre de la demande</label>
                <input type="text" class="form-control" placeholder="{{$devis->demande->titre}}" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <span class="glyphicon glyphicon-edit"><a href="/demande/edit/{{$devis->demande->id}}"> Editer la demande</a> </span><br/>
              </div>
            </div>
          </div>
        </div>
        <!-- -->
      </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                Visualiser le devis numero 
              </a>
            </h4>
          </div>
          <div id="collapse1" class="table-responsive">
            <div class="panel-body" class="table-responsive">
             <div class="row">
              <div class="col-md-2 col-md-offset-5">
                <h3>Nouveau Devis</h3>
              </div> 
            </div>

            {!! csrf_field() !!}
            <div class="container">
              <div class="row clearfix">
                <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                      <tr >
                        <th class="text-center">
                          Service
                        </th>
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
                          Prix Unitaire(&euro;)
                        </th>
                        <th class="text-center">
                          Total
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
                        <th></th>
                        <th>Total:</th>
                        <th>
                          <div id="total">
                            <strong>100&euro;</strong>
                          </div>
                        </th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($devis->services as $index => $service)
                      <tr id='addr{{$index}}' data-id="{{$index}}">
                        <td data-name="service">
                          <input id="service{{$index}}" value="{{$service->service}}" type="text" name='service{{$index}}'  placeholder='Service' class="form-control"/>
                        </td>
                        <td data-name="designation">
                          <input id="designation{{$index}}" value="{{$service->designation}}" type="text" name='designation{{$index}}'  placeholder='designation' class="form-control"/>
                        </td>
                        <td data-name="qte">
                          <input id="qte{{$index}}" type="number" value="{{$service->qantite}}" onkeypress='validate(event)' name='qte{{$index}}' placeholder='Quantité' class="form-control"/>
                        </td>
                        <td data-name="unite">
                          <input id="unite{{$index}}" type="text" value="{{$service->Unite}}" name='unite{{$index}}' placeholder="unité" class="form-control"/>
                        </td>
                        <td data-name="prixUnitaire">
                          <input id="prixUnitaire{{$index}}" value="{{$service->prix}}" type="number" name='prixUnitaire{{$index}}' onkeypress='validate(event)' step="0.001" placeholder="prix unitaire" class="form-control"/>
                        </td>
                        <td data-name="total">
                         <div id="total{{$index}}" name="total{{$index}}"><strong>{{$service->total}}&euro;</strong></div>
                         <script type="text/javascript">
                         </script>
                         <script type="text/javascript">
                           $("#total{{$index}}").val({{$service->total}});
                         </script>
                       </td>
                       <td data-name="del">
                        <button id="del{{$index}}" name="del{{$index}}" class="btn btn-danger glyphicon glyphicon-remove row-remove"></button>
                      </td>
                    </tr>
                    <script type="text/javascript">
                      $('#qte{{$index}},#prixUnitaire{{$index}}').on('input', function() {
                       calculer({{$index}});
                     });
                   </script>
                   @endforeach
                 </tbody>
               </table>
             </div>
           </div>
           <div class="pull-right">
            <button id="add_row" type="button" class="btn btn-outline btn-default">Ajouter un service</button>
            <button type="submit" class="btn btn-outline btn-default">Modifier</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</form>

<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header  modal-header-danger">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Liste d'erreurs</h4>
      </div>
      <div class="modal-body">
        <ul>
          @foreach($errors->all() as $error)
          <a href="#" class="list-group-item">
            <i class="fa fa fa-times fa-fw"></i> {{$error}}
          </a>
          @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!--

<hr>

<div id='calendar'></div>
-->


@stop

@section('footer')

<script type="text/javascript">
  @if (count($errors) > 0)
  $('#errorModal').modal('show');
  @endif
</script>

<script src="{{{ asset('js/tableTools.js')}}}"></script>

<script>
  $(document).ready(function() {
    var table = $('#dataTables-example').DataTable({
      "pageLength": 10,
      dom: 'T<"clear">lfrtip',
      tableTools: {
        "sRowSelect": "single",
        fnRowSelected: function(nodes) {
          var ttInstance = TableTools.fnGetInstance("dataTables-example");
          var row = ttInstance.fnGetSelectedData();
          $('#client').val(row[0][0]);
        },

        fnRowDeselected: function ( node ) {
          $('#client').val("");
        }
      },"columnDefs":
      [ { "visible": false, "searchable": false, "targets":0 }]

    });

    // Setup - add a text input to each footer cell
    $('#dataTables-example tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );

    // Apply the search
    table.columns().every( function () {
      var that = this;
      $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that
          .search( this.value )
          .draw();
        }
      } );
    } );
  });

</script>


<script type="text/javascript">

  function calculer(newid)   // declaration de la fonction avec un argument
  {
    var AncienneVal  = $("#total"+newid).val();
    console.log("AncienneVal"+AncienneVal);
    var quantite = $("#qte"+newid).val();
    console.log("quantite"+quantite);
    var prixUnitaire = $("#prixUnitaire"+newid).val();
    console.log("prixUnitaire"+prixUnitaire);
    var valeur = quantite*prixUnitaire;
    $("#total"+newid).html("<strong>"+quantite*prixUnitaire+"&euro;</strong>");
    $("#total"+newid).val(valeur);
    var total = +$("#total").val() - +AncienneVal;
    var somme = +valeur + +total;
    $("#total").html("<strong>"+somme+"&euro;</strong>");
    $("#total").val(somme);
  }

  

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
        $('#qte'+newid+",#prixUnitaire"+newid).on('input', function() {
         calculer(newid);
       });
        
        $(tr).find("td button.row-remove").on("click", function() {
          $("#qte"+newid).val(0);
          $("#prixUnitaire"+newid).val(0);
          calculer(newid);
          $(this).closest("tr").remove();
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

  $('#qte0,#prixUnitaire0').on('input', function() {
   calculer(0);
 });
</script>



@stop