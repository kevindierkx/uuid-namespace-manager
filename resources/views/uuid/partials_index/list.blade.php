<table class="table" ng-table="tableParams">
    <thead>
        <tr>
            <th class="sortable col-sm-6 col-md-4"
                ng-click="tableParams.sorting({'name' : tableParams.isSortBy('name', 'asc') ? 'desc' : 'asc'})"
                ng-class="{
                    'sort-asc': tableParams.isSortBy('name', 'asc'),
                    'sort-desc': tableParams.isSortBy('name', 'desc')
                }">
                <span class="sort-indicator">Name</span>
            </th>

            <th class="sortable col-sm-6 col-md-4"
                ng-click="tableParams.sorting({'uuid' : tableParams.isSortBy('uuid', 'asc') ? 'desc' : 'asc'})"
                ng-class="{
                    'sort-asc': tableParams.isSortBy('uuid', 'asc'),
                    'sort-desc': tableParams.isSortBy('uuid', 'desc')
                }">
                <span class="sort-indicator">UUID</span>
            </th>

            <th class="sortable col-xs-2 hidden-xs hidden-sm"
                ng-click="tableParams.sorting({'created_at' : tableParams.isSortBy('created_at', 'asc') ? 'desc' : 'asc'})"
                ng-class="{
                    'sort-asc': tableParams.isSortBy('created_at', 'asc'),
                    'sort-desc': tableParams.isSortBy('created_at', 'desc')
                }">
                <span class="sort-indicator">Created At</span>
            </th>

            <th class="sortable col-xs-2 hidden-xs hidden-sm"
                ng-click="tableParams.sorting({'updated_at' : tableParams.isSortBy('updated_at', 'asc') ? 'desc' : 'asc'})"
                ng-class="{
                    'sort-asc': tableParams.isSortBy('updated_at', 'asc'),
                    'sort-desc': tableParams.isSortBy('updated_at', 'desc')
                }">
                <span class="sort-indicator">Updated At</span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="uuid in $data">
            <td>
                @{{ uuid.name }}
                <small class="clearfix">@{{ uuid.description }}</small>
            </td>

            <td>
                @{{ uuid.uuid }}
            </td>

            <td class="hidden-xs hidden-sm">
                @{{ uuid.created_at | date : 'longDate' }}
                <small class="clearfix">@{{ uuid.created_at | date : 'hh:mm a' }}</small>
            </td>

            <td class="hidden-xs hidden-sm">
                @{{ uuid.updated_at | date: 'longDate'  }}
                <small class="clearfix">@{{ uuid.updated_at | date : 'hh:mm a' }}</small>
            </td>
        </tr>
    </tbody>
</table>
