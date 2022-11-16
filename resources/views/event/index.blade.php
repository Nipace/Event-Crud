@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Events') }}
                        <a href="{{ route('events.create') }}" class="btn btn-success"> Create</a>
                    </div>
                    <div class="card-body">
                        @include('event.partials.search')
                        <table class="table border">
                            <thead>
                                <td>S.N</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Start Date</td>
                                <td>End Date</td>
                                <td>Actions</td>
                            </thead>
                            <tbody>
                                @forelse ($records as $record)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $record->title }}</td>
                                        <td>{{ Str::limit($record->description, 20, '...') }}</td>
                                        <td>{{ $record->start_date }}</td>
                                        <td>{{ $record->end_date }}</td>
                                        <td>
                                            {{ Form::open(['method' => 'DELETE', 'class' => 'inline','id'=>'deleteForm' ,'route' => ['events.destroy',$record->id]]) }}
                                            <a class="btn btn-primary" href="{{ route('events.edit', $record->id) }}">Edit</a>
                                            <button class="btn btn-danger" type="submit" onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                Delete
                                            </button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center"> No Data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
