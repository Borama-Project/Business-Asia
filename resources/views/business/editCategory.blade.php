<div class="col-lg-12">
    <form ng-submit="submitEdit()">
        <div class="panel panel-info">
            <div class="panel-body">
                Edit Category
            </div>
        </div>
        <div class="form-group col-xs-6">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control"  ng-model="globalVirable.newCategoryName" placeholder="Name" required="">
        </div>
        <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-default">Save</button>
        </div>

    </form>

</div>

