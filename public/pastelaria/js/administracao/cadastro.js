jQuery('document').ready(function(){

    jQuery("#formCadastroDeProduto").submit(function(e){
        e.preventDefault();
        
        var url = jQuery("#url").val();

        var arquivo = jQuery('#arquivo')[0].files[0];

        const dataToSend = new FormData();
        dataToSend.append("produto", jQuery("#produto").val());
        dataToSend.append("valor", jQuery("#valor").val());
        dataToSend.append("descricao", jQuery("#descricao").val());
        dataToSend.append('arquivo', arquivo);

        console.log(arquivo);

        axios.post(url, dataToSend, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(function (response) {
            //alert("cadastro inserido com sucesso");
            Lista(1);
        })
    });
    

});
