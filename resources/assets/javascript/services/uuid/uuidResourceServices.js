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
