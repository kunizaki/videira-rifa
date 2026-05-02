@extends('layouts.check')

<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<script>
    loadding();
</script>

<style>
    #loadingSystem {
        background: rgba(206, 206, 206, 0.5) url("../../images/loading.gif") no-repeat scroll center center;
        background-size: 150px 150px;
        height: 100%;
        left: 0;
        overflow: visible;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 9999999;
    }
</style>
<div id="loadingSystem" class="hidden"></div>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border: none;">
                    <div class="modal-header" style="background-color: #020f1e;color: #fff;">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-info-circle"></i> Aviso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="color: #fff;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background-color: #020f1e;color: #fff;">
                        <div style="text-align: center;">{{ $error }}</div>
                    </div>
                    <div class="modal-footer" style="background-color: #020f1e;color: #fff;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#exampleModal').modal({
                show: true
            });
        </script>
    @endforeach
@endif

<style>
    .payment-hero {
        background: linear-gradient(to bottom, #16a34a 50%, #f3f4f6 50%);
    }
</style>

@section('content')
    <section class="relative payment-hero min-h-screen">
        <div class="container mx-auto pt-5">
            <a href="/sorteio/{{ $ticket->slug }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                </svg>

            </a>
        </div>
        <div class="max-w-[600px] mx-auto">
            <div class="flex flex-col items-center pt-14">
                @if ($ticket->pagos > 0)
                     <h1 class="text-white font-medium text-xl px-4 py-5 text-center mb-16 md:text-3xl md:mb-10">
                         Pagamento processado. Boa sorte!
                     </h1>
                @else
                    <h1 class="text-white font-medium text-xl px-4 py-5 text-center mb-16 md:text-3xl md:mb-10">
                        Falta pouco! Copie e cole o código a seguir no seu app de pagamentos ou Internet Banking
                    </h1>
                @endif


                <div class="bg-white shadow-lg rounded-lg p-6 mx-4 md:w-full mx-auto space-y-10 mb-5">
                    <div class="w-full flex items-start">
                        <div class="hidden md:w-1/3 md:block">
                            <img src="/products/{{ $ticket->image_name }}" alt="Imagem do sorteio">
                        </div>
                        <div class="w-full md:w-2/3 pl-3 ">
                            <div class="flex flex-col text-gray-900 space-y-1 text-sm">
                                <div class="flex justify-between">
                                    <span class="font-bold">Sorteio:</span>
                                    <span>{{ $ticket->product_name }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold">Quantidade:</span>
                                    <span>{{ $cotas }} cotas</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Valor por cota:</span>
                                    <span>R$ {{ $ticket->price }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold flex items-center justify-between w-full">

                                        <span class="mr-3">Cotas:</span>

                                        <span class="ml-3 flex">
                                            <small id='my-cotas' class="text-gray-500">
                                                @if ($ticket->pagos > 0)
                                                    {!! $cotas_innerHtml !!}
                                                @else
                                                    Disponível após pagamento
                                                @endif

                                            </small>
                                        </span>
                                    </span>

                                </div>

                            </div>
                        </div>
                    </div>
                    @if ($ticket->pagos > 0)
                        <div id="get-comprovante" class="flex items-center justify-around pt-2">
                            <a id="apply-comprovante-btn" href="{{ route('comprovanteRifaPDF', $ticket->id) }}"
                                target="_blank"
                                class="bg-green-600
                                px-6 py-3 rounded-lg text-white text-sm hover:bg-green-500 disabled:bg-green-600/30">
                                Baixar Comprovante
                            </a>
                        </div>
                    @else
                        <div id="checkout" class="flex items-center justify-around pt-2">
                            <button id="apply-upsell-btn"
                                class="bg-green-600 px-6 py-3 rounded-lg text-white text-sm hover:bg-green-500 disabled:bg-green-600/30">
                                Pagar agora
                            </button>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('checkout').addEventListener('click', function(e) {
            e.preventDefault();
            loading();
            window.location.href = "{{ route('pagarReserva', $ticket->id) }}";
        });
        const sub = document.getElementById('apply-upsell-btn');
        sub.addEventListener('click', function(e) {
            e.preventDefault();
            loading();
            document.getElementById('upsell-form').submit();
        });

        function loading() {
            let el = document.getElementById('loadingSystem');
            el.classList.toggle("hidden");
        }
    </script>
@endsection
