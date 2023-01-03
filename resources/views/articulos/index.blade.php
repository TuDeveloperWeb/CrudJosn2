<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.2.1 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/982b1ca465.js" crossorigin="anonymous"></script>


	<!--Data table  -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

	<!-- Font awesome -->
	<script src="https://kit.fontawesome.com/982b1ca465.js" crossorigin="anonymous"></script>

</head>

<style>
	.loader {
		position: fixed;
		height: 2em;
		width: 2em;
		overflow: visible;
		margin: auto;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		z-index: 100000000;
		display: none;
	}

	.center-align {
		text-align: center;
	}

	.cursor {
		cursor: pointer;
	}
</style>

<body>


	<div class="loader">
		<img src="{{asset("/img/loader.gif")}}">
	</div>



	<div class="card-header">
		<div class="content-header-right col-md-12 col-12">
			<h3>Articulos</h3>
		</div>
	</div>
	<!-- Contenido General -->




	<form class="form-control form-cotizacion">
		@csrf
		<div class="card-body bg-white">
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="table-responsive" id="tbItems" style="overflow: auto;">
						<table id="tblArticulo" class="table table-bordered">
							<thead>
								<tr>
									<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('#') }}</th>
									<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Visualizar') }}</th>
									<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Id. Articulo') }}</th>
									<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Codigo') }}</th>
									<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Descripcion') }}</th>
									<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Cantidad') }}</th>
									<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Precio') }}</th>
								</tr>
							</thead>

							<tbody>

							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				Detalle Requisicion
			</div>

			<div class="card-body">
				<label for="observacion">Observacion</label>

				<div class="mb-1">
					<label for="" class="form-label"></label>
					<textarea class="form-control" name="observacion" id="observacion" rows="3"></textarea>
				</div>
			</div>
			<div class=" card-body form-actions text-left mt-3">
				<button type="submit" class="btn btn-success" id="procesar" name="btnProcesar" value="btnProcesar">
					<i class="far fa-thumbs-up"></i> Procesar
				</button>
				<button type="submit" class="btn bg-warning" id="rechazar" name="btnRechazar" value="btnRechazar">
					<i class="far fa-thumbs-down"></i> Rechazar
				</button>
				<button type="submit" class="btn bg-info" name="btnCancelar" id="cancelar" value="btnCancelar">
					<i class="fas fa-ban"></i> Cancelar
				</button>
			</div>
		</div>
	</form>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detalle Requisicion</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card-body bg-white requisiciondet">
						<div class="row">
							<div class="col-12 col-sm-12">
								<div class="table-responsive" id="tbItems" style="overflow: auto;">
									<table id="tblDetalle" class="table table-bordered">
										<thead>
											<tr>
												<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Id. Detalle') }}</th>
												<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Descripcion') }}</th>
												<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Telefono') }}</th>
												<th style=" font-size: 14px; color: #3A74B8;" class="text-center">{{ __('Direccion') }}</th>
											</tr>
										</thead>
										<tbody id="tabladetalle">


										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>


				</div>


			</div>

		</div>

	</div>





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script> -->

	<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


	<!-- Datatable  -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


	<script src="{{ asset('js/main.js') }}"></script>



</body>

</html>