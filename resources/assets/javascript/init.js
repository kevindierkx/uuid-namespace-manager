'use_strict';

var app = angular.module('app.init', [
    // Core
    'app.errors',
    'app.routes',

    // Constants
    'app.authEventConstants',
])

.config([
    '$locationProvider', '$httpProvider',
    function ($locationProvider, $httpProvider) {
        $locationProvider.html5Mode(true);

        // Setting this header is required for Laravel/Symfony to accept our Ajax calls.
        $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

        $httpProvider.defaults.headers.common['Accept'] = 'application/vnd.uuid.v1+json';
    }
])

.run([
    '$rootScope', '$http',
    function ($rootScope, $http) {
        // For $http request we need to set the X-XSRF-TOKEN header
        // to make sure we pass our CSRF protection.
        $rootScope.xsrf_token = function (value) {
            $http.defaults.headers.common['X-XSRF-TOKEN'] = value;
        }

        // Add the JwtToken to the session.
        // $rootScope.jwt_token = function (value) {
        //     $http.defaults.headers.common['Authorization'] = 'Bearer ' + value;
        // }
    }
]);
