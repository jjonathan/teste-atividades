<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'AtividadeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['lista'] = 'AtividadeController';
$route['detalhes'] = 'AtividadeController/detalhes';
$route['nova'] = 'AtividadeController/nova';
$route['editar'] = 'AtividadeController/editar';