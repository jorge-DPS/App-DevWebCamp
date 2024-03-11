// Importa sweet
import Swal from 'sweetalert2'
// Funcion Ifee
(function(){
    let eventos = [];

    const eventosBoton = document.querySelectorAll('.evento__agregar');
    const resumen = document.querySelector('#registro__resumen');

    eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEvento))

    function seleccionarEvento(e) {
        if (eventos.length < 5) {
            e.target.disabled = true;
            eventos = [...eventos, {
                id: e.target.dataset.id,
                titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim(),
            }]
            // console.log(eventos);
        } else {
            Swal.fire({
                title:'Error',
                text:'Máximo 5 eventos por registro',
                icon:'error',
                confirmButtonText:'OK'
            })
        }

        mostrarEventos();
    }

    function mostrarEventos() {
        limparEventosResumen();
        if (eventos.length > 0) {
            eventos.forEach(evento => {
                // Creando el div
                const eventoDOM = document.createElement('DIV');
                eventoDOM.classList.add('registro__evento')

                // Creando el titulo
                const titulo = document.createElement('H3')
                titulo.classList.add('registro__nombre')
                titulo.textContent = evento.titulo

                // Crear un boton para eliminar
                const botonEliminar = document.createElement('BUTTON');
                botonEliminar.classList.add('registro__eliminar');
                botonEliminar.innerHTML = '<i class="fa-solid fa-trash"></i>';
                botonEliminar.onclick = function () {
                    eliminarEvento(evento.id)
                }
                // console.log(botonEliminar);


                // Renderizar en el html
                eventoDOM.appendChild(titulo);
                eventoDOM.appendChild(botonEliminar);
                resumen.appendChild(eventoDOM);


            })
        }
    }

    function eliminarEvento(id) {
        eventos = eventos.filter(evento => evento.id !== id);
        // console.log(eventos);
        const botonAgregar = document.querySelector(`[data-id="${id}"]`)
        botonAgregar.disabled = false;
        mostrarEventos();
    }

    // arreglamos el rederizador de los eventos; ya que se buelven a mostrar los eventos añadidos
    function limparEventosResumen() {
        while(resumen.firstChild){
            resumen.removeChild(resumen.firstChild); 
        }
    }
})();