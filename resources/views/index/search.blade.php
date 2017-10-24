@extends('layouts.index')

@section('content')
<style>
.table{margin-bottom: 0rem;}
.list-group-item{min-width: 1100px;padding: 0px;}
td{text-align:center;}
</style>
<!--<div class='box-center card card-body bg-light'>
    <form class="form-inline" type='get' action="/search/" style=''>
        <div class="form-group">
            <input type="text" class="form-control" name='from' placeholder="Звідки?" value='' required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name='to' placeholder="Куди?" required>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name='date'>
        </div>
        <button type="submit" class="btn btn-success">Розписання і ціни</button>
    </form>
</div>-->
<div>
<ul class="list-group box-center"><br>
    @foreach ($tickets as $ticket)<br>
    <li class="list-group-item">
        <table class="table">
        <tbody>
            <tr>
                <td><b>Звідки:</b> {{ $ticket->city_from_name }}</td>
                <td><b>Куди:</b> {{ $ticket->city_to_name }}</td>
                <td><b>Дата відправлення:</b>{{ $ticket->date }}</td>
                <td class="table-success lead">Ціна: <b>{{ $ticket->price }}&#8372;</b></td>
            </tr> 
            <tr>
                <th class='lead' scope="row"><i>Перевізник: {{ $ticket->bus_cerrier }}</i></th>
                <td colspan="2"><a class="btn btn-outline-info btn-lg btn-block" href="#">деталі</td>
                <td><a href="{{ route('ticket.id', ['id' => $ticket['id']]) }}" class="btn btn-outline-success btn-lg btn-block">Обрати</a></td>
            </tr>
        </tbody>
        </table>      
    </li>
    @endforeach
</ul>
{!! $tickets->appends(request()->input())->links(); !!}
</div>
@endsection
