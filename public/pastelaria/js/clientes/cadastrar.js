jQuery('document').ready(function () {

    jQuery("#CadastrarCliente").submit(function (e) {
        e.preventDefault();

        var url = jQuery("#urlcadastrarCliente").val();

        const dataToSend = new FormData();
        dataToSend.append("nome", jQuery("#nome").val());
        dataToSend.append("email", jQuery("#email").val());
        dataToSend.append("nascimento", jQuery("#nascimento").val());
        dataToSend.append("endereco", jQuery("#endereco").val());
        dataToSend.append("complemento", jQuery("#complemento").val());
        dataToSend.append("bairro", jQuery("#bairro").val());
        dataToSend.append("cep", jQuery("#cep").val());


        axios.post(url, dataToSend, {
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response) {
            console.log(response.data.success);
            /*******************************************/
            if (response.data.success == true) { 
                alert("deu certo"); 
                window.localStorage.setItem('email',jQuery("#email").val());
                window.localStorage.setItem('clienteId',response.data.cliente);
                window.history.back(); 
            }
            else { alert("deu erro, verifique seu email"); }
            /*******************************************/
            jQuery("#email").focus();
        })
    });


});
