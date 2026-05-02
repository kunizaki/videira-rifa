<!-- Modal Editar Rifa -->
@foreach ($rifas as $key => $product)
    <div id="modal_editar_rifa{{ $product->id }}" class="modal fade">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    @method('PUT')
                    {{ csrf_field() }}

                    <div class="modal-body">

                        <div class="container mt-3">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <h2>Editar Rifa</h2>

                            <div class="row">
                                <div class="col-12">
                                    <nav>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 12px;">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="geral-tab" data-toggle="tab"
                                                    href="#geral{{ $product->id }}" role="tab"
                                                    aria-controls="geral" aria-selected="true">Geral</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="premios-tab" data-toggle="tab"
                                                    href="#premios{{ $product->id }}" role="tab"
                                                    aria-controls="premios" aria-selected="true">Prêmios</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="ajustes-tab" data-toggle="tab"
                                                    href="#ajustes{{ $product->id }}" role="tab"
                                                    aria-controls="ajustes" aria-selected="false">Ajustes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="promocao-tab" data-toggle="tab"
                                                    href="#promocao{{ $product->id }}" role="tab"
                                                    aria-controls="promocao" aria-selected="false">Promoção</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="fotos-tab" data-toggle="tab"
                                                    href="#fotos{{ $product->id }}" role="tab"
                                                    aria-controls="fotos" aria-selected="false">Fotos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="compraAuto-tab" data-toggle="tab"
                                                    href="#compraAuto{{ $product->id }}" role="tab"
                                                    aria-controls="compraAuto" aria-selected="false">Compra
                                                    Automática</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="cotapremiada-tab" data-toggle="tab"
                                                    href="#cotapremiada{{ $product->id }}" role="tab"
                                                    aria-controls="cotapremiada" aria-selected="false">Cota Premiada</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="upsell-tab" data-toggle="tab"
                                                    href="#upsell{{ $product->id }}" role="tab"
                                                    aria-controls="upsell" aria-selected="false">Upsell</a>
                                            </li>

                                        </ul>
                                    </nav>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="geral{{ $product->id }}"
                                            role="tabpanel" aria-labelledby="geral-tab">
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product->id }}">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $product->name }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1">Valor</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$:</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price"
                                                            value="{{ $product->price }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sub
                                                            Titulo</label>
                                                        <input type="text" class="form-control" name="subname"
                                                            value="{{ $product->subname }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Qtd mínima de
                                                            compra</label>
                                                        <input type="number" class="form-control" min="1"
                                                            max="999999" name="minimo"
                                                            value="{{ $product->minimo }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Qtd máxima de
                                                        compra</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="maximo"
                                                            value="{{ $product->maximo }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Tempo de expiração
                                                        (min)
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="expiracao"
                                                            min="0" value="{{ $product->expiracao }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <label for="">Mostar Ranking de
                                                        compradores (Qtd)</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="qtd_ranking"
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
                                                    <input type="number" class="form-control" name="ganho_afiliado"
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

                                        <div class="tab-pane fade show" id="premios{{ $product->id }}"
                                            role="tabpanel" aria-labelledby="geral-tab">
                                            <div class="row">
                                                @foreach ($product->premios() as $premio)
                                                    <div class="col-md-6 mt-2">
                                                        <label>{{ $premio->ordem }}º
                                                            Prêmio</label>
                                                        <input type="text" class="form-control"
                                                            name="descPremio[{{ $premio->ordem }}]"
                                                            value="{{ $premio->descricao }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="ajustes{{ $product->id }}" role="tabpanel"
                                            aria-labelledby="ajustes-tab">
                                            <div class="row mt-3">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="status_sorteio">Status
                                                            Sorteio</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="Inativo"
                                                                {{ $product->status == 'Inativo' ? "selected='selected'" : '' }}>
                                                                Inativo</option>
                                                            <option value="Ativo"
                                                                {{ $product->status == 'Ativo' ? "selected='selected'" : '' }}>
                                                                Ativo</option>
                                                            <option value="Acabando"
                                                                {{ $product->status == 'Acabando' ? "selected='selected'" : '' }}>
                                                                Corre que está acabando!
                                                            </option>
                                                            <option value="Finalizado"
                                                                {{ $product->status == 'Finalizado' ? "selected='selected'" : '' }}>
                                                                Finalizado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <form action="{{ route('drawDate') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product->id }}">
                                                    <div class="col-12 col-md-7">
                                                        <div class="form-group">
                                                            <label for="data_sorteio">Data
                                                                Sorteio</label>
                                                            <input type="datetime-local" class="form-control"
                                                                name="data_sorteio" id="data_sorteio"
                                                                value="{{ $product->draw_date ? date('Y-m-d H:i:s', strtotime($product->draw_date)) : '' }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label for="cadastrar_ganhador">Ganhador</label>
                                                        <input type="text" class="form-control"
                                                            name="cadastrar_ganhador" id="cadastrar_ganhador"
                                                            value="{{ $product->winner }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="visible_rifa">Mostrar na
                                                            Página
                                                            Inicial?</label>
                                                        <select class="form-control" name="visible" id="visible">
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
                                                        value="{{ $product->slug }}" class="form-control">
                                                </div>

                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="favoritar_rifa">Favoritar
                                                            Rifa</label>
                                                        <select class="form-control" name="favoritar_rifa"
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
                                                        <select class="form-control" name="tipo_reserva"
                                                            id="tipo_reserva">
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
                                                        <label for="rifa_numero">Rifa de
                                                            Números ou
                                                            Fazendinha</label>
                                                        <select class="form-control" name="rifa_numero"
                                                            id="rifa_numero" disabled>
                                                            <option value="numeros"
                                                                {{ $product->modo_de_jogo == 'numeros' ? "selected='selected'" : '' }}>
                                                                Números</option>
                                                            <option value="fazendinha-completa"
                                                                {{ $product->modo_de_jogo == 'fazendinha-completa' ? "selected='selected'" : '' }}>
                                                                Fazendinha - Grupo Completo
                                                            </option>
                                                            <option value="fazendinha-meio"
                                                                {{ $product->modo_de_jogo == 'fazendinha-meio' ? "selected='selected'" : '' }}>
                                                                Fazendinha - Meio Grupo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="promocao{{ $product->id }}" role="tabpanel"
                                            aria-labelledby="promocao-tab">
                                            @foreach ($product->promocoes() as $promo)
                                                <div class="row text-center mt-2 promo">
                                                    <h5>Promoção {{ $promo->ordem }}</h5>
                                                    <div class="col-md-6">
                                                        <label>Qtd de números</label>
                                                        <input type="number" min="0"
                                                            name="numPromocao[{{ $promo->ordem }}]" max="10000"
                                                            class="form-control text-center"
                                                            value="{{ $promo->qtdNumeros }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">% de
                                                            Desconto</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                            <input type="text" class="form-control text-center"
                                                                name="valPromocao[{{ $promo->ordem }}]"
                                                                value="{{ $promo->desconto }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="tab-pane fade" id="fotos{{ $product->id }}" role="tabpanel"
                                            aria-labelledby="promocao-tab">
                                            <center><button type="button" class="btn btn-sm btn-info"
                                                    data-id="{{ $product->id }}" onclick="addFoto(this)">+
                                                    Foto(s)</button>
                                            </center>
                                            <div class="row d-flex justify-content-center mt-4">
                                                @if ($product->fotos()->count() > 0)
                                                    @foreach ($product->fotos() as $key => $foto)
                                                        <div class="col-md-4 text-center"
                                                            id="foto-{{ $foto->id }}">
                                                            <img src="/products/{{ $foto->name }}" width="200"
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

                                        <div class="tab-pane fade" id="compraAuto{{ $product->id }}"
                                            role="tabpanel" aria-labelledby="compraAuto-tab">
                                            <div class="row mt-4">
                                                <input type="hidden" name="popularCheck"
                                                    id="popularCheck-{{ $product->id }}"
                                                    value="{{ $product->getCompraMaisPopular() }}">
                                                @foreach ($product->comprasAuto() as $compra)
                                                    <div class="col-md-6 mt-2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend" style="height: 37px;">
                                                                <span class="input-group-text">
                                                                    <input type="radio" class="mr-2"
                                                                        data-id="{{ $compra->id }}"
                                                                        data-rifa="{{ $product->id }}"
                                                                        id="popular-{{ $compra->id }}"
                                                                        onchange="changePopular(this)" name="popular"
                                                                        {{ $compra->popular ? 'checked' : '' }}>
                                                                    <label for="popular-{{ $compra->id }}"
                                                                        style="cursor: pointer">+
                                                                        POPULAR</label>
                                                                </span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                name="compra[{{ $compra->id }}]"
                                                                value="{{ $compra->qtd }}">
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="cotapremiada{{ $product->id }}"
                                            role="tabpanel" aria-labelledby="cotapremiada-tab">
                                            <div class="row d-flex ">
                                                <span>
                                                    Cotas Premiadas
                                                    <p style="font-size: 13px; color: orange;">
                                                        Separe os valores por vírgula e não
                                                        utilize
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
                                                    <span class="mt-3 mb-2">
                                                        Cotas Achadas!
                                                    <span />
                                                    <input name="cotapremiada_win" type="text" class="form-control text-center" value="{{ $product->premiada_win }}" placeholder="012345,171717,777777" />
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="upsell{{ $product->id }}" role="tabpanel" aria-labelledby="upsell-tab">
                                            
                                            <div class="row text-center mt-2 promo">
                                                <h5>Upsell</h5>
                                                <div class="col-md-6">
                                                    <label>Qtd de números</label>
                                                    <input type="number" min="0" name="qtd_num_upsell" max="10000" class="form-control text-center" value="{{$product->upsell ? $product->upsell->qtdNumeros : 0}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1">% de
                                                        Desconto</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" class="form-control text-center" name="promocao_upsell" value="{{$product->upsell ? $product->upsell->desconto : 0}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach
