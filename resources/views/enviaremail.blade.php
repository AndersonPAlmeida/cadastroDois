@extends('layout.app', ["current" => "email"])

@section('body')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-4">
        <form id="formEmail">
            <div class="form-group">
                <input type="hidden" id="id" class="form-control">  
                <label for="email">Informe o email para ser enviada a mensagem</label>
                <input type="email" id="email" class="form-control" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label for="assunto">Informe o assunto</label>
                <input type="text" id="assunto" class="form-control" placeholder="Lorem">
            </div>

            <div class="form-group">
                <label for="mensagem">Informe a Mensagem</label>
                <textarea class="form-control" id="mensagem" rows="3"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Enviar</button>    
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="alert alert-warning alert-dismissible fade show oculto" id="msg" role="alert">
        <strong>E-mail</strong> Enviado Com Sucesso!!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': "{{csrf_token()}}"
    }
});

$("#formEmail").submit(function(event) {
    event.preventDefault();
    $('#msg').addClass('oculto');
    //    Enviar E-mail
    conj = {
        email : $('#email').val(),
        assunto : $('#assunto').val(),
        mensagem : $('#mensagem').val()
    };

    $.post("/api/enviando", conj, function(data) {
        if(data == 200){
           iziToast.success({
               title: 'Email',
               message: 'Enviado com Sucesso!!!',
           });
           limpar();            
        }
        else{
            iziToast.error({
               title: 'Email',
               message: 'Falha ao Enviar!!!',
            });
        }
    });
});

function limpar(){
    $('#email').val('');
    $('#assunto').val('');
    $('#mensagem').val('');
}
</script>
@endsection