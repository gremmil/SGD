//datos=json, tabla = DOM, cabecera = array
function listarDatosTabla(datos, tabla, cabecera) {
    var cabeceraHTML = hacerColumnasHeaderHTML(Object.keys(datos[0]));
    var columnas = [];
    $(tabla).append(cabeceraHTML);
    for(var i = 0; i < cabecera.length; i++){
        columnas.push({"data" : cabecera[i]});
    }
    var instanciaTabla = $(tabla).DataTable(traerDefinicionDataTable(columnas));
    instanciaTabla.rows.add(datos);
    instanciaTabla.draw();
}

function hacerColumnasHeaderHTML(nombresCabecera) {
    var cabeceraTabla = "<thead class=''><tr>";
    nombresCabecera.forEach( function (value) {
        cabeceraTabla += "<th>";
        cabeceraTabla += value;
        cabeceraTabla += "</th>";
    });
    cabeceraTabla += "</tr></thead>";
    return cabeceraTabla;
}
function traerDefinicionDataTable(definicionColumnas){
    var formato = {
        columns : definicionColumnas,
        paging : false,
        info : false,
        searching : false,
        ordering: false
    };
    return formato;
}