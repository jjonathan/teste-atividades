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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Data Ini.</th>
                                <th>Data Fim</th>
                                <th>Status</th>
                                <th>Situação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($atividades as $atividade): ?>
                                <tr>
                                    <td><?= $atividade->nome ?></td>
                                    <td><?= $atividade->descricao ?></td>
                                    <td><?= $atividade->dt_inicio ?></td>
                                    <td><?= $atividade->dt_fim ?></td>
                                    <td>
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
                                    <td><?= $atividade->situacao ? 'Ativo' : 'Inativo' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer') ?>