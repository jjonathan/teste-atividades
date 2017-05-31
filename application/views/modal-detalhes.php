<table class="table table-hover">
	<tbody>
		<tr>
			<th>Nome</th>
			<td><?= $atividade->nome ?></td>
		</tr>
		<tr>
			<th>Descrição</th>
			<td><?= $atividade->descricao ?></td>
		</tr>
		<tr>
			<th>Data Inicio</th>
			<td><?= date('d/m/Y', strtotime($atividade->dt_inicio)) ?></td>
		</tr>
		<tr>
			<th>Data Fim</th>
			<td><?= $atividade->dt_fim ? date('d/m/Y', strtotime($atividade->dt_fim)) : '' ?></td>
		</tr>
		<tr>
			<th>Status</th>
			<td><?= $atividade->status->nome ?></td>
		</tr>
		<tr>
			<th>Situação</th>
			<td><?= $atividade->situacao ? 'Ativo' : 'Inativo' ?></td>
		</tr>
	</tbody>
</table>