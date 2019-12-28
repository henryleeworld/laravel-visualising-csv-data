@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('cruds.role.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.roles.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('cruds.role.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('permission', trans('cruds.role.fields.permissions').'*', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-permission">
                        {{ trans('global.select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-permission">
                        {{ trans('global.deselect_all') }}
                    </button>
                    {!! Form::select('permission[]', $permissions, old('permission'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-permission' , 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('permission'))
                        <p class="help-block">
                            {{ $errors->first('permission') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script>
        $("#selectbtn-permission").click(function(){
            $("#selectall-permission > option").prop("selected","selected");
            $("#selectall-permission").trigger("change");
        });
        $("#deselectbtn-permission").click(function(){
            $("#selectall-permission > option").prop("selected","");
            $("#selectall-permission").trigger("change");
        });
    </script>
@stop