@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert" >
                    <strong>Success: {{ Session::get('success') }}</strong>
                </div>
            @endif


            <h3>All Users</h3>
            <hr>
            @if (count($users) > 0)
                @foreach ($users as $user)

                    @if ($user->checkUser(Auth::user()))
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table style="width:100%">
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $user->name }}</div>
                                        <div>{{ $user->created_at }}</div>
                                    </td>

                                    <td style="float:right;">
                                            <form action="{{ route('users.follow') }}" method="post">
                                                <input type="hidden"  value="{{ $user->id }}" name="userID" />
                                                {{ csrf_field() }}

                                                <input type="submit" class="btn btn-primary" value="follow" name="followButton" />
                                            </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

@endsection