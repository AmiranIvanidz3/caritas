<?php

use App\Models\Parameter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ModalNewController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UnitTypeController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\PublicApiController;
use App\Http\Controllers\VisitTypeController;
use App\Http\Controllers\ClientCityController;
use App\Http\Controllers\ExcludedIpController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReelStatusController;
use App\Http\Controllers\VisitPlaceController;
use App\Http\Controllers\VisitStateController;
use App\Http\Controllers\NewsRequestController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ClientGenderController;
use App\Http\Controllers\ClientInvalidController;
use App\Http\Controllers\ProcedureDoneController;
use App\Http\Controllers\ProcedureTypeController;
use App\Http\Controllers\ClientDistrictController;
use App\Http\Controllers\ProcedureGroupController;
use App\Http\Controllers\ClientConclusionController;
use App\Http\Controllers\ExcludedUserAgentController;
use App\Http\Controllers\External\ExternalController;
use App\Http\Controllers\ClientCurrentStatusController;
use App\Http\Controllers\ClientFinancialStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => env('ADMIN_URL'), ], function(){
Route::get('/', [HomeController::class, 'index']);

Route::get('/loginResponse', function(){
    return redirect(env('ADMIN_URL'));
}); 

Route::get('/route-cache', function(){
    Artisan::call('route:cache');
    return redirect(env('ADMIN_URL')."/parameters");
}); 
// Roles routes
Route::resource('roles', RoleController::class);
Route::post('roles/list', [RoleController::class, 'roleList']);
// Roles API requests
Route::get('api/roles/{id}/permissions', [RoleController::class, 'rolePermissions']);
/*  
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------ChangePasswordRequest------------------------------
*/

Route::get('profile/{user}/edit',[ProfileController::class, 'getProfileChange']);
Route::put('profile/{user}/edit',[ProfileController::class, 'postProfileChange']);


Route::get('profile/change/password',[ProfileController::class, 'getProfileChangePassword']);
Route::post('profile/change/password',[ProfileController::class, 'postProfileChangePassword']);





// Users routes
Route::resource('users', UserController::class);
Route::post('users/action/reorder/{user?}', [UserController::class, 'callReorderPiority']);
Route::post('users/list',[UserController::class, 'usersList']);

Route::put('api/{table_name}/{column_id}/{selected_id}/updateUser', [UserController::class, 'updateUser']);


/*
|--------------------------------------------------------------------------
| Setting
|--------------------------------------------------------------------------
*/

Route::get('set/{settingName}/{value}', [SettingController::class, 'getSet']);
Route::get('settings/security', [SettingController::class, 'getSettingsSecurity']);
Route::post('settings/security', [SettingController::class, 'postSettingsSecurity']);
Route::get('settings/security/set/defaults', [SettingController::class, 'getSettingsSecuritySetDefaults']);

Route::get('logs',[LogController::class, 'index']);
Route::post('logs/list',[LogController::class, 'logList']);

Route::get('group-log-reels/{group}', [LogController::class, 'groupLogIndex']);
Route::post('group-log-reels/list/{group}', [LogController::class, 'grouplogMentionList']);

Route::get('group-log-ip/{group}', [LogController::class, 'groupLogIpIndex']);
Route::post('group-log-ip/list/{group}', [LogController::class, 'grouplogIpList']);

Route::get('group-log-ua/{group}', [LogController::class, 'groupLogUAIndex']);
Route::post('group-log-ua/list/{group}', [LogController::class, 'grouplogUAList']);

Route::get('group-log-reel-statistic', [LogController::class, 'grouplogstatistiIndex']);
Route::post('group-log-reel-statistic/list', [LogController::class, 'grouplogstatisticList']);

Route::resource('comments', CommentController::class);
Route::post('comments/list',[CommentController::class, 'commentList']);
Route::post('seen',[CommentController::class, 'setSeen']);

Route::resource('excluded-ips', ExcludedIpController::class);
Route::post('excluded-ips/list', [ExcludedIpController::class, 'excludedIpList']);
Route::post('exclude-ip', [ExcludedIpController::class, 'excludeIp']);

// IP Requests Routes
Route::get('/ip-requests', [ExcludedIpController::class, 'ipRequestIndex']);
Route::post('ip-requests/list',[ExcludedIpController::class, 'ipRequestList']);

Route::resource('excluded-user-agents', ExcludedUserAgentController::class);
Route::post('excluded-user-agents/list', [ExcludedUserAgentController::class, 'excludedUserAgentsList']);
Route::post('exclude-ua', [ExcludedUserAgentController::class, 'excludeUA']);

// IP Requests Routes
Route::get('/excluded-user-agent-requests', [ExcludedUserAgentController::class, 'ExcludedUserAgentRequestsIndex']);
Route::post('excluded-user-agent-requests/list',[ExcludedUserAgentController::class, 'ExcludedUserAgentRequestsList']);

Route::resource('permissions', PermissionController::class);
Route::post('permissions/list',[PermissionController::class, 'permissionList']);


Route::resource('parameters', ParameterController::class);
Route::post('parameters/list', [ParameterController::class, 'parameterList']);

Route::get('log-visitors',[LogController::class, 'visitorIndex']);
Route::post('log-visitors/list', [LogController::class, 'logVisitorsList']);

Route::resource('modal-news', ModalNewController::class);
Route::post('modal-news/list', [ModalNewController::class, 'modalNewList']);
Route::post('modal-new-status', [ModalNewController::class, 'changeNewModalStatus']);

Route::get('log-news', [ModalNewController::class, 'logNewsIndex']);
Route::post('log-news/list', [ModalNewController::class, 'logNewsList']);


/*
|--------------------------------------------------------------------------
| Caritas Routes START
|--------------------------------------------------------------------------
*/

Route::resource('stocks', StockController::class);
Route::post('stocks/list', [StockController::class, 'stockList']);

Route::resource('visit-places', VisitPlaceController::class);
Route::post('visit-places/list', [VisitPlaceController::class, 'visitPlaceList']);

Route::resource('visit-types', VisitTypeController::class);
Route::post('visit-types/list', [VisitTypeController::class, 'visitTypeList']);

Route::resource('visit-states', VisitStateController::class);
Route::post('visit-states/list', [VisitStateController::class, 'visitStateList']);

Route::resource('product-types', ProductTypeController::class);
Route::post('product-types/list', [ProductTypeController::class, 'productTypeList']);

Route::resource('unit-types', UnitTypeController::class);
Route::post('unit-types/list', [UnitTypeController::class, 'unitTypeList']);

Route::resource('providers',   ProviderController::class);
Route::post('providers/list', [ ProviderController::class, 'providerList']);


Route::resource('products',   ProductController::class);
Route::post('products/list', [ ProductController::class, 'productList']);

Route::resource('donors',   DonorController::class);
Route::post('donors/list', [ DonorController::class, 'donorList']);

Route::resource('client-cities',   ClientCityController::class);
Route::post('client-cities/list', [ ClientCityController::class, 'clientCityList']);

Route::resource('client-invalid',   ClientInvalidController::class);
Route::post('client-invalid/list', [ ClientInvalidController::class, 'clientInvalidList']);

Route::resource('client-conclusions',   ClientConclusionController::class);
Route::post('client-conclusions/list', [ ClientConclusionController::class, 'clientConclusionList']);

Route::resource('client-genders',   ClientGenderController::class);
Route::post('client-genders/list', [ ClientGenderController::class, 'clientGenderList']);

Route::resource('client-current-statuses',   ClientCurrentStatusController::class);
Route::post('client-current-statuses/list', [ ClientCurrentStatusController::class, 'clientCurrentStatusList']);

Route::resource('client-financial-statuses',   ClientFinancialStatusController::class);
Route::post('client-financial-statuses/list', [ ClientFinancialStatusController::class, 'clientFinancialStatusList']);

Route::resource('client-districts',   ClientDistrictController::class);
Route::post('client-districts/list', [ ClientDistrictController::class, 'clientDistrictList']);

Route::resource('clients', ClientController::class);
Route::post('clients/list', [ ClientController::class, 'clientList']);

Route::resource('procedure-groups',   ProcedureGroupController::class);
Route::post('procedure-groups/list', [ ProcedureGroupController::class, 'procedureGroupList']);


Route::resource('procedure-types',   ProcedureTypeController::class);
Route::post('procedure-types/list', [ ProcedureTypeController::class, 'procedureTypeList']);

Route::resource('procedures',   ProcedureController::class);
Route::post('procedures/list', [ ProcedureController::class, 'procedureList']);


Route::resource('procedures-done',   ProcedureDoneController::class);
Route::post('procedures-done/list', [ ProcedureDoneController::class, 'procedureDoneList']);

/*
|--------------------------------------------------------------------------
| Caritas Routes END 
|--------------------------------------------------------------------------
*/

});
/*
|--------------------------------------------------------------------------
| Client web routes
|--------------------------------------------------------------------------
*/

   

Route::prefix(env('EXTERNAL_URL', ''))->group(function () {
    

    Route::get('/loginResponse', function(){
        return Redirect::route('parameters.index');
    }); 
    
    Route::post('get-news', [NewsRequestController::class, 'getNews']);

    Route::post('seen-new', [NewsRequestController::class, 'userSeenNews']);

});
