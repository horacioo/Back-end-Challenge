
<input type="hidden" id="urlLista" value="{{ route('ListaDeProduto') }}">
<input type="hidden" id="urlCadastroCliente" value="{{ route('cadastraCliente') }}">
<input type="hidden" id="urlCadastroPedido" value="{{ route('cadastrarPedido') }}">
<input type="hidden" id="carrinhoDeCompras" value="{{ route('carrinhoDeCompras') }}">
<input type="hidden" id="urlGeral" value="{{ config('app.url') }}">


<table id="listaDeProdutos"></table>

<button id="finalizarVenda">Finalizar Venda</button>

<h2>Meu Carrinho de compras</h2>

<ul id="carrinho"></ul>

<script src="{{ asset('/pastelaria/js/axios.js') }}"></script>
<script src="{{ asset('/pastelaria/js/jquery.min.js') }}"></script>
<script src="{{ asset('/pastelaria/js/loja/adicionarACarrinho.js') }}"></script>
<script src="{{ asset('/pastelaria/js/vitrine/lista.js') }}"></script>
<script src="{{ asset('/pastelaria/js/vitrine/Carrinho.js') }}?v=<?php echo microtime(); ?>"></script>

<script> Lista(2);</script>