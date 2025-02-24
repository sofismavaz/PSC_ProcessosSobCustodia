function captarDatosFormInsertDoctos() {
    var form = document.getElementById("formInsertDoctos");
    var formData = new FormData(form);
    var datos = {};
    formData.forEach((value, key) => {
        datos[key] = value;
    });
    var json = JSON.stringify(datos);
    return json;
}