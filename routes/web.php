<?php

Route::group(['prefix' => 'admin','namespace' => 'Admin'] ,function (){
    /**
     * Authentication routes
     */
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'] ,function (){

        /**
         * dashboard page routes
         */
        Route::get('/' ,['as' => 'admin.dashboard' ,'uses' => 'HomeController@getIndex']);

        /**
         * settings routes
         */
        Route::group(['prefix' => 'settings'] ,function (){
            Route::get('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@getIndex']);
            Route::post('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@postIndex']);
            
        });
        
        //change map route
        Route::post('/map' ,['as' => 'admin.settings.map' ,'uses' => 'ContactUsSectionController@postEditMap']);

        /*
         * profile routes
         */
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', ['as' => 'admin.profile', 'uses' => 'ProfileController@getIndex']);
            Route::post('/', ['as' => 'admin.profile', 'uses' => 'ProfileController@postIndex']);
        });

        /**
         * subscribers routes
         */
        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/', 'SubscriberController@getIndex')->name('admin.subscribtions.index');
            Route::get('/delete/{id}', 'SubscriberController@getDelete')->name('admin.subscribtions.delete');
        });

        /**
         * message routes
         */
        Route::group(['prefix' => 'messages'] ,function (){
            Route::get('/' ,['as' => 'admin.messages' ,'uses' => 'MessageController@getIndex']);
            Route::get('/delete/{id}' ,['as' => 'admin.messages.delete' ,'uses' => 'MessageController@getDelete']);
        });

        /**
         * contact us section routes
         */
        Route::group(['prefix' => 'contact-us-section'] ,function (){
            Route::get('/' ,['as' => 'admin.contact.section' ,'uses' => 'ContactUsSectionController@getIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.contact.section.edit' ,'uses' => 'ContactUsSectionController@getEdit']);
            Route::post('/' ,['as' => 'admin.contact.section' ,'uses' => 'ContactUsSectionController@postIndex']);
            Route::post('/edit/{id}' ,['as' => 'admin.contact.section.edit' ,'uses' => 'ContactUsSectionController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.contact.section.delete' ,'uses' => 'ContactUsSectionController@getDelete']);
        });

        /**
         * Careers routes
         */
        Route::group(['prefix' => 'careers'] ,function (){
            Route::get('/' ,['as' => 'admin.careers' ,'uses' => 'CareerController@getIndex']);
            Route::get('/delete/{id}' ,['as' => 'admin.careers.delete' ,'uses' => 'CareerController@getDelete']);
        });

        /**
         * careers section routes
         */
        Route::group(['prefix' => 'careers-section'] ,function (){
            Route::get('/' ,['as' => 'admin.career.section' ,'uses' => 'CareerSectionController@getIndex']);
            Route::post('/' ,['as' => 'admin.career.section' ,'uses' => 'CareerSectionController@postIndex']);
        });

        /**
         * categories routes
         */
        Route::group(['prefix' => 'categories'] ,function (){
            Route::get('/' ,['as' => 'admin.categories' ,'uses' => 'CategoryController@getIndex']);
            Route::post('/' ,['as' => 'admin.categories' ,'uses' => 'CategoryController@postIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.categories.edit' ,'uses' => 'CategoryController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.categories.edit' ,'uses' => 'CategoryController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.categories.delete' ,'uses' => 'CategoryController@getDelete']);

            /**
             * product routes
             */
            Route::group(['prefix' => 'products'] ,function (){
                Route::get('/{id}' ,['as' => 'admin.products' ,'uses' => 'ProductController@getIndex']);
                Route::post('/{id}' ,['as' => 'admin.products' ,'uses' => 'ProductController@postIndex']);
                Route::get('/edit/{id}' ,['as' => 'admin.products.edit' ,'uses' => 'ProductController@getEdit']);
                Route::post('/edit/{id}' ,['as' => 'admin.products.edit' ,'uses' => 'ProductController@postEdit']);
                Route::get('/delete/{id}' ,['as' => 'admin.products.delete' ,'uses' => 'ProductController@getDelete']);
            });
        });

        /**
         * locations routes
         */
        Route::group(['prefix' => 'locations'] ,function (){
            Route::get('/' ,['as' => 'admin.locations' ,'uses' => 'LocationController@getIndex']);
            Route::post('/' ,['as' => 'admin.locations' ,'uses' => 'LocationController@postIndex']);
            Route::post('/edit/{id}' ,['as' => 'admin.locations.edit' ,'uses' => 'LocationController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.locations.delete' ,'uses' => 'LocationController@getDelete']);
        });

        /**
         * projects routes
         */
        Route::group(['prefix' => 'projects'] ,function (){
            Route::get('/' ,['as' => 'admin.projects' ,'uses' => 'ProjectController@getIndex']);
            Route::post('/' ,['as' => 'admin.projects' ,'uses' => 'ProjectController@postIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.projects.edit' ,'uses' => 'ProjectController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.projects.edit' ,'uses' => 'ProjectController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.projects.delete' ,'uses' => 'ProjectController@getDelete']);

            /**
             * images routes
             */
            Route::group(['prefix' => 'images'] ,function (){
                Route::get('/{id}' ,['as' => 'admin.projects.images' ,'uses' => 'ProjectImageController@getIndex']);
                Route::post('/{id}' ,['as' => 'admin.projects.images' ,'uses' => 'ProjectImageController@postIndex']);
                Route::post('/edit/{id}' ,['as' => 'admin.projects.images.edit' ,'uses' => 'ProjectImageController@postEdit']);
                Route::get('/delete/{id}' ,['as' => 'admin.projects.images.delete' ,'uses' => 'ProjectImageController@getDelete']);
            });
        });

        /**
         * news routes
         */
        Route::group(['prefix' => 'news'] ,function (){
            Route::get('/' ,['as' => 'admin.news' ,'uses' => 'NewsController@getIndex']);
            Route::post('/' ,['as' => 'admin.news' ,'uses' => 'NewsController@postIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.news.edit' ,'uses' => 'NewsController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.news.edit' ,'uses' => 'NewsController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.news.delete' ,'uses' => 'NewsController@getDelete']);
        });

        /**
         * events routes
         */
        Route::group(['prefix' => 'events'] ,function (){
            Route::get('/' ,['as' => 'admin.events' ,'uses' => 'EventsController@getIndex']);
            Route::post('/' ,['as' => 'admin.events' ,'uses' => 'EventsController@postIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.events.edit' ,'uses' => 'EventsController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.events.edit' ,'uses' => 'EventsController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.events.delete' ,'uses' => 'EventsController@getDelete']);
        });

        /**
         * ceo message routes
         */
        Route::group(['prefix' => 'ceo-message'] ,function (){
            Route::get('/' ,['as' => 'admin.ceo-message' ,'uses' => 'CeoMessageController@getIndex']);
            Route::post('/' ,['as' => 'admin.ceo-message' ,'uses' => 'CeoMessageController@postIndex']);
        });

        /**
         * Company profile routes
         */
        Route::group(['prefix' => 'company-profile'] ,function (){
            Route::get('/' ,['as' => 'admin.company-profile' ,'uses' => 'CompanyProfileController@getIndex']);
            Route::post('/' ,['as' => 'admin.company-profile' ,'uses' => 'CompanyProfileController@postIndex']);
        });

        /**
         * vision , mission and policy routes
         */
        Route::group(['prefix' => 'about-us'] ,function (){
            Route::get('/' ,['as' => 'admin.about' ,'uses' => 'AboutController@getIndex']);
            Route::post('/' ,['as' => 'admin.about' ,'uses' => 'AboutController@postIndex']);
        });

        /**
         * our values routes
         */
        Route::group(['prefix' => 'our-value'] ,function (){
            Route::get('/' ,['as' => 'admin.our-values' ,'uses' => 'OurValueController@getIndex']);
            Route::post('/' ,['as' => 'admin.our-values' ,'uses' => 'OurValueController@postIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.our-values.edit' ,'uses' => 'OurValueController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.our-values.edit' ,'uses' => 'OurValueController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.our-values.delete' ,'uses' => 'OurValueController@getDelete']);
        });

        /**
         * home section routes
         */
        Route::group(['prefix' => 'home-sections'] ,function (){
            Route::get('/' ,['as' => 'admin.sections' ,'uses' => 'HomeSectionController@getIndex']);
            Route::post('/' ,['as' => 'admin.sections' ,'uses' => 'HomeSectionController@postIndex']);
        });

        /**
         * partners routes
         */
        Route::group(['prefix' => 'partners'] ,function (){
            Route::get('/' ,['as' => 'admin.partners' ,'uses' => 'PartnerController@getIndex']);
            Route::post('/' ,['as' => 'admin.partners' ,'uses' => 'PartnerController@postIndex']);
            Route::post('/edit/{id}' ,['as' => 'admin.partners.edit' ,'uses' => 'PartnerController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.partners.delete' ,'uses' => 'PartnerController@getDelete']);
        });

        /**
         * social links routes
         */
        Route::group(['prefix' => 'social-links'] ,function (){
            Route::get('/' ,['as' => 'admin.social' ,'uses' => 'SocialLinkController@getIndex']);
            Route::post('/' ,['as' => 'admin.social' ,'uses' => 'SocialLinkController@postIndex']);
            Route::post('/edit/{id}' ,['as' => 'admin.social.edit' ,'uses' => 'SocialLinkController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.social.delete' ,'uses' => 'SocialLinkController@getDelete']);
        });

        /**
         * banners routes
         */
        Route::group(['prefix' => 'banners'] ,function (){
            Route::get('/' ,['as' => 'admin.banners' ,'uses' => 'BannerController@getIndex']);
            Route::post('/' ,['as' => 'admin.banners.edit' ,'uses' => 'BannerController@postEdit']);
        });
    });
});



Route::group(['namespace' => 'Site'] ,function (){
    /**
     * home page routes
     */
    Route::get('/' ,['as' => 'site.index' ,'uses' => 'HomeController@getIndex']);
    Route::post('subscribe' ,['as' => 'site.subscribe' ,'uses' => 'HomeController@postSubscriber']);

    /**
     * about routes
     */
    Route::get('/about-us' ,['as' => 'site.about' ,'uses' => 'AboutController@getIndex']);

    /**
     * categories controller
     */
    Route::get('/single-category/{slug}' ,['as' => 'site.category' ,'uses' => 'CategoryController@getIndex']);

    /**
     * products routes
     */
    Route::get('/products/{id}' ,['as' => 'site.products' ,'uses' => 'ProductController@getIndex']);
    Route::get('/single-product/{id}' ,['as' => 'site.products.single' ,'uses' => 'ProductController@getSingle']);

    /**
     * projects routes
     */
    Route::get('/projects' ,['as' => 'site.projects' ,'uses' => 'ProjectController@getIndex']);

    /**
     * news routes
     */
    Route::get('/news' ,['as' => 'site.news' ,'uses' => 'NewsController@getIndex']);
    Route::get('/single-news/{slug}' ,['as' => 'site.news.single' ,'uses' => 'NewsController@getSingle']);

    /**
     * events routes
     */
    Route::get('/events' ,['as' => 'site.events' ,'uses' => 'EventController@getIndex']);
    Route::get('/single-event/{slug}' ,['as' => 'site.events.single' ,'uses' => 'EventController@getSingle']);

    /**
     * careers routes
     */
    Route::get('/careers' ,['as' => 'site.careers' ,'uses' => 'CareerController@getIndex']);
    Route::post('career' ,['as' => 'site.careers.index' ,'uses' => 'CareerController@postIndex']);

    /**
     * contact routes
     */
    Route::get('/contact-us' ,['as' => 'site.contact' ,'uses' => 'ContactController@getIndex']);
    Route::post('contact' ,['as' => 'site.contact.index' ,'uses' => 'ContactController@postIndex']);
});
