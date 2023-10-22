/************************************************************************************************************/
jQuery('body').on('click', '.editaProduto', function () {
    jQuery('#imgAtualizacao').show();
    var id = jQuery(this).siblings('.idDoProduto').text();
    produto = jQuery(this).siblings('.produto').text();
    preco = jQuery(this).siblings('.preco').text();
    foto = jQuery(this).siblings('.img').children('picture').children('img').attr('src');
    id = jQuery(this).siblings('.idDoProduto').text();

    jQuery("#produtoUpdate").val(produto);
    jQuery("#valorUpdate").val(preco);
    jQuery("#idUpdate").val(id);

    var imagem = jQuery('#imgAtualizacao');
    imagem.attr('src', foto);

    console.log('url da foto é ' + foto + " --" + preco);
});
/************************************************************************************************************/





/************************************************************************************************************/
jQuery("#formDeAtualizacao").submit(function (e) {
    e.preventDefault();

    var url = jQuery('#urlAtualiza').val();
    var arquivo = jQuery('#arquivoUpdate')[0].files[0];

    const dataToSend = new FormData();
    dataToSend.append("produto", jQuery("#produtoUpdate").val());
    dataToSend.append("valor", jQuery("#valorUpdate").val());
    dataToSend.append("id", jQuery("#idUpdate").val());
    dataToSend.append('foto', arquivo);
    /*************************************************************/

    console.clear();
    console.log(dataToSend);

    axios.post(url, dataToSend, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(function (response) {
        //alert("cadastro inserido com sucesso");
        Lista(1);

        jQuery('#arquivoUpdate').val('');
        jQuery("#produtoUpdate").val('');
        jQuery("#idUpdate").val('');
        jQuery("#valorUpdate").val('');
        jQuery('#imgAtualizacao').hide();
    });
});

/*****************************************************************/



jQuery(document).ready(function () {
    const imagemExibida = $('#imgAtualizacao');
    const selecionarImagem = $('#arquivoUpdate');
    selecionarImagem.on('change', function () {
        const arquivo = selecionarImagem[0].files[0];

        if (arquivo) {
            const leitor = new FileReader();
            leitor.onload = function (e) {
                imagemExibida.attr('src', e.target.result);
            };
            leitor.readAsDataURL(arquivo);
        }
    });
});


/*******************************************************************/

jQuery("#imgAtualizacao").click(function () {
    jQuery('#arquivoUpdate').click();
});