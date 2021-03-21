var linkRegistro = document.querySelector("#linkRegistro");
var linkLogin = document.querySelector(".linkLogin");
var frmRegistro = document.querySelector("#frmRegistro");
var frmLogin = document.querySelector("#frmLogin");

//evento del cambio de registro a login
$(linkLogin).on("click", function () {
  $(frmRegistro).removeClass("d-block");
  $(frmRegistro).addClass("d-none");
  $(frmLogin).removeClass("d-none");
  $(frmLogin).addClass("d-block");
});
//evento del cambio de login a registro
$(linkRegistro).on("click", function () {
  $(frmLogin).removeClass("d-block");
  $(frmLogin).addClass("d-none");
  $(frmRegistro).removeClass("d-none");
  $(frmRegistro).addClass("d-block");

   //selects que recibiran la respuesta de la api
   var cbTipoDocumento = document.querySelector("#cbTipoDocumento");
   var cbIdDistrito = document.querySelector("#cbIdDistrito");
   var cbIdMultiDistritoEmpresa = document.querySelector("#cbIdMultiDistritoEmpresa");
   var listaDistritoEmpresa = document.querySelector("#listaDistritoEmpresa");

  //API's
  var payload= { codUsuario: "registro" };

  var urlTipoDocumento =getUrlAPI('Maestros','GetTipoDocumento');
  var urlDistritos = getUrlAPI('Maestros','GetDistrito');

  $.ajax({
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlTipoDocumento,
    data: JSON.stringify(payload),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      cbTipoDocumento.innerHTML = `<option value=' '> Tipo Documento </option>`;
      data.Resultado.forEach(function (item, i, arr) {
        cbTipoDocumento.innerHTML += `<option id='${item.IdTipoDocumento}' value='${item.IdTipoDocumento}'>${item.Descripcion}</option>`;
      });
    }
  });

  $.ajax({
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlDistritos,
    data: JSON.stringify(payload),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      cbIdDistrito.innerHTML = `<option value=' '> Seleccione Distrito </option>`;
      cbIdDistritoEmpresa.innerHTML = `<option value=' '> Seleccione Distrito </option>`;
      cbIdMultiDistritoEmpresa.innerHTML = ``;

      data.Resultado.forEach(function (item, i, arr) {
        cbIdDistrito.innerHTML += `<option id='${item.IdDistrito}' value='${item.IdDistrito}'>${item.Descripcion}</option>`;
        cbIdDistritoEmpresa.innerHTML += `<option id='${item.IdDistrito}' value='${item.IdDistrito}'>${item.Descripcion}</option>`;
        cbIdMultiDistritoEmpresa.innerHTML += `<option id='${item.IdDistrito}' value='${item.IdDistrito}'>${item.Descripcion}</option>`;
      
      });
    }
  });
  
  //****************--------EVENTOS-------************************/
  //evento de inicializacion del multiselect
  $(cbIdMultiDistritoEmpresa).select2({
                placeholder: "Seleccione Cobertura", //placeholder
                tags: true,
                tokenSeparators: ['/',',',';'," "] 
            });
  //evento de cambio del archivo a subir(imagen)
  var fileInput = document.querySelector(".custom-file-input");
  $(fileInput).on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  //evento de cambio de opciones los selects
  var selectedOptionDistrito;
  var selectedOptionTipoDocumento;
  cbIdDistrito.addEventListener('change', function () {
      selectedOptionDistrito = this.options[cbIdDistrito.selectedIndex];
  });
  cbTipoDocumento.addEventListener('change', function () {
      selectedOptionTipoDocumento = this.options[cbTipoDocumento.selectedIndex];
  });

  //*evento de cambio en los tipos de formulario(FormCliente / FormEmpresa)
  //para limpirsu data*/;
  var registroClienteTab = document.querySelector("#registroCliente-tab");
  var registroEmpresaTab = document.querySelector("#registroEmpresa-tab");
  var frmRegCliente = document.querySelector("#frmRegCliente");
  var frmRegEmpresa = document.querySelector("#frmRegEmpresa");

  registroClienteTab.addEventListener('click', function(){
    frmRegEmpresa.reset();
  });
  registroEmpresaTab.addEventListener('click', function(){
    frmRegCliente.reset();
  });

});
