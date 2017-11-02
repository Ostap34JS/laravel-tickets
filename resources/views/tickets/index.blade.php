@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Tickets</div>

                    <div class="panel-body" style="overflow-x:auto;">
                        <table id='#tickets-table' class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Звідки</th>
                                    <th>Куди</th>
                                    <th>Перевізник</th>
                                    <th>Ліміт місць</th>
                                    <th>Куплених місць</th>
                                    <th>Ціна</th>
                                    <th>Дата відправлення</th>
                                    <th>Створено</th>
                                    <th>Оновлено</th>
                                    <th>Дії</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->city_from_name }}</td>
                                    <td>{{ $ticket->city_to_name }}</td>
                                    <td>{{ $ticket->bus_cerrier }}</td>
                                    <td>{{ $ticket->limit_passenger }}</td>
                                    <td>{{ $ticket->number_passenger }}</td>
                                    <td>{{ $ticket->price }}</td>
                                    <td>{{ $ticket->date }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>{{ $ticket->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-default">Edit</a>
                                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No entries found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $tickets->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection