@can($gateKey.'view')
    <a href="{{ route($routeKey.'.show', $row->id) }}"
       class="btn btn-xs btn-primary">@lang('global.view')</a>
@endcan
@can($gateKey.'edit')
    <a href="{{ route($routeKey.'.edit', $row->id) }}" class="btn btn-xs btn-info">@lang('global.edit')</a>
@endcan
@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("global.areYouSure")."');",
        'route' => [$routeKey.'.destroy', $row->id])) !!}
    {!! Form::submit(trans('global.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}
@endcan