const formulario = document.querySelector('#formulario');
const correo = document.querySelector('#correo');
const clave = document.querySelector('#clave');

const errorCorreo = document.querySelector('#errorCorreo');
const errorClave = document.querySelector('#errorClave');

document.addEventListener('DOMContentLoaded',function() {
    formulario.addEventListener('submit',function(e) {
        e.preventDefault();
        errorCorreo.textContent = '';
        errorClave.textContent = '';
        if(correo.value == ''){
            errorCorreo.textContent = 'CORREO REQUERIDO';
        }else if(clave.value == ''){
            errorClave.textContent = 'CONTRASEÑA REQUERIDA';
        }else{
            const url = base_url + 'home/validar';
            // crear formData
            const data = new FormData(this);
            // hacer una instancia del objeto XMLHttpRequest
            const http = new XMLHttpRequest();
            // abrir una conexion POST GET
            http.open('POST',url,true);
            // enviar datos
            http.send(data);
            // verificar estados
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }
        }
    })
})