var produto;
var preco;
var foto;
var id;

var styleElement = document.createElement('style');

styleElement.innerHTML = `
#listaDeProdutos tr td{
    border:1px solid lightgrey;
    padding:1vw;
    text-transform:capitalize;
}
#listaDeProdutos tr td picture{
    width:100px; 
    height:100px; 
    overflow:hidden;
    display:block;
    position:relative
}



#listaDeProdutos tr td picture img{
   width:102%;
   position:absolute;
   left:50%;
   top:50%;
   transform:translate(-50%,-50%)
}
`;

document.head.appendChild(styleElement);






/************************************************************************************************************/
function Lista(valor = 0) {
    jQuery("#listaDeProdutos").children().remove();
    var url = jQuery('#urlLista').val();
    var complemento;

    axios.get(url).then(function (response) {



        var dados = response.data.produtos;
        console.log(dados);
        for (var x of dados) {


            var informacaoTexto = VerificaSeFoiComprado(x.id); console.log(x.id);

            if (valor == 1) {
                complemento = "<td class='idDoProduto' style=\"display: none;\">" + x.id + "</td>"
                    + "<td class=\"editaProduto\">Edit</td>"
                    + "<td class=\"deletarProduto\">deletar</td>";
            } else if (valor == 2) {
                complemento = "<td class='idDoProduto'  style=\"display: none;\">" + x.id + "</td>"
                    + "<td id='info_" + x.id + "'  class=\"comprarProduto\">"+informacaoTexto+"  </td>"
            }
            else { complemento = ""; }

            jQuery("#listaDeProdutos").append("<tr>"
                + "<td class='produto'>" + x.produto + "</td>"
                + " <td class='preco'>" + x.valor + "</td>"
                + " <td class='img'><picture><img src='" + x.fotoUrl + "'></picture></td>"
                + complemento
                + "</tr>");
        }





        /**********************************************************************************/
        // Suponha que a variável 'response' contenha a resposta da API
        var cliente = window.localStorage.getItem('clienteId');
        var produtos = response.data.produtos;

        produtos.forEach(function (produto) {
            //console.log('Produto: ' + produto.produto);
            //console.log('Valor: ' + produto.valor);
            /************************************/
            if (produto.pedidos.length > 0) {
                console.log('Pedidos:');
                produto.pedidos.forEach(function (pedido) {
                    console.log(pedido.cliente);


                });
            } else {
                console.log('Nenhum pedido para este produto.');
            }
            /************************************/
            console.log('---'); // Separação entre produtos
        });

        /**********************************************************************************/



    }).catch(function (error) {

    });
}
/************************************************************************************************************/







/************************************************************************************************************/
jQuery('body').on('click', '.deletarProduto', function () {
    var id = jQuery(this).siblings('.idDoProduto').text();
    Delete(id);
});
/************************************************************************************************************/




/************************************************************************************************************/
function Delete(id) {
    var url = jQuery('#urlGeral').val();
    urlComId = url + "api/pastelaria/adm/apagar/" + id;
    axios.delete(urlComId).then(function (response) { Lista(1) });
}
/************************************************************************************************************/





/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
function VerificaSeFoiComprado(x) 
{
    var resposta = "Comprar";
    if (window.localStorage.getItem('produtosSelecionados')) {

        var dados = window.localStorage.getItem('produtosSelecionados');
        for (var list of JSON.parse(dados)) 
        {  
            if(x == list){ resposta= "Produto Selecionado ";  } 
        }
    }
    return resposta;
}
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/
/*****************************************************************************/