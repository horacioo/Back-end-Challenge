<h1>Criar novo produto</h1>
<form id="formCadastroDeProduto" enctype="multipart/form-data">
    <input type="hidden" id="url" value="{{ route('CadastraProduto') }}">
    <input type="hidden" id="urlLista" value="{{ route('ListaDeProduto') }}">
    <input type="hidden" id="urlAtualiza" value="{{ route('AtualizarProduto') }}">
    <input type="hidden" id="urlGeral" value="{{ config('app.url') }}">

    <p> <input type="file" id="arquivo" name="arquivo"></p>
    <p><label for="produto">Produto<input type="text" id="produto"></label></p>
    <p><label for="valor">Valor<input type="text" id="valor"></label></p>
    <p><input type="submit" value="Salvar"></p>
</form>


<h2>Lista de produtos</h2>
<table id="listaDeProdutos"></table>



<div id="update">
    <h2>Editar Produtos</h2>
    <form id="formDeAtualizacao" enctype="multipart/form-data">
        <img id="imgAtualizacao" style="width: 15vw; height=auto;">
        <p><input type="file" id="arquivoUpdate" name="arquivoUpdate"></p>
        <input type="hidden" id="idUpdate">
        <p><label for="produtoUpdate">Produto<input type="text" id="produtoUpdate"></label></p>
        <p><label for="valorUpdate">Valor<input type="text" id="valorUpdate"></label></p>
        <p><input type="submit" value="Salvar"></p>
    </form>
</div>



<script src="{{ asset('/pastelaria/js/axios.js') }}"></script>
<script src="{{ asset('/pastelaria/js/jquery.min.js') }}"></script>
<script src="{{ asset('/pastelaria/js/vitrine/lista.js') }}"></script>
<script> Lista(1); </script>
<script src="{{ asset('/pastelaria/js/administracao/cadastro.js') }}"></script>
<script src="{{ asset('/pastelaria/js/administracao/atualizacao.js') }}"></script>
