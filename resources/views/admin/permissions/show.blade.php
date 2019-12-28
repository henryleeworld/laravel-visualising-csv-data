@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('cruds.permission.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('cruds.permission.fields.title')</th>
                            <td field-key='title'>{{ $permission->title }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#roles" aria-controls="roles" role="tab" data-toggle="tab">Roles</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="roles">
<table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('cruds.role.fields.title')</th>
                        <th>@lang('cruds.role.fields.permissions')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($roles) > 0)
            @foreach ($roles as $role)
                <tr data-entry-id="{{ $role->id }}">
                    <td field-key='title'>{{ $role->title }}</td>
                                <td field-key='permission'>
                                    @foreach ($role->permission as $singlePermission)
                                        <span class="label label-info label-many">{{ $singlePermission->title }}</span>
                                    @endforeach
                                </td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('roles.show',[$role->id]) }}" class="btn btn-xs btn-primary">@lang('global.view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">@lang('global.edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.areYouSure")."');",
                                        'route' => ['roles.destroy', $role->id])) !!}
                                    {!! Form::submit(trans('global.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('global.no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.permissions.index') }}" class="btn btn-default">@lang('global.back_to_list')</a>
        </div>
    </div>
@stop
