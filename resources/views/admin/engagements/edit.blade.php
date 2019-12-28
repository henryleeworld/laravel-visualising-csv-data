@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('cruds.engagement.title')</h3>
    
    {!! Form::model($engagement, ['method' => 'PUT', 'route' => ['admin.engagements.update', $engagement->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('stats_date', trans('cruds.engagement.fields.stats_date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('stats_date', old('stats_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('stats_date'))
                        <p class="help-block">
                            {{ $errors->first('stats_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fans', trans('cruds.engagement.fields.fans').'', ['class' => 'control-label']) !!}
                    {!! Form::number('fans', old('fans'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fans'))
                        <p class="help-block">
                            {{ $errors->first('fans') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('engagements', trans('cruds.engagement.fields.engagements').'', ['class' => 'control-label']) !!}
                    {!! Form::number('engagements', old('engagements'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('engagements'))
                        <p class="help-block">
                            {{ $errors->first('engagements') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('reactions', trans('cruds.engagement.fields.reactions').'', ['class' => 'control-label']) !!}
                    {!! Form::number('reactions', old('reactions'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('reactions'))
                        <p class="help-block">
                            {{ $errors->first('reactions') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comments', trans('cruds.engagement.fields.comments').'', ['class' => 'control-label']) !!}
                    {!! Form::number('comments', old('comments'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('comments'))
                        <p class="help-block">
                            {{ $errors->first('comments') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('shares', trans('cruds.engagement.fields.shares').'', ['class' => 'control-label']) !!}
                    {!! Form::number('shares', old('shares'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('shares'))
                        <p class="help-block">
                            {{ $errors->first('shares') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop