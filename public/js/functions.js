jQuery(document).ready(function() {

    //Al iniciar mandamos consultar todos los paises que se mantienen en nuestra base de datos atravez de la ruta paises
    $.ajax({
        url: 'provincias',
        type: 'GET',
        dataType: 'json',
        success: function(pais){
            $('select#provincia').html('');
            $('select#provincia').append($('<option></option>').text('Seleccionar...').val(''));
            //recorremos con el metodo each el objeto
            $.each(pais, function(i) {
                //Con los parametros que recibimos en nuestro objeto pais creamos las opciones
                $('select#provincia').append("<option value=\""+pais[i].id+"\">"+pais[i].provincia+"<\/option>");
            });
        }
    })

    //El metodo Change nos permite realizar una acción al momento que estamos interactuando con el elemento
    $("#provincia").change(function(event) {
        var id_provincia = $("#provincia option:selected").val();  //obtenemos el id del pais que se mantiene seleccionado
        
        //Por medio de AJAX consultamos la ruta creada en laravel llamada estados la cual recibe el id del país
        $.ajax({
            url: 'localidades',
            type: 'POST',
            data: 'provincia='+id_provincia, //enviamos el id
            dataType: 'json',
            success: function(estado){
                $('select#ciudad').html('');
                $('select#ciudad').append($('<option></option>').text('Seleccionar...').val('')); 
                //recorremos con el metodo each el objeto
                $.each(estado, function(i) {
                    //Con los parametros que recibimos en nuestro objeto estado creamos las opciones
                    $('select#ciudad').append("<option value=\""+estado[i].id+"\">"+estado[i].localidad+"<\/option>");
                    // estado[i].id = Contiene el id del estado
                    // estado[i].estados = Contiene el nombre del estado
                });
            }
        })
    });

});