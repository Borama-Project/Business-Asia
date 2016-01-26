
<!-- <div class="container"> -->
<div class="col-lg-12">
    <form ng-submit="submits()">
        <div class="panel panel-info">
            <div class="panel-body">
                Business Register
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6"><label for="exampleInputEmail1">Business Name </label>
                <input type="text" class="form-control"  ng-model="globalVirable.businessname" placeholder="businessName" required="true"></div>
            <div class="col-md-3">
                <label>Logo</label>
                <a href="javascript:void(0)" class="thumbnail">
                    <img ng-src="@{{globalVirable.logoEdit}}" width="100" height="100"  id="imgLogo" ng-click="">
                    <input type="file" ngf-select ng-model="globalVirable.logo" name="logo" id="inputFileLogo"   style="display: none">
                </a>
            </div>
            {{--<div class="col-md-3">--}}
                {{--<label>Cover</label>--}}
                {{--<a href="javascript:void(0)" class="thumbnail">--}}
                    {{--<img ng-src="@{{ globalVirable.coverEdit }}" width="100" height="100"  id="imgCover">--}}
                    {{--<input type="file" ngf-select ng-model="globalVirable.cover" name="cover"  id="inputFileCover"   style="display: none">--}}
                {{--</a>--}}
            {{--</div>--}}
        </div>

        <div class="col-md-12">
            {{--<div class="col-md-6">--}}
                {{--<label>Business Type</label>--}}
                {{--<select ng-model="globalVirable.businessTypeList" class="form-control" >--}}
                    {{--<option value="@{{ businessTypesSelected }}">@{{ businessTypesSelected }}</option>--}}
                    {{--<option ng-repeat="businessTypes in businessType" ng-selected="businessTypesSelected" value="@{{businessTypes}}"> @{{businessTypes.name}}</option>--}}
                {{--</select>--}}

            {{--</div>--}}
            <div class="col-md-6">
                <label for="exampleInputEmail1">Business Tag</label>

                    <select  class="form-control" ng-model="globalVirable.businessTagList">
                        <optgroup ng-repeat="businessTags in businessTag" label="@{{businessTags.name }}">
                            <option ng-repeat="tag in businessTags.tag" value="@{{tag.id}}">@{{tag.name}}</option>
                        </optgroup>
                    </select>

            </div>
        </div>

        <div class="col-md-12">
            <label for="exampleInputEmail1">Description</label>
            <textarea class="form-control" name="searchBusiness" ng-model="globalVirable.description" placeholder="Discription"></textarea>
        </div>
        <div class="form-group col-xs-6">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" class="form-control"  name="" ng-model="globalVirable.phoneNumber" placeholder="phone" required="true">
        </div>
        <div class="form-group col-xs-6">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="" ng-model="globalVirable.email" placeholder="Email" required="true">
        </div>
        <div class="form-group col-xs-6">
            <label for="exampleInputEmail1">Latitute</label>
            <input type="text" class="form-control" id="" ng-model="globalVirable.latitute" placeholder="" required="true">
        </div>
        <div class="form-group col-xs-6">
            <label for="exampleInputEmail1">Longitute</label>
            <input type="text" class="form-control" id="" ng-model="globalVirable.longitute" placeholder="" required="true">
        </div>
        <div class="col-md-6">
            <label for="exampleInputEmail1">Location Name </label>
            <input type="text" class="form-control"  name="" ng-model="globalVirable.locationname" placeholder="businessName" required="true">
        </div>
        <div class="form-group col-xs-12">
            <label for="exampleInputEmail1">Address</label>
            <textarea class="form-control" name="searchBusiness" ng-model="globalVirable.address" placeholder="Address" required="true"></textarea>
        </div>


        <div class="form-group col-xs-12 ">
            <button type="submit" id="clickBR" class="btn btn-default">Submit</button>
        </div>

        <div class="form-group col-xs-6">
            <div ng-if="success">
                <div class="alert alert-success">
                    <strong>Success!</strong><span class="label label-success">@{{ businessName }}</span> Business has been update.
                </div>

                <A ng-href="/#business">Back to business!</A>
            </div>

            <div ng-if="errorSMS">
                <div class="alert alert-danger" animate-show>
                    @{{ errorSMS }}
                </div>
            </div>

        </div>

    </form>

</div>

<script>
    $( "#imgLogo" ).on( "click", function() {
        $( "#inputFileLogo" ).trigger( "click" );
    });
    $( "#imgCover" ).on( "click", function() {
        $( "#inputFileCover" ).trigger( "click" );
    });

    $("#inputFileLogo").change(function () {
        var input = this;
        var reader = new FileReader();
        var img = new Image();

        reader.onload = function (e) {
            img.src = e.target.result;
            $('#imgLogo').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    });

    $("#inputFileCover").change(function () {
        var input = this;
        var reader = new FileReader();
        var img = new Image();

        reader.onload = function (e) {
            img.src = e.target.result;
            $('#imgCover').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    });
</script>

