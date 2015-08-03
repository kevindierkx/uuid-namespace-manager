'use_strict';

angular.module('uuid.indexControllers', ['ngTable'])

.controller('IndexUuidController', [
    '$scope', '$filter', 'ngTableParams', 'uuids',
    function ($scope, $filter, ngTableParams, uuids) {
        $scope.uuids = uuids;

        $scope.tableParams = new ngTableParams({
            sorting: {
                name: 'asc'
            }
        }, {
            counts: [], // Hide page counts control.
            getData: function ($defer, params) {
                var orderedData = params.sorting() ?
                        $filter('orderBy')(uuids.data, params.orderBy()) :
                        uniqueData;

                $defer.resolve(orderedData);
            }
        });
    }
]);
