var cliente;
let produtos = [];
jQuery('#finalizarVenda').hide();


if(window.localStorage.getItem('produtosSelecionados')) { jQuery('#finalizarVenda').show();}

/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
jQuery('body').on('click', '.comprarProduto', function () {
    
    var idProduto = jQuery(this).siblings('.idDoProduto').text();

    cliente = window.localStorage.getItem('clienteId');
    if (typeof cliente !== 'undefined' && cliente !== null) {

        produtos.push(idProduto);
        console.log("linha 20  " + idProduto);
        /**************************************************************************/
        if (window.localStorage.getItem('produtosSelecionados')) {
            var dados = window.localStorage.getItem('produtosSelecionados');
            for (var info of JSON.parse(dados)) { produtos.push(info); }
        }
        
        console.log("=>");console.log(produtos);console.log("<=");
        var valoresUnicos = tornarUnicos(produtos);
        for (var elemento of valoresUnicos) { /*produtos.push(elemento);*/  }

        /**************************************************************************/
        window.localStorage.setItem("produtosSelecionados", JSON.stringify(valoresUnicos));
        /**************************************************************************/
        jQuery(this).text("produto Selecionado");
        jQuery('#finalizarVenda').show();
    } else {
        var urlCadastroCliente = jQuery('#urlCadastroCliente').val();
        window.location.href = urlCadastroCliente;
    }
    produtos = [];
});
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
















/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
jQuery('body').on('click', '#finalizarVenda', function () {
    var url = jQuery('#urlCadastroPedido').val();
    const dataToSend = new FormData();
    dataToSend.append("produto_id", window.localStorage.getItem('produtosSelecionados'));
    dataToSend.append("cliente_id", window.localStorage.getItem('clienteId'));

    axios.post(url, dataToSend, {
        headers: { 'Content-Type': 'application/json' }
    })
        .then(function (response) {
            console.log(response.data);
            if (response.data.success == true) {
                alert("Pedido fechado com sucesso!!");
                window.localStorage.removeItem('produtosSelecionados');
                jQuery('.comprarProduto').text("Comprar");
                jQuery('#finalizarVenda').hide();
            }
            Lista(2);
            CarrinhoDeCompras();
        })
        .catch(function (error) {
            console.error(error);
        });
});
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/













/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
function tornarUnicos(arr) {

    var valoresUnicos = [];
    for (var i = 0; i < arr.length; i++) {
        if (valoresUnicos.indexOf(arr[i]) === -1) {
            valoresUnicos.push(arr[i]);
        }
    }
    return valoresUnicos;
}
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/



