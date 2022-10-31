
class productoService {

    constructor() {

    }

    async postProductos(url) {
        console.log(url);
        const response = await fetch(url, {
            method: 'GET',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            }

        });

        return response.json();
    }

    async postEliminarPro(url, data) {
        console.log(data);
        const response = await fetch(url, {
            method: 'POST',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        return response.json();
    }


    async postInsertarPro(url, proc, tipo, data) {
        console.log(url);
        const response = await fetch(url + "?producto=" + proc + "&tipo=" + tipo, {
            method: 'POST',
            cache: 'no-cache',
            credentials: 'same-origin',
            contentType: false,
            processData: false,
            headers: {

            },
            body: data
        });

        return response.json();
    }



    async postActualizarPro(url,id, proc, tipo, data) {
        console.log(url);
        const response = await fetch(url + "?producto=" + proc + "&tipo=" + tipo + "&id="+id, {
            method: 'POST',
            cache: 'no-cache',
            credentials: 'same-origin',
            contentType: false,
            processData: false,
            headers: {

            },
            body: data
        });

        return response;
    }
   
}