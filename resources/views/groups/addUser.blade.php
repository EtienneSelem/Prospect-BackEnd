{!! Form::open(['route' => 'groupusers.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
@csrf
<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="col-xs-12 col-sm-12 col-md-12">
                {!! Form::hidden('group_id', $group->id,) !!}
                <div class="form-group">
                    <label for="city" class="text-info">Utilisateurs :</label><br>
                    {{-- {{Form::select('users[]',$usersIdNotExistsName, null, ['class' => 'form-control','multiple','multiple'=> 'true'])}} --}}
                    <select class="form-control select2bs4" multiple="multiple" name="users[]" style="width: 100%;">
                        @foreach ($usersIdNotExistsName as $item)
                        <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                      </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <button type="button" class="btn gray btn-outline-secondary"
                    data-dismiss="modal">{{ __('Quitter') }}</button>
                <button type="submit" class="btn btn-success">{{ __('Ajouter') }}</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<!-- .container-fluid -->