$(document).ready(function() {


    $('#frmIngresoMuestra').submit(function() {
        var fecha = $(this).find('input[name=fecha]').val();
        var gramos = $(this).find('input[name=gramos]').val();
        var centimetroscubicos = $(this).find('input[name=centimetroscubicos]').val();
        var idtipomuestra = $(this).find('select[name=idtipomuestra]').val(); //< tipo de análisis
        var idestadomuestra = $(this).find('input[name=idestadomuestra]').val();

        //var datos = {fecha:fecha, gramos:gramos, centimetroscubicos:centimetroscubicos, idtipomuestra:idtipomuestra, idestadomuestra:idestadomuestra};
        if (isCampo(fecha) == 1) { //< valida fecha vacío
            if (isCampo(gramos) == 1) { //< valida gramos vacío
                if (isCampo(centimetroscubicos) == 1) { //< valida centimetroscubicos vacío
                    if (isCampo(idtipomuestra) == 1) { //< valida idtipomuestra vacío
                        if (isCampo(idestadomuestra) == 1) { //< valida idestadomuestra vacío
                            return true;
                        } else {
                            setError('El campo Estado Muestra es obligatorio.');
                            $("#idestadomuestra").focus();
                            return false;
                        }

                    } else {
                        setError('El campo Tipo de Análisis es obligatorio.');
                        $("#idtipomuestra").focus();
                        return false;
                    }

                } else {
                    setError('El campo Cantidad de Centímetros Cúbicos es obligatorio.');
                    $("#centimetroscubicos").focus();
                    return false;
                }

            } else {
                setError('El campo Cantidad de Gramos es obligatorio.');
                $("#gramos").focus();
                return false;
            }

        } else {
            //alert('El campo Fecha de Envío es obligatorio.');
            setError("El campo Fecha de Envío es obligatorio.");
            $("#fecha").focus();
            return false;
        }

        return false;
    })

//frm_usuarios

    $('#frm_usuarios').submit(function() {
        var rut = $(this).find('input[name=rut]').val();
        var nombre = $(this).find('input[name=nombre]').val();
        var direccion = $(this).find('input[name=direccion]').val();
        var email = $(this).find('select[name=email]').val(); //< tipo de análisis
        var contrasena = $(this).find('input[name=contrasena]').val();
        var telefono = $(this).find('input[name=telefono]').val();

        if (isCampo(rut) == 1 
        || isCampo(nombre) == 1
        || isCampo(direccion) == 1
        || isCampo(email) == 1
        || isCampo(contrasena) == 1
        || isCampo(telefono) == 1 ) //< valida rut vacío
        { 
            swal("Error!", "Todos los campos son obligatorios!", "error");
            return false;
        }
    });

});