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
$router->get('/esqueci-senha', 'LoginController@password');
$router->post('/esqueci-senha', 'LoginController@passwordAction');
$router->get('/nova-senha/{token}', 'LoginController@newPassword');
$router->post('/nova-senha/{token}', 'LoginController@newPasswordAction');
$router->get('/my', 'SystemController@index');
$router->get('/contratos', 'ContractController@index');
//Rota para entrar na pasta de cada contrato, de acordo com o seu id;
$router->get('/contratos/{id}', 'ContractController@contractsId');
$router->get('/contratos/{id}/editar', 'ContractController@contractsEdit');
$router->post('/contratos/{id}/editar', 'ContractController@contractsEditAction');
$router->get('/propostas/{id}', 'ContractController@tenderId');
$router->get('/propostas/{id}/editar', 'ContractController@tenderEdit');
$router->get('/contratos/{id}/edit-document', 'ContractController@documentEdit');
$router->post('/contratos/{id}/edit-document', 'ContractController@documentEditAction');
$router->get('/contratos/{id}/edit-hvi', 'ContractController@hviEdit');
$router->post('/contratos/{id}/edit-hvi', 'ContractController@hviEditAction');
$router->get('/contratos/{id}/edit-nf', 'ContractController@nfEdit');
$router->post('/contratos/{id}/edit-nf', 'ContractController@nfEditAction');
$router->post('/propostas/{id}/editar', 'ContractController@tenderEditAction');
$router->get('/contratos/{id}/del-hvi-tender', 'ContractController@delHviTender');
$router->get('/contratos/{id}/excluir', 'ContractController@delContract');
$router->get('/contratos/{id}/del-hvi', 'ContractController@delHvi');
$router->get('/contratos/{id}/del-nf', 'ContractController@delNf');
$router->get('/contratos/{id}/del', 'ContractController@delFolder');
$router->get('/contratos/{id}/prodel', 'ContractController@delTender');
//Rota de busca;
$router->get('/contratos/pesquisar', 'ContractController@search');

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
$router->get('/system-config/radar','SystemController@radar');
$router->post('/system-config/radarAction', 'SystemController@radarAction');
//Rota para excluir um histórico;
$router->get('/system-config/historic/{id}/excluir', 'SystemController@dellHistoric');

$router->get('/system-config/historic', 'SystemController@historic');
//Rota AJAX para o filtro de histórico;
$router->get('/ajax/filtro', 'AjaxController@filtro');

//Rota para cadastrar um novo contrato;
$router->get('/system-config/adicionar-contrato', 'ContractController@addContract');
$router->post('/system-config/adicionar-contrato', 'ContractController@addContractAction');
//Página para adicionar um novo documento em um contrato(apneas pelo admin ou employee)
$router->get('/system-config/adicionar-documento', 'ContractController@addContractFile');
$router->post('/system-config/adicionar-documento', 'ContractController@addContractFileAction');
//Rota para adicionar um hvi em um contrato (apenas administrador ou employee);
$router->get('/system-config/adicionar-hvi', 'ContractController@addHviFile');
$router->post('/system-config/adicionar-hvi', 'ContractController@addHviFileAction');

//Rota para adicionar uma Nota Fiscal em um contrato;
$router->get('/system-config/adicionar-nf', 'ContractController@addNf');
$router->post('/system-config/adicionar-nf', 'ContractController@addNfAction');
$router->get('/system-config/adicionar-proposta', 'ContractController@addTender');
$router->post('/system-config/adicionar-proposta', 'ContractController@addTenderAction');
//Rota para a análise de HVI(apneas admin);
$router->get('/system-config/hvi', 'SystemController@hviController');
$router->get('/sair', 'SystemController@logout');





