@extends('layouts.admin')
<style>
    .hidden {
        display: none;
    }

    .promo {
        border: solid;
        border-width: thin;
        border-radius: 10px;
        padding: 20px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif


            {{-- START TABELA MEUS SORTEIOS --}}
            <div class="container mt-3" style="max-width:100%;min-height:100%;">
                <div class="table-wrapper ">
                    <div class="table-title">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-center">
                                <h2>Meus <b>Sorteios</b></h2>

                                {{-- form auxiliar para adicionar imagens na rifa --}}
                                <form class="d-none" action="{{ route('addFoto') }}" id="form-foto" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" id="rifa-id" name="idRifa">
                                    <input type="file" id="input-add-foto" accept="image/png,image/jpeg,image/jpg"
                                        multiple name="fotos[]">
                                </form>
                            </div>
                            <div class="row-12 mb-3 d-flex" style="justify-content: space-between;">

                                <form method="GET" class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" name="search"
                                        placeholder="Pesquisar" aria-label="Search">
                                    <button class="btn btn-outline-secondary my-2 my-sm-0 border border-secondary text-dark"
                                        type="submit">Buscar</button>
                                </form>


                                <a href="#addEmployeeModal" class="btn btn-success d-flex align-items-center"
                                    data-toggle="modal"
                                    style="font-size:30px;width: 100px;justify-content: center;height: 50px;margin-left: 5px;"><i
                                        class="bi bi-plus-square "></i></a>
                            </div>
                        </div>
                        @include('sweepstakes.menu-modal')
                        {{-- START TABELA MEUS SORTEIOS --}}
                        <!-- Add Modal HTML -->
                        <div id="addEmployeeModal" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h4 class="modal-title">Nova Rifa</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('addProduct') }}" method="POST"
                                            enctype="multipart/form-data">

                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Modo de Jogo</label>
                                                        <select name="modo_de_jogo" class="form-control" required>
                                                            <option value="numeros">Números</option>
                                                            <option value="fazendinha-completa">Fazendinha - Grupo Completo
                                                            </option>
                                                            <option value="fazendinha-meio">Fazendinha - Meio Grupo
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Gateway de Pagamento</label>
                                                        <select name="gateway" class="form-control" required>
                                                            <option value="mp">Mercado Pago</option>
                                                            <option value="paggue">Paggue</option>
                                                            <option value="asaas">ASAAS</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="exampleInputEmail1">Valor</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$:</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price"
                                                            placeholder="Exemplo: 10,00" maxlength="6" id="price"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Exemplo: Fusca ano 88" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sub Titulo</label>
                                                        <input type="text" class="form-control" id="subname"
                                                            name="subname" required>
                                                    </div>
                                                </div>

                                                <div class="row d-flex">
                                                    <div class="col-md-6">
                                                        <label>Qtd de zeros</label>
                                                        <input type="number" name="qtd_zeros" class="form-control">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1">Até 3 Imagens</label>
                                                            <input type="file" class="form-control-file"
                                                                name="images[]" accept="image/*" multiple required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2 mb-2">
                                                <div class="col-md-6">
                                                    <label>Qtd mínima de compra</label>
                                                    <input type="number" class="form-control" name="minimo"
                                                        min="1" max="99999" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Qtd máxima de compra</label>
                                                    <input type="number" class="form-control" name="maximo"
                                                        min="1" max="99999" required>
                                                </div>
                                            </div>

                                            <div class="row mt-2 mb-2">
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1">Quantidade de números</label>
                                                    <input type="number" class="form-control" name="numbers"
                                                        min="1" max="1000000" placeholder="Exemplo: 100"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Tempo de expiração (min)</label>
                                                    <input type="number" class="form-control" name="expiracao"
                                                        min="0" placeholder="Minutos" required>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Descrição do Sorteio</label>
                                                <textarea class="form-control" id="summernote" name="description" rows="10" style="min-height: 200px;"
                                                    required></textarea>
                                            </div>

                                            <hr>
                                            <center>
                                                <h4>Prêmios</h4>
                                            </center>

                                            <div class="row mb-4">
                                                <div class="col-md-6 mt-2">
                                                    <label>1º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio1" required>
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>2º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio2">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>3º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio3">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>4º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio4">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>5º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio5">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>6º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio6">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>7º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio7">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>8º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio8">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>9º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio9">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label>10º Prêmio</label>
                                                    <input type="text" class="form-control" name="premio10">
                                                </div>
                                            </div>
                                            <button type="submit" class="criar btn btn-success">Criar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Duplicar Rifa --}}
                        <div id="duplicar-modal" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h4 class="modal-title">Duplicar Rifa</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('duplicarProduct') }}" method="POST"
                                            enctype="multipart/form-data">

                                            <input type="hidden" name="product" id="id-duplicar">
                                            <center>
                                                <h3 id="titulo-duplicar"></h3>
                                            </center>
                                            {{ csrf_field() }}

                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Exemplo: Fusca ano 88" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1">Valor</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$:</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price"
                                                            placeholder="Exemplo: 10,00" maxlength="6" id="price"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="criar btn btn-success">Criar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function formatarMoeda() {
                                var elemento = document.getElementById('price');
                                var valor = elemento.value;


                                valor = valor + '';
                                valor = parseInt(valor.replace(/[\D]+/g, ''));
                                valor = valor + '';
                                valor = valor.replace(/([0-9]{2})$/g, ",$1");

                                if (valor.length > 6) {
                                    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                                }

                                elemento.value = valor;
                                if (valor == 'NaN') elemento.value = '';

                            }
                        </script>
                        <!-- Modal Editar Rifa -->

                        {{-- @foreach ($rifas as $key => $product)
                            <div id="modal_editar_rifa{{ $product->id }}" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <form action="{{ route('update', ['id' => $product->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-content">
                                            @method('PUT')
                                            {{ csrf_field() }}

                                            <div class="modal-body">

                                                <div class="container mt-3">
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>

                                                    <h2>Editar Rifa</h2>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <nav>
                                                                <ul class="nav nav-tabs" id="myTab" role="tablist"
                                                                    style="font-size: 12px;">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" id="geral-tab"
                                                                            data-toggle="tab"
                                                                            href="#geral{{ $product->id }}"
                                                                            role="tab" aria-controls="geral"
                                                                            aria-selected="true">Geral</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="premios-tab"
                                                                            data-toggle="tab"
                                                                            href="#premios{{ $product->id }}"
                                                                            role="tab" aria-controls="premios"
                                                                            aria-selected="true">Prêmios</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="ajustes-tab"
                                                                            data-toggle="tab"
                                                                            href="#ajustes{{ $product->id }}"
                                                                            role="tab" aria-controls="ajustes"
                                                                            aria-selected="false">Ajustes</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="promocao-tab"
                                                                            data-toggle="tab"
                                                                            href="#promocao{{ $product->id }}"
                                                                            role="tab" aria-controls="promocao"
                                                                            aria-selected="false">Promoção</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="fotos-tab"
                                                                            data-toggle="tab"
                                                                            href="#fotos{{ $product->id }}"
                                                                            role="tab" aria-controls="fotos"
                                                                            aria-selected="false">Fotos</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="compraAuto-tab"
                                                                            data-toggle="tab"
                                                                            href="#compraAuto{{ $product->id }}"
                                                                            role="tab" aria-controls="compraAuto"
                                                                            aria-selected="false">Compra Automática</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="cotapremiada-tab"
                                                                            data-toggle="tab"
                                                                            href="#cotapremiada{{ $product->id }}"
                                                                            role="tab" aria-controls="compraAuto"
                                                                            aria-selected="false">Cotas Premiadas</a>
                                                                    </li>
                                                                </ul>
                                                            </nav>

                                                            <div class="tab-content" id="myTabContent">
                                                                <div class="tab-pane fade show active"
                                                                    id="geral{{ $product->id }}" role="tabpanel"
                                                                    aria-labelledby="geral-tab">
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-6">
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $product->id }}">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="exampleInputEmail1">Nome</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="name"
                                                                                    value="{{ $product->name }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="exampleInputEmail1">Valor</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span
                                                                                        class="input-group-text">R$:</span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    name="price"
                                                                                    value="{{ $product->price }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Sub
                                                                                    Titulo</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="subname"
                                                                                    value="{{ $product->subname }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">Qtd mínima de
                                                                                    compra</label>
                                                                                <input type="number" class="form-control"
                                                                                    min="1" max="999999"
                                                                                    name="minimo"
                                                                                    value="{{ $product->minimo }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="">Qtd máxima de
                                                                                compra</label>
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control"
                                                                                    name="maximo"
                                                                                    value="{{ $product->maximo }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="">Tempo de expiração
                                                                                (min)
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control"
                                                                                    name="expiracao" min="0"
                                                                                    value="{{ $product->expiracao }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row justify-content-center">
                                                                        <div class="col-md-6">
                                                                            <label for="">Mostar Ranking de
                                                                                compradores (Qtd)</label>
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control"
                                                                                    name="qtd_ranking"
                                                                                    value="{{ $product->qtd_ranking }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <label>Mostrar Parcial (%)</label>
                                                                            <select name="parcial"class="form-control">
                                                                                <option value="1"
                                                                                    {{ $product->parcial == 1 ? 'selected' : '' }}>
                                                                                    Sim</option>
                                                                                <option value="0"
                                                                                    {{ $product->parcial == 0 ? 'selected' : '' }}>
                                                                                    Não</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-4">
                                                                        <div class="col-md-6">
                                                                            <label>Gateway de Pagamento</label>
                                                                            <select name="gateway"class="form-control">
                                                                                <option value="mp"
                                                                                    {{ $product->gateway == 'mp' ? 'selected' : '' }}>
                                                                                    Mercado Pago</option>
                                                                                <option value="paggue"
                                                                                    {{ $product->gateway == 'paggue' ? 'selected' : '' }}>
                                                                                    Paggue</option>
                                                                                <option value="asaas"
                                                                                    {{ $product->gateway == 'asaas' ? 'selected' : '' }}>
                                                                                    ASAAS</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <label>% de Ganho do Afiliado</label>
                                                                            <input type="number" class="form-control"
                                                                                name="ganho_afiliado"
                                                                                value="{{ $product->ganho_afiliado }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-4">
                                                                        <div class="col-md-12">
                                                                            <label>Descrição</label>
                                                                            <textarea class="form-control summernote" name="description" id="desc-{{ $product->id }}" rows="10"
                                                                                style="min-height: 200px;" required>{!! $product->descricao() !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade show"
                                                                    id="premios{{ $product->id }}" role="tabpanel"
                                                                    aria-labelledby="geral-tab">
                                                                    <div class="row">
                                                                        @foreach ($product->premios() as $premio)
                                                                            <div class="col-md-6 mt-2">
                                                                                <label>{{ $premio->ordem }}º Prêmio</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="descPremio[{{ $premio->ordem }}]"
                                                                                    value="{{ $premio->descricao }}">
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade"
                                                                    id="ajustes{{ $product->id }}" role="tabpanel"
                                                                    aria-labelledby="ajustes-tab">
                                                                    <div class="row mt-3">
                                                                        <div class="col-5">
                                                                            <div class="form-group">
                                                                                <label for="status_sorteio">Status
                                                                                    Sorteio</label>
                                                                                <select class="form-control"
                                                                                    name="status" id="status">
                                                                                    <option value="Inativo"
                                                                                        {{ $product->status == 'Inativo' ? "selected='selected'" : '' }}>
                                                                                        Inativo</option>
                                                                                    <option value="Ativo"
                                                                                        {{ $product->status == 'Ativo' ? "selected='selected'" : '' }}>
                                                                                        Ativo</option>
                                                                                    <option value="Acabando"
                                                                                        {{ $product->status == 'Acabando' ? "selected='selected'" : '' }}>
                                                                                        Corre que está acabando!</option>
                                                                                    <option value="Finalizado"
                                                                                        {{ $product->status == 'Finalizado' ? "selected='selected'" : '' }}>
                                                                                        Finalizado</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <form action="{{ route('drawDate') }}"
                                                                            method="POST">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $product->id }}">
                                                                            <div class="col-12 col-md-7">
                                                                                <div class="form-group">
                                                                                    <label for="data_sorteio">Data
                                                                                        Sorteio</label>
                                                                                    <input type="datetime-local"
                                                                                        class="form-control"
                                                                                        name="data_sorteio"
                                                                                        id="data_sorteio"
                                                                                        value="{{ $product->draw_date ? date('Y-m-d H:i:s', strtotime($product->draw_date)) : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-sm">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="cadastrar_ganhador">Ganhador</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="cadastrar_ganhador"
                                                                                    id="cadastrar_ganhador"
                                                                                    value="{{ $product->winner }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="visible_rifa">Mostrar na Página
                                                                                    Inicial?</label>
                                                                                <select class="form-control"
                                                                                    name="visible" id="visible">
                                                                                    <option value="0">Não</option>
                                                                                    <option value="1"
                                                                                        {{ $product->visible == 1 ? "selected='selected'" : '' }}>
                                                                                        Sim</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label>URL amigável</label>
                                                                            <input type="text" name="slug"
                                                                                value="{{ $product->slug }}"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="favoritar_rifa">Favoritar
                                                                                    Rifa</label>
                                                                                <select class="form-control"
                                                                                    name="favoritar_rifa"
                                                                                    id="favoritar_rifa">
                                                                                    <option value="0">Não</option>
                                                                                    <option value="1"
                                                                                        {{ $product->favoritar == 1 ? "selected='selected'" : '' }}>
                                                                                        Sim</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="tipo_reserva">Tipo de
                                                                                    Reserva?</label>
                                                                                <select class="form-control"
                                                                                    name="tipo_reserva" id="tipo_reserva">
                                                                                    <option value="manual"
                                                                                        {{ $product->type_raffles == 'manual' ? "selected='selected'" : '' }}>
                                                                                        Manual</option>
                                                                                    <option value="automatico"
                                                                                        {{ $product->type_raffles == 'automatico' ? "selected='selected'" : '' }}>
                                                                                        Automático</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-1 d-flex justify-content-center">
                                                                        <p>Tipo de Rifa</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="rifa_numero">Rifa de Números ou
                                                                                    Fazendinha</label>
                                                                                <select class="form-control"
                                                                                    name="rifa_numero" id="rifa_numero"
                                                                                    disabled>
                                                                                    <option value="numeros"
                                                                                        {{ $product->modo_de_jogo == 'numeros' ? "selected='selected'" : '' }}>
                                                                                        Números</option>
                                                                                    <option value="fazendinha-completa"
                                                                                        {{ $product->modo_de_jogo == 'fazendinha-completa' ? "selected='selected'" : '' }}>
                                                                                        Fazendinha - Grupo Completo</option>
                                                                                    <option value="fazendinha-meio"
                                                                                        {{ $product->modo_de_jogo == 'fazendinha-meio' ? "selected='selected'" : '' }}>
                                                                                        Fazendinha - Meio Grupo</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <div class="tab-pane fade"
                                                                    id="promocao{{ $product->id }}" role="tabpanel"
                                                                    aria-labelledby="promocao-tab">

                                                                    @foreach ($product->promocoes() as $promo)
                                                                        <div class="row text-center mt-2 promo">
                                                                            <h5>Promoção {{ $promo->ordem }}</h5>
                                                                            <div class="col-md-6">
                                                                                <label>Qtd de números</label>
                                                                                <input type="number" min="0"
                                                                                    name="numPromocao[{{ $promo->ordem }}]"
                                                                                    max="10000"
                                                                                    class="form-control text-center"
                                                                                    value="{{ $promo->qtdNumeros }}">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="exampleInputEmail1">% de
                                                                                    Desconto</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text">%</span>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                        class="form-control text-center"
                                                                                        name="valPromocao[{{ $promo->ordem }}]"
                                                                                        value="{{ $promo->desconto }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                                <div class="tab-pane fade" id="fotos{{ $product->id }}"
                                                                    role="tabpanel" aria-labelledby="promocao-tab">
                                                                    <center><button type="button"
                                                                            class="btn btn-sm btn-info"
                                                                            data-id="{{ $product->id }}"
                                                                            onclick="addFoto(this)">+ Foto(s)</button>
                                                                    </center>
                                                                    <div class="row d-flex justify-content-center mt-4">
                                                                        @if ($product->fotos()->count() > 0)
                                                                            @foreach ($product->fotos() as $key => $foto)
                                                                                <div class="col-md-4 text-center"
                                                                                    id="foto-{{ $foto->id }}">
                                                                                    <img src="/products/{{ $foto->name }}"
                                                                                        width="200"
                                                                                        style="border-radius: 10px;">
                                                                                    @if ($key >= 0)
                                                                                        <a data-qtd="{{ $product->fotos()->count() }}"
                                                                                            href="javascript:void(0)"
                                                                                            class="delete btn btn-danger"
                                                                                            onclick="excluirFoto(this)"
                                                                                            data-id="{{ $foto->id }}"><i
                                                                                                class="bi bi-trash3"></i></a>
                                                                                    @endif

                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>

                                                                </div>

                                                                <script>
                                                                    function changePopular(el) {
                                                                        var rifaID = el.dataset.rifa;
                                                                        document.getElementById(`popularCheck-${rifaID}`).value = el.dataset.id;
                                                                    }
                                                                </script>

                                                                <div class="tab-pane fade"
                                                                    id="compraAuto{{ $product->id }}" role="tabpanel"
                                                                    aria-labelledby="compraAuto-tab">
                                                                    <div class="row mt-4">
                                                                        <input type="hidden" name="popularCheck"
                                                                            id="popularCheck-{{ $product->id }}"
                                                                            value="{{ $product->getCompraMaisPopular() }}">
                                                                        @foreach ($product->comprasAuto() as $compra)
                                                                            <div class="col-md-6 mt-2">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"
                                                                                        style="height: 37px;">
                                                                                        <span class="input-group-text">
                                                                                            <input type="radio"
                                                                                                class="mr-2"
                                                                                                data-id="{{ $compra->id }}"
                                                                                                data-rifa="{{ $product->id }}"
                                                                                                id="popular-{{ $compra->id }}"
                                                                                                onchange="changePopular(this)"
                                                                                                name="popular"
                                                                                                {{ $compra->popular ? 'checked' : '' }}>
                                                                                            <label
                                                                                                for="popular-{{ $compra->id }}"
                                                                                                style="cursor: pointer">+
                                                                                                POPULAR</label>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        name="compra[{{ $compra->id }}]"
                                                                                        value="{{ $compra->qtd }}">
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade"
                                                                    id="cotapremiada{{ $product->id }}" role="tabpanel"
                                                                    aria-labelledby="promocao-tab">
                                                                    <div class="row d-flex ">
                                                                        <span>
                                                                            Cotas Premiadas
                                                                            <p style="font-size: 13px; color: orange;">
                                                                                Separe os valores por vírgula e não utilize
                                                                                espaço. Ex.: 012345,171717,777777
                                                                            </p>
                                                                            <span />
                                                                            <input name="cotapremiada" type="text"
                                                                                class="form-control text-center"
                                                                                value="{{ $product->premiada }}"
                                                                                placeholder="012345,171717,777777" />
                                                                            <span class="mt-3 mb-2">
                                                                                Descrição Cotas Premiadas
                                                                                <span />
                                                                                <textarea name="descricaopremiada" class="form-control" placeholder="Descrição cota premiada...">{{ $product->descricaopremiada }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-bs-dismiss="modal"
                                                        value="Cancelar">
                                                    <input type="submit" class="btn btn-success" value="Salvar">
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach --}}
                    </div>

                    <!-- Delete Modal HTML -->
                    @foreach ($rifas as $key => $product)
                        <div id="deleteEmployeeModal{{ $product->id }}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('destroy') }}" method="POST" enctype="multipart/form-data">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            <h4 class="modal-title">Deletar Rifa</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tem certeza de que deseja excluir esse registros?</p>
                                            <p class="text-warning"><small>Essa ação não pode ser desfeita..</small></p>
                                            <input name="deleteId" type="hidden" id="deleteId"
                                                value="{{ $product->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal"
                                                value="Cancelar">
                                            <input type="submit" class="btn btn-danger" value="Deletar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include('sweepstakes.teste')
                <!-- Modal Ranking Admin -->

                <div class="modal fade" id="modal-ranking" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" style="z-index: 9999999;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border: none;">
                            <div class="modal-header" style="background-color: #fff;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: #000;"><img
                                        src="{{ asset('images/treofeu.png') }}" alt=""> Top Compradores</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                    style="color: #000;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: #000">
                                <span id="content-modal-ranking"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-definir-ganhador" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Definir Ganhador</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <span id="content-modal-definir-ganhador"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-ver-ganhadores" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <span id="content-modal-ver-ganhadores"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        function openRanking(id) {
            $.ajax({
                url: "{{ route('ranking.admin') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    "id": id
                },
                success: function(response) {
                    console.log(response);
                    if (response.html) {
                        $('#content-modal-ranking').html(response.html)
                        $('#modal-ranking').modal('show')
                    }
                },
                error: function(error) {

                }
            })
        }
        document.getElementById("input-add-foto").addEventListener("change", function(el) {
            $('#form-foto').submit();
        });

        function addFoto(el) {
            $('#rifa-id').val(el.dataset.id)
            $('#input-add-foto').click()
        }

        function excluirFoto(el) {
            if (el.dataset.qtd <= 1) {
                alert('A rifa precisa de pelo menos 1 foto, adicione outra antes de exlcuir!')
                return;
            }

            const data = {
                id: el.dataset.id
            }

            var id = el.dataset.id;
            var url = '{{ route('excluirFoto') }}'

            Swal.fire({
                title: 'Tem certeza que deseja excluir a foto ?',
                html: `<input type="hidden" id="id" class="swal2-input" value="` + id + `">`,
                inputAttributes: {
                    autocapitalize: 'off'
                },
                backdrop: true,
                showCancelButton: true,
                confirmButtonText: 'Excluir',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (id) => {
                    return fetch(url, {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                            },
                            method: 'POST',
                            dataType: 'json',
                            body: JSON.stringify(data)
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value.success) {
                    Swal.fire({
                        title: `Foto excluida com sucesso`,
                        icon: 'success',
                    }).then(() => {
                        $(`#foto-${id}`).remove();
                    })
                } else {
                    Swal.fire({
                        title: `Erro ao excluir tente novamente`,
                        text: 'Erro: ' + result.value.error,
                        icon: 'error',
                    })
                }
            })
        }

        function definirGanhador(id) {
            $('#content-modal-definir-ganhador').html('')
            $.ajax({
                url: "{{ route('definirGanhador') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    "id": id
                },
                success: function(response) {
                    if (response.html) {
                        $('#content-modal-definir-ganhador').html(response.html)
                        $('#modal-definir-ganhador').modal('show');
                    }
                },
                error: function(error) {

                }
            })
        }

        function verGanhadores(id) {
            $('#content-modal-ver-ganhadores').html('')
            $.ajax({
                url: "{{ route('verGanhadores') }}",
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id
                },
                success: function(response) {
                    if (response.html) {
                        $('#content-modal-ver-ganhadores').html(response.html)
                        $('#modal-ver-ganhadores').modal('show');
                    }
                },
                error: function(error) {

                }
            })
        }

        function formatarMoeda() {
            var elemento = document.getElementById('price');
            var valor = elemento.value;


            valor = valor + '';
            valor = parseInt(valor.replace(/[\D]+/g, ''));
            valor = valor + '';
            valor = valor.replace(/([0-9]{2})$/g, ",$1");

            if (valor.length > 6) {
                valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            }

            elemento.value = valor;
            if (valor == 'NaN') elemento.value = '';

        }

        function copyResumoLink(link) {
            const element = document.querySelector('#copy-link');
            const storage = document.createElement('textarea');
            storage.value = link;
            element.appendChild(storage);

            // Copy the text in the fake `textarea` and remove the `textarea`
            storage.select();
            storage.setSelectionRange(0, 99999);
            document.execCommand('copy');
            element.removeChild(storage);

            alert("LINK para resumo copiado com sucesso.");
        }

        function duplicar(el) {
            var id = el.dataset.id;
            var name = el.dataset.name
            $('#id-duplicar').val(id);
            $('#titulo-duplicar').text(`Copiando dados da rifa: ${name}`);
            $('#duplicar-modal').modal('show')
        }
    </script>

    @if (session()->has('sorteio'))
        <script>
            $(function(e) {
                verGanhadores('{{ session('sorteio') }}')
            })
        </script>
    @endif
@endsection
