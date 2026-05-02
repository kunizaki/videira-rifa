@extends('layouts.check')

<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />

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
        <div class="container mx-auto">
            <a href="/sorteio/{{ $rifaDestaque->slug }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                </svg>

            </a>
        </div>
        <div class="max-w-[600px] mx-auto">
            <div class="flex flex-col items-center pt-14">

                <h1 id="title-checkout" class="text-white font-medium text-xl px-4 py-5 text-center md:text-3xl md:mb-10">
                    Falta pouco! Copie e cole o código a seguir no seu app de pagamentos ou Internet Banking
                </h1>

                <div class="bg-white shadow-lg rounded-lg p-6 mx-4 md:w-full mx-auto space-y-10 mb-5">
                    <div class="w-full flex items-start">
                        <div class="hidden md:w-1/3 md:block">
                            <img src="/products/{{ $rifaDestaque->imagem()->name }}" alt="Imagem do sorteio">
                        </div>
                        <div class="w-full md:w-2/3 pl-3 ">
                            <div class="flex flex-col text-gray-900 space-y-1 text-sm">
                                <div class="flex justify-between">
                                    <span class="font-bold">Sorteio:</span>
                                    <span>{{ $rifaDestaque->name }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold">Quantidade:</span>
                                    <span>{{ count($participante->numbers()) }} cotas</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Valor por cota:</span>
                                    <span>R$ {{ $rifaDestaque->price }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold flex items-center justify-between w-full">

                                        <span class="mr-3">Cotas:</span>

                                        <span class="ml-3 flex">
                                            <small id='my-cotas' class="text-gray-500">
                                                Disponível após pagamento

                                            </small>
                                        </span>
                                    </span>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="py-4" id="order-details-section">
                        <p>Valor a ser pago: <b>R$ {{ $price }}</b></p>


                        <img id="qrcode" class="w-44 h-44 mx-auto my-10" src="data:image/jpeg;base64,{{ $qrCode }}"
                            alt="qrcode">
                        <div>
                            <div class="countdown-container">
                                <div class="text-gray-700 font-normal text-sm text-center">
                                    <span>Expira em:</span>
                                    <span id="text-countdown-time" class="text-md font-semibold"></span>
                                </div>
                                <div class="relative border border-gray-200 rounded mb-2">
                                    <div id="progress-bar" class="h-2 w-full">
                                        <div class="fill h-full bg-yellow-400 rounded" id="progress-fill"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:flex md:flex-col md:w-full md:my-3" id="copia">
                                <label for="hash">
                                    <small class="font-sm text-gray-900">Se preferir, você pode pagá-lo copiando e colando
                                        o código abaixo:</small>
                                </label>

                                <input
                                    class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                    id="hash" value="{{ $codePIX }}" type="text">
                            </div>

                            <div class="flex flex-col items-center">
                                <button id="copy-pix-hash-btn"
                                    class="bg-green-500 disabled:bg-gray-300 disabled:cursor-not-allowed p-2 rounded-lg text-white w-40 mb-5 hover:bg-green-600">
                                    Copiar código
                                </button>
                            </div>
                            <div class="flex flex-col items-center">
                                <button id="verify-payment-btn" disabled
                                    class="bg-green-500 disabled:bg-gray-300 disabled:cursor-not-allowed p-2 rounded-lg text-white hover:bg-green-600">
                                    Já fiz o Pagamento
                                </button>
                            </div>
                            <div class="flex justify-center">
                                <div class="pt-5">
                                    <small>
                                        <a href="https://api.whatsapp.com/send/?phone={{ $user->telephone }}"
                                            target="_blank" class="text-sm text-gray-600">Precisa de ajuda? Clique aqui</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id='retorno' class="flex flex-wrap hidden">
                        <a href="/sorteio/{{ $rifaDestaque->slug }}"
                            class="flex justify-center item-center bg-green-500 px-6 py-3 rounded-lg text-white mr-4 hover:bg-green-600 w-full mb-2 md:w-5/12">
                            Voltar ao sorteio
                        </a>
                        <a href="{{ route('comprovanteRifaPDF', $participante->id) }}"
                            class="flex justify-center item-center bg-green-500 px-6 py-3 rounded-lg text-white mr-4 hover:bg-green-600 w-full mb-2 md:w-5/12">
                            Baixar Comprovante
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        const min_rest = {{ $minutosRestantes }};
        const totalMilliseconds = min_rest * 60 * 1000;

        const countdownDate = new Date().setMinutes(new Date().getMinutes() + min_rest);
        const countdownTime = document.getElementById('text-countdown-time');
        const progressFill = document.getElementById('progress-fill');
        const progressBar = document.getElementById('progress-bar');
        const copyPixHashBtn = document.getElementById('copy-pix-hash-btn');
        const verifyPaymentBtn = document.getElementById('verify-payment-btn');
        const applyUpsellBtn = document.getElementById('apply-upsell-btn');
        const upsellForm = document.getElementById('upsell-form');
        const upsellCheckbox = document.getElementById('upsell');
        const orderDetailsSection = document.getElementById('order-details-section');
        const retorno = document.getElementById('retorno');
        const cotas = document.getElementById('my-cotas');
        const TitleCheckout = document.getElementById('title-checkout');
        const countdownContainer = document.querySelector('.countdown-container');
        const qrcode = document.getElementById('qrcode');
        const hash = document.getElementById('hash');
        const timer = setInterval(() => {
            const now = new Date().getTime();
            const difference = countdownDate - now;
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);
            
            // Formatação com zero à esquerda
            const displayMinutes = minutes < 10 ? '0' + minutes : minutes;
            const displaySeconds = seconds < 10 ? '0' + seconds : seconds;
            countdownTime.innerHTML = `${displayMinutes}:${displaySeconds}`;
            
            const percent = Math.floor((difference / totalMilliseconds) * 100);
            console.log(percent);
            progressFill.style.width = `${percent}%`;
            if (difference < 0) {
                clearInterval(timer);
                countdownContainer.classList.add('hidden');
                orderDetailsSection.classList.add('hidden');
                qrcode.classList.add('hidden');
                hash.classList.remove('hidden');
                window.location.href = "/sorteio/{{ $rifaDestaque->slug }}";

            }
        }, 1000);
        const pay = setInterval(() => {
            fetch("{{ route('findPixStatus', $codePIXID . '-' . $productID) }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        'id': "{{ $codePIXID }}",
                        'product_id': "{{ $productID }}"
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Polling payment status:", data);
                    if (data.status === true) {
                        console.log("Pagamento confirmado, redirecionando para: {{ route('getComprovante', $participante->id) }}");
                        window.location.href = "{{ route('getComprovante', $participante->id) }}";
                    }

                })
                .catch(error => {
                    console.error("Erro na verificação automática:", error);
                });
        }, 4000);

        copyPixHashBtn.addEventListener('click', () => {
            const copy = document.getElementById('copia');
            copy.classList.remove('hidden');
            hash.select();
            hash.setSelectionRange(0, 99999);
            document.execCommand("copy");
            copy.classList.add('hidden');
            copyPixHashBtn.innerHTML = 'COPIADO';
            copyPixHashBtn.classList.add('bg-green-600');
            copyPixHashBtn.classList.remove('bg-green-500');
            // navigator.clipboard.writeText(hash.value);
            Toastify({
                text: "Código copiado com sucesso!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "center", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#15A34A",
                },
            }).showToast();
            setTimeout(() => {
                copyPixHashBtn.innerHTML = 'Copiar código';
                copyPixHashBtn.classList.remove('bg-green-600');
                copyPixHashBtn.classList.add('bg-green-500');
            }, 4000);
        });
        setTimeout(() => {
            verifyPaymentBtn.disabled = false;
        }, 60000);

        verifyPaymentBtn.addEventListener('click', () => {
            fetch("{{ route('findPixStatus', $codePIXID . '-' . $productID) }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        'id': "{{ $codePIXID }}",
                        'product_id': "{{ $productID }}"
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Manual payment check:", data);
                    if (data.status === true) {
                        console.log("Pagamento confirmado via botão, redirecionando para: {{ route('getComprovante', $participante->id) }}");
                        window.location.href = "{{ route('getComprovante', $participante->id) }}";
                    } else {
                        Toastify({
                            text: "Pagamento ainda não detectado. Por favor, aguarde alguns instantes e tente novamente.",
                            duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "bottom",
                            position: "center",
                            stopOnFocus: true,
                            style: {
                                background: "#EF4444",
                            },
                        }).showToast();
                    }

                })
                .catch(error => {
                    console.error("Erro no clique do botão:", error);
                });
            verifyPaymentBtn.innerHTML = 'Verificando...';
            verifyPaymentBtn.classList.add('bg-green-600');
            verifyPaymentBtn.classList.remove('bg-green-500');
            setTimeout(() => {
                verifyPaymentBtn.innerHTML = 'Já fiz o Pagamento';
            }, 3000);
        });
    </script>
@endsection
