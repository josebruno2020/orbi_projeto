// Passando o mouse por cima, o botão cresce de tamanho!
const BASE_URL = 'http://localhost/orbi_projeto/public/';
//BASE_URL para projeto publicado;
//const BASE_URL = '';
$(document).ready(function(){

    /*
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
   
});

