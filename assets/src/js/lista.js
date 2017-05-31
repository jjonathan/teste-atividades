$(function(){
	$("#inputStatus").select2({
		placeholder: "Selecione o status",
		allowClear: true
	});

	listaEmDatatable();
});

function listaEmDatatable(){
	var status   = $("#inputStatus").select2('val');
	var situacao = $("#inputSituacao").val();

	var urlAjax = base_url + 'api/lista';

	if (status || situacao) {
		urlAjax += '?';

		if (status) {
			urlAjax += 'status=' + status;
		}

		if (situacao) {
			urlAjax += (status) ? '&' : '';
			urlAjax += 'situacao=' + situacao;
		}
	}

	$("#listaTable").DataTable({
		"ajax" : urlAjax,
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
			{ "orderable": false, "targets": 6 }
		],
		"bLengthChange": false,
		"bFilter": false,
		"bDestroy" : true
	});
}

function atualizaLista(){
	$("#listaTable").ajax.reload();
}