CarrinhoDeCompras();

function CarrinhoDeCompras() {
    console.clear();
    var url = jQuery("#carrinhoDeCompras").val();
    var clienteId = window.localStorage.getItem('clienteId');

    axios.get(url, {
        params: {
            cliente_id: clienteId
        },
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function (response) {

        var pedidos = response.data.pedidos;
        var compras = response.data.pedidos;
        var itens = response.data.itens;
        /*****************************************************************************/
        /*****************************************************************************/
        /*****************************************************************************/

        jQuery("#carrinho").children().remove();

        for (var key in pedidos) {
            if (pedidos.hasOwnProperty(key)) {
                var pedido = pedidos[key];

                var comprasDetail = "";

                for (var pedido in itens) {
                    var valor = 0; // Inicialize a variável valor com 0
                    if (itens.hasOwnProperty(pedido)) {
                        var comprasDetail = "<ul>";
                        var produtos = itens[pedido].produto;

                        for (var i = 0; i < produtos.length; i++) {
                            var produto = produtos[i];
                            comprasDetail += "<li>" + produto.produto + " | " + produto.valor + " - <span class='ids'>" + produto.id + "-" + pedido + "</span>  <b class='delete'>deletar</b></li>";
                            valor += parseFloat(produto.valor); // Use parseFloat para somar valores em ponto flutuante
                        }
                        comprasDetail += "<li>Total: R$"+valor+"</li>";
                    }

                    jQuery("#carrinho").append("<li id='" + pedido + "'>pedido nº " + pedido + "  " + comprasDetail + " </li>");
                }
            }
        }
        /*****************************************************************************/
        /*****************************************************************************/
        /*****************************************************************************/


    }).catch(function (error) {
        console.error(error);
    });


}



jQuery('body').on('click', '.delete', function () {
    var dados = jQuery(this).siblings('.ids').text();
    var url = jQuery('#urlGeral').val();
    urlComId = url + "api/pastelaria/carrinho/excluir/" + dados;

    axios.delete(urlComId).then(function (response) {
        CarrinhoDeCompras();
    });

})




function tornarUnicos(arr) {

    var valoresUnicos = [];
    for (var i = 0; i < arr.length; i++) {
        if (valoresUnicos.indexOf(arr[i]) === -1) {
            valoresUnicos.push(arr[i]);
        }
    }
    return valoresUnicos;
}