<div class="form-group mb-2">
    {!! Form::label('class', 'Room Name :', ['class' => 'form-control-label h5 mb-1']) !!}
    {!! Form::text('class', null, ['class'=>'form-control '.($errors->has('class') ? 'is-invalid': ''), 'required', 'placeholder' => 'Room Name']) !!}
    {!! $errors->first('class', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-2">
            {!! Form::label('speaker', 'Speaker :', ['class' => 'form-control-label h5 mb-1']) !!}
            {{ Form::select('speaker', $speakers, null, ['required' => 'required', 'class' => 'form-control select2 '.($errors->has('speaker') ? 'is-invalid': ''), 'placeholder' => 'Pilih' ]) }}
            {!! $errors->first('speaker', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-2">
            {!! Form::label('moderator', 'Moderator :', ['class' => 'form-control-label h5 mb-1']) !!}
            {{ Form::select('moderator', $moderators, null, ['required' => 'required', 'class' => 'form-control select2 '.($errors->has('moderator') ? 'is-invalid': ''), 'placeholder' => 'Pilih' ]) }}
            {!! $errors->first('moderator', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
        </div>
    </div>
</div>
<div class="form-group mb-2">
    {!! Form::label('participant', 'Participant :', ['class' => 'form-control-label h5 mb-1']) !!}
    {{ Form::select('participant[]', $participants, null, ['required' => 'required', 'class' => 'form-control select2 '.($errors->has('participant') ? 'is-invalid': ''), 'multiple' => 'multiple']) }}
    {!! $errors->first('participant', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
</div>
{!! Form::submit(isset($model) ? 'Update' : 'Add', ['class'=>'btn btn-primary mt-2']) !!}
