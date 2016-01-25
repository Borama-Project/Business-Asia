<div class="col-lg-12">

    <div class="panel panel-info">
        <div class="panel-body">
            <h3>Category</h3>
            <div ng-repeat="businessName in get_business_by_id"> <A ng-href="#/business">Business</A> > @{{ businessName.name }}</div>
        </div>
    </div>
    <div class="col-lg-12 pd-lef-10  pd-right-0 list-group-item">
        <a ng-href="#/category/add/category/@{{ businessId  }}" >
            <button type="button" name="btnMore" class="btn btn-success" >Add Category</button>
        </a>
    </div>

    <table class="table table-condensed">
        <thead>
        <tr><th>N</th>
            <th>Name</th>
            <th></th>

        </tr>

        </thead>
        <tbody>


        <tr data-ng-repeat="item in get_category_by_business_id">
            <td >@{{$index + 1}}</td>
            <td >@{{ item.name }}</td>
            <td >
                <div class="row">
                    <div class="col-xs-3">
                        <A ng-href="#/products/list/@{{item.id}}/business/@{{businessId}}">
                            <button type="button" name="btnMore" class="btn btn-success">Product</button>
                        </A>
                    </div>
                    <div class="col-xs-3">
                        <A ng-href="#/category/edit/@{{item.id}}/business/@{{businessId}}">
                           <button type="button" name="btnMore" class="btn btn-warning" ng-click="deleteById('sm')">Edit</button>
                        </A>
                    </div>
                    <div class="col-xs-3">
                        <button type="button" name="btnMore" class="btn btn-danger" ng-click="deleteCategoryById('sm')">Delete</button>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>