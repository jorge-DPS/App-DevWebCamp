(function () {
    const ponentesInputBuscar = document.querySelector('#ponentes');

    if (ponentesInputBuscar) {
        let ponentes = []
        let PonentesFiltrados = []

        const listadoPonentes = document.querySelector('#listado-ponentes')
        const ponenteHidden = document.querySelector('[name="ponente_id"]')

        obtenerPonentes();
        ponentesInputBuscar.addEventListener('input', buscarPonentes)

        async function obtenerPonentes() {
            const url = `/api/ponentes`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            // console.log(resultado, 'aqui los ponentes');

            formatearPonentes(resultado) //-> aqui solo traemos los ponentes su ombre y apellido
        }

        function formatearPonentes(arrayPonentes = []) {
            ponentes = arrayPonentes.map(ponente => { //-> aqui el map retorna un una nueva lista
                return {
                    id: ponente.id,
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido}`,
                }
            })

            // console.log(ponentes, 'aqui lo formateado');
        }

        function buscarPonentes(e) {
            const busqueda = e.target.value

            if (busqueda.length > 3) {
                const expresion = new RegExp(busqueda, 'i');
                PonentesFiltrados = ponentes.filter(ponente => {
                    if (ponente.nombre.toLowerCase().search(expresion) != -1) {
                        return ponente
                    }
                })

                // console.log(PonentesFiltrados);
            } else {
                PonentesFiltrados = []
            }

            mostrarPonentes()
        }

        function mostrarPonentes() {

            // Limpia la lista (UL) -> es mejor haerlo asi
            while (listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild)
            }

            // verificcar si existe el elemento buscado; y si no, entonces mostrar un texto que diga que no hay resultados
            if (PonentesFiltrados.length > 0) {
                PonentesFiltrados.forEach(ponente => {
                    const ponenteHTML = document.createElement('LI');
                    ponenteHTML.classList.add('listado-ponentes__ponente')
                    ponenteHTML.textContent = ponente.nombre
                    ponenteHTML.dataset.ponenteId = ponente.id
                    ponenteHTML.onclick = seleccionarPonente;

                    // Añadir al DOM
                    listadoPonentes.appendChild(ponenteHTML)
                });
            } else {
                const noResultados = document.createElement('P')
                noResultados.classList.add('listado-ponentes__no-resultado')
                noResultados.textContent = 'No hay resultados para tu búsqueda'
                listadoPonentes.appendChild(noResultados)
            }

        }

        function seleccionarPonente(e) {
            const ponente = e.target; // -> en ponente, guarda todo el elemento li
            console.log(ponente);

            // Remover la clase previa
            const ponentePrevioSeleccionado = document.querySelector('.listado-ponentes__ponente--seleccionado')

            if (ponentePrevioSeleccionado) {
                ponentePrevioSeleccionado.classList.remove('listado-ponentes__ponente--seleccionado')
            }

            ponente.classList.add('listado-ponentes__ponente--seleccionado');

            ponenteHidden.value = ponente.dataset.ponenteId
            console.log(ponenteHidden);

        }
    }
})();