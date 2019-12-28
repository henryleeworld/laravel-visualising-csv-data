@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("global.areYouSure")."');",
        'route' => [$routeKey.'.restore', $row->id])) !!}
    {!! Form::submit(trans('global.restore'), array('class' => 'btn btn-xs btn-success')) !!}
    {!! Form::close() !!}
@endcan
@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("global.areYouSure")."');",
        'route' => [$routeKey.'.perma_del', $row->id])) !!}
    {!! Form::submit(trans('global.permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}
@endcan