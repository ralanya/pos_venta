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
    tblUsuarios = $('#tblUsuarios').DataTable({
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
        buttons,
        responsive: true,
        order: [[0, 'asc']]
    });
    // registrar usuarios
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();

        errorNombre.textContent = '';
        errorApellido.textContent = '';
        errorCorreo.textContent = '';
        errorTelefono.textContent = '';
        errorDireccion.textContent = '';
        errorClave.textContent = '';
        errorRol.textContent = '';

        if (nombres.value == '') {
            errorNombre.textContent = 'EL NOMBRE ES REQUERIDO';
        }
        else if (apellidos.value == '') {
            errorApellido.textContent = 'EL APELLIDO ES REQUERIDO';
        }
        else if (correo.value == '') {
            errorCorreo.textContent = 'EL CORREO ES REQUERIDO';
        }
        else if (telefono.value == '') {
            errorTelefono.textContent = 'EL TELEFONO ES REQUERIDO';
        }
        else if (direccion.value == '') {
            errorDireccion.textContent = 'LA DIRECCION ES REQUERIDO';
        }
        else if (clave.value == '') {
            errorClave.textContent = 'LA CLAVE ES REQUERIDO';
        }
        else if (rol.value == '') {
            errorRol.textContent = 'EL ROL ES REQUERIDO';
        }
        else {
            const url = base_url + 'usuarios/registrar';
            // crear formData
            const data = new FormData(this);
            // hacer una instancia del objeto XMLHttpRequest
            const http = new XMLHttpRequest();
            // abrir una conexion POST GET
            http.open('POST', url, true);
            // enviar datos
            http.send(data);
            // verificar estados
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    // console.log(this.responseText);
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: res.type,
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    if(res.type == 'success'){
                        formulario.reset();
                        tblUsuarios.ajax.reload();
                    }
                }
            }
        }
    });
})