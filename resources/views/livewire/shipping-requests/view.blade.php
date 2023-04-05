@section('title', __('Shipping Requests'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Solicitudes </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Solicitudes">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Solicitud
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.shipping-requests.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
                                <td>USUARIO</td>
								<th>CP ORIGEN</th>
								<th>CP DESTINO</th>
								<th>PAQUETE</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($shippingRequests as $row)
							<tr>
                                <td class="d-flex align-items-start">
                                    <img src="https://cdn.icon-icons.com/icons2/2556/PNG/512/profile_picture_user_icon_153075.png" alt="profile picture" width="50" class="mr-3">
                                    <div class="ms-3">
                                        <div>{{$row->fullname}}</div>
                                        <div>{{$row->email}}</div>
                                        <div>{{$row->phone_number}}</div>
                                    </div>
                                </td>
                                <td class="text-center">{{$row->zip_code_origin}}</td>
                                <td class="text-center">{{$row->zip_code_destination}}</td>
                                <td>
                                    <ul style="list-style-type: none;">
                                        <li>
                                            <strong>Contenido del paquete</strong>
                                        </li>
                                        <li>
                                            <strong>Largo: </strong>{{$row->long}}
                                        </li>
                                        <li>
                                            <strong>Ancho: </strong>{{$row->width}}
                                        </li>
                                        <li>
                                            <strong>Alto: </strong>{{$row->high}}
                                        </li>
                                        <li>
                                            <strong>Peso: </strong>{{$row->weight}}
                                        </li>
                                    </ul>
                                </td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Shipping Request id {{$row->id}}? \nDeleted Shipping Requests cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>
										</ul>
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>
					<div class="float-end">{{ $shippingRequests->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
