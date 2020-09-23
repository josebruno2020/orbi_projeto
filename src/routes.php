<?php
use core\Router;

$router = new Router();

/**
 * Rotas para o HomeController;
 * Rotas da parte públic do site;
 */
$router->get('/', 'HomeController@index');
$router->post('/', 'HomeController@postAction');
$router->get('/radar', 'HomeController@radar');
$router->post('/radarAction', 'HomeController@radarAction');
$router->get('/empresa', 'HomeController@company');
$router->post('/empresa', 'HomeController@companyAction');
$router->get('/cidade', 'HomeController@city');


/**
 * Rotas para o Controller de Login;
 * Esqueci senha incluso
 */
$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@signinAction');
$router->get('/esqueci-senha', 'LoginController@password');
$router->post('/esqueci-senha', 'LoginController@passwordAction');
$router->get('/nova-senha/{token}', 'LoginController@newPassword');
$router->post('/nova-senha/{token}', 'LoginController@newPasswordAction');


/**
 * Rota para página inicial do sistema interno;
 */
$router->get('/my', 'SystemController@index');
$router->get('/system-config', 'SystemController@adminConfig');
$router->get('/sair', 'SystemController@logout');
$router->get('/system-config/historic/{id}/excluir', 'SystemController@dellHistoric');
$router->get('/system-config/historic', 'SystemController@historic');


/**
 * Rotas para UserController;
 */
$router->get('/meus-dados', 'UserController@config');
$router->post('/meus-dados', 'UserController@configAction');
$router->get('/cadastrar-novo-usuario', 'UserController@signup');
$router->post('/cadastrar-novo-usuario', 'UserController@signupAction');
$router->get('/listar-usuarios', 'UserController@userList');
$router->get('/usuario/excluir/{id}', 'UserController@dellUser');
$router->get('/usuario/config/{id}', 'UserController@userConfig');
$router->post('/usuario/config/{id}', 'UserController@userConfigAction');

/**
 * Rotas para RadarController;
 */
$router->get('/system-config/radar','RadarController@radar');
$router->post('/system-config/radarAction', 'RadarController@radarAction');

/**
 * Rotas para FolderController;
 */
$router->get('/system-config/adicionar-contrato', 'FolderController@addFolder');
$router->post('/system-config/adicionar-contrato', 'FolderController@addFolderAction');
$router->get('/meus-contratos/{id}', 'FolderController@index');
$router->get('/meus-contratos', 'FolderController@index');
$router->get('/contratos/{id}', 'FolderController@FolderId');
$router->get('/contratos/{id}/editar', 'FolderController@folderEdit');
$router->post('/contratos/{id}/editar', 'FolderController@folderEditAction');
$router->get('/contratos/{id}/del', 'FolderController@delFolder');

/**
 * Rotas para TenderController;
 */
$router->get('/propostas', 'TenderController@index');
$router->get('/minhas-propostas/{id}', 'TenderController@index');

$router->get('/propostas/{id}', 'TenderController@tenderId');
$router->get('/system-config/adicionar-proposta', 'TenderController@addTender');
$router->post('/system-config/adicionar-proposta', 'TenderController@addTenderAction');
$router->get('/propostas/{id}/editar', 'TenderController@tenderEdit');
$router->post('/propostas/{id}/editar', 'TenderController@tenderEditAction');
$router->get('/contratos/{id}/prodel', 'TenderController@delTender');


/**
 * Rotas para ContractController;
 */
$router->get('/system-config/adicionar-documento', 'ContractController@addContractFile');
$router->post('/system-config/adicionar-documento', 'ContractController@addContractFileAction');
$router->get('/contratos/{id}/edit-document', 'ContractController@documentEdit');
$router->post('/contratos/{id}/edit-document', 'ContractController@documentEditAction');
$router->get('/contratos/{id}/excluir', 'ContractController@delContract');
$router->get('/contratos/pesquisar', 'ContractController@search');



/**
 * Rotas para HviController;
 */
$router->get('/system-config/adicionar-hvi', 'HviController@addHviFile');
$router->post('/system-config/adicionar-hvi', 'HviController@addHviFileAction');
$router->get('/contratos/{id}/edit-hvi', 'HviController@hviEdit');
$router->post('/contratos/{id}/edit-hvi', 'HviController@hviEditAction');
$router->get('/contratos/{id}/del-hvi-tender', 'HviController@delHviTender');
$router->get('/contratos/{id}/del-hvi', 'HviController@delHvi');

/**
 * Rotas para PlanilhaController;
 */
$router->get('/system-config/adicionar-planilha', 'PlanilhaController@addPlanilha');
$router->post('/system-config/adicionar-planilha', 'PlanilhaController@addPlanilhaAction');
$router->get('/contratos/{id}/edit-planilha', 'PlanilhaController@planilhaEdit');
$router->post('/contratos/{id}/edit-planilha', 'PlanilhaController@planilhaEditAction');
$router->get('/contratos/{id}/del-planilha', 'PlanilhaController@PlanilhaDel');

/**
 * Rotas para NfController;
 */
$router->get('/system-config/adicionar-nf', 'NfController@addNf');
$router->post('/system-config/adicionar-nf', 'NfController@addNfAction');
$router->get('/contratos/{id}/edit-nf', 'NfController@nfEdit');
$router->post('/contratos/{id}/edit-nf', 'NfController@nfEditAction');
$router->get('/contratos/{id}/del-nf', 'NfController@nfDel');


/**
 * Rotas para AjaxController;
 */
$router->get('/ajax/filtro', 'AjaxController@filtro');
$router->post('/ajax/contratos_filtro', 'AjaxController@contratos_filtro');
$router->post('/ajax/tenders_filtro', 'AjaxController@tenders_filtro');
$router->get('/ajax/email-planilha/{id}', 'AjaxController@email_planilha');



//$router->get('/system-config/hvi', 'HviController@');





