<!-- Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h2 class="modal-title">
                    Agregar Archivo
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <style>
                .ii {
                    color: red;
                }
            </style>
            <div class="modal-body">
                <h3 class="small" style="font-size: 14px; margin-top: -30px !important;">Asegúrese de completar todos
                    los campos</h3>
                <br>

                <form role="form" method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                    @csrf @method('POST')
                    <div class="row">
                        <input type="hidden" name="campana" value="{{Auth::user()->username}}">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label class="form-control-label">Titulo<i class="ii">*</i></label>
                                <input type="text" class="form-control" placeholder="Titulo" name="titulo" id="titulo"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-control-label" for="exampleFormControlInput1">Tipo de archivo<i
                                            class="ii">*</i></label>
                                    <select class="form-control" name="tipo_archivo" id="tipo_archivo" required>
                                        <option></option>
                                        <option>Excel</option>
                                        <option>PDF</option>
                                        <option>Word</option>
                                </div>
                            </div>
                        </div>
                        <br> 

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-control-label">Archivo<i class="ii">*</i></label>
                                    <input type="file" class="form-control form-control-alternative" name="archivo"
                                        id="archivo" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer no-bd">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>