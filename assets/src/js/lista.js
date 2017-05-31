$(function(){
	$("#inputStatus").select2({
		placeholder: "Selecione o status",
		allowClear: true
	});

	$("#listaTable").DataTable({
		"language": {
			"emptyTable": "Nenhum registro encontrado",
			"info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			"infoEmpty": "Mostrando 0 até 0 de 0 registros",
			"infoFiltered": "(Filtrados de _MAX_ registros)",
			"infoPostFix": "",
			"infoThousands": ".",
			"lengthMenu": "_MENU_ resultados por página",
			"loadingRecords": "Carregando...",
			"processing": "Processando...",
			"zeroRecords": "Nenhum registro encontrado",
			"search": "Pesquisar",
			"paginate": {
				"next": "Próximo",
				"previous": "Anterior",
				"first": "Primeiro",
				"last": "Último"
			},
			"aria": {
				"sortAscending": ": Ordenar colunas de forma ascendente",
				"sortDescending": ": Ordenar colunas de forma descendente"
			}
		},
		"columnDefs": [
		{ "orderable": false, "targets": 5 },
		{ "orderable": false, "targets": 6 },
		{ "type": 'date-br', "targets" : 1 },
		{ "type": 'date-br', "targets" : 2 }
		],
		"bLengthChange": false,
		"bFilter": false,
		"bDestroy" : true
	});

	$(".btn-detalhes").click(function(){
		var loading_img = "<img class='text-center' src='" + base_url + "assets/images/loading.gif'>";
		$("#modal-detalhes .modal-body").html(loading_img);
		$("#modal-detalhes").modal('toggle');

		var id = $(this).attr('data-id');

		$.get(base_url + 'detalhes', { "id" : id }, function(response){
			if (response.status == 'ok') {
				$("#modal-detalhes .modal-body").html(response.data);
				return;
			}

			toastrMessage('Ocorreu um erro ao realizar a solicitação: ' + response.message, 'error');
			$("#modal-detalhes").modal('toggle');
		});
	});
	$.extend( $.fn.dataTableExt.oSort, {
		"date-br-pre": function ( a ) {
			if (a == null || a == "") {
				return 0;
			}
			var brDatea = a.split('/');
			return (brDatea[2] + brDatea[1] + brDatea[0]) * 1;
		},

		"date-br-asc": function ( a, b ) {
			return ((a < b) ? -1 : ((a > b) ? 1 : 0));
		},

		"date-br-desc": function ( a, b ) {
			return ((a < b) ? 1 : ((a > b) ? -1 : 0));
		}
	} );
});