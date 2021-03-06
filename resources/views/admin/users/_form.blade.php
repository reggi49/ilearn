<div class="box-body">
    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
        {!! Form::label('username', 'Username', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('username', null, ['class'=> 'form-control', 'id' => 'username', 'autocomplete' => 'off']) !!}
            {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
        {!! Form::label('firstname', 'Nama Depan', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('firstname', null, ['class'=> 'form-control', 'id' => 'firstname', 'autocomplete' => 'off']) !!}
            {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
        {!! Form::label('lastname', 'Nama Belakang', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('lastname', null, ['class'=> 'form-control', 'id' => 'lastname', 'autocomplete' => 'off']) !!}
            {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
        {!! Form::label('role', 'Peran', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('role', ['staff' => 'Tata Usaha', 'teacher' => 'Guru', 'student' => 'Siswa'], null, ['class'=>'form-control select2', 'id' => 'role', 'placeholder' => 'Pilih peran...'] ) !!}
            {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('email', null, ['class'=> 'form-control', 'id' => 'email', 'autocomplete' => 'off']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    @if(Route::currentRouteName('lms-index.users.edit'))
        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            {!! Form::label('status', 'Status', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('status', ['active' => 'Active', 'banned' => 'Banned'], null, ['class'=>'form-control select2', 'id' => 'status', 'placeholder' => 'Status Akun...'] ) !!}
                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endif

    <div class="box-footer">
        <div class="col-md-offset-3">
            {!! Form::submit('Update', ['class'=>'btn btn-flat btn-success']) !!}
        </div>
    </div>
</div>