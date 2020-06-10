
// Passando o mouse por cima, o botão cresce de tamanho!
$(document).ready(function(){
    $('#btn-contato').bind('mouseover', function(){
        $(this).addClass('btn-lg');
    });
    $('#btn-contato').bind('mouseout', function(){
        $(this).removeClass('btn-lg');
    });
});

/*
* Evento para clicando no botão, aparecer o formulário!
*/
$(document).ready(function(){

    $('#contato').hide();
    $('#btn-contato').bind('click', function(){

        $('#contato').slideToggle('slow');

    });

});

/*
* Mensagem de sucesso para o envio de mensagem!
*/
$(document).ready(function(){
    $('#sendPost').bind('submit', function(){
        
        var name = $('#name').val();
        alert(name+", obrigado por entrar em contato conosco! Em breve responderemos sua mensagem!");

    });
});