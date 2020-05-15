$(document).ready(function(){
    $('#filter').keyup(function(){
        $('form').submit(function(){
            var dados = $(this).serialize();
            $.ajax({
                url: 'http://localhost/orbi_projeto/public/system-config/historic',
                type: 'GET',
                dataType: 'html',
                data: dados,
                sucess: function(data) {
                    $('#historic').empty().html(data);
                }


            });
            return false;
        });

        $('form').trigger('submit');
    });
});