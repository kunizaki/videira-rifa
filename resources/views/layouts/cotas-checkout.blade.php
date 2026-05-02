<div class="raffles mt-2 max-h-24 overflow-auto">
    @foreach ($participante->numbers() as $reserva)
        <span class="badge bg-success text-green-600"> <i class="fa fa-check"></i> {{ $reserva }},</span>
    @endforeach
</div>

@if ($participante->is_premiada()->ganhou)
    <div class="w-full flex flex-col bg-emerald-100 p-5 text-emerald-700 rounded mt-2">
        <span>
            Parabéns! {{ $participante->name }} sua compra possui
            {{ count($participante->is_premiada()->numeros) }} titulo(s) contemplado(s)
            na modalidade premiação instantânea:

            @foreach ($participante->is_premiada()->numeros as $nump)
                <span class='text-emerald-700'>{{ $nump }},</span>
            @endforeach

        </span>
        <a class="bg-[#25d366] p-2 rounded text-center text-white" style="border: none;"
            href="{{ $participante->is_premiada()->link }}" target="_blank" rel="noreferrer noopener" role="button"><i
                class="bi bi-whatsapp" style="font-size: 14px;"> falar com
                suporte</i></a>
    </div>
@else
    <div class="cota-card cota-alert-loss">Nenhum dos seus números foi premiado.
    </div>
@endif
