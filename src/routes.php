<?php
use core\Router;

$router = new Router();

//Rota de início;
$router->get('/', 'HomeController@index');
//Rota da mensagem;
$router->post('/', 'HomeController@postAction');

$router->get('/radar', 'HomeController@radar');

$router->get('/empresa', 'HomeController@company');
$router->post('/empresa', 'HomeController@companyAction');

$router->get('/cidade', 'HomeController@city');


$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@signinAction');


$router->get('/my', 'SystemController@index');

$router->get('/contratos', 'SystemController@contracts');

$router->get('/config', 'SystemController@config');
$router->post('/config', 'SystemController@configAction');

$router->get('/system-config', 'SystemController@adminConfig');
$router->get('/system-config/cadastrar', 'SystemController@signup');
$router->post('/system-config/cadastrar', 'SystemController@signupAction');
$router->get('/system-config/user-list', 'SystemController@userList');
$router->get('/system-config/excluir/{id}', 'SystemController@dellUser');
//Rota de configuração de um usuário específico, acessado APENAS pelo admin;
$router->get('/system-config/config/{id}', 'SystemController@userConfig');
$router->post('/system-config/config/{id}', 'SystemController@userConfigAction');
//Rota para excluir um histórico;
$router->get('/system-config/historic/{id}/excluir', 'SystemController@dellHistoric');
///system-config/historic/<?=$item['id'];/excluir
$router->get('/system-config/historic', 'SystemController@historic');
///system-config/adicionar-contrato
$router->get('/sair', 'SystemController@logout');

//$router->get('/pesquisar');
