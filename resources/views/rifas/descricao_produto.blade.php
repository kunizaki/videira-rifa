@if (env('REQUIRED_DESCRIPTION'))
    @if (!env('HIDE_TITLE_DESC'))
        <div style="">
            <h5 class="mt-1 title-promo {{ $config->tema }}">
                <img src="{{url('/images/e-book.png')}}" alt="Image" width='25'/>
                Descrição
            </h5>
        </div>
    @endif

    <div class="card mt-3 desc {{ $config->tema }}">
            {!! $productDescription !!}
    </div>
@endif

<div class="mt-2 d-flex text-center justify-content-center mb-3">
    <div class="text-center">
        <center>
            <!-- Facebook -->
            <a class="btn btn-primary" style="background-color: #2760AE;border: none;font-size: 20px;"
                href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"
                rel="noreferrer noopener" role="button"><i class="bi bi-facebook"></i></a>
            <!-- Telegram -->
            <a class="btn btn-primary" style="background-color: #2F9DDF;border: none;"
                href="https://telegram.me/share/url?url={{ Request::url() }}" target="_blank" rel="noreferrer noopener"
                role="button"><i class="bi bi-telegram" style="font-size: 20px;"></i></a>
            <!-- Whatsapp -->
            <a class="btn btn-primary" style="background-color: #25d366;border: none;"
                href="https://api.whatsapp.com/send?text={{ Request::url() }}" target="_blank"
                rel="noreferrer noopener" role="button"><i class="bi bi-whatsapp" style="font-size: 20px;"></i></a>
            <!-- Twitter -->
            <a class="btn btn-primary" style="background-color: #34B3F7;border: none;"
                href="https://twitter.com/intent/tweet?text=Vc%20pode%20ser%20o%20Próximo%20Ganhador%20{{ Request::url() }}"
                target="_blank" rel="noreferrer noopener" role="button"><i class="bi bi-twitter"
                    style="font-size: 20px;"></i></a>
        </center>

    </div>
</div>