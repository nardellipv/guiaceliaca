<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Exportar Usuarios</h3>
            </div>
            <div class="panel-body demo-jasmine-btn">

                <div class="form-group">
                    <div class="col-md-6">
                        <a href="{{ route('admin.exportAllUsers') }}" class="btn btn-block btn-info">
                            Exportar todos los Usuarios
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.exportNewsLetterUsers') }}" class="btn btn-block btn-info">
                            Exportar usuarios NewsLetter
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.exportClientUsers') }}" class="btn btn-block btn-info">
                            Exportar usuarios Clientes
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.exportOwnerUsers') }}" class="btn btn-block btn-info">
                            Exportar usuarios Comercio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
