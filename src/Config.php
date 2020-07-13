<?php
namespace src;

class Config {
    const BASE_DIR = '/orbi_projeto/public';

    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_DATABASE = 'orbi';
    CONST DB_USER = 'root';
    const DB_PASS = '';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}
//password: campanholi500
/*
PARA PUBLICAR:
1. Mudar as configurações do Banco de Dados;
2. Mudar a URL base;
3. ContractHelpers - BASE_URL;
4. BASE_URL em script.js
5. BASE_URL em LoginController;

*/
