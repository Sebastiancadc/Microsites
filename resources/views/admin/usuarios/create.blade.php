<!-- Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h2 class="modal-title">
                    Crear Campaña
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="small" style="font-size: 14px;">Cree un nuevo usuario usando este formulario, asegúrese de llenar todos los campos</h3>
                <br>

                <form role="form" method="POST" action="{{url('admin/usuario')}}">
                    @csrf @method('POST')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Tu nombre..." name="username" >
                                @if ($errors->has('name'))
                                <strong class="text-danger tamano">{{ $errors->first('name') }}</strong>
                                @endif
                            </div>    
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Ciudad</label>
                                <div class="col-md-12">
                                    <select id="basic" name="ciudad" class="col-md-15">
                                        <option value="">&nbsp;</option>
                                        <option value="Bogota">Bogotá</option>
                                        <option value="Barranquilla">Barranquilla</option>
                                        <option value="Medellin">Medellín</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="role" value="Campaña" hidden>
                        <input type="text" class="form-control" name="Rol_Id_Rol" value="1" hidden>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Contraseña</label>
                                <input class="form-control" type="password" name="password" >
                                @if ($errors->has('password'))
                                <strong class="text-danger tamano">{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Confirmar contraseña</label>
                                <input class="form-control" type="password" name="password_confirmation" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" class="btn btn-primary">Añadir</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>