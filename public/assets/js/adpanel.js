function requisitaPagina(url){
    document.getElementById('conteudo').innerHTML = ''
    //inclusao de gif de loading
    //if(!document.getElementById('loading')){
    //    let imgLoading = document.createElement('img')
    //    imgLoading.src = '../public/assets/img/loading.gif'
    //    imgLoading.id = 'loading'
    //    imgLoading.className = 'rounded mx-auto d-block'
    //
    //    document.getElementById('counteudo').appendChild(imgLoading)
    //}

    let ajax = new XMLHttpRequest();

    ajax.open('GET', url)

    ajax.onreadystatechange = () => {
        if(ajax.readyState = 4 && ajax.status == 200){
            document.getElementById('conteudo').innerHTML = ajax.responseText
        }

        if (ajax.readyState == 4 && ajax.status == 404){
                document.getElementById('conteudo').innerHTML = 'O recurso solicitado não foi encontrado. Erro: ' + ajax.status
                console.log('Requisição finalizada, porém o recurso solicitado não foi encontrado. Erro: ' + ajax.status)
                //document.getElementById('loading').remove()

            }
    ajax.send()
    }
}
