{!! Form::model($user, [
    'method' => 'PATCH',
    'route' => ['users.update', $user->id],
    'enctype' => 'multipart/form-data',
]) !!}
@csrf
<div class="modal fade text-left" id="ModalEdit{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Name') }}:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Email') }}:</strong>
                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Password') }}:</strong>
                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Confirm Password') }}:</strong>
                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Role') }}:</strong>
                    {!! Form::select('roles[]', $roles, $user->roles->pluck('name', 'name')->all(), [
                        'class' => 'form-control',
                        'multiple',
                    ]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <button type="button" class="btn gray btn-outline-secondary"
                    data-dismiss="modal">{{ __('quitter') }}</button>
                <button type="submit" class="btn btn-warning">{{ __('Edit') }}</button>
            </div>

        </div>

    </div>

</div>

{!! Form::close() !!}
