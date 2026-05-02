<style>
    .body-ranking {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        margin-top: 10px;
    }

    .body-ranking.dark {
        background: #222222;
    }

    .title-ranking h5 {
        color: #000;
    }

    .title-ranking span {
        color: #000;
    }

    .title-ranking.dark h5 {
        color: #fff;
    }

    .title-ranking.dark span {
        color: #fff;
    }

    .body-promo {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        margin-top: 20px;
    }

    .body-promo.dark {
        background: #222222;
    }

    .title-promo.dark {
        color: #fff !important;
    }

    .premiada-card {
        display: flex;
        flex-wrap: wrap;
        background-color: #fff;
        border: none;
        border-radius: 10px;
        /* margin-top: 20px; */
        padding: 10px;
        gap: 4px;
    }
</style>

{{-- Ranking de compradores (WDM) --}}
{{-- @if (count($ranking) > 0)
    <div class="card" style="border: none;border-radius: 10px;background-color: transparent;">
        <div class="card-body body-ranking {{ $config->tema }}">
            <div class="title-ranking {{ $config->tema }}" style="margin-bottom: 10px;">
                <h5 style="font-weight: bold;">RANKING DE COMPRADORES</h5>
            </div>


            <div class="row" style="display: flex;justify-content:center;position:relative">
                @foreach ($ranking as $key => $rk)
                    <div class="btn-auto item-ranking">
                        {{ $key + 1 }}º {{ $productModel->medalhaRanking($key) }}<br>
                        <span style="font-size: 20px;font-weight: bold;">{{ $rk->name }}</span>
                        <br>
                        <span style="font-size: 12px;">Qtd. de Bilhetes
                            {{ $rk->totalReservas }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif --}}


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


{{-- Ver meus premios e Parcial --}}
<div class="mb-3">
    <div class="row mt-2">
        {{-- <div class="" style="">
            <h5 class="mt-1 title-promo {{ $config->tema }}">
                ⚡ Cotas
                <small class="text-muted title-promo {{ $config->tema }}" style="font-size: 15px;">Escolha a quantidade
                    da sua sorte</small>
            </h5>
        </div>
        <div class="col-12">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="openModal()"
                class="btn btn-secondary btn-sm bg-secondary btn-block"
                style="font-size: 12px; width: 100%; {{ env('APP_URL') == 'rifasonline.link' ? 'background-color: red !important' : 'background: #198754 !important' }}">
                <i class="fas fa-shopping-cart"></i>&nbsp;Ver meus números
            </button>
        </div> --}}
        {{-- <div class="col-md-12 mt-2">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-premios"
                class="btn btn-secondary btn-sm bg-secondary btn-block" style="width: 100%; font-size: 12px; ">
                <i class="fas fa-trophy"></i>&nbsp;Prêmios
            </button>
        </div> --}}
        {{-- @if (count($ranking) > 0)
            <div class="col-md-12 mt-2">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-ranking"
                    class="btn btn-secondary btn-sm bg-secondary btn-block" style="width: 100%; font-size: 12px; ">
                    <i class="fas fa-trophy"></i>&nbsp;Top Compradores
                </button>
            </div>
        @endif --}}

        {{-- <div class="{{ env('APP_URL') == 'rifasonline.link' ? 'col-md-12 col-12' : 'col-md-6 col-6' }}">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="openModal()"
                class="btn btn-secondary btn-sm bg-secondary"
                style="font-size: 12px; width: 100%; {{ env('APP_URL') == 'rifasonline.link' ? 'background-color: red !important' : 'background: #198754 !important' }}">
                <i class="fas fa-shopping-cart"></i>&nbsp;Ver meus números
            </button>
        </div>
        <div class="{{ env('APP_URL') == 'agencyrauen.com' ? 'col-md-12 col-12 mt-2' : 'col-md-6 col-6' }}">
            @if (env('APP_URL') != 'agencyrauen.com')
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-premios"
                    class="btn btn-secondary btn-sm bg-secondary" style="width: 100%; font-size: 12px; ">
                    <i class="fas fa-trophy"></i>&nbsp;Prêmios
                </button>
            @endif
        </div> --}}
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
</div>
