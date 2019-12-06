<div class="modal fade" id="modal-contact" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>
        </button>

        <div class="form-container full-fixed">
            <form method="post" action="{{ route('MailContactPopUp') }}">
                @csrf
                <div id="form-modal-contact" class="box active modal-contact">
                    <h2 class="title">¿Cómo podemos ayudarte?</h2>
                    <h3 class="sub-title">Envíenos sus comentarios completando el siguiente formulario. Los comentarios
                        son únicamente para uso interno. Su dirección no será compartida con terceros ni utilizada para
                        cualquier otro propósito que no sea responder a sus comentarios.</h3>
                    <ul class="object-contact">
                        <li><a href="#"><i class="fa fa-code"></i>Sugerencias</a></li>
                        <li><a href="#"><i class="fa fa-question"></i>Preguntas</a></li>
                        <li><a href="#" class="active"><i class="fa fa-bug"></i>Problema</a></li>
                        <li><a href="#"><i class="fa fa-comment-o"></i>Feedback</a></li>
                    </ul>
                    <div class="field">
                            <textarea class="form-control" name="message" id="messageContactToSite"
                                      placeholder="Su Mensaje" required></textarea>
                    </div>
                    <div class="field">
                        <input id="short-summary" class="form-control" type="text" name="name"
                               placeholder="Nombre" required>
                        <i class="fa fa-tag"></i>
                    </div>
                    <div class="field">
                        <input id="email-help" class="form-control" type="email" name="email"
                               placeholder="Email" required>
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="field footer-form text-right">
                        <button type="submit" class="btn btn-default button-form">Enviar</button>
                    </div>

                </div>
            </form>
        </div>


    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->