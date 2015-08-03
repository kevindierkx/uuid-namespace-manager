<div class="page-header">
    <h1>Namespaces</h1>
</div>

<table class="table"
    ng-table="tableParams">
    <tbody>
        <tr ng-repeat="uuid in $data">
            <td class="col-xs-2"
                data-title="'Name'"
                sortable="'name'">

                @{{ uuid.name }}
            </td>

            <td class="col-xs-2"
                data-title="'Description'"
                sortable="'description'">
                @{{ uuid.description }}
            </td>

            <td class="col-xs-4"
                data-title="'UUID'"
                sortable="'uuid'">
                @{{ uuid.uuid }}
            </td>

            <td class="col-xs-2"
                data-title="'Created at'"
                sortable="'created_at'">
                @{{ uuid.created_at }}
            </td>

            <td class="col-xs-2"
                data-title="'Updated at'"
                sortable="'updated_at'">
                @{{ uuid.updated_at }}
            </td>
        </tr>
    </tbody>
</table>
