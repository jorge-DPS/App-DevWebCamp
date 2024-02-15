(function () {
    const horas = document.querySelector('#horas');

    if (horas) {

        const categoria = document.querySelector('[name="categoria_id"]');
        const dias = document.querySelectorAll('[name="dia"]');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');

        categoria.addEventListener('change', terminoBusqueda);

        dias.forEach((dia) => dia.addEventListener('change', terminoBusqueda));

        //console.log(categoria.value);

        let busqueda = {
            categoria_id: +categoria.value || '',
            dia: +inputHiddenDia.value || '',
        };

        if (!Object.values(busqueda).includes('')) {
            //en la siguiente linea de codigo usamos iffi par que podamos usar el asinc y el await sin tener que invocar una funcion
            (async () => {
                await buscarEventos();

                const id = inputHiddenHora.value

                // Resaltar la hora actual
                const horaSeleccionada = document.querySelector(`[data-hora-id="${id}"]`)

                horaSeleccionada.classList.remove('horas__hora--deshabilitada')
                horaSeleccionada.classList.add('horas__hora--seleccionada')
                //console.log('una funcion');
                horaSeleccionada.onclick = seleccionarHora;
            })()
        }

        //console.log(busqueda)

        function terminoBusqueda(e) {
            // console.log(e.target); // -> aqui el .vlaue trae su valor del ojeto clickeados
            // busqueda.dia = e.target.value; // -> es lo mismo
            busqueda[e.target.name] = e.target.value;

            // Reiniciar los campos ocultos y el selectpr de horas
            inputHiddenHora.value = '';
            inputHiddenDia.value = '';
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');

            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada')
            }

            if (Object.values(busqueda).includes('')) {
                // console.log('el objeto: ', busqueda, ' aun tiene algun campo vacio');
                return;
            }

            // busqueda['categoria_id'] = 'jorge_cat'
            // busqueda['dia'] = 'jorge_dia'
            // console.log(busqueda, 'aqui el obj busqueda');
            buscarEventos();
        }

        async function buscarEventos() {
            // console.log(busqueda, 'ya lleno todo el objeto de busqueda');
            const { dia, categoria_id } = busqueda;
            const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;

            // respuesta del lado del servidor
            const resultado = await fetch(url);
            const eventos = await resultado.json();
            // console.log(eventos);
            obtenerHorasDisponibles(eventos);
        }

        function obtenerHorasDisponibles(eventos) {
            // Reiniciar las horas
            const listadoHoras = document.querySelectorAll('#horas li'); //convertir a array un NodeArray
            listadoHoras.forEach((li) => li.classList.add('horas__hora--deshabilitada'));

            // Comprobar eventos ya tomados y quitar la variable de deshabilitado
            const horasTomadas = eventos.map((evento) => evento.hora_id); // -> retorna solo la hora_id en un arreglo
            //console.log(horasTomadas, 'aqui las horas tomadas');
            const listadoHorasArray = Array.from(listadoHoras); //-> lo convierte a NodeList
            /* console.log(listadoHorasArray.forEach(function (li) {
                //console.log(li.dataset.horaId);
            }));
 */
            const resultado = listadoHorasArray.filter(function (li) {
                return !horasTomadas.includes(li.dataset.horaId);
            }); // -> retorna todos los que son distintos a las horasTomadas
            // console.log(resultado);
            resultado.forEach((li) => li.classList.remove('horas__hora--deshabilitada'));

            // agragamos el evento listener solo a los componentes que no tengan la calse .horas__hora--deshabilitada
            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitada)');
            horasDisponibles.forEach((hora) => hora.addEventListener('click', seleccionarHora));
        }

        function seleccionarHora(e) {
            // quitar la seleccion previa, si existe un nuevo click para seleccionar
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }
            // Agregar clase  de seleccioando
            e.target.classList.add('horas__hora--seleccionada');
            inputHiddenHora.value = e.target.dataset.horaId;

            // Llenar el campo oculta de Dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value
        }
    }
})();
