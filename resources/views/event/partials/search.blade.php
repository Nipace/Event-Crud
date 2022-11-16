{{ Form::open(['url' => url()->current(), 'method' => 'GET']) }}
<div class="d-flex form-row mt-2 mb-5">
    <div class="col-md-6 me-2 form-group">
        {{ Form::select('event_type', config('dropdown.event_type'), $params['event_type'] ?? null, [
            'class' => 'form-select',
        ]) }}
    </div>

    <div class="col-md-6 me-2  form-group">
        {{ Form::submit('Search', [
            'class' => 'btn btn-success',
        ]) }}
        <a href="{{ route(Request::route()->getName()) }}" class="btn btn-info">Refresh</a>
    </div>
</div>
{{ Form::close() }}
