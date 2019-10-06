@extends('layout.app', ["current" => "buscarprodutos"])

@section('body')
<div class="card border espaco">
    <h3 class="card-header card-title text-center">Busca de produtos</h3>

    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <label for="">Código do Produto</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="buscarProduto" placeholder="Código do Produto">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-info" onclick="buscarProduto()">JSON</button>
                    <button type="button" class="btn btn-warning" onclick="buscarXML()">XML</button>
                </div>
            </div>
        </div>

        <div>
            <label>Produto em Json: </label><label id="verJson"></label>
            <br>
            <label>Produto em XML: </label><label id="verXml"></label>
        </div>

        <table id="tabelaProdutos" class="table table-ordered table-hover oculto">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Estoque</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
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

function buscarProduto() {
    var cod = $('#buscarProduto').val();
    
    $.getJSON('/api/produtos/'+cod, function(produto) {        
        $('#verJson').text(JSON.stringify(produto));
    });
}

function buscarXML() {
    var cod = $('#buscarProduto').val();
    
    $.get('/api/produtos/xml/'+cod, function(produto) {        
        $('#verXml').text(produto);
    });
}
</script>
@endsection