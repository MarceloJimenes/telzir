@extends('layouts.master')
@section('title', 'Página Inicial')

@section('content')
    <div class="back-img"></div>

    <div class="master">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="align-self-end">
                    <h1 class="font-weight-bold text-dark">FaleMais com a <span class="text-white">TELZIR</span></h1>
                    <hr class="divider bg-dark"/>
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-black mb-5">Apresentamos nosso novo plano <strong>FaleMais</strong> onde você pode ligar para qualquer lugar do Brasil pagando bem menos. Prezamos pela transparência, sendo assim, desenvolvemos esse site para que você possa fazer uma simulação de como o FaleMais funciona. É bem simples: Informe a cidade de origem e a cidade de destino. Em seguida, informe os minutos e o plano que deseja simular.</p>
                    <a class="btn btn-xl" href="{{ route('plans.index')}}">Confira</a>
                </div>
            </div>
        </div>
    </div>

@endsection
