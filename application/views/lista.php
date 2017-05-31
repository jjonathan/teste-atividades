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

                    <form action="<?= base_url('') ?>" method="GET" class="form-horizontal" role="form">
                    
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <select name="status[]" id="inputStatus" class="form-control" multiple="true">
                                        <?php foreach($estados as $estado): ?>
                                            <option value="<?= $estado->id ?>" <?= $selectedStatus && in_array($estado->id, $selectedStatus) ? 'selected' : '' ?>><?= $estado->nome ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <label class="col-xs-4 col-sm-4 col-md-4 col-lg-4" for="inputSituacao">Situação:</label>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <select name="situacao" id="inputSituacao" class="form-control">
                                            <option value="1" <?= $selectedSituacao && $selectedSituacao == 1 ? 'selected' : '' ?>>Ativos</option>
                                            <option value="2" <?= $selectedSituacao && $selectedSituacao == 2 ? 'selected' : '' ?>>Inativos</option>
                                            <option value="3" <?= $selectedSituacao ?  $selectedSituacao == 3 ? 'selected' : '' : 'selected="true"' ?> >Ambos</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                    </form>
                    <div class="table">
                        <table class="table table-hover" id="listaTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Data Ini.</th>
                                    <th class="text-center">Data Fim</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Situação</th>
                                    <th class="text-center" width="10%">Editar</th>
                                    <th class="text-center" width="10%">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($atividades as $atividade): ?>
                                    <tr class="<?= $atividade->status_id == 4 ? 'finalizada' : '' ?>">
                                        <td class="text-center"><?= strlen($atividade->nome) > 30 ? substr($atividade->nome, 0, 27) . '...' : $atividade->nome ?></td>
                                        <td class="text-center"><?= date('d/m/Y', strtotime($atividade->dt_inicio)) ?></td>
                                        <td class="text-center"><?= $atividade->dt_fim ? date('d/m/Y', strtotime($atividade->dt_fim)) : '' ?></td>
                                        <td class="text-center">
                                            <?= $atividade->status->nome ?>
                                        </td>
                                        <td class="text-center"><?= $atividade->situacao ? 'Ativo' : 'Inativo' ?></td>
                                        <td class="text-center">
                                            <a href="<?= $atividade->status_id != 4 ? base_url() . "editar?id=$atividade->id" : '#' ?>" type="button" class="btn btn-sm btn-success" <?= $atividade->status_id == 4 ? 'disabled' : '' ?>>
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-sm btn-info btn-detalhes" data-id="<?= $atividade->id ?>">
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
                            <a href="<?= base_url('nova') ?>" type="button" class="btn btn-default pull-right">Nova Atividade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-detalhes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detalhes</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer') ?>