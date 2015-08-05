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
