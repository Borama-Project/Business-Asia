<div class="col-lg-12"> 
	<div class="panel panel-info">
	  <div class="panel-body">
	   <h3>Manage Fix Product</h3>
      <!-- <a ng-href="#/business">Business</a> >
        <a ng-href="#/category/@{{businessId}}">Category</a> 
	  </div> -->
	</div>
	<div class="col-lg-12 pd-lef-10  pd-right-0 list-group-item">
    <form ng-submit="submit()">
        <div class="form-group col-lg-3 pd-lef-0">
            <select ng-model="app.selectCategory" class="form-control" id="tagList"  name="select">
                <option value="">Select Category </option>
                <option ng-repeat="item in selectCategory" value="@{{ item.id }}"> @{{ item.name }} </option>
            </select>
        </div>
        <div class="form-group col-lg-2 pd-lef-0">
            <button type="submit" id="submit" class="btn btn-default">Search</button>
        </div>
    </form>
    </div>
    <!-- <div class="form-group col-xs-12 pd-lef-0">
        <div class="alert alert-success">
          <strong>@{{results}}</strong> 
        </div>
    </div> -->
    <div class="col-lg-8 pd-lef-10  pd-right-0 list-group-item search-list">
        <table class="table table-condensed">
            <thead> 
            <tr>
                <th>Nº</th>
                <th>Product Name</th>
                <th>Business Name</th>
                <th>price</th>
                <th>Image</th>
                <th >Manage</th>
            </tr>
            </thead>
            <tbody>
            <tr data-ng-repeat="item in Products | filter:search:strict | startFrom: pagination.page * pagination.perPage | limitTo: pagination.perPage">
                <td >@{{ $index +1 }}</td>
                <td >@{{ item.name }}</td>
                <td >@{{ item.businessName }}</td>
                <td >@{{ item.price }} </td>
                <td ><img ng-src="@{{ item.imageGallery[0] }} " width="50" height="50" class="thumb"></td>
                <td width="100px">
                    <div class="row">
                      <div class="col-xs-4">
                        <button type="button" name="btnMore" class="btn btn-default  btn-xs" ng-click="ngView()" >View</button>
                      </div>
                      <div class="col-xs-5">
                          <button type="button" name="@{{ item.id }}" class="btn btn-primary  btn-xs" ng-click="ngAdd()">Add</button>
                      </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <ul class="pagination">
                          <li><a href="" ng-click="pagination.prevPage()">&laquo;</a></li>
                          <li ng-repeat="n in [] | range: pagination.numPages" ng-class="{active: n == pagination.page}">
                          <a href="" ng-click="pagination.toPageId(n)">@{{n + 1}}</a>
                          </li>
                          <li><a href="" ng-click="pagination.nextPage()">&raquo;</a></li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-4 pd-lef-10  pd-right-0 list-group-item search-list">
        <h4>Selected List</h4>
        <div  class="form-group col-lg-12" ng-repeat="selectList in selectLists">
            <img ng-src="@{{ selectList.product.imageGallery[0] }}" width="70" height="70">
            <span>@{{selectList.product.name}}</span>
        </div>
    </div>
    
    
    </div>
</div>
<script type="text/ng-template" id="ModalProductList">
    <div class="modal-header">
        <h3 class="modal-title">@{{title}} !</h3>
    </div>
    <div class="modal-bodylist-group-item pd-lef-10 pd-right-15">
            <div class="col-lg-12 pd-lef-0 pad-top-15">
                <label class="col-lg-5 pd-lef-0">Product Category</label>
                <div class="col-lg-6 pd-lef-5">
                <select ng-model="app.productCategoryId" class="form-control" id="tagList"  name="select" required>
                    
                    <option ng-repeat="item in categorysLists" value="@{{ item.id }}"> @{{ item.name }} </option>
                </select>
                </div>
            </div>
            <div class="form-group col-lg-12 pd-lef-0">
                <div class="col-lg-6 pd-lef-0">
                    <label>Product Name </label>
                    <input type="text" class="form-control"  name="name" ng-model="app.name" placeholder="Name" autocomplete="off" required="required">
                </div>
                <div class="col-lg-6 pd-lef-0">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <label>Price</label>
                            <input type="text" min="0" class="form-control" ng-model="app.price" placeholder="Price" required >
                        </div>

                        <div class="col-lg-5 pad-top-25 pd-lef-0">
                            <select ng-model="app.currency" class="form-control" id="currency"  name="select" >
                                <option ng-repeat="item in currencys" value="@{{ item.id }}"> @{{ item.name }} </option>
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-12 pd-lef-0">
                <div class="form-group pd-lef-0">
                    <div class="col-xs-6 pd-lef-0">
                        <label class="control-label col-lg-5 pd-lef-0">Start Date</label>
                        <div class="col-lg-7 pd-lef-5">
                            <input kendo-date-picker ng-model="app.publishDate.dateStart"  k-format="'yyyy-MM-dd'" style="width: 100%;" required />
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="control-label pad-top-5 col-md-5">End Date</label>
                        <div class="col-md-7 pd-lef-5">
                            
                            <input kendo-date-picker ng-model="app.publishDate.dateEnd"  k-format="'yyyy-MM-dd'" style="width: 100%;" required />
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-12 pd-lef-0">
                <div class="form-group col-xs-6 pd-lef-0">
                    <label class="control-label col-lg-5 pd-lef-0">Business Tag</label>
                    <div class="col-lg-7 pd-lef-5">
                        <select ng-model="app.listBusinessTag" class="form-control" name="select" id="mySelect" required>
                            <optgroup ng-repeat="businessTags in listBusinessTag" label="@{{ businessTags.name }}">
                                <option ng-repeat="tag in businessTags.tag"  value="@{{ tag.id }}"> @{{ tag.name }} </option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="control-label col-md-5">Condition</label>
                    <div class="col-md-7 pd-lef-5">
                        <select ng-model="app.condition" class="form-control" id="conditions"  name="select" required >
                            <option ng-repeat="item in conditions"  value="@{{ item.conditionId }}"> @{{ item.name }} </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12 pd-lef-0">
                <label>Description</label>
                <textarea class="form-control"required ng-model="app.description"></textarea>
            </div>
            <div class="form-group col-md-12 thumbnail md-9">
              <label class="col-xs-12">Product Gallery</label>
              <div class="col-md-3">
                
                    <img ng-src="@{{app.imageGallery[0]}}"   class="thumb" width="100" height="100">
                
              </div>
              <div class="col-md-3">
               
                    <img ng-src="@{{app.imageGallery[1]}}"   class="thumb" width="100" height="100">
                
              </div>
              <div class="col-md-3">
                
                    <img ng-src="@{{app.imageGallery[2]}}"   class="thumb" width="100" height="100">
                
              </div>
              <div class="col-md-3">
                
                    <img ng-src="@{{app.imageGallery[3]}}"   class="thumb" width="100" height="100">
               
              </div>
            </div>
            
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary btn-xs" type="button" ng-click="ok()">Add</button>
        <button class="btn btn-default btn-xs" type="button" ng-click="cancel()">Cancel</button>
    </div>
</script>