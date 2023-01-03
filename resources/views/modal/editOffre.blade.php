<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Offre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="editForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="editname" type="text" name="name" value="" placeholder="Name"
                                    required class="form-control @error('matricul') is-invalid @enderror">
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="name">Code</label>
                                <input id="editcode" type="text" name="code" value="" placeholder="Code"
                                    required class="form-control @error('matricul') is-invalid @enderror">
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <p><button class="btn btn-warning" id="btnCreate" type="submit">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function sweetalert() {
        swal({
            title: "Message de confirmation !",
            text: "Modification succès!",
            icon: "success",
        });
    }
</script>
