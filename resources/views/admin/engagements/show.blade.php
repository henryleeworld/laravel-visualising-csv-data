@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('cruds.engagement.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('cruds.engagement.fields.stats_date')</th>
                            <td field-key='stats_date'>{{ $engagement->stats_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('cruds.engagement.fields.fans')</th>
                            <td field-key='fans'>{{ $engagement->fans }}</td>
                        </tr>
                        <tr>
                            <th>@lang('cruds.engagement.fields.engagements')</th>
                            <td field-key='engagements'>{{ $engagement->engagements }}</td>
                        </tr>
                        <tr>
                            <th>@lang('cruds.engagement.fields.reactions')</th>
                            <td field-key='reactions'>{{ $engagement->reactions }}</td>
                        </tr>
                        <tr>
                            <th>@lang('cruds.engagement.fields.comments')</th>
                            <td field-key='comments'>{{ $engagement->comments }}</td>
                        </tr>
                        <tr>
                            <th>@lang('cruds.engagement.fields.shares')</th>
                            <td field-key='shares'>{{ $engagement->shares }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.engagements.index') }}" class="btn btn-default">@lang('global.back_to_list')</a>
        </div>
    </div>
@stop
