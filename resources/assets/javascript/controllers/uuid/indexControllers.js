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
                console.debug('execute');
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
