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

$router->get('/contratos', 'ContractController@index');
//Rota para entrar na pasta de cada contrato, de acordo com o seu id;
$router->get('/contratos/{id}', 'ContractController@contractsId');
$router->get('/contratos/{id}/excluir', 'ContractController@delContract');

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

$router->get('/system-config/historic', 'SystemController@historic');


//Página para adicionar um novo documento(apneas pelo admin ou employee)
$router->get('/system-config/adicionar-documento', 'ContractController@addContract');
$router->post('/system-config/adicionar-documento', 'ContractController@addContractAction');
$router->get('/system-config/hvi', 'SystemController@hvi');
$router->get('/sair', 'SystemController@logout');

//$router->get('/pesquisar');


//Adicionar contato;
