<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Product Routes
//get all products
Route::get('rvente/products','productController@getProducts');
//get product details {id}
Route::get('rvente/product/{id}','productController@getProductById');
// Add new product
Route::post('rvente/addProduct','productController@AddProduct');
//update product
Route::put('rvente/updateProduct/{id}','productController@updateProduct');
//delete product
Route::delete('rvente/deleteProduct/{id}','productController@deleteProduct');
//npmbre de produits
Route::get('rvente/nbprod','productController@nombreproduits');
//Client Routes
//get all clients
Route::get('rvente/clients','ClientController@getClients');
//get client details {id}
Route::get('rvente/client/{id}','ClientController@getClientById');
// Add new client
Route::post('rvente/addClient','ClientController@AddClient');
//update client
Route::put('rvente/updateClient/{id}','ClientController@updateClient');
//delete client
Route::delete('rvente/deleteClient/{id}','ClientController@deleteClient');
//npmbre de clients
Route::get('rvente/nbclt','ClientController@nombreclients');
//Route facture
//get produit facture details {id}
Route::get('rvente/prodf/{id}','factureController@DetailsProduits');
//get client facture details {id}
Route::get('rvente/clientf/{id}','factureController@Detailsclient');
// route add depense
Route::post('rcomf/adddepense','depenseController@Adddepense');
// tous les depenses
Route::get('rcomf/depenses','depenseController@getdepenses');
//depense by id
Route::get('rcomf/depense/{id}','depenseController@getdepenseById');
//update depense
Route::put('rcomf/updatedepense/{id}','depenseController@updatedepense');
//delete depense
Route::delete('rcomf/deletedepense/{id}','depenseController@deletedepense');
// route add opertaion
Route::post('rcomf/addoperation','operationController@Addoperation');
// route tous les operations
Route::get('rcomf/operations','operationController@getoperations');
//depense by id
Route::get('rcomf/operation/{id}','operationController@getoperationById');
//update depense
Route::put('rcomf/updateoperation/{id}','operationController@updateoperation');
//delete depense
Route::delete('rcomf/deleteoperation/{id}','operationController@deleteoperation');
//fournisseurs
Route::get('rachat/fournisseurs','fournisseurController@getFournisseurs');
//fournisseurs by id
Route::get('rachat/fournisseur/{id}','fournisseurController@getfournisseurById');
//ajouter fournisseur
Route::post('rachat/addfournisseur','fournisseurController@AddFournisseur');
//modifier fournisseur
Route::put('rachat/updatefournisseur/{id}','fournisseurController@updateFournisseur');
//supprimer fournisseur
Route::delete('rachat/deletefournisseur/{id}','fournisseurController@deleteFournisseur');
//nombre des fournisseurs
Route::get('rachat/nbfn','fournisseurController@nombreFournisseur');
//facturefournisseurs
Route::apiResource('facturef', 'facturefController');
Route::apiResource('facture','factureController');
Route::apiResource('devis','devisController');
Route::apiResource('commandecl','commclController');
Route::apiResource('bonlivraison','bonlController');
Route::apiResource('commandeachat','commandeachatController');
Route::apiResource('inventaire','inventaireController');
Route::apiResource('bondereceptions', 'BonDeReceptionController');
Route::get('/calcul' , 'productController@nombreproduits');
Route::apiResource('/paiements', 'PaiementController');
Route::get('/paiement/facture/{id}','PaiementController@getListPaiementOfFacture');
Route::get('/resteretard' , 'PaiementController@calculResteEnRetard');
Route::apiResource('/paiementcs', 'PaiementcController');
Route::get('/paiementc/facturec/{id}','PaiementcController@getListPaiementOfFacture');
Route::get('/resteretardc' , 'PaiementcController@calculResteEnRetard');
Route::get('/notificationecheance' , 'NotificationController@notificationecheance');
Route::get('/notificationproduit' , 'NotificationController@notificationproduit');
Route::get('/dashbord' , 'productController@dashbord');
Route::get('/dashbordfacture' , 'productController@dashbordfacture');
Route::get('/endette' , 'productController@endette');
Route::post('register','UserController@register');
Route::post('login','UserController@login');
Route::post('logina','adminController@login');