
// Passando o mouse por cima, o botão cresce de tamanho!
$(document).ready(function(){
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
        $(this).find('#dropdown-menu').slideDown();
    }, function(){
        $(this).find('#dropdown-menu').slideUp();
    });



    
});


