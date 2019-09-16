<div class="form-group mb-2">
    {!! Form::label('name', 'Name :', ['class' => 'form-control-label h5 mb-1']) !!}
    {!! Form::text('name', null, ['class'=>'form-control '.($errors->has('name') ? 'is-invalid': ''), 'required', 'placeholder' => 'Name']) !!}
    {!! $errors->first('name', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
</div>
<div class="form-group mb-2">
    {!! Form::label('password', 'Password :', ['class' => 'form-control-label h5 mb-1']) !!}
    {!! Form::password('password', ['class'=>'form-control '.($errors->has('password') ? 'is-invalid': ''), 'placeholder' => 'Password']) !!}
    {!! $errors->first('password', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
</div>
<div class="form-group mb-2">
    {!! Form::label('email', 'Email :', ['class' => 'form-control-label h5 mb-1']) !!}
    {!! Form::email('email', null, ['class'=>'form-control '.($errors->has('email') ? 'is-invalid': ''), 'required', 'placeholder' => 'Email']) !!}
    {!! $errors->first('email', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
</div>
<div class="form-group mb-2">
    {!! Form::label('role', 'Role :', ['class' => 'form-control-label h5 mb-1']) !!}
    {{ Form::select('role', ['admin' => 'Admin', 'speaker' => 'Speaker', 'moderator' => 'Moderator', 'student' => 'Student'], null, ['required' => 'required', 'class' => 'form-control '.($errors->has('role') ? 'is-invalid': ''), 'placeholder' => 'Pilih' ]) }}
    {!! $errors->first('role', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
</div>
{!! Form::submit(isset($model) ? 'Update' : 'Add', ['class'=>'btn btn-primary mt-2']) !!}
