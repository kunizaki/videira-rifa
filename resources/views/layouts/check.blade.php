
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="stylesheet" href="{{ asset('/css/app-original-2.css') }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Language" content="pt-br">

    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">

    <meta name="color-scheme" content="light only">
    <meta name="X-DarkMode-Default" value="false" />

    @yield('ogContent')


    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

    <!-- Fontawesome CDN -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <!-- jQuery 1.8 or later, 33 KB -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "kjco6qyij5");
    </script>


    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <!-- Fotorama from CDNJS, 19 KB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

    <!--<script defer src="{{ mix('js/app.js') }}"></script>
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>-->

    <title><?php echo @$data['social']->name; ?> @yield('title')</title>


    <meta name="facebook-domain-verification" content="<?php echo @$data['social']->verify_domain_fb; ?>" />

    <?php echo @$data['social']->pixel; ?>


    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        const mp = new MercadoPago("<?php echo @$data['social']->key_pix_public; ?>");
    </script>

    {{-- <style>
        body{
            /* min-height: 105vh; */
        }
        @media (max-width: 768px) {
            .meus-numeros {
                margin-left: 50px !important;
            }

            .header-menu {
                justify-content: space-between !important;
            }
        }

        @media screen and (max-width: 768px) {
        .app-main {
            /* margin-top: 90px !important; */
            margin-top: 20px !important;
            position: absolute;
            z-index: 9999 !important;
        }

        .swal2-container{
            z-index: 99999;
        }
    }

        .app-main {
            margin-bottom: 0px !important;
            min-height: 100vh;
        }

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

            .modal-v2 {
        background-color: #fff !important;
        color: block;
    }

    #telephone {
        border-color: green !important;
    }

    .model-reserva {
        border-color: green !important;
        border-width: medium;
    }

    .model-v2-border {
        border-radius: 10px;
    }

    .fa-whatsapp {
        color:#198754
    }
    </style> --}}

    <link rel="stylesheet" href="{{ asset('css/menu2.css') }}">
</head>

<body>
    @section('sidebar')
    @show

    <?php
    $subDomain = explode('.', request()->getHost());
    ?>

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> --}}
    {{-- <div id="loadingSystem" class="d-none"></div> --}}

    @yield('content')

    <script>
        document.getElementById('telephone').addEventListener('input', function(e) {
            var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
            e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
        });

        document.getElementById('telephone1').addEventListener('input', function(e) {
            var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
            e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
        });

        // function loading() {
        //     var el = document.getElementById('loadingSystem');
        //     el.classList.toggle("d-none");
        // }
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
