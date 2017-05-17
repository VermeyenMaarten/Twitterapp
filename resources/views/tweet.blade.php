@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">

            <h3>Edit Tweet</h3>
            <hr>

                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <table style="width:100%;">
                                    <tr>

                                        <td>
                                            <form method="POST" action="{{ route('tweets.update', ['id' => $tweets->id ]) }}">

                                            <textarea name="description" style="width:70%;">{{ $tweets->description }}</textarea>

                                                <input type="hidden" name="_method" value="POST" />
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <input type="submit" class="btn btn-success" value="Save" />
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

        </div>
    </div>
@endsection