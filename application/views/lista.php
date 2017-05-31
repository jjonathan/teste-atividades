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
                    <div class="row">

                    </div>

                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <select name="status" id="inputStatus" class="form-control" multiple="true">
                                    <?php foreach($estados as $estado): ?>
                                        <option value="<?= $estado->id ?>"><?= $estado->nome ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label class="col-xs-4 col-sm-4 col-md-4 col-lg-4" for="inputSituacao">Situação:</label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <select name="situacao" id="inputSituacao" class="form-control">
                                        <option value="1">Ativos</option>
                                        <option value="2">Inativos</option>
                                        <option value="3" selected="true">Ambos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table">
                        <table class="table table-hover" id="listaTable">
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
                                    <tr class="<?= $atividade->status_id == 4 ? 'finalizada' : '' ?>">
                                        <td class="text-center"><?= $atividade->nome ?></td>
                                        <td class="text-center"><?= date('d-m-Y', strtotime($atividade->dt_inicio)) ?></td>
                                        <td class="text-center"><?= $atividade->dt_fim ? date('d-m-Y', strtotime($atividade->dt_fim)) : '-' ?></td>
                                        <td class="text-center">
                                            <?php
                                            switch ($atividade->status_id) {
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