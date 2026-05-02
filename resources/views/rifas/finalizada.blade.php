<style>
    .ganhador2 {
        font-family: 'Montserrat', sans-serif;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #fff;
        font-size: 20px;

        font-weight: 900;
        
        
    }
    .ganhador-foto2 img {
        min-height: 70px;
        max-height: 70px;
        min-width: 70px;
        max-width: 70px;
        border-radius:10px;
        
    }
    .ganhador-desc2 {
        font-weight: 10;
        font-family: 'Montserrat', sans-serif;
        flex-direction: column;
        gap: 5px;
        font-size: 14px;

        
    }
</style>

<div class="card mt-3"
    style="border: none;border-radius: 10px;background-color: #198754;;height:auto;padding:10px;margin-bottom: 80px;">
    @if ($productModel->premios()->where('descricao', '!=', '')->where('ganhador', '!=', '')->count() == 0)
        <h2 style="text-align: center">
            Aguardando Sorteio!<br>Boa Sorte!
        </h2>
    @else
        
    @endif



    @if (env('APP_URL') == 'agencyrauen.com')
        <h4>
            Aguardando sorteio pela loteria federal
        </h4>
    @endif

    @if ($productModel->premios()->where('descricao', '!=', '')->where('ganhador', '!=', '')->count() > 0)
       
        @foreach ($productModel->premios()->where('descricao', '!=', '') as $premio)
            <div class="ganhador2 {{ $config->tema }} ">
                <div class="ganhador-foto2">
                     @if ($premio->foto)
                        <img src="{{ asset($premio->foto) }}" alt="Foto do Ganhador">
                    @else
                        <img src="images/sem-foto.jpg" alt="">
                    @endif
                    </div>
                   <div>
                    <label class="ganhador2">{{ $premio->ganhador }}<i class="bi bi-check-circle text-white-50"></i></label> 
                    <label class="ganhador-desc2" style="font-weight: 1; color: #BCDCCD">Ganhador(a) com o número da sorte <strong style="font-weight: 900;font-size: 15px;">{{ $premio->cota }}</strong></label>

                </div>
            </div>
        @endforeach
    @endif
</div>
