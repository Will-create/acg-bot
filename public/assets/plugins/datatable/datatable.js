$(function(e) {
	
	//Data-table1
	$('#data-table1').DataTable({
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"
		}
	});
	
	//Data-table2
	var table = $('#data-table2').DataTable({
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"
		}
	});
	$('button').click( function() {
		var data = table.$('input, select').serialize();
		alert(
			"The following data would have been submitted to the server: \n\n"+
			data.substr( 0, 120 )+'...'
		);
		return false;
	});
	
	//Data-table3
	$('#data-table3').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
	
	//Export Data-table
	var table = $('#exportexample').DataTable( {
		lengthChange: false,
		buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
	} );
	table.buttons().container()
	.appendTo( '#exportexample_wrapper .col-md-6:eq(0)' );
});