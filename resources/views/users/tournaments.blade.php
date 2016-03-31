@extends('layouts.dashboard')
@section('scripts')
    {!! Html::script('js/pages/header/tournamentIndex.js') !!}
@stop
@section('breadcrumbs')
    {!! Breadcrumbs::render('users.tournaments',Auth::user()) !!}

@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-8 col-lg-offset-2">
                <div class="panel panel-flat">

                    <div class="panel-body">
                        <div class="container-fluid">
                            @if (sizeof($tournaments) == 0)


                                <fieldset title="MIS TORNEOS">
                                    <legend class="text-semibold">{{ trans('core.tournaments_registered') }}</legend>
                                </fieldset>

                                <div class="mt-20 mb-20 pt-20 pb-20 text-center">{{ trans('core.no_tournament_created_yet') }}</div>
                                <div class="text-center pb-20">
                                    <a href="{!! URL::action('TournamentController@create') !!}" type="button"
                                       class="btn border-primary btn-flat text-primary text-uppercase p-10 ">{{ trans('crud.createTournament') }}
                                        {{--( {{trans('core.soon')}} )--}}
                                    </a>
                                </div>


                            @else

                            {{--<div class="row col-md-10 custyle">--}}
                            <table class="table table-togglable table-hover">
                                <thead>


                                <tr>
                                    <th data-toggle="true">{{ trans('crud.name') }}</th>
                                    <th data-hide="phone">{{ trans('crud.date') }}</th>
                                    <th data-hide="phone">{{ trans('crud.owner') }}</th>

                                </tr>
                                </thead>
                                @foreach($tournaments as $tournament)
                                    <tr id="{!! $tournament->slug !!}">
                                        <td>
                                            @if (Auth::user()->canEditTournament($tournament) )
                                                <a href="{!!   URL::action('TournamentController@edit',  $tournament->slug) !!}">{{ $tournament->name }}</a>
                                            @else
                                                <a href="{!!   URL::action('TournamentController@show',  $tournament->slug) !!}">{{ $tournament->name }}</a>
                                            @endif
                                        </td>
                                        <td>{{ $tournament->dateIni }}</td>
                                        <td>{{ $tournament->owner->name}}</td>

                                    </tr>

                                @endforeach

                            </table>
                            <div class="text-center">{!! $tournaments->render() !!}</div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("errors.list")
@stop
@section("scripts_footer")
    <script>
        var url = "{{ url("/tournaments") }}";

    </script>
    {!! Html::script('js/pages/footer/tournamentIndexFooter.js') !!}
@stop