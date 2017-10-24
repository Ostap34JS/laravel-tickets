@extends('layouts.index')
@section('content')
@foreach ($result as $ticket)
<div class="container">
   <div class="row">
      <div class="col">
        <ul class="list-group">
          <li class="list-group-item">
            Звідки: <b>{{ $ticket->city_from_name }}</b>
          </li>
          <li class="list-group-item">
            Куди: <b>{{ $ticket->city_to_name }}</b>
          </li>
          <li class="list-group-item list-group-item-warning">
            Номер автобуса: <b>{{ $ticket->bus_number }}</b>
          </li>
          <li class="list-group-item list-group-item-warning">
            Перевізник: <b>{{ $ticket->city_to_name }}</b>
          </li>
          <li class="list-group-item list-group-item-warning">
            Марка автобуса: <b>{{ $ticket->bus_mark }}</b>
          </li>
          <li class="list-group-item">
            Ліміт пасажирів: <b>{{ $ticket->limit_passenger }}</b>
          </li>
          <li class="list-group-item">
            Дата відправлення: <b>{{ $ticket->date }}</b>
          </li>
          <li class="list-group-item list-group-item-success">
            Ціна: <b>{{ $ticket->price }} грн</b>
          </li>
        </ul>
      </div>
      <div class="col">
         <div class="mx-auto" style="width: 400px;">
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  <!--<script>
                     swal({
                         icon: "error",
                         text: '{{ $error }}'
                     });
                     </script>-->
                  @endforeach
               </ul>
            </div>
            @endif
            {{ Form::open(['action' => 'BuyController@payTicket']) }}
            {{ Form::label('first_name', 'Ім\'я')}}<br>
            {{ Form::text('first_name','',   ['class' => 'form-control', 'req1uired' => 'req1uired'])}}
            <br>
            {{ Form::label('last_name', 'Прізвище')}}<br>
            {{ Form::text('last_name','',    ['class' => 'form-control', 'req1uired' => 'req1uired'])}}
            <br>
            {{ Form::label('phone_numer', 'Номер телефону')}}<br>
            {{ Form::text('phone_number','', ['class' => 'form-control', 'req1uired' => 'req1uired'])}}
            <br>
            {{ Form::label('email', 'Емейл-адреса')}}<br>
            {{ Form::email('email','',       ['class' => 'form-control', 'req1uired' => 'req1uired'])}}
            <br>
            {{ Form::hidden('ticket_id', $ticket->id)}}
            {{ Form::submit('Оплатити',      ['class' => 'btn btn-outline-warning  btn-lg btn-block'])}}
            {{ Form::close() }}
         </div>
      </div>
   </div>
</div>
@endforeach
@endsection