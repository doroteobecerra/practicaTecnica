

    if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href)
    }

    document.querySelector('#departamentos').addEventListener('change', event => {
        fetch('clases.php?id_depto='+event.target.value)
        .then(res => {
            if(!res.ok){
                throw new Error('Hubo un error en la respuesta');
            }
            return res.json();
        })
        .then(datos => {
            let html = '<option value="">Seleccionar una clase</option>';
            if(datos.data.length > 0) {
                for (let i = 0; i < datos.data.length; i++) {
                    html += `<option value="${datos.data[i].id}">${datos.data[i].nombre}</option>`;
                }
            }
            document.querySelector('#clases').innerHTML = html;
        })
        .catch(error => {
            console.error('Ocurrió un error '+error);
        });
    });
    
    document.querySelector('#clases').addEventListener('change', event => {
        fetch('familias.php?id_clase='+event.target.value)
        .then(res => {
            if(!res.ok){
                throw new Error('Hubo un error en la respuesta');
            }
            return res.json();
        })
        .then(datos => {
            let html = '<option value="">Seleccionar una familia</option>';
            if(datos.data.length > 0) {
                for (let i = 0; i < datos.data.length; i++) {
                    html += `<option value="${datos.data[i].id}">${datos.data[i].nombre}</option>`;
                }
            }
            document.querySelector('#familias').innerHTML = html;
        })
        .catch(error => {
            console.error('Ocurrió un error '+error);
        });
    })
    
    

    //fuction para obtener la fecha actual
    function getDate(){
        let hoy = new Date()
        let dia = hoy.getDate()
        let mes = hoy.getMonth() + 1;
        let year = hoy.getFullYear();
        let formato = `${year}-${mes}-${dia}`
        
        return formato
    }

    let fechaAlta = document.querySelector('#alta')

    fechaAlta.value = getDate()


    
