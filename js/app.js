$(document).ready(function() {
    $('#frmIngresoMuestra').submit(function() {
        var fecha = $(this).find('input[name=fecha]').val();
        var gramos = $(this).find('input[name=gramos]').val();
        var centimetroscubicos = $(this).find('input[name=centimetroscubicos]').val();
        var idtipomuestra = $(this).find('select[name=idtipomuestra]').val(); //< tipo de análisis
        var idestadomuestra = $(this).find('input[name=idestadomuestra]').val();

        //var datos = {fecha:fecha, gramos:gramos, centimetroscubicos:centimetroscubicos, idtipomuestra:idtipomuestra, idestadomuestra:idestadomuestra};
        //console.log(datos);

        if (isCampo(fecha) == 1) { //< valida fecha vacío
            if (isCampo(gramos) == 1) { //< valida gramos vacío
                if (isCampo(centimetroscubicos) == 1) { //< valida centimetroscubicos vacío
                    if (isCampo(idtipomuestra) == 1) { //< valida idtipomuestra vacío
                        if (isCampo(idestadomuestra) == 1) { //< valida idestadomuestra vacío
                            return true;
                        } else {
                            alert('El campo Estado Muestra es obligatorio.');
                            $("#idestadomuestra").focus();
                            return false;
                        }

                    } else {
                        alert('El campo Tipo de Análisis es obligatorio.');
                        $("#idtipomuestra").focus();
                        return false;
                    }

                } else {
                    alert('El campo Cantidad de Centímetros Cúbicos es obligatorio.');
                    $("#centimetroscubicos").focus();
                    return false;
                }

            } else {
                alert('El campo Cantidad de Gramos es obligatorio.');
                $("#gramos").focus();
                return false;
            }

        } else {
            alert('El campo Fecha de Envío es obligatorio.');
            $("#fecha").focus();
            return false;
        }

        return false;
    })
});