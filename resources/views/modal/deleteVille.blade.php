<div class="modal fade" id="modal-primary">
    <Form action="" id="FormVille" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Attention Suppression</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Si vous supprimez, vous ne pouvez plus reprendre.</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-light">Supprimer</button>
                </div>
            </div>
        </div>
    </Form>
</div>
