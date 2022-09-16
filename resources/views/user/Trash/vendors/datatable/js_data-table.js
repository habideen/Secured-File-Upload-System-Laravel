(function($) {
  'use strict';
  $(function() {

    $('#table1').DataTable({
      "aLengthMenu": [
        [5, 10, 20, 100, 200, -1],
        [5, 10, 20, 100, 200, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    
    $('#table1').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });



    $('#table2').DataTable({
      "aLengthMenu": [
        [5, 10, 20, 100, 200, -1],
        [5, 10, 20, 100, 200, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    
    $('#table2').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });



    $('#table3').DataTable({
      "aLengthMenu": [
        [5, 10, 20, 100, 200, -1],
        [5, 10, 20, 100, 200, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    
    $('#table3').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });



    $('#order-listing').DataTable({
      "aLengthMenu": [
        [5, 10, 20, 100, 200, -1],
        [5, 10, 20, 100, 200, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    
    $('#order-listing').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  
  
  });
})(jQuery);