@if (!env('HIDE_FOOTER'))
<footer class="footer "
    style="height:auto;background-color: #000;margin-top:0px!important; text-align: center;">
    @if (env('AGENCY_RAUEN'))
        <a href="https://acshost.com.br/" target="_blank" style="text-decoration: none"><span
                class="text-muted" style="color: #fff!important; font-size: 12px;">Desenvolvido por ACSHost</span></a>
        </div>
    @else
        <a href="https://wa.me/5534997153856" target="_blank" style="text-decoration: none"><span
                class="text-muted" style="color: #fff!important; font-size: 12px;">Powered by André Kunizaki</span></a>
        </div>
    @endif
</footer>
@endif