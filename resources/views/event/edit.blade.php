@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Creat Event') }}
                    </div>
                    <div class="card-body">
                        {{ Form::model($model, ['route' => ['events.update',$model->id], 'method' => 'PUT', 'files' => true]) }}
                        <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="lang_english" role="tabpanel">
                                <div class="row g-3">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('title', 'Title' . '(*)') }}
                                        <div class="input-group mb-3 mt-1">
                                            {{ Form::text('title', null, [
                                                'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
                                                'placeholder' => 'Title',
                                            ]) }}
                                            @include('layouts.components.validation', ['name' => 'title'])
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        {{ Form::label('description', 'Description' . '(*)') }}
                                        <div class="input-group mb-3 mt-1">
                                            {{ Form::textarea('description', null, [
                                                'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),
                                                'placeholder' => 'Description',
                                            ]) }}
                                            @include('layouts.components.validation', [
                                                'name' => 'description',
                                            ])
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('start_date', 'Start Date' . '(*)') }}
                                        <div class="input-group mb-3 mt-1">
                                            {{ Form::date('start_date', null, [
                                                'class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''),
                                                'placeholder' => 'Start Date',
                                            ]) }}
                                            @include('layouts.components.validation', [
                                                'name' => 'start_date',
                                            ])
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('end_date', 'End Date' . '(*)') }}
                                        <div class="input-group mb-3 mt-1">
                                            {{ Form::date('end_date', null, [
                                                'class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''),
                                                'placeholder' => 'End Date',
                                            ]) }}
                                            @include('layouts.components.validation', [
                                                'name' => 'end_date',
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" value="SUBMIT"
                            class="btn btn-outline-primary px-5 rounded-0">Update</button>

                        <a type="button" class="btn btn-outline-danger px-5 rounded-0"
                            href="{{ url()->previous() }}">Cancel</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
