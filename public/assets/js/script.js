
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
        $(this).find('#dropdown-menu').slideToggle('fast');
    }, function(){
        $(this).find('#dropdown-menu').slideToggle('fast');
    });
/*
    //Filter para o historico;
    $('#filter-historic').keyup(function(){
        $('#form-historic').submit(function(e){
            e.preventDefault();
            var txt = $('#filter-historic').val();

            $.ajax({
                url:'http://localhost/orbi_projeto/public/system-config/historic/filter',
                type:'post',
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
   */ 
});

