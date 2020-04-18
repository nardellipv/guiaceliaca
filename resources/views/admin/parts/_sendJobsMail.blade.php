<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Enviar Notificaciones</h3>
            </div>
            <div class="panel-body demo-jasmine-btn">

                <div class="form-group">
                    <div class="col-md-6">
                        <a href="{{ route('jobNews.sendNewsLetters') }}" class="btn btn-block btn-info">
                            Enviar NewsLetters
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('jobResume.resumeClient') }}" class="btn btn-block btn-info">
                            Resumen Cliente
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('jobTop.visitCommerces') }}" class="btn btn-block btn-info">
                            Top Visitas
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('jobTop.votesCommerces') }}" class="btn btn-block btn-info">
                            Top Votos
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('jobMessage.messageNotRead') }}" class="btn btn-block btn-info">
                            Mensajes no leídos
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('missYou.email') }}" class="btn btn-block btn-info">
                            Te extrañamos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
