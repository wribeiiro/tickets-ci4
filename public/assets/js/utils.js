/**
 * 
 * @param {*} startValue 
 * @param {*} endValue 
 * @param {*} duration 
 * @param {*} fieldId 
 */
function counterjQuery(startValue = 0, endValue = 5000, duration = 1500, fieldId) {

    try {
        jQuery({ Counter: startValue }).animate({ 
            Counter: endValue
        }, {
            duration: duration,
            easing: "swing",
            step: function () {
                $(`#${fieldId}`).html(parseInt(Math.ceil(this.Counter)))
            },
            complete: function() {
                $(`#${fieldId}`).html(parseInt(endValue || 0))
            }
        })
    } catch(err) {
        alert(err.message);
    }
}

function ucFirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function numeroParaMoeda(n, c, d, t){
    c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "" : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

function moedaParaNumero(valor){
    if (valor.length > 10){
        return isNaN(valor) == false ? parseFloat(valor) : parseFloat(valor.replace(".", "").replace(",", ".").replace(".", ""));
    }
    
    return isNaN(valor) == false ? parseFloat(valor) : parseFloat(valor.replace(".", "").replace(",", "."));
}


function format2Decimals(number) {
    if(number) {
        return Number(parseFloat(number.toString()).toFixed(2)).toLocaleString('pt-BR', { 
            minimumFractionDigits: 2, maximumFractionDigits: 2 
        });
    }

    return '0,00'
}

function intVal(i) {
    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 :  typeof i === 'number' ? i : 0;
}

function maskCpf(valor) {    
    removeMask(valor);

    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
}

function maskCnpj(valor) {
    removeMask(valor);
    
    return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
}

function removeMask(valor) {
    return valor.replace(/(\.|\/|\-)/g,"");
}

function loadPage(page) {
        
    $("#loading").css("display", "block");
    
    $(".container-scroller").load(page, function () {
        $("#loading").css("display", "none");
    });
}