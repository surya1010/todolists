
  $(document).ready(function() {
   $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });
   $('#datepicker2').datepicker({
        autoclose: true,
      format: 'yyyy-mm-dd',
    });
/*
  var oTable = $('#dataTableBuilder').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        destroy: true,
        serverSide: true,
        ajax: {
            url: '{!! Route::to(admin.todolists.filter_data) !!}',
            data: function (d) {
                d.startDate = $('input[name=start_date]').val();
                d.endDate = $('input[name=end_date]').val();
            }
        },
        columns: [
            {data: 'name', name: 'name'},
            {data: 'startDate', name: 'startDate'},
            {data: 'endDate', name: 'endDate'}
        ]
    });

    $('#formSearch').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });*/

  });
