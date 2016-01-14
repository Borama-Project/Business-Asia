<table class="table">
    <thead>
    <tr>
        <th width="10%">Business Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Logo</th>

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

