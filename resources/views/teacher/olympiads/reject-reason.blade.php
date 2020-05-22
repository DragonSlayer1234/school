@extends('layouts.app')
@section('content')
    <main class="container-fluid main-container p-5">
        <h5 class="text-center mb-3">Внимание! Данная олимпиада была отклонена администратором</h5>
        <div class="row justify-content-center">
            <div class="col-5 main-olympiad">
                <h5 class="mb-3">{{ $olympiad->name }}</h5>
                <p class="mb-5">
                    <i class="far fa-calendar-alt"></i> Дата проведения: {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г.') }}
                    - {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г.') }}
                </p>
                <h5>ОБ ОЛИМПИАДЕ</h5>
                <hr>

                <p>{{ $olympiad->description }}</p>

                <hr>

                <p><i class="far fa-clock"></i> Начало в {{ $olympiad->getStartDate()->format('H:i') }}</p>
                <p><i class="far fa-hourglass"></i> Длительность - {{ $olympiad->getDuration() }}</p>
                <p><i class="far fa-bookmark"></i> Предмет: {{ $olympiad->subject->name }} </p>
                <p><i class="fas fa-tenge"></i> Цена за участие: {{ $olympiad->getCost() }}</p>


            </div>


            <div class="col-3">

                <div class="card border-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Причина отклонения:</div>
                    <div class="card-body">
                        <p class="card-text text-danger">{{ $olympiad->reason->reason }}</p>
                    </div>
                </div>
            </div>

        </div>
    </main>


@endsection
