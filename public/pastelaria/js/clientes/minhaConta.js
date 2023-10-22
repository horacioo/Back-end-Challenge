jQuery('document').ready(function () {

    MinhaConta();

    function MinhaConta() {
        var url = jQuery('#urlGeral').val();
        urlComId = url + "api/pastelaria/adm/clientes/conta/" + window.localStorage.clienteId;
        axios.get(urlComId).then(function (response) {
            $dados = response.data.dados;
            jQuery('#nome').val($dados.nome);
            jQuery('#email').val($dados.email);
            jQuery('#nascimento').val($dados.data_de_nascimento);
            jQuery('#endereco').val($dados.endereco);
            jQuery('#complemento').val($dados.complemento);
            jQuery('#bairro').val($dados.bairro);
            jQuery('#cep').val($dados.cep);
        });
    }



    /*****************************************************************************/
    jQuery("#AtualizarCliente").submit(function (e) {
        e.preventDefault();
        const dataToSend = new FormData();
        dataToSend.append("id", window.localStorage.getItem('clienteId'));
        dataToSend.append("nome", jQuery("#nome").val());
        dataToSend.append("email", jQuery("#email").val());
        dataToSend.append("nascimento", jQuery("#nascimento").val());
        dataToSend.append("endereco", jQuery("#endereco").val());
        dataToSend.append("complemento", jQuery("#complemento").val());
        dataToSend.append("bairro", jQuery("#bairro").val());
        dataToSend.append("cep", jQuery("#cep").val());


        var url = jQuery("#urlUpdate").val();
        axios.post(url, dataToSend, { headers: { 'Content-Type': 'application/json', } })
            .then(function (response) {
                if (response.data.success == true) {
                    MinhaConta();
                    console.log("tudo certo e dados atualizados com seucesso");
                }
                else { alert("problemas ao atualizar, reveja os dados e tente novamente"); }
            })
    });
    /*
    ****************************************************************************/








    /*****************************************************************************/
    jQuery("#deletarConta").click(function (e) {
        var url = jQuery("#urlUpdate").val();
        /***********/
        var url = jQuery('#urlGeral').val();
        urlComId = url + "api/pastelaria/adm/clientes/conta/delete/" + window.localStorage.getItem('clienteId');
        //http://localhost/Back-end-Challenge/pastelaria/public/api/pastelaria/adm/clientes/conta/delete/1
        ///<input type="hidden" id="teste" value="http://localhost/Back-end-Challenge/pastelaria/public/api/pastelaria/adm/clientes/conta/delete">
        /***********/
        console.log(urlComId);

        axios.delete(urlComId)
            .then(function (response) {
                if (response.data.success == true) 
                {
                    console.log("tudo certo e dados atualizados com seucesso");
                    window.localStorage.removeItem("clienteId");
                    window.location.href = jQuery('#urlDeRetorno').val();
                }
                else { console.log("problemas ao atualizar, reveja os dados e tente novamente"); }
            })
    });
    /*****************************************************************************/




});