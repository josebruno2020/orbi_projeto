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

//$router->get('/pesquisar');
