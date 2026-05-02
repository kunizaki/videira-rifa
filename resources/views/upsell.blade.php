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
            <a href="/sorteio/{{ $product->slug }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                </svg>

            </a>
        </div>
        <div class="max-w-[600px] mx-auto">
            <div class="flex flex-col items-center pt-14">

                <h1 class="text-white font-medium text-xl px-4 py-5 text-center mb-16 md:text-3xl md:mb-10">
                    Falta pouco! Copie e cole o código a seguir no seu app de pagamentos ou Internet Banking
                </h1>

                <div class="bg-white shadow-lg rounded-lg p-6 mx-4 md:w-full mx-auto space-y-10 mb-5">
                    <div class="w-full flex items-start">
                        <div class="hidden md:w-1/3 md:block">
                            <img src="/products/{{ $product->imagem()->name }}" alt="Imagem do sorteio">
                        </div>
                        <div class="w-full md:w-2/3 pl-3 ">
                            <div class="flex flex-col text-gray-900 space-y-1 text-sm">
                                <div class="flex justify-between">
                                    <span class="font-bold">Sorteio:</span>
                                    <span>{{ $productName }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold">Quantidade:</span>
                                    <span>{{ $qtdNumbers }} cotas</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Valor por cota:</span>
                                    <span>R$ {{ $product->price }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold flex items-center justify-between w-full">

                                        <span class="mr-3">Cotas:</span>

                                        <span class="ml-3 flex">
                                            <small class="text-gray-500">
                                                Disponível após pagamento

                                            </small>
                                        </span>
                                    </span>

                                </div>

                            </div>
                        </div>
                    </div>


                    <form id="upsell-form" action="{{ route('bookProductManualy') }}" method="POST" class="flex flex-col">
                        {{ csrf_field() }}
                        <input type="hidden" name="tokenAfiliado" value="{{ $tokenAfiliado }}">
                        <input type="hidden" name="qtdNumbers" value="{{ $qtdNumbers }}">
                        <input type="hidden" name="productName" value="{{ $product->name }}">
                        <input type="hidden" name="productID" value="{{ $product->id }}">
                        <input type="hidden" name="numberSelected" value="{{ $numberSelected }}">
                        <input type="hidden" name="telephone" value="{{ $telephone }}">
                        <input type="hidden" name="customer" value="{{ $customer }}">
                        <input type="hidden" name="name" value="{{ $name }}">
                        <input type="hidden" name="promo" value="{{ $promo }}">
                        <div class="flex flex-col border border-dashed p-2">
                            <div class="flex flex-col items-center ">
                                <span class="text-xl text-red-500 font-bold">Oferta imperdível</span>
                                <p class="text-sm text-gray-500">Aumente as suas chances de ganhar</p>
                            </div>
                            <div class="border-t border-gray-200 text-center flex items-center flex-col">

                                <label for="upsell" class="inline-flex items-center mt-5 mb-3">
                                    <input id="upsell" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="upsellcheck">
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                                        Adicionar <strong>+ {{ $upsell->qtdNumeros }}</strong> bilhetes por apenas R$
                                        {{ number_format($upsell->valor, 2, ',', '.') }}
                                    </span>
                                </label>


                            </div>
                        </div>
                        <div class="flex items-center justify-around pt-2">
                            <button id="apply-upsell-btn"
                                class="bg-green-600 px-6 py-3 rounded-lg text-white text-sm hover:bg-green-500 disabled:bg-green-600/30">
                                Pagar agora
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
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
