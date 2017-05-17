@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! - Find other <a href="{{ route('users.index') }}"> users </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Post a Tweet</h3>
            <hr>
            <form method="POST" action="{{ route('tweets.store') }}">
                {{ csrf_field() }}
                <input type="text" name="description" style="width:300px;height:60px;" />
                <input type="submit" class="btn btn-primary" value="Tweet" />
            </form>

            <hr>

            @if (count($tweets) > 0)
                @foreach ($tweets as $tweet)
                <div class="panel panel-primary">
                    <div class="panel-body">
                            <table style="width:100%;">
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $tweet->description }}</div>
                                        <div>{{ $tweet->created_at }}</div>
                                    </td>

                                        @if ($tweet->checkUser(Auth::user()))
                                        <td style="float:right;">
                                            <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <input type="submit" class="btn btn-danger" value="delete" />
                                                </form>
                                           </td>
                                        <td style="float:right; margin-right:5px;">
                                            <form action="{{ route('tweets.showSingle', ['id' => $tweet->id]) }}">
                                                {{ csrf_field() }}

                                                <input type="submit" class="btn btn-success" value="Edit" />
                                            </form>
                                        </td>
                                        @endif
                                </tr>
                            </table>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
@endsection
