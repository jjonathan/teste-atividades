<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('layout/header') ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?= $atividade ? 'Editar' : 'Nova' ?> Atividade</div>
                <div class="panel-body">

                <form action="<?= current_url() ?>" method="POST" role="form">
                    <?php if ($atividade): ?>
                        <input type="hidden" name="atividade_id" value="<?= $atividade->id ?>">
                    <?php endif ?>
                    <div class="form-group">
                        <label for="inputNome" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Nome:</label>
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <input type="text" name="nome" id="inputNome" class="form-control" maxlength="255" value="<?= $atividade ? $atividade->nome : ''?>" required="required">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescricao" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Descrição:</label>
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <textarea name="descricao" id="inputDescricao" class="form-control" maxlength="600" rows="3" required="required"><?= $atividade ? $atividade->descricao : '' ?></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputDt_inicio" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Data Inicio:</label>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <input type="date" name="dt_inicio" id="inputDt_inicio" class="form-control" value="<?= $atividade ? date('Y-m-d', strtotime($atividade->dt_inicio)) : '' ?>" required="required">
                        </div>

                        <label for="inputDt_fim" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Data Fim:</label>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <input type="date" name="dt_fim" id="inputDt_fim" class="form-control" value="<?= $atividade && $atividade->dt_fim ? date('Y-m-d', strtotime($atividade->dt_fim)) : '' ?>">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus_id" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Status:</label>
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <select name="status_id" id="inputStatus_id" class="form-control" required="required">
                                <?php foreach($estados as $estado): ?>
                                    <option value="<?= $estado->id ?>" <?= $atividade && $atividade->status_id = $estado->id ? 'selected' : '' ?>><?= $estado->nome ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Situação:</label>
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <input name="situacao" id="inputSituacao" type="checkbox" <?= $atividade && $atividade->situacao ? 'checked' : '' ?>>
                                    Ativo
                                </label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="btn-group pull-right">
                        <button type="reset" class="btn btn-danger">Limpar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    <a href="<?= base_url('lista') ?>" type="button " class="btn btn-primary">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer') ?>