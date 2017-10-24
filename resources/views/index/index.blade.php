@extends('layouts.index')

@section('content')
<div class='text-center well jumbotron' id='bus_jumbo'>
    <div style='margin: 20px auto 36px auto;background: rgba(90, 125, 101, 0.5);box-shadow: 8px 5px 13px -2px  #000;padding: 40px;'>
        <h1 style='color:#fff;'>Знайдіть квиток</h1>
        <div class="box-center">
            {!! Form::open(['method'=>'GET','url'=>'search','class'=>'form-inline','role'=>'search'])  !!}
                <div class="form-group">
                    <input type="text" class="form-control" name='from' placeholder="Звідки?" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name='to' placeholder="Куди?" required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name='date'>
                </div>
                <button type="submit" class="btn btn-success">Розписання і ціни</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
