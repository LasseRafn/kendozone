<ul class="nav nav-lg nav-tabs nav-tabs-bottom search-results-tabs">
    @include('layouts.displayMyEntityOnTop')
    <li {{ Route::getFacadeRoot()->current()->uri() == 'federations' ? 'class=active' : '' }}>
        <a href="{{ route('federations.index') }}">
            <i class="position-left"></i> {{trans_choice('core.federation',2)}}
        </a>
    </li>
    <li {{ Route::getFacadeRoot()->current()->uri() == 'associations' ? 'class=active' : '' }}>
        <a href="{{ route('associations.index') }}">
            <i class="position-left"></i> {{trans_choice('core.association',2)}}
        </a>
    </li>
    <li {{ Route::getFacadeRoot()->current()->uri() == 'clubs' ? 'class=active' : '' }}>
        <a href="{{ route('clubs.index') }}"><i class="position-left"></i> {{trans_choice('core.club',2)}} </a>
    </li>
    <li {{ Route::getFacadeRoot()->current()->uri() == 'users' ? 'class=active' : '' }}>
        <a href="{{ route('users.index') }}"><i class="position-left"></i> {{trans_choice('core.user',2)}}</a>
    </li>


    @if (Route::getFacadeRoot()->current()->uri() == 'associations')
        @can('create', new App\Association)
            <span class="pl-10 pull-right">
                    <a id="addAssociation" href="{!!   URL::action('AssociationController@create') !!}"
                       class="btn btn-primary btn-xs "><b><i class="icon-plus22 mr-5"></i></b>
                        @lang('core.addModel', ['currentModelName' => $currentModelName])
                    </a>
                </span>
        @endcan

    @elseif (Route::getFacadeRoot()->current()->uri() == 'clubs')
        @can('create', new App\Club)
            <span class="pl-10 pull-right">
                    <a id="addClub" href="{!!   URL::action('ClubController@create') !!}"
                       class="btn btn-primary btn-xs "><b><i class="icon-plus22 mr-5"></i></b>
                        @lang('core.addModel', ['currentModelName' => $currentModelName])
                    </a>
                </span>
        @endcan

    @elseif (Route::getFacadeRoot()->current()->uri() == 'users')
        <span class="pl-10 pull-right">
                    <a href="{!!   URL::action('UserController@create') !!}" id="adduser"
                       class="btn btn-primary btn-xs "><b><i class="icon-plus22 mr-5"></i></b>
                        @lang('core.addModel', ['currentModelName' => $currentModelName])
                    </a>
                </span>
        <a href="{!!   URL::action('UserController@export') !!}"
           class="btn btn-success btn-xs pull-right">
            <i class="icon-file-excel position-left"></i>{{trans('core.export_excel')}}
        </a>
    @endif

</ul>

</ul>