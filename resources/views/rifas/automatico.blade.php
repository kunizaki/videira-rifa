<style>
    .body-compra-auto {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        margin-top: 20px;
    }

    .body-compra-auto.dark {
        background: #222222;
    }

    .title-compra-auto h5 {
        color: #000;
    }

    .title-compra-auto span {
        color: #000;
    }

    .title-compra-auto.dark h5 {
        color: #fff;
    }

    .title-compra-auto.dark span {
        color: #fff;
    }

    .btn-add-qtd {
        color: #fff;
        background-color: #000;
        border-radius: 0px;
        padding: 10px;
        margin: 2px;
        border: 1px solid;
        width: 100%;
        min-width: 50px;
        max-width: 300px;

    }

    .btn-add-qtd.dark {
        background: rgba(0, 0, 0, .1) !important;
        border-color: rgba(0, 0, 0, .1) !important;
        color: #fff !important;
        
    }

    .remove-animation {
        -webkit-transition: none; /* Desativa a transição */
        transition: none; /* Desativa a transição */
        animation: none;
    }

    .col-auto-v2 {
        position: relative;

    }

    .compra-v2 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        font-family: montserrat,sans-serif;
    }
    
    .col-auto-v2 .popular-v2 {
        background-color: #34a772
    }
    .btn-popular-v2 {
        background-color: #f00 !important;
        border-color: red !important;
    }
    
    .compra-select {
        font-size: 14px;
    }
    @media (max-width: 640px) {
        .compra-select {
            font-size: 13px;
        }
        .popular-v2:before {
            left:0.5rem;
        }
    }
    
    /* CSS Comum */
    .indicator {
    position: relative;
    display: inline-flex;
    width: max-content;
    }
    
    .indicator .indicator-item {
    z-index: 1;
    position: absolute;
    transform: none;
    white-space: nowrap;
    }

    /* CSS Comum */
    .indicator .indicator-item {
    bottom: auto;
    left: 50%;
    transform: translate(-50%, -50%);
    top: 0;
    }
    
    .indicator .indicator-item.indicator-start {
    right: auto;
    left: 0;
    transform: translate(-50%, -50%);
    }
    
    .indicator .indicator-item.indicator-center {
    right: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
    
    .indicator .indicator-item.indicator-end {
    right: 0;
    left: auto;
    transform: translate(50%, -50%);
    }
    
    .indicator .indicator-item.indicator-bottom {
    bottom: 0;
    top: auto;
    transform: translateY(50%);
    }
    
    .indicator .indicator-item.indicator-middle {
    bottom: 50%;
    top: 50%;
    transform: translateY(-50%);
    }
    
    .indicator .indicator-item.indicator-top {
    bottom: auto;
    top: 0;
    transform: translateY(-50%);
    }

    .item {
        min-height: 80px;
        -webkit-transition: background-color .2s ease-in-out, color .3s ease-in-out;
        -moz-transition: background-color .2s ease-in-out, color .3s ease-in-out;
        transition: background-color .2s ease-in-out, color .3s ease-in-out;
    }

    .item .item-card {
        background-color: transparent !important;
        min-width: auto !important;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        width: 32.5%;
    }

    .item .item-content {
        background-color: #066399;
        color: #fff;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        justify-content: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        align-items: center;
        border-radius: 10px;
        min-height: 95px;
        display: -webkit-flex;
        display: -moz-box;
        display: flex;
        width: 100%;
    }

    .item .mais-popular {
        position: relative;
    }
    .item .mais-popular .item-content {
     background-color: #34a772;
    border: 2px solid #198754;
    position: relative;
}
    .item .mais-popular:before {
        border-top-right-radius: 0 !important;
        border-top-left-radius: 0 !important;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        text-align: center;
        font-size: .7em;
        width: 90px;
        top: 13px;
        color: #fff;
        z-index: 2;
        right: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .item .mais-popular:before {
        content: "Mais popular";
        background-color: #198754;
        position: absolute;
        padding: 4px;
    }

</style>

<div class="card text-center my-2">
    <div class="card-body">
        <h5 class="card-title">Quanto mais comprar, maiores são as suas chances de ganhar!</h5>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap item">
    @foreach ($productModel->comprasAuto()->where('qtd', '>', 0) as $compra)
        {{-- <div class="{{ $compra->popular ? 'popular-v2': '' }}"> --}}
            {{-- <div class="btn-auto btn-add-qtd {{ $compra->popular ? 'mais-popular' : '' }}" onclick="addQtd('{{ $compra->qtd }}')"> --}}
            <div class="item item-card  mb-2 {{ $compra->popular ? 'mais-popular' : '' }}">
                <div class="item-content flex-column p-2" onclick="addQtd('{{ $compra->qtd }}')">
                    <span style="font-weight: 900;">+ {{ $compra->qtd < 10 ? '0' : '' }}{{ $compra->qtd }}</span>
                    <span class="font-xss text-uppercase mb-0">SELECIONAR</span>
                </div>
            </div>
    @endforeach
</div>

<div class="card text-center ">
    <div class="card-body">
        <div class="" style="margin-top: 20px;margin-bottom: 20px;text-align: center;">
            <div class="amount">
                <div class="vendasExpressNums app-card card mb-2 w-100 font-xs">
    <div class="card-body d-flex align-items-center justify-content-center font-xss p-1">
    <div class="left pointer">
    <div class="addNumero numeroChange text-muted" onclick="addQtd('-')"><i class="bi bi-dash-circle"></i>
    </div>
    </div>
    <div class="center"><input class="form-control text-center" onblur="numerosAleatorio();" onkeyup="numerosAleatorio()" value="{{ $productModel->minimo }}" min="{{ $productModel->minimo }}" max="{{ $productModel->maximo }}" aria-label="Quantidade de números" id="numbersA" placeholder="{{ $productModel->minimo }}">
    </div>
    <div class="right pointer">
    <div class="removeNumero numeroChange text-cor-primaria text-plus-title" onclick="addQtd('+')"><i class="bi bi-plus-circle-fill"></i></div>
    </div>
    </div>
    </div>
                <button type="button" class="btn btn-danger reservation btn-amount blob bg-success remove-animation"
                    style="color: #fff;border: none;width: 100%;margin-top: 5px;font-weight: bold;" onclick="validarQtd()"><i
                        class="far fa-check-circle"></i>&nbsp; Quero participar<span id="numberSelectedTotalHome" style="color: #fff;float:right"></span></button>
            </div>
        </div>
    </div>
</div>


