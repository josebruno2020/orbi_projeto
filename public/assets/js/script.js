// Passando o mouse por cima, o botão cresce de tamanho!
const BASE_URL = 'http://localhost/orbi_projeto/public/';
//BASE_URL para projeto publicado;
//const BASE_URL = 'https://www.orbibrasil.com.br/public/';

/**
 * Função para mostrar a senha no login;
 */
$('#mostrar_senha').on('click', function(){

    if($('#mostrar_senha').is(':checked')){
        $('#input_senha').attr('type', 'text');
    } else{
        $('#input_senha').attr('type', 'password');
    }
});

$(document).ready(function(){
    /**
     * Função para colocar a imagem do tamanho correspondente;
     */
    var larguraTela = $(window).width();
    if(larguraTela>710){
        alturaFoto = 350;
    } else {
        alturaFoto = 100;
        $('#fundo-img').css('background-attachment', 'scroll');
    }
   
    console.log(alturaFoto);
    $('#fundo-img').css('height', alturaFoto+'px');





    $('#btn-contato').bind('mouseover', function(){
        $(this).addClass('btn-lg');
    });
    $('#btn-contato').bind('mouseout', function(){
        $(this).removeClass('btn-lg');
    });

    /*
    * Mensagem de sucesso para o envio de mensagem!
    * Da página Home e 'Company'
    */ 
    $('#sendPost').bind('submit', function(){
        
        var name = $('#name').val();
        alert(name+", obrigado por entrar em contato conosco! Em breve responderemos sua mensagem!");

    });

    /*
    * Evento para clicando no botão, aparecer o formulário!
    */
    $('#contato').hide();
    $('#btn-contato').bind('click', function(){

        $('#contato').slideToggle('slow');

    });

    /*
    * Dropdown do menu interno do sistema
    */
    $('#dropdown').hover(function(){
        $(this).find('#dropdown-menu').slideToggle('fast');
    }, function(){
        $(this).find('#dropdown-menu').slideToggle('fast');
    });
    
    /**
     * Filtro de Ajax para pasta de contratos;
     */
    $('#contratos_search').keyup(function(){
        $('#form_contratos_search').submit(function(e){
            e.preventDefault();
            var txt = $(this).serialize();
            
            $.ajax({
                url:BASE_URL+'ajax/contratos_filtro',
                type:'post',
                data:txt,
                success:function(data){
                    $('#resultado-contratos').empty().html(data);
                },
                
            });
            
            return false;

        });
        $('#form_contratos_search').trigger('submit');

    });

    /**
     * Filtro Ajax para buscar tenders;
    */

    $('#tenders_search').keyup(function(){
        
        $('#form_tenders_search').submit(function(e){
            e.preventDefault();
            var txt = $(this).serialize();
            $.ajax({
                url:BASE_URL+'ajax/tenders_filtro',
                type:'post',
                data:txt,
                success:function(data){
                    $('#resultado-tenders').empty().html(data);
                },
                
            });
            
            return false;

        });
        $('#form_tenders_search').trigger('submit');

    });

    //Filter para o historico;
    $('#filter-historic').keyup(function(){
        $('#form-historic').submit(function(e){
            e.preventDefault();
            var txt = $(this).serialize();

            $.ajax({
                url:BASE_URL+'ajax/filtro',
                type:'get',
                data:txt,
                success:function(data){
                    $('#resultado-historic').empty().html(data);
                    console.log(txt);
                },
                
            });
            
            return false;

        });
        $('#form-historic').trigger('submit');

    });

    /**
     * Ajax para mandar e-mail de notificação
     */
    $('.email_button').bind('click',function(){
        var id = $(this).attr('data-id');
        
        $.ajax({
            url:BASE_URL+'ajax/email-planilha/'+id,
            type:'get',
            
        });
        location.reload();

    });
   
});

