/**
 * Created by sasanak on 7/21/2017.
 */
var app = angular.module('amcApp',['ngRoute','ngSanitize','ngMap']);
app.config(function($routeProvider,$locationProvider){
    $routeProvider
        .when('/',{
            templateUrl:'views/home.html'
        })
        .when('/about-sri-lanka',{
            templateUrl:'views/sri-lanka.html',
            controller : 'aboutSlCtrl'
        })
        .when('/about-us',{
            templateUrl:'views/about-us.html'
        })
        .when('/inbound',{
            templateUrl:'views/inbound.html',
            controller : 'inboundDataCtrl'
        })
        .when('/inbound/:pkgTitle/:pkgId',{
            templateUrl:'views/inbound-info.html',
            controller : 'inboundDataCtrl'
        })
        .when('/outbound',{
            templateUrl:'views/outbound.html',
            controller : 'outboundDataCtrl'
        })
        .when('/outbound/:pkgTitle/:pkgId2',{
            templateUrl:'views/outbound-info.html',
            controller : 'outboundDataCtrl'
        })
        .when('/testimonials',{
            templateUrl:'views/testimonials.html',
            controller : 'testimonialsCtrl'
        })
        .when('/promotions',{
            templateUrl:'views/promotions.html',
            controller:'promotionsCtrl'
        })
        .when('/news',{
            templateUrl:'views/news.html',
            controller:'newsCtrl'
        })
        .when('/detail/:newsTitle/:newsId',{
            templateUrl:'views/news-detail.html',
            controller:'newsDetailCtrl'
        })
        .when('/contact-us',{
            templateUrl:'views/contact-us.html',
            controller:'contactCtrl'
        })
        .when('/gallery',{
            templateUrl:'views/gallery.html',
            controller:'galleryCtrl'
        })
        .otherwise('/');
    $locationProvider.html5Mode(true);
});
app.controller('appCtrl',function ($scope) {
    $scope.baseRoot = 'http://amcholidays.com/';

    if(window.screen.width > 1024){
        $scope.Icount = 3;
        $scope.videoWidth = '720px';
        $scope.videoHeight = '390px'
    }else {
        if(window.screen.width <= 1024 && window.screen.width > 768){
            $scope.Icount = 2
        }else {
            $scope.Icount = 1;
            $scope.videoWidth = '360px';
            $scope.videoHeight = '240px'
        }
    }
    if(window.screen.width < 360){
        $scope.videoWidth = '280px';
    }
    $scope.mobNavOpen = function () {
       $(".mob-nav-f").toggleClass('opened');
       $(".nav-bt").toggleClass('changed')
    };
    $scope.closeNav = function () {
        $(".mob-nav-f").removeClass('opened');
        $(".nav-bt").removeClass('changed')
    }
});
app.controller('bannerCtrl',function ($timeout) {
    $timeout(function () {
        $(".rslides").responsiveSlides({
            nav:true
        });
    },200)
});
app.controller('aboutSlCtrl',function ($scope,$http) {
   $http.get('data/about-sri-lanka-data.json').then(function (response) {
       $scope.pgSlData = response.data;
       //console.log(response.data);
   })
});
app.controller('TabController', ['$scope', function($scope) {
    $scope.tab = 1;

    $scope.setTab = function(newTab){
        $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum){
        return $scope.tab === tabNum;
    };
}]);
app.controller('inboundDataCtrl',function ($scope,$http,$routeParams) {
    $scope.inboundPkgId = $routeParams.pkgId;

   $http.get('data/inbound-packages.json').then(function (response) {
       $scope.inboundPkg = response.data;
       //console.log(response.data)
   })
});
app.controller('InboundView',function ($scope,$routeParams,$http,$timeout) {
    var pkg = $scope.inboundPkgName = $routeParams.pkgTitle;
    $scope.formPkg = pkg.replace(/-/g, ' ');


    /*form submission built in*/

    $scope.result = 'hidden';
    $scope.resultMessage;
    $scope.inqData = {pkg:$scope.formPkg,hotel:'not-selected',airlines:'not-selected'};//formData is an object holding the name, email, subject, and message
    $scope.submitButtonDisabled = false;
    $scope.submitted = false; //used so that form errors are shown only after the form has been submitted


    $scope.submit = function(inqForm) {

        $scope.submitted = true;
        $scope.submitButtonDisabled = true;

        if (inqForm.$valid) {
            $http({
                method  : 'POST',
                url     : 'mail/pkgInq.php',
                data    : $.param($scope.inqData),  //param method from jQuery
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  //set the headers so angular passing info as form data (not request payload)
            }).then(function(data){
                console.log(data);
                if (data.success) { //success comes from the return json object
                    alert('sent');
                    $('.done').addClass('done2');
                    $scope.submitButtonDisabled = true;
                    $scope.resultMessage = data.data.message;
                    $scope.result='bg-success';
                    $timeout(function(){
                        $scope.inqData = null;
                        $scope.result = 'hidden';
                        $('.inqForm').each(function(){
                            this.reset();
                        });
                    },3000);
                } else {
                    $scope.submitButtonDisabled = false;
                    $scope.resultMessage = data.data.message;
                    $scope.result='bg-danger';
                    $('.msg-show').addClass('done3');

                }
            });
        } else {
            $scope.submitButtonDisabled = false;
            $scope.resultMessage = 'Please verify the captcha.';
            $scope.result='bg-danger';
        }
    }
    /*form submission built end*/
});

app.controller('outboundDataCtrl',function ($scope,$http,$routeParams) {
    $scope.outboundPkgId = $routeParams.pkgId2;


    $http.get('data/outbound-packages.json').then(function (response) {
        $scope.outboundPkg = response.data;
        //console.log(response.data)
    });

});

app.controller('outboundView',function ($scope,$routeParams,$http,$timeout) {
    var pkg = $scope.outboundPkgName = $routeParams.pkgTitle;
    $scope.formPkg = pkg.replace(/-/g, ' ');
    /*form submission built in*/
    $scope.result = 'hidden';
    $scope.resultMessage;
    $scope.inqData = {pkg:$scope.formPkg,hotel:'not-selected',airlines:'not-selected'};//formData is an object holding the name, email, subject, and message
    $scope.submitButtonDisabled = false;
    $scope.submitted = false; //used so that form errors are shown only after the form has been submitted


    $scope.submit = function(inqForm) {

        $scope.submitted = true;
        $scope.submitButtonDisabled = true;

        if (inqForm.$valid) {
            $http({
                method  : 'POST',
                url     : 'mail/pkgInq.php',
                data    : $.param($scope.inqData),  //param method from jQuery
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  //set the headers so angular passing info as form data (not request payload)
            }).then(function(data){
                console.log(data);
                if (data.success) { //success comes from the return json object
                    alert('sent');
                    $('.done').addClass('done2');
                    $scope.submitButtonDisabled = true;
                    $scope.resultMessage = data.message;
                    $scope.result='bg-success';
                    $timeout(function(){
                        $scope.inqData = null;
                        $scope.result = 'hidden';
                        $('.inqForm').each(function(){
                            this.reset();
                        });
                    },3000);
                } else {
                    $scope.submitButtonDisabled = false;
                    $scope.resultMessage = data.message;
                    $scope.result='bg-danger';
                    $('.msg-show').addClass('done3');

                }
            });
        } else {
            $scope.submitButtonDisabled = false;
            $scope.resultMessage = 'Please verify the captcha.';
            $scope.result='bg-danger';
        }
    }


    /*form submission built end*/


});

app.controller('newsCtrl',function ($scope, $http) {
    $http.get('http://amcholidays.com/admin/api/get_all_news.php').then(function (response) {
        $scope.news = response.data;
        //console.log("News Loaded");
        //console.log(response.data);
    })
});
app.controller('newsDetailCtrl',function ($routeParams,$scope,$http) {
    var newsId = $routeParams.newsId;
    $http.get('http://amcholidays.com/admin/api/get_news.php?id='+newsId).then(function (response) {
        $scope.newsDetail = response.data;
        console.log(response.data)
    })
});
app.controller('promotionsCtrl',function ($scope, $http) {
    $http.get('http://amcholidays.com/admin/api/get_all_promotions.php').then(function (response) {
        $scope.promotions = response.data;
        //console.log("Promotions Loaded");
        //console.log(response.data);
    })
});

app.controller('testimonialsCtrl',function ($scope, $http) {
   $http.get('http://amcholidays.com/admin/api/get_all_testimonials.php').then(function (response) {
       $scope.testimonials = response.data;
       //console.log("Testimonials Loaded");
       //console.log(response.data);
   })
});
app.controller('galleryCtrl',function ($scope,$timeout,$http) {
    $http.get('data/gallery.json').then(function (response) {
        $scope.gallery = response.data
    })

    $timeout(function () {
        $('.venobox').venobox({
            framewidth: '1024px',
            spinner:'three-bounce'
        });
    },200)

});
app.controller('contactCtrl',function ($scope,$http,$timeout) {
    $scope.result = 'hidden';
    $scope.resultMessage;
    $scope.formData;//formData is an object holding the name, email, subject, and message
    $scope.submitButtonDisabled = false;
    $scope.submitted = false; //used so that form errors are shown only after the form has been submitted


    $scope.submit = function(contactform) {

        $scope.submitted = true;
        $scope.submitButtonDisabled = true;

        if (contactform.$valid) {
            $http({
                method  : 'POST',
                url     : 'mail/contact.php',
                data    : $.param($scope.formData),  //param method from jQuery
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  //set the headers so angular passing info as form data (not request payload)
            }).then(function(data){
                console.log(data);
                if (data.success) { //success comes from the return json object
                    alert('sent');
                    $('.done').addClass('done2');
                    $scope.submitButtonDisabled = true;
                    $scope.resultMessage = data.data.message;
                    $scope.result='bg-success';
                    $timeout(function(){
                        $scope.formData = null;
                        $scope.result = 'hidden';
                        $('.contactform').each(function(){
                            this.reset();
                        });
                    },3000);
                } else {
                    $scope.submitButtonDisabled = false;
                    $scope.resultMessage = data.data.message;
                    $scope.result='bg-danger';
                    $('.msg-show').addClass('done3');

                }
            });
        } else {

            $scope.submitButtonDisabled = false;
            $scope.resultMessage = 'Please verify the captcha.';
            $scope.result='bg-danger';
        }
    }
});
app.directive("owlCarousel", function() {
    return {
        restrict: 'E',
        transclude: false,
        link: function (scope) {
            scope.initCarousel = function(element) {
                // provide any default options you want
                var defaultOptions = {
                    autoplay: true,
                    nav: true,
                    dots: true,
                    items : 4,
                    rewind:true

                };
                var customOptions = scope.$eval($(element).attr('data-options'));
                // combine the two options objects
                for(var key in customOptions) {
                    defaultOptions[key] = customOptions[key];
                }
                // init carousel
                $(element).owlCarousel(defaultOptions);
            };
        }
    };
});
app.directive('owlCarouselItem', function() {
    return {
        restrict: 'A',
        transclude: false,
        link: function(scope, element) {
            // wait for the last item in the ng-repeat then call init
            if(scope.$last) {
                scope.initCarousel(element.parent());
            }
        }
    };
});

app.directive('reCaptcha', function() {
    var ddo = {
        restrict: 'AE',
        scope: {},
        require: 'ngModel',
        link: link,
    };
    return ddo;


    function link(scope, elm, attrs, ngModel) {
        var id;
        ngModel.$validators.captcha = function(modelValue, ViewValue) {
            // if the viewvalue is empty, there is no response yet,
            // so we need to raise an error.
            return !!ViewValue;
        };

        function update(response) {
            ngModel.$setViewValue(response);
            ngModel.$render();
        }

        function expired() {
            grecaptcha.reset(id);
            ngModel.$setViewValue('');
            ngModel.$render();
            // do an apply to make sure the  empty response is
            // proaganded into your models/view.
            // not really needed in most cases tough! so commented by default
            // scope.$apply();
        }

        function iscaptchaReady() {
            if (typeof grecaptcha !== "object") {
                // api not yet ready, retry in a while
                return setTimeout(iscaptchaReady, 1000);
            }
            id = grecaptcha.render(
                elm[0], {
                    // put your own sitekey in here, otherwise it will not
                    // function.
                    "sitekey": "6LcgwTMUAAAAAExCdLr_j-gSgpUkiC9mO8vIrlwr",
                    callback: update,
                    "expired-callback": expired
                }
            );
        }
        iscaptchaReady();
    }
});
app.filter('textLimit', function () {
    return function (value, wordwise, max, tail) {
        if (!value) return '';

        max = parseInt(max, 10);
        if (!max) return value;
        if (value.length <= max) return value;

        value = value.substr(0, max);
        if (wordwise) {
            var lastspace = value.lastIndexOf(' ');
            if (lastspace !== -1) {
                //Also remove . and , so its gives a cleaner result.
                if (value.charAt(lastspace-1) === '.' || value.charAt(lastspace-1) === ',') {
                    lastspace = lastspace - 1;
                }
                value = value.substr(0, lastspace);
            }
        }

        return value + (tail || '…');
    };
});
app.filter('spaceless',function() {
    return function(input) {
        if (input) {
            return input.replace(/\s+/g, '-').replace(/\//g, '').toLowerCase();
        }
    }
});
app.filter('dashless', function () {
    return function (input) {
        return input.replace(/-/g, ' ');
    };
});



