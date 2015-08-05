'use_strict';

angular.module('app.errors', [])

.config([
    '$httpProvider',
    function ($httpProvider) {
        $httpProvider.interceptors.push([
            '$injector',
            function ($injector) {
                return $injector.get('AuthInterceptor');
            }
        ]);
    }
])

.factory('AuthInterceptor', [
    '$rootScope', '$q', 'AUTH_EVENTS',
    function ($rootScope, $q, AUTH_EVENTS) {
        return {
            responseError: function (response) {
                $rootScope.$broadcast({
                    401: AUTH_EVENTS.notAuthenticated,
                    403: AUTH_EVENTS.notAuthorized
                }[response.status], response);

                return $q.reject(response);
            }
        };
    }
]);

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

'use_strict';

angular.module('app.routes', [
    'ui.router',

    // Controllers
    'uuid.indexControllers',
    'uuid.createControllers',

    // Services
    'uuid.uuidResourceServices',
])

.config([
    '$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {

        $stateProvider
        .state('uuid', {
            abstract: true,
            template: '<ui-view/>',
            resolve: {
                UuidResource: 'UuidResource',
                uuids: [
                    'UuidResource',
                    function (UuidResource) {
                        return UuidResource.query().$promise;
                    }
                ],
            },
        })
        .state('uuid.index', {
            url: '/',
            templateUrl: 'api/ng-templates?template=uuid.index',
            controller: 'IndexUuidController'
        })
        .state('uuid.create', {
            url: '/create',
            templateUrl: 'api/ng-templates?template=uuid.create',
            controller: 'CreateUuidController'
        });
    }
]);

'use_strict';

angular.module('app.authEventConstants', [])

.constant('AUTH_EVENTS', {
    loginSuccess: 'auth-login-success',
    loginFailed: 'auth-login-failed',
    logoutSuccess: 'auth-logout-success',
    sessionTimeout: 'auth-session-timeout',
    notAuthenticated: 'auth-not-authenticated',
    notAuthorized: 'auth-not-authorized'
});

'use_strict';

angular.module('uuid.createControllers', [
    'ui.bootstrap.showErrors',

    // Services
    'uuid.uuidResourceServices',
])

.controller('CreateUuidController', [
    '$scope', '$state', 'UuidResource', 'uuids',
    function ($scope, $state, UuidResource, uuids) {
        $scope.uuids = uuids;

        $scope.create = function (uuid) {
            $scope.$broadcast('show-errors-check-validity');

            if ( $scope.createForm.$valid ) {
                UuidResource.save(
                    uuid,
                    function (successResult) {
                        $state.go('uuid.index', {}, { reload: true });
                    },
                    function (errorResult) {
                        // Error state, we could implement something nice here.
                    }
                );
            }
        }
    }
]);

'use_strict';

angular.module('uuid.indexControllers', ['ngTable'])

.controller('IndexUuidController', [
    '$scope', '$filter', 'ngTableParams', 'uuids',
    function ($scope, $filter, ngTableParams, uuids) {
        $scope.filterName = '';

        $scope.tableParams = new ngTableParams({
            sorting: {
                name: 'asc'
            },
            filter: {
                name: ''
            }
        }, {
            counts: [],
            filterDelay: 200,
            getData: function ($defer, params) {
                var filteredData = params.filter() ?
                    $filter('filter')(uuids.data, params.filter()) :
                    uuids.data;

                var orderedData = params.sorting() ?
                    $filter('orderBy')(filteredData, params.orderBy()) :
                    filteredData;

                $defer.resolve(orderedData);
            }
        });

        $scope.filterNameChanged = function () {
            $scope.tableParams.filter()['name'] = $scope.filterName;
        }
    }
]);

'use_strict';

angular.module('uuid.uuidResourceServices', ['ngResource'])

.factory("UuidResource", [
    '$resource',
    function ($resource) {
        return $resource(
            "/api/uuid",
            {},
            {
                'query': {method: 'GET', isArray: false}
            }
        );
    }
]);

//# sourceMappingURL=app.js.map