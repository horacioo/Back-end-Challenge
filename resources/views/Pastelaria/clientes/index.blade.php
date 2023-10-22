<form action="" id="AtualizarCliente">
    <input type="hidden" id="urlGeral" value="{{ config('app.url') }}">
    <input type="hidden" id="urlUpdate" value="{{ route('minhaContaUpdate') }}">
    <input type="hidden" id="urlDeRetorno" value="{{ route('vitrineDaPastelaria') }}">


    <p><label for="">Nome:<input type="text" required id="nome"></label></p>
    <p><label for="">Email:<input type="email" required id="email"></label></p>
    <p><label for="">Data de Nascimento<input type="date" id="nascimento"></label></p>
    <p><label for="">Endereço<input type="text" id="endereco"></label></p>
    <p><label for="">Complemento<input type="text" id="complemento"></label></p>
    <p><label for="">Bairro<input type="text" id="bairro"></label></p>
    <p><label for="">Cep<input type="text" id="cep"></label></p>
    <input type="submit" value="Editar/Salvar">
</form>

<button id="deletarConta">encerrar conta</button>

<script src="{{ asset('/pastelaria/js/axios.js') }}?v=<?php echo microtime(); ?>)"></script>
<script src="{{ asset('/pastelaria/js/jquery.min.js') }}?v=<?php echo microtime(); ?>)"></script>
<script src="{{ asset('/pastelaria/js/clientes/minhaConta.js') }}?v=<?php echo microtime(); ?>)"></script>
