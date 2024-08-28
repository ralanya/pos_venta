let tblUsuarios;
const formulario = document.querySelector("#formulario");
const nombres = document.querySelector("#nombres");
const apellidos = document.querySelector("#apellidos");
const correo = document.querySelector("#correo");
const telefono = document.querySelector("#telefono");
const direccion = document.querySelector("#direccion");
const clave = document.querySelector("#clave");
const rol = document.querySelector("#rol");

// Errores campos
const errorNombre = document.querySelector("#errorNombre");
const errorApellido = document.querySelector("#errorApellido");
const errorCorreo = document.querySelector("#errorCorreo");
const errorTelefono = document.querySelector("#errorTelefono");
const errorDireccion = document.querySelector("#errorDireccion");
const errorClave = document.querySelector("#errorClave");
const errorRol = document.querySelector("#errorRol");

document.addEventListener('DOMContentLoaded', function () {
    // cargar datos con el plugin DataTable
    $('#tblUsuarios').DataTable( {
        ajax: {
            url: base_url + 'usuarios/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'nombres' },
            { data: 'correo' },
            { data: 'telefono' },
            { data: 'direccion' },
            { data: 'rol' },
            { data: 'acciones' }
        ],
        language: {
            url: base_url + 'assets/js/espanol.json'
        },
        dom,
        buttons
    } );
    // registrar usuarios
    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        if (nombres.value == '') {
            errorNombre.textContent = 'EL NOMBRE ES REQUERIDO';
            
        }
    });
})