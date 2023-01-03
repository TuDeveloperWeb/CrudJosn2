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

    .archivos{
        display: none;
    }
</style>

<body>


    <div class="loader">
        <img src="{{asset("/img/loader.gif")}}">
    </div>



    <div class="card-header">
        <div class="content-header-right col-md-12 col-12">
            <h3>Creando Articulos</h3>
        </div>
    </div>
    <!-- Contenido General -->

    <form class="form form-articulo" action="{{ route('articulo.guardar') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="controls">
                            <label>Número</label>
                            <input type="text" id="IdVenta" class="form-control" name="IdVenta" value="{{ old('IdVenta',$venta->IdVenta ?? null) }}" required readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="controls">
                            <label>Codigo</label>
                            <input type="text" id="Codigo" class="form-control" name="Codigo" value="{{ old('Codigo',$venta->Codigo ?? null) }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="controls">
                            <label>Descripcion</label>
                            <input type="text" id="Descripcion" class="form-control" name="Descripcion" value="{{ old('Descripcion',$venta->Descripcion ?? null) }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="controls">
                            <label>Cantidad</label>
                            <input type="text" id="Cantidad" class="form-control" name="Cantidad" value="{{ old('Cantidad',$venta->Cantidad ?? null) }}" required>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="controls">
                            <label>Precio</label>
                            <input type="text" id="Precio" class="form-control" name="Precio" value="{{ old('Precio',$venta->Precio ?? null) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div id="imagenes" style="display: block;">
            <div>
                <table>
                    <thead>
                        <tr>
                            <td style="width:50%">Documentos</td>
                            <!-- <td>Acción</td> -->
                        </tr>
                    </thead>
                    <tbody id="tbl_files">
                        <tr>
                            <td>
                                <input type="file" name="Adjunto[]" id="Adjunto">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}

        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" id="add-item">
                            Agregar ítem
                        </button>
                        <!--button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Agregar Nuevo</button-->
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="table-responsive" id="tbItems">
                            <table id="articulo-list-datatable" class="table">
                                <thead>
                                    <tr>
                                        <th style="width:5%" class="text-center">{{ __('Descripcion.') }}</th>
                                        <th style="width:30%" class="text-center">{{ __('Telefono') }}</th>
                                        <th style="width:30%" class="text-center">{{ __('Direccion') }}</th>
                                        {{-- <th style="width:30%" class="text-center">{{ __('Documentos') }}</th> --}}
                                        <th style="width:5%" class="text-center">{{ __('Acciones') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="tblDetalle">

                                    <!-- <tr>
									<td>
										<input type="hidden" name="IdDetalle[]" value="{{ old('IdDetalle',$row->IdDetalle ?? null) }}">
										<input type="text" name="Descripcion[]" class="form-control" value="{{ old('Descripcion',$row->desDet ?? null) }}" readonly>
									</td>
									<td>
										<input type="text" name="Telefono[]" class="form-control" value="{{ old('Cantidad',$row->Cantidad ?? null) }}" readonly>
                                        <td>
                                            <input type="text" name="Direccion[]" class="form-control" value="{{ old('IdArticulo',$row->IdArticulo ?? null) }}" readonly>
									</td>
									<td>
                                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>
                                        
										<a class="btn edit pl-2" id="editar" title="Edit" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i></a>
									</td>
								</tr> -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="form-actions text-right mx-3">
            <button type="submit" class="btn btn-primary" name="btn" value="Guardar">
                <i class="la la-check-square-o"></i> Guardar
            </button>

            <button type="submit" class="btn btn-success envio" name="btnEnviar" value="Guardar y Enviar">
                <i class="la la--check-square-o"></i> Guardar y Enviar
            </button>

        </div>

    </form>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Items</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>Descripcion(*)</label>
                                        <input type="hidden" class="form-control" id="IdF">
                                        <input type="text" class="form-control" id="DescripcionF" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>Telefono(*)</label>
                                        <input type="text" class="form-control" id="TelefonoF" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>Direccion</label>
                                        <input type="text" id="DireccionF" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <div class="controls" id="adjunto">
                                        <label>Documentos</label>
                                        <input type="file" class="form-control-file" name="Documento[]" id="DocumentoF">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnAgregar" class="btn btn-primary">Guardar</button> <!-- Quitando la clase el add-new -->
                    </div>

                </div>

            </div>

        </div>




 










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


    <!-- Datatable  -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


    <script src="{{ asset('js/articulo.js') }}"></script>



</body>

</html>