<?php
//Artisan::call('up');
//cleaning

Route::get('/clear', function() {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    return 'FINISHED';
});

Route::get('/down', function(){
    return Artisan::call('down');
});



Auth::routes();

//web
Route::get('/', 'HomeController@index')->name('home');

Route::view('/contacto', 'web.parts._contact')->name('contact');

Route::view('/terminos', 'web.parts._term')->name('term');

Route::view('/privacidad', 'web.parts._policity')->name('policity');
Route::view('/pago-exitoso', 'web.parts._successPay')->name('pay.success');
Route::view('/pago-pendiente', 'web.parts._pendingPay')->name('pay.pending');
Route::view('/pago-erroneo', 'web.parts._errorPay')->name('pay.error');

Route::view('/ayuda-paquetes', 'web.parts.adminClient.profile._FAQPackets')->name('faq.packets');

Route::get('votes_positive/{slug}', 'CommerceController@positive')->name('positive');
Route::get('votes_negative/{slug}', 'CommerceController@negative')->name('negative');

Route::post('/post/comentario/{slug}', 'CommentController@addComment')->name('add.commentCommerce');

Route::get('/blog/listado', 'BlogController@listBlog')->name('list.blog');
Route::get('/blog/{slug}', 'BlogController@postBlog')->name('post.blog');
Route::get('/post/like/{id}', 'BlogController@postLike')->name('post.like');

Route::get('/recetas', 'RecipeController@listRecipes')->name('list.recipes');
Route::get('/recetas/{slug}', 'RecipeController@recipes')->name('recipes');
Route::get('/recetas/like/{id}', 'RecipeController@recipeLike')->name('recipe.like');

Route::post('/newsletter/add', 'NewsLetterController@add')->name('newsletter.add');

Route::get('/filtro/provincia/{slug}', 'SearchController@filterProvince')->name('filter.province');
Route::post('/filtro/comercio', 'SearchController@filterCommerce')->name('filter.commerce');


//admin client
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', 'AdminClient\ProfileCommerceController@profileCommerce')->name('profile');
    Route::get('/perfil/editar/{id}', 'AdminClient\ProfileCommerceController@profileEdit')->name('profile.edit');
    Route::post('/perfil/update/{id}', 'AdminClient\ProfileCommerceController@profileUpdate')->name('profile.update');
    Route::post('/perfil/update/pass/{id}', 'AdminClient\ProfileCommerceController@profilePassUpdate')->name('profile.pass.update');

    Route::get('/perfil/crear-cuenta', 'AdminClient\ProfileCommerceController@createAccountCommerce')->name('create.accountCommerce');
    Route::post('/perfil/store', 'AdminClient\ProfileCommerceController@storeAccountCommerce')->name('store.accountCommerce');
    Route::get('/perfil/cuenta-comercio/editar/{slug}', 'AdminClient\ProfileCommerceController@editAccountCommerceCommerce')->name('edit.accountCommerce');
    Route::post('/perfil/cuenta-comercio/editar/{id}', 'AdminClient\ProfileCommerceController@updateAccountCommerceCommerce')->name('update.accountCommerce');

    Route::get('/perfil/recetas/crear', 'AdminClient\RecipeController@addRecipes')->name('add.recipes');
    Route::post('/perfil/recetas/crear/create', 'AdminClient\RecipeController@createRecipes')->name('create.recipes');

    Route::get('/perfil/producto', 'AdminClient\ProductController@productIndex')->name('product.index');
    Route::post('/perfil/producto/crear', 'AdminClient\ProductController@productCreate')->name('product.create');
    Route::get('/perfil/producto/listado', 'AdminClient\ProductController@productList')->name('product.list');
    Route::get('/perfil/producto/pausado', 'AdminClient\ProductController@pausedProductList')->name('product.paused');
    Route::get('/perfil/producto/pausar-producto/{id}', 'AdminClient\ProductController@pausedProductAction')->name('product.pausedAction');
    Route::get('/perfil/producto/borrar-producto/{id}', 'AdminClient\ProductController@pausedDeleteAction')->name('product.deleteAction');
    Route::get('/perfil/producto/activar-producto/{id}', 'AdminClient\ProductController@pausedActiveAction')->name('product.activeAction');

    Route::get('/perfil/mensajes', 'AdminClient\MenssageController@messageList')->name('message.list');
    Route::get('/perfil/mensajes-borrar/{id}', 'AdminClient\MenssageController@messageDelete')->name('message.delete');
    Route::get('/perfil/mensajes/leer/{id}', 'AdminClient\MenssageController@messageRead')->name('message.read');

    Route::get('/perfil/comentarios', 'AdminClient\CommentController@commentList')->name('comment.list');
    Route::get('/perfil/comentarios/denuncia/{id}', 'AdminClient\CommentController@commentReport')->name('comment.report');

    Route::get('/perfil/caracteristica/eliminar/{id}', 'AdminClient\ProfileCommerceController@deleteCharacteristic')->name('delete.characteristic');
    Route::get('/perfil/pago/eliminar/{id}', 'AdminClient\ProfileCommerceController@deletePayment')->name('delete.payment');

    Route::post('/comentario-blog/{id}', 'BlogController@commentPost')->name('comment.post');

    Route::get('/promocion/listar', 'AdminClient\PromotionController@listPromotion')->name('list.promotion');
    Route::get('/promocion/crear', 'AdminClient\PromotionController@createPromotion')->name('create.promotion');
    Route::post('/promocion/crear/agregar', 'AdminClient\PromotionController@storePromotion')->name('store.promotion');
    Route::get('/promocion/borrar/{id}', 'AdminClient\PromotionController@deletePromotion')->name('delete.promotion');
});

//Admin Root
Route::middleware(['auth','UserType'])->group(function () {
    Route::get('/admin', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('/admin/blog/list', 'Admin\AdminBlogController@listBlogAdmin')->name('admin.listBlog');
    Route::get('/admin/blog/create', 'Admin\AdminBlogController@createBlog')->name('admin.createBlog');
    Route::post('/admin/blog/store', 'Admin\AdminBlogController@storeBlog')->name('admin.storeBlog');
    Route::get('/admin/blog/view/{id}', 'Admin\AdminBlogController@viewBlog')->name('admin.viewBlog');
    Route::patch('/admin/blog/edit/{id}', 'Admin\AdminBlogController@editBlog')->name('admin.editBlog');
    Route::get('/admin/blog/active/{id}', 'Admin\AdminBlogController@activeBlog')->name('admin.activeBlog');
    Route::get('/admin/blog/desactive/{id}', 'Admin\AdminBlogController@desactiveBlog')->name('admin.desactiveBlog');

    Route::get('/admin/user/create', 'Admin\AdminUserController@userCreate')->name('admin.userCreate');
    Route::post('/admin/user/create', 'Admin\AdminUserController@userStore')->name('admin.userStore');
    Route::get('/admin/user/edit/{id}', 'Admin\AdminUserController@userEdit')->name('admin.userEdit');

    Route::get('/admin/newsletter', 'Admin\AdminNewsLetterController@listNewsLetter')->name('admin.listNewsLetter');
    Route::get('/admin/newsletter/delete/{id}', 'Admin\AdminNewsLetterController@deleteNewsLetter')->name('admin.deleteNewsLetter');

    Route::get('/admin/export-all-users', 'Admin\ExportController@exportAllUsers')->name('admin.exportAllUsers');
    Route::get('/admin/export-newsletter-users', 'Admin\ExportController@exportNewsLetterUsers')->name('admin.exportNewsLetterUsers');
    Route::get('/admin/export-client-users', 'Admin\ExportController@exportClientUsers')->name('admin.exportClientUsers');
    Route::get('/admin/export-owner-users', 'Admin\ExportController@exportOwnerUsers')->name('admin.exportOwnerUsers');
});


//emails
Route::post('mailcustomers/{id}', 'EmailsController@MessageClientToCommerce')->name('MessageClientToCommerce');

Route::post('/contacto/sendMail', 'EmailsController@MailContactToSite')->name('MailContactToSite');

Route::post('/contacto/popup', 'EmailsController@MailContactPopUp')->name('MailContactPopUp');

Route::post('/respuesta/respondToClient', 'EmailsController@respondToClient')->name('respondToClient');

Route::post('/denuncia/denunciaMensaja', 'EmailsController@complaintMessage')->name('complaintMessage');

Route::get('/prueba', 'EmailsController@mailtest')->name('mailtest');


//job Admin
Route::get('/register-users', 'Admin\JobController@userRegister')->name('jobUsers.register');
Route::get('/register-users-newsLetter', 'Admin\JobController@userRegisterNewsLetter')->name('jobUsers.registerNewsLetter');
Route::get('/increment-visit', 'Admin\JobController@commercesIncrement')->name('jobCommerces.increment');

//Job Site
Route::get('/send-news', 'JobSiteController@sendNewsLetters')->name('jobNews.sendNewsLetters');
Route::get('/contact-copy', 'JobSiteController@usersCopyNewsLetter')->name('jobCopy.userToNewsLetter');
Route::get('/resume-client', 'JobSiteController@resumeClient')->name('jobResume.resumeClient');
Route::get('/top-visit-commerces', 'JobSiteController@topVisitCommerces')->name('jobTop.visitCommerces');
Route::get('/top-votes-commerces', 'JobSiteController@topVotesCommerces')->name('jobTop.votesCommerces');
Route::get('/message-no-read', 'JobSiteController@messageNoRead')->name('jobMessage.messageNotRead');
Route::get('/recomendar', 'JobSiteController@recommnedMail')->name('recommend.email');
Route::get('/missyou', 'JobSiteController@missYou')->name('missYou.email');


// comercio perfil
Route::get('/productos/{slug}', 'CommerceController@listProduct')->name('list.productCommerce');
Route::get('/{slug}', 'CommerceController@index')->name('name.commerce');
