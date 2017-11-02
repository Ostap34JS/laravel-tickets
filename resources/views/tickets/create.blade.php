@extends('layouts.app')
<!-- Not completed, in development!-->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New ticket</div>

                    <div class="panel-body">
                        <form action="{{ route('tickets.store') }}" method="post">
                            @if ($errors->count() > 0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            {!! csrf_field() !!}

                            <label for="from_city_id">From city name:</label>
                            <br>
                            <select name="from_city_id" class="form-control">
                                @foreach ($city_names as $city_name)
                                    <option value="{{ $city_name->id }}">{{ $city_name->name }}</option>
                                @endforeach
                            </select><br>
                            <label for="to_city_id">To city name:</label>
                            <br>
                            <select name="to_city_id" class="form-control">
                                @foreach ($city_names as $city_name)
                                    <option value="{{ $city_name->id }}">{{ $city_name->name }}</option>
                                @endforeach
                            </select><br>
                            <br>
                            <fieldset>
                            <legend>Select bus-cerrier:</legend>
                            <div>
                            @foreach ($bus_list as $bus_item)
                                <div style='border: 3px solid #000;'>
                                    <input type="radio" name="bus_id" id='bus_{{ $bus_item->id }}' value="{{ $bus_item->id }}" >
                                    <label for="bus_{{ $bus_item->id }}">
                                        <i>mark:</i> {{ $bus_item->mark }};<br>
                                        <i>bus number:</i> {{ $bus_item->bus_number }};<br>  
                                        <i>cerrier:</i> {{ $bus_item->cerrier }};<br>
                                    </label>
                                </div><br>
                            @endforeach
                            </fieldset>

                            <label for="limit_passenger">Limit passangers</label>
                            <input type="number" class='form-control' name='limit_passenger'>
                            <br>
                            <label for="price">Price (ГРН)</label>
                            <input type="number" class='form-control' name='price' placeholder='500'>
                            <br>
                            <label for="date">Date of departure</label>
                            <input type="datetime-local" class='form-control' name='date'>
                            <br>
                            <br><br>
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection