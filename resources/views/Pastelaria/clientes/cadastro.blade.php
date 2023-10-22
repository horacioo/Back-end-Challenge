<form action="" id="CadastrarCliente">
    <input type="hidden" id="urlGeral" value="{{ config('app.url') }}">
    <input type="hidden" id="urlcadastrarCliente" value="{{ route('cadastrarCliente') }}">
    

    <h1>Crie sua conta</h1>
 
    
    <p><label for="">Nome:<input type="text" required id="nome"></label></p>
    <p><label for="">Email:<input type="email" required id="email"></label></p>
    <p><label for="">Data de Nascimento<input type="date" id="nascimento"></label></p>
    <p><label for="">Endereço<input type="text" id="endereco"></label></p>
    <p><label for="">Complemento<input type="text" id="complemento"></label></p>
    <p><label for="">Bairro<input type="text" id="bairro"></label></p>
    <p><label for="">Cep<input type="text" id="cep"></label></p>
    <input type="submit" value="salvar">
</form>


<script src="{{ asset('/pastelaria/js/axios.js') }}"></script>
<script src="{{ asset('/pastelaria/js/jquery.min.js') }}"></script>
<script src="{{ asset('/pastelaria/js/clientes/cadastrar.js') }}"></script>