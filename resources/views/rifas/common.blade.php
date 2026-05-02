<style>
    .title-rifa-destaque {
        background: #fff;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        padding-bottom: 10px;
    }

    .title-rifa-destaque.dark {
        background: #222222;
    }

    .title-rifa-destaque.dark h1 {
        color: #fff;
    }

    .title-rifa-destaque.dark p {
        color: #fff;
    }

    .valor.dark {
        color: #fff;
    }

    .desc {
        border: none;
        border-radius: 10px;
        background-color: #fff;
        max-height: 250px;
        padding: 10px;
        margin-bottom: 0px;
        overflow: scroll
    }

    .desc.dark{
        background: #222222;
    }

    .desc.dark p{
        color: #fff;
    }

    .data-sorteio.dark{
        color: #fff !important;
    }
    .font-weight-900 {
        font-weight: 900;
    }

    .overlay-slide {
        position: absolute;
        bottom: 0px;
        /* right: 15%; */
        /* left: 15%; */
        /* padding-top: 1.25rem;
        padding-bottom: 1.25rem; */
        /* text-align: center; */

        width: 100%;
        color: #fff;
        z-index: 10;
        background: #00000085
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="margin-top: 10px;">
        @foreach ($productModel->fotos() as $key => $foto)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" style="margin-top: 30px;"
                id="slide-foto-{{ $foto->id }}">
                <img src="/products/{{ $foto->name }}"
                    style="border-top-right-radius: 5px;border-top-left-radius: 5px; height: 350px;"
                    class="d-block w-100" alt="...">
                <div class="overlay-slide px-2">
                    {{--overlay  --}}
                    <div style="width: 100%;">
                        {!! $productModel->status() !!}
                        @if ($productModel->draw_date)
                            <br>
                            <span class="data-sorteio {{ $config->tema }} ml-1" style="font-size: 12px;">
                                Data do sorteio {{ date('d/m/Y', strtotime($productModel->draw_date)) }} 
                            </span>
                        @endif
                    </div>
                    {{--  --}}
                    <div>{{ $productModel->name }}</div>
                    <div style="font-size: .75em">{{ $productModel->subname }}</div>
                </div>
            </div>
        @endforeach
    </div>

    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="openModal()" class="btn btn-sm btn-dark box-shadow-08 w-100 rounded-0"
            style="font-size: 15px; width: 100%; {{ env('APP_URL') == 'rifasonline.link' ? 'background-color: red !important' : '' }}">
            <i class="fas fa-shopping-cart"></i>&nbsp;Ver meus números
    </button>
    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-ranking" class="btn btn-sm btn-success box-shadow-08 w-100 rounded-0 rounded-bottom" style="width: 100%; font-size: 15px; ">
        <i class="fas fa-trophy"></i>&nbsp;Top Compradores
    </button>
    

    {{-- <div class="title-rifa-destaque {{ $config->tema }}">
        <h1>{{ $productModel->name }}</h1>
        <p>{{ $productModel->subname }}</p>
        <div style="width: 100%;">
            {!! $productModel->status() !!}
            @if ($productModel->draw_date)
                <br>
                <span class="data-sorteio {{ $config->tema }} ml-1" style="font-size: 12px;">
                    Data do sorteio {{ date('d/m/Y', strtotime($productModel->draw_date)) }} --}}
                    {{-- {!! $product->dataSorteio() !!} --}}
                {{-- </span>
            @endif
        </div>
    </div> --}}
</div>


<div class="container mt-2">
    <div class="text-center">
        <span class="valor {{ $config->tema }}">POR APENAS</span>
        <span class="badge p-2" style="font-size: 14px; background: #000; color: #d1d1d1">R$
            {{ $product[0]->price }}</span>
    </div>
</div> 
 @if ($productModel->parcial)
        <div class="card"
            style="border: none;border-radius: 10px;background-color: transparent; margin-top: -10px !important;">
            <div class="card-body body-compra-auto {{ $config->tema }}" style="">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="progress-sell">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated {{ env('APP_URL') == 'rifasonline.link' ? 'bg-secondary' : 'bg-success' }}"
                                    role="progressbar" style="width: {{ $productModel->porcentagem() }}%"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    {{ $productModel->porcentagem() }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@if (count($premiadas->num) != 0 || count($premiadas->win) != 0)
    <div class="app-title">
        <h1>🔥 Cotas premiadas</h1>
        <div class="app-title-desc">Achou ganhou!</div>
    </div>
    <div class="premiada-card {{ $config->tema }}">
        @if (count($premiadas->num) > 0)
            @foreach ($premiadas->num as $premiada)
                <button class="btn btn-success w-10 btn-sm py-0 px-2 text-nowrap font-xss">
                    <span class="font-weight-500">🚀 {{ $premiada }}</span>
                </button>
            @endforeach
        @endif
        @if (count($premiadas->win) > 0)
            @foreach ($premiadas->win as $win)
                <button class="btn btn-danger w-10 btn-sm py-0 px-2 text-nowrap font-xss">
                    <span class="font-weight-500">🍀 {{ $win }}</span>
                </button>
            @endforeach
        @endif
        <hr style="margin-bottom:5px;margin: 0rem 0;" class="w-100">
        @if ($premiadas->descricao)
            <span style="font-size: 0.75rem;">{{ $premiadas->descricao }}</span>
        @endif
    </div>
@endif

{{-- Promoções --}}
@if ($productModel->promocoes()->where('qtdNumeros', '>', 0)->count() > 0)
    <div class="" style="">
        <h5 class="mt-1 title-promo {{ $config->tema }}">
            💥 Promoção
            <small class="text-muted title-promo {{ $config->tema }}" style="font-size: 15px;">Compre mais
                barato!</small>
        </h5>
    </div>
    <div class="card" style="border: none;border-radius: 10px;background-color: transparent; margin-top: -15px;">
        <div class="card-body body-promo {{ $config->tema }}">
            <div class="row">
                @foreach ($productModel->promocoes()->where('qtdNumeros', '>', 0) as $promo)
                    @if ($productModel->type_raffles == 'manual')
                        <div class="col-6" style="margin-bottom: 8px;" onclick="infoPromo()">
                            <div class="bg-success" style="color: #fff;text-align: center;border-radius:6px;"><strong>
                                    {{ $promo->qtdNumeros }} POR - R$:
                                    {{ $promo->valorFormatted() }}</strong>
                            </div>
                        </div>
                    @else
                        <div class="col-6" style="margin-bottom: 8px;"
                            onclick="addQtd('{{ $promo->qtdNumeros }}', '{{ $promo->valorFormatted() }}')">
                            <div class='card'>
                                <div class="card-body justify-content-center d-flex font-weight-900 font-xsss">
                                    {{ $promo->qtdNumeros }} cotas
                                </div>
                                <button type="button" class="btn btn-primary btn-success">
                                    <i class="bi bi-check2-circle"></i>  
                                    R$:
                                    {{ $promo->valorFormatted() }}
                                </button>
                            </div>
                            
                            {{-- <div class="bg-success" style="color: #fff;text-align: center;border-radius:6px;"><strong>
                                    {{ $promo->qtdNumeros }} POR - R$:
                                    {{ $promo->valorFormatted() }}</strong>
                            </div> --}}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif