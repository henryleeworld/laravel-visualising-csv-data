@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('cruds.engagement.title')</h3>
    @can('engagement_create')
    <p>
        <a href="{{ route('admin.engagements.create') }}" class="btn btn-success">@lang('global.add')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csv_file_to_import')</a>
        @include('csvImport.modal', ['model' => 'Engagement'])
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.engagements.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.all')</a></li> |
            <li><a href="{{ route('admin.engagements.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($engagements) > 0 ? 'datatable' : '' }} @can('engagement_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('engagement_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('cruds.engagement.fields.stats_date')</th>
                        <th>@lang('cruds.engagement.fields.fans')</th>
                        <th>@lang('cruds.engagement.fields.engagements')</th>
                        <th>@lang('cruds.engagement.fields.reactions')</th>
                        <th>@lang('cruds.engagement.fields.comments')</th>
                        <th>@lang('cruds.engagement.fields.shares')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($engagements) > 0)
                        @foreach ($engagements as $engagement)
                            <tr data-entry-id="{{ $engagement->id }}">
                                @can('engagement_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='stats_date'>{{ $engagement->stats_date }}</td>
                                <td field-key='fans'>{{ $engagement->fans }}</td>
                                <td field-key='engagements'>{{ $engagement->engagements }}</td>
                                <td field-key='reactions'>{{ $engagement->reactions }}</td>
                                <td field-key='comments'>{{ $engagement->comments }}</td>
                                <td field-key='shares'>{{ $engagement->shares }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.areYouSure")."');",
                                        'route' => ['admin.engagements.restore', $engagement->id])) !!}
                                    {!! Form::submit(trans('global.restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.areYouSure")."');",
                                        'route' => ['admin.engagements.perma_del', $engagement->id])) !!}
                                    {!! Form::submit(trans('global.permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('engagement_view')
                                    <a href="{{ route('admin.engagements.show',[$engagement->id]) }}" class="btn btn-xs btn-primary">@lang('global.view')</a>
                                    @endcan
                                    @can('engagement_edit')
                                    <a href="{{ route('admin.engagements.edit',[$engagement->id]) }}" class="btn btn-xs btn-info">@lang('global.edit')</a>
                                    @endcan
                                    @can('engagement_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.areYouSure")."');",
                                        'route' => ['admin.engagements.destroy', $engagement->id])) !!}
                                    {!! Form::submit(trans('global.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('global.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('engagement_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.engagements.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection