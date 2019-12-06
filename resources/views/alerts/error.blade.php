@if (count($errors) > 0)
        <div class="row" style="margin: 10% 0px -10% 20%;">
            <div class="col-md-6 col-lg-offset-2">
                <div class="alert with-icon alert-danger" role="alert"><i class="icon fa fa-exclamation-triangle"></i>
                    <h4>Revise los siguientes <span>Errores</span></h4>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
@endif