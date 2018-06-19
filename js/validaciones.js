/**
 * función que valida campos vacíos
 * @param {string} {int} campo
 * @returns {number}
 */
function isCampo(campo) {
    var vacio = 0;
    if(campo == '') {
        vacio = 0;
    }

    if(campo != '') {
       vacio = 1;
    }

    return vacio;
}


/**
 * función que valida formato
 * de un correo electrónico
 * @param {string} mail
 * @returns {int} estado
 */
function isEmail(mail) {
    var estado = 1;
    if (/\S+@\S+\.\S+/.test(mail) === false) {
        estado = 0;
    }

    return estado;
}


/**
 * función que valida que sea un valor numérico
 * @param {int} numero
 * @returns {int} estado
 */
function isNumber(numero) {
    var estado = 1;
    if (isNaN(parseInt(numero))) {
        estado = 0;
    }

    return estado;
}


/**
 * generador de clave aleatoria de 10 d�gitos
 * @returns {string} code
 */
function isPassword() {
    var code = "";
    var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    var lon = 10;

    for (x = 0; x < lon; x++) {
        rand = Math.floor(Math.random() * chars.length);
        code += chars.substr(rand, 1);
    }

    return code;
}


/**
 * función que valida rut (Ej. 11111111-1)
 * @param {string} rutCompleto
 * @returns {boolean}
 */
function isRut(rutCompleto) {
    if (!/^[0-9]+-[0-9kK]{1}$/.test(rutCompleto)) {
        return false;
    }

    var tmp  = rutCompleto.split('-');
    var digv = tmp[1];
    var rut  = tmp[0];

    if (digv == 'K') {
        digv = 'k' ;
    }

    var digesto = isDv(rut);
    if (digesto == digv ) {
        return true;
    } else {
        return false;
    }
}


/**
 * función que valida el digito verificador
 * de un rut válido
 * @param int T
 * @returns {*}
 */
function isDv(T) {
    var M = 0;
    var S = 1;

    for (;T;T = Math.floor(T/10)) {
        S = (S + T % 10 * (9 - M++ % 6)) % 11;
    }

    return S ? S - 1 : 'k';
}