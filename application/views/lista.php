<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('layout/header') ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Atividades</div>

                <div class="panel-body">
                    <div class="table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Data Ini.</th>
                                    <th class="text-center">Data Fim</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Situação</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($atividades as $atividade): ?>
                                    <tr class="<?= $atividade->status == 4 ? 'finalizada' : '' ?>">
                                        <td class="text-center"><?= $atividade->nome ?></td>
                                        <td class="text-center"><?= date('d-m-Y', strtotime($atividade->dt_inicio)) ?></td>
                                        <td class="text-center"><?= $atividade->dt_fim ? date('d-m-Y', strtotime($atividade->dt_fim)) : '-' ?></td>
                                        <td class="text-center">
                                            <?php
                                                switch ($atividade->status) {
                                                    case 1:
                                                        echo 'Pendente';
                                                        break;
                                                    case 2:
                                                        echo 'Em Desenvolvimento';
                                                        break;
                                                    case 3:
                                                        echo 'Em teste';
                                                        break;
                                                    default:
                                                        echo 'Concluída';
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center"><?= $atividade->situacao ? 'Ativo' : 'Inativo' ?></td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-sm btn-success">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-sm btn-info">
                                                <i class="fa fa-info" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (count($atividades) == 0): ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center">Nenhuma atividade cadastrada</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a type="button" class="btn btn-default pull-right">Nova Tarefa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer') ?>