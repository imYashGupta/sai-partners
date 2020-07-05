<?php

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
/*auth*/
Auth::routes();
//User

Route::get("/",[
    "uses" => "HomeController@index",
    "as"    => "home"
]);
Route::get("/about",["uses" => "PagesController@about"]);
Route::get("/contact",["uses" => "PagesController@contact"]);
Route::get("/services",["uses" => "PagesController@services"]);
 

// Admin PagesController
 
Route::prefix('admin')->middleware("auth")->group(function () {
    Route::get('/',["uses" => "PagesController@admin","as" => "dashboard"]);
    Route::get('/submit-property',["uses" => "PropertyController@submitProperty","middleware" => "auth","as" => "submitProperty"]);
    Route::get('/messages',["uses" => "PagesController@messages","middleware" => "auth","as" => "messages"]);
    Route::get('/bookings',["uses" => "PagesController@bookings","middleware" => "auth","as" => "bookings"]);
    Route::get('/profile',["uses" => "PagesController@profile","middleware" => "auth","as" => "profile"]);

    // setting
    Route::get("/settings",[
        "uses" => "HomeController@settings",
        "as"    => "settings"
    ]);

    //Team

    Route::get("/team",[
        "uses" => "TeamController@index",
        "as" => "TeamManagement"
    ]);

    Route::get("/team/new",[
        "uses" => "TeamController@create",
        "as" => "TeamManagementCreate"
    ]);

    Route::post("/team.store",[
        "uses" => "TeamController@store",
        "as"    => "storeTeam"
    ]);

    Route::get("/team/edit/{id}",[
        "uses"  => "TeamController@edit",
        "as"    => "editTeam"
    ]);

    Route::post("/team.update",[
        "uses" => "TeamController@update",
        "as"    => "updateTeam"
    ]);

    Route::post("/team.changestatus",[
        "uses" => "TeamController@changestatus",
    ]);

    Route::get("/team.delete/{id}",[
        "uses" => "TeamController@destroy",
        "as"    => "deleteTeam"
    ]);
    // Propery CRUD ADMIN
    Route::get('/properties',[
        "uses"      => "PropertyController@viewProperties",
        "middleware"=> "auth",
        "as"        => "admin_properties"
    ]);

    Route::get("/property/edit/{id}",[
        "uses"      => "PropertyController@editProperty",
        "as"        =>  "editProperty"
    ]);
    Route::post("/property/update",[
        "uses"      => "PropertyController@updateProperty",
        "as"        => "updateProperty"
    ]);
    Route::get("/property/delete/{id}",[
        "uses"      => "PropertyController@deleteProperty",
        "as"        => "deleteProperty"
    ]);

    Route::get("/property/edit-images/{id}",[
        "uses"      => "PropertyController@editPropertyImages",
        "as"        => "editPropertyImages"
    ]);
    Route::get('/property/image/thumbnail/{id}',[
        "uses"      => "PropertyController@setThumbnail",
        "as"        => "setThumbnail"
    ]);
    Route::get('/property/image/delete/{id}',[
        "uses"      => "PropertyController@deleteImage",
        "as"        => "deleteImage"
    ]);

    Route::post('property/image/upload',[
        "uses"      => "PropertyController@uploadImage",
        "as"        => "uploadImage"
    ]);
 
    /**
     *
     * Amenities Routes
     *
     */
    Route::post("/amenities.create",[
        "uses"  => "PropertyController@createAmenities",
    ]);
    Route::get("/amenities",[
        "uses"  => "PropertyController@amenities",
    ]);
    Route::post('/amenities.delete',[
        "uses"  => "PropertyController@deleteAmenities",
    ]);
    /**
     *
     * Category Routes
     *
     */
    Route::post("/category.create",[
        "uses"  => "PropertyController@createCategory",
    ]);
    Route::get("/categories",[
        "uses"  => "PropertyController@categories",
    ]);
    Route::post('/category.delete',[
        "uses"  => "PropertyController@deleteCategory",
    ]);
    /**
     *
     * Nearby Places
     *
     */
    Route::get("/nearby-places/{id}",[
        "uses" => "NearbyPlacesController@index",
        "as"    => "nearbyPlaces"
    ]);

    Route::post("/nearby-places.add",[
        "uses"  => "NearbyPlacesController@add"
    ]);

    Route::post("/nearby-places.delete",[
        "uses"  => "NearbyPlacesController@delete"
    ]);
    /**
     *
     * flooring
     *
     */
    Route::get('property/floors/{id}',[
        "uses"      => "FloorController@index",
        "as"        => "floors"
    ]);
    Route::post("/flooring.add",[
        "uses"  => "FloorController@store",
    ]);

    Route::post("/flooring.delete",[
        "uses"  => "FloorController@destroy"
    ]);
    
    /**
     *
     * Messages
     *
     */
    Route::get("/messages.get",[
        "uses" => "ContactController@getMessages",
    ]);
    /**
     *
     * User submited
     *
     */
    Route::get("/user-submited-properties",[
        "uses" => "PropertyController@userProperties",
        "as"    => "userProperties"
    ]);
    
    Route::post("/approve-property",[
        "uses" => "PropertyController@approveProperty"
    ]);

    //site settings
    Route::post("/settings.save.header",[
        "uses"  => "HomeController@headerInfo",
        "as"    => "save.headerInfo"
    ]);

    Route::post("/settings.save.footer",[
        "uses"  => "HomeController@FooterInfo",
        "as"    => "save.FooterInfo"
    ]);
    Route::post("/settings.save.social",[
        "uses"  => "HomeController@socialInfo",
        "as"    => "socialInfo"
    ]);
});

    Route::post("/submit-property",[
        "uses"      => "PropertyController@addProperty",
        "as"        => "postSubmitProperty",
         
    ]);
# =======================================
# =           Front End Route           =
# =======================================

    /*----------  Home Page  ----------*/

    // Route::get("/",[
    //     "uses" => "HomeController@index",
    //     "as" => "home",
        
    // ]);

    /*----------  all properies page  ----------*/

    Route::get("/properties",[
        "uses" => "PagesController@properties",
        "as"    => "properties"
    ]);


    /*----------  Contact us   ----------*/
    Route::post("/contact.store",[
        "uses" => "ContactController@store",
        "as"    => "storeContact"
    ]);    

    /*----------  Vue JS API  ----------*/
    
    Route::post("/properties/all",[
        "uses"  => "PropertyController@properties",
    ]);

    Route::get("/states.cities/api/{id}",[
        "uses" => "HomeController@cities"
    ]);

    Route::get("cities.api",[
        "uses" => "HomeController@knownCities"
    ]);

    Route::get("property/type.api",[
        "uses" => "HomeController@propertyType"
    ]);

    Route::post("property/filter.api",[
        "uses" => "PropertyController@filterProperty",
        "as"    => "filterProperty"
    ]);

    /*----------  property Details Page  ----------*/

    Route::get("/property-detail/{id}",[
        "uses" => "PropertyController@propertyDetail",
        "as"    => "propertyDetail"
    ]);

    Route::get("/logout",[
        "uses" => "Auth\LoginController@logout"
    ]);

    Route::get("/submit-property",[
        "uses" => "PropertyController@userSubmitProperty",
        "as"    => "userSubmitProperty"
    ]);


Route::get("/test-images",[
    "uses" => "PropertyController@testImages"
]);