@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h3>Global Tweets</h3>
            <hr>
        @if (count($tweets) > 0)
            @foreach ($tweets as $tweet)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table>
                            <tr>
                                <td class="table-text">
                                    <div>{{ $tweet->description }}</div>
                                    <div>{{ $tweet->created_at }}</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
</div>

@endsection