

<div class="modal fade" id="modal-valide{{ $prospect->id }}">
    <Form action="{{ route('prospect.valider') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <input type="hidden" name="id" value="{{ $prospect->id }}" />
    <input type="hidden" name="prospect.valider" value="1" />
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Validation du Prospect</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Si vous validez vous ne pourriez plus supprimer et modifier ce prospect</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary swalDefaultSuccess">Valider</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</Form>
</div>
