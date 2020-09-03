$(document).ready(function(){
    $('#alert').hide();
    $('.btn-delete').click(function(e){
        e.preventDefault(); //cuando presionemos en eliminar, la pagina no refrescara
        
        if(!confirm("¿Esta seguro de eliminar el producto?")){
            return false;
        }
        

        var row = $(this).parents('tr');
        var form = $(this).parents('form');
        var url= form.attr('action');

        $('#alert').show();

        $.post(url, form.serialize(), function(result){
            row.fadeOut();
            $('#products-total').html(result.total);
            $('#alert').html(result.message);
        }).fail(function(){
            $('alert').html('Algo salio mal');
        });

    });
});
