<form name="createForm"
    ng-submit="create(uuid)"
    novalidate>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                Create namespace
            </h2>
        </div>

        <div class="panel-body">
            {!! form($createForm) !!}
        </div>
    </div>
</form>
