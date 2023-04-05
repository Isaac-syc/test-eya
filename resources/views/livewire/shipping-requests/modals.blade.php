<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Solicitud de envío de paquete</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="Nombre completo">Nombre completo</label>
                        <input wire:model="fullname" type="text" class="form-control" id="fullname"
                            placeholder="Nombre completo">
                        @error('fullname')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input wire:model="email" type="text" class="form-control" id="email"
                            placeholder="Email">
                        @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Teléfono</label>
                        <input wire:model="phone_number" type="number" class="form-control" id="phone_number"
                            placeholder="Teléfono">
                        @error('phone_number')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="zip_code_origin">CP Origen</label>
                            <input wire:model="zip_code_origin" type="text" class="form-control" id="zip_code_origin"
                                placeholder="CP Origen">
                            @error('zip_code_origin')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="zip_code_destination">CP Destino</label>
                            <input wire:model="zip_code_destination" type="text" class="form-control"
                                id="zip_code_destination" placeholder="CP Destino">
                            @error('zip_code_destination')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <h6 class="modal-title text-center" id="createDataModalLabel">Datos del paquete</h6>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="long">Largo (CM)</label>
                            <input wire:model="long" type="number" class="form-control" id="long"
                                placeholder="Largo">
                            @error('long')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col">
                            <label for="width">Ancho (CM)</label>
                            <input wire:model="width" type="number" class="form-control" id="width"
                                placeholder="Ancho">
                            @error('width')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="high">Alto (CM)</label>
                            <input wire:model="high" type="number" class="form-control" id="high"
                                placeholder="Alto">
                            @error('high')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col">
                            <label for="weight">Peso (KG)</label>
                            <input wire:model="weight" type="number" class="form-control" id="weight"
                                placeholder="Peso">
                            @error('weight')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Contenido del paquete</label>
                        <textarea wire:model="description" class="form-control" id="description" placeholder="Contenido del paquete"
                            maxlength="255"></textarea>
                        @error('description')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Editar Solicitudes</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="Nombre completo">Nombre completo</label>
                        <input wire:model="fullname" type="text" class="form-control" id="fullname"
                            placeholder="Fullname">
                        @error('fullname')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input wire:model="email" type="text" class="form-control" id="email"
                            placeholder="Email">
                        @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Teléfono</label>
                        <input wire:model="phone_number" type="text" class="form-control" id="phone_number"
                            placeholder="Phone Number">
                        @error('phone_number')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="zip_code_origin">CP Origen</label>
                            <input wire:model="zip_code_origin" type="text" class="form-control" id="zip_code_origin"
                                placeholder="Zip Code Origin">
                            @error('zip_code_origin')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="zip_code_destination">CP Destino</label>
                            <input wire:model="zip_code_destination" type="text" class="form-control"
                                id="zip_code_destination" placeholder="Zip Code Destination">
                            @error('zip_code_destination')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <h6 class="modal-title text-center" id="createDataModalLabel">Datos del paquete</h6>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="long">Largo (CM)</label>
                            <input wire:model="long" type="text" class="form-control" id="long"
                            placeholder="Long">
                            @error('long')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col">
                            <label for="width">Ancho (CM)</label>
                            <input wire:model="width" type="text" class="form-control" id="width"
                                placeholder="Width">
                            @error('width')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="high">Alto (CM)</label>
                            <input wire:model="high" type="text" class="form-control" id="high"
                                placeholder="High">
                            @error('high')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col">
                            <label for="weight">Peso (KG)</label>
                            <input wire:model="weight" type="text" class="form-control" id="weight"
                                placeholder="Weight">
                            @error('weight')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Contenido del paquete</label>
                        <textarea wire:model="description" class="form-control" id="description" placeholder="Contenido del paquete"
                            maxlength="255"></textarea>
                        @error('description')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
