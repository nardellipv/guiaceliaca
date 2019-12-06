<div id="page-content">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">

            <!--Registered User-->
            <div class="panel media pad-all">
                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
									<i class="fa fa-user fa-2x"></i>
									</span>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-thin">{{ $countUsers }}</p>
                    <p class="text-muted mar-no">Usuarios Registrados</p>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">

            <!--New Order-->
            <div class="panel media pad-all">
                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-info">
									<i class="fa fa-shopping-cart fa-2x"></i>
									</span>
                </div>

                <div class="media-body">
                    <p class="text-2x mar-no text-thin">{{ $countCommerces }}</p>
                    <p class="text-muted mar-no">Comercios Registrados</p>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">

            <!--Comments-->
            <div class="panel media pad-all">
                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-warning">
									<i class="fa fa-comment fa-2x"></i>
									</span>
                </div>

                <div class="media-body">
                    <p class="text-2x mar-no text-thin">{{ $countMessage }}</p>
                    <p class="text-muted mar-no">Mensajes</p>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">

            <!--Sales-->
            <div class="panel media pad-all">
                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
									<i class="fa fa-file-word-o fa-2x"></i>
									</span>
                </div>

                <div class="media-body">
                    <p class="text-2x mar-no text-thin">{{ $countPost }}</p>
                    <p class="text-muted mar-no">Cantidad Post</p>
                </div>
            </div>

        </div>

    </div>
</div>