@extends('layouts.admin')

@section('content')
    <br><br>
    @foreach ($videos as $key => $video)
        @if ($key > 0)
            <hr><hr>
        @endif

        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-12 justify-content-center text-center">
                <h6>{{ $video->title }}</h6>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    @endforeach
     <div class="row d-flex justify-content-center text-center">
        <div class="col-md-12 justify-content-center text-center">
            <h6>Cadastrando Rifas com 1 Milhão de cotas </h6>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/6KI10aJC1S8?si=YHSD1G_nGx-JBMRw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>

    <hr>
    <hr>

    <div class="row d-flex justify-content-center text-center">
        <div class="col-md-12 justify-content-center text-center">
            <h6>Cadastrando Rifas com 100 cotas </h6>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/1L6sCk38q64?si=fXrXUY-Y7O1M8eXx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div> 

    <br><br><br>
@endsection