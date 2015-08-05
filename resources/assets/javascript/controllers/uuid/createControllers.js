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
