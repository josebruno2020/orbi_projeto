<?php
namespace src\controllers;

use \core\Controller;
use src\helpers\ContractHelpers;
use \src\helpers\HistoricHelpers;
use src\helpers\PlanilhaHelpers;
use src\helpers\TenderHelpers;
use \src\helpers\UserHelpers;
use src\services\EmailTrait;
use src\services\FlashMessageTrait;

class AjaxController extends Controller {
    private $loggedUser;
    use FlashMessageTrait;
    use EmailTrait;

    
    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();
        //Chamdno a classe UserHelpers, com seu método estático onde vai verificar se o usuário fez o Login;
        //Ele vai armazenar na variável $loggedUser;
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }

        
    }
    public function filtro()
    {
        $filtro = filter_input(INPUT_GET, 'filter');

        $hist = HistoricHelpers::getByFilter($filtro);
        $this->render('ajax/ajax-filtro', [
            
            'hist' => $hist,
            'loggedUser' => $this->loggedUser
        ]);

    }

    public function contratos_filtro()
    {
        
        $filtro = filter_input(INPUT_POST, 'contratos_search');
        $contracts = ContractHelpers::getByFilter($filtro);
        $new = new UserHelpers();
        
        $this->render('ajax/ajax-contratos', [
            'loggedUser' => $this->loggedUser,
            'contracts' => $contracts,
            'new' => $new
 
        ]);
    }

    public function tenders_filtro()
    {
        
        $filtro = filter_input(INPUT_POST, 'tenders_search');
        $tenders = TenderHelpers::getByFilter($filtro);
        $new = new UserHelpers();
        
        $this->render('ajax/ajax-tenders', [
            'loggedUser' => $this->loggedUser,
            'tenders' => $tenders,
            'new' => $new
 
        ]);
    }

    public function email_planilha($id)
    {
        $planilha = PlanilhaHelpers::planilhaById($id['id']);
        $id_contract = $planilha->id_contract;
        $contract = ContractHelpers::getOne($id_contract);
        $user = UserHelpers::getUser($contract->id_user);
        
        $this->planilha_email(
            $this->loggedUser->email, 
            $user->email, 
            $contract->name,
            $this->loggedUser->name
        );

        $this->flashMessage(
            'success',
            'E-mail enviado com sucesso!'
        );
    }



}