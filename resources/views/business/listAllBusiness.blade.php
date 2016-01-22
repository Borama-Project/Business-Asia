<table class="table table-condensed">
    <thead>
    <tr>
        <th>Business Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Logo</th>

    </tr>
    <tr>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Business Name">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Phone Number">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Email">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Address">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Logo">
            </div>
        </th>

    </tr>
    </thead>
    <tbody>
    
    <tr data-ng-repeat="get_all_businesss in get_all_business">

        <td >@{{ get_all_businesss.head.name }}</td>
        <td >@{{ get_all_businesss.head.phoneNumber }}</td>
        <td >@{{ get_all_businesss.head.email }}</td>
        <td >@{{ get_all_businesss.head.address }}</td>
        <td >
            <IMG width="40" height="40"
                    ng-src="@{{ get_all_businesss.logo }}">
            </IMG>
        </td>
    </tr>
    </tbody>
</table>

<style>
    
.ng-enter{
    transition:0.75s;
    opacity: 0;
}
.ng-enter-stagger{
    transition-delay:0.1s;
}
.ng-enter-active{
    opacity: 1;
}
.ng-leave{
    transition:0.75s;
    opacity: 1;
}
.ng-leave-active{
    opacity: 0;
}
</style>