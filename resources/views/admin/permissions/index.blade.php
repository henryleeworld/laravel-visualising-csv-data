@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('cruds.permission.title')</h3>
    @can('permission_create')
    <p>
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-success">@lang('global.add')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.csv_file_to_import')</a>
        @include('csvImport.modal', ['model' => 'Permission'])
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($permissions) > 0 ? 'datatable' : '' }} @can('permission_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('permission_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('cruds.permission.fields.title')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($permissions) > 0)
                        @foreach ($permissions as $permission)
                            <tr data-entry-id="{{ $permission->id }}">
                                @can('permission_delete')
                                    <td></td>
                                @endcan

                                <td field-key='title'>{{ $permission->title }}</td>
                                                                <td>
                                    @can('permission_view')
                                    <a href="{{ route('admin.permissions.show',[$permission->id]) }}" class="btn btn-xs btn-primary">@lang('global.view')</a>
                                    @endcan
                                    @can('permission_edit')
                                    <a href="{{ route('admin.permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">@lang('global.edit')</a>
                                    @endcan
                                    @can('permission_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.areYouSure")."');",
                                        'route' => ['admin.permissions.destroy', $permission->id])) !!}
                                    {!! Form::submit(trans('global.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('global.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('permission_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.permissions.mass_destroy') }}';
        @endcan

    </script>
@endsection