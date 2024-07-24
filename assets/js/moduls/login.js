const formulario = document.querySelector('#formulario');
const correo = document.querySelector('#correo');
const clave = document.querySelector('#clave');

const errorCorreo = document.querySelector('#errorCorreo');
const errorClave = document.querySelector('#errorClave');

document.addEventListener('DOMContentLoaded', function () {
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        errorCorreo.textContent = '';
        errorClave.textContent = '';
        if (correo.value == '') {
            errorCorreo.textContent = 'CORREO REQUERIDO';
        } else if (clave.value == '') {
            errorClave.textContent = 'CONTRASEÑA REQUERIDA';
        } else {
            const url = base_url + 'home/validar';
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
                    Swal.fire({
                        title: "Mensaje",
                        text: res.msg,
                        icon: res.type
                    });
                    if (res.type == 'success') {
                        setTimeout(() => {
                            let timerInterval;
                            Swal.fire({
                                title: res.msg,
                                html: "Cargando el acceso en <b></b> milisegundos.",
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent = `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location = base_url + 'admin';
                                }
                            });
                        }, 2000);
                    }

                }
            }
        }
    })
})