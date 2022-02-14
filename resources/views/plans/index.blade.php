@extends('layouts.master')

@section('title', 'Fale Mais')

@section('content')
    <section class="h-100 align-items-center justify-content-center">
        <div class="text-center mt-5">
            <h2 class="text-dark">Simulação FaleMais</h2>
            <p class="text-dark">Fique a vontade para simular todas as opções disponíveis.</p>
            <hr class="divider" />
        </div>

        <div class="d-flex justify-content-center">
            <form id="modal-form" method="POST">
                @include('components.form.select', [
                    'name'    => 'origin',
                    'id'      => 'select_origin',
                    'options' => $cities,
                    'type'    => 'select2',
                    'empty'   => 'Selecione a cidade de origem',
                    'render'  => [
                        'value'    => fn($city) => $city->id,
                        'label'    => fn($city) => $city->formattedName(),
                        'selected' => fn()      => false,
                    ],
                ])

                @include('components.form.select', [
                    'name'    => 'destination',
                    'id'      => 'select_destination',
                    'options' => $cities,
                    'type'    => 'select2',
                    'empty'   => 'Selecione a cidade de destino',
                    'render'  => [
                        'value'    => fn($city) => $city->id,
                        'label'    => fn($city) => $city->formattedName(),
                        'selected' => fn()      => false,
                    ],
                ])

                @include('components.form.input', [
                    'placeholder' => 'Tempo (Em minutos)',
                    'type'        => 'number',
                    'name'        => 'minutes',
                    'id'          => 'input-minutes',
                    'min'         => '0'
                ])

                @include('components.form.select', [
                    'name'    => 'plan',
                    'id'      => 'select_plan',
                    'options' => $plans,
                    'empty'   => 'Selecione o Plano',
                    'render'  => [
                        'value'    => fn($plan) => $plan->id,
                        'label'    => fn($plan) => $plan->name,
                        'selected' => fn()      => false,
                    ],
                ])

                <input type="hidden" id="request-url" value="{{ route('calculate', [
                    'origin'      => ':origin',
                    'destination' => ':destination',
                    'minutes'     => ':minutes',
                    'plan'        => ':plan'
                ]) }}">

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-light mt-3 modal-btn">
                        Consultar
                    </button>
                </div>

                @include('components.form.modal')
            </form>
        </div>
    </section>
@endsection
