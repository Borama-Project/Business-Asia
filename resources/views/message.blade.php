<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Business Asian</div>
				<div class="panel-body">
					<form role="form" method="post" action="/user">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Name *</label>
									<input type="text" class="form-control" id="name" name="name" required="" >
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">

									<label for="email">Business Name</label>
									<input type="text" class="form-control" id="email" name="businessName">
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">

									<label for="email">Logo *</label>
									<input type="text" class="form-control" id="logo" name="logo" required="">
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">

									<label for="email">Company Logo</label>
									<input type="text" class="form-control" id="companyLogo">
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">

									<label for="email">Phone</label>
									<input type="email" class="form-control" id="phone">
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">

									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email">
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="email">Geo Location *</label>
									<input type="text" class="form-control" id="geoLocation" name="geoLocation">
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="email">Address</label>
									<textarea class="form-control" name="address" placeholder="Address"></textarea>
								</div>
								
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">Search Business</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="searchBusiness" placeholder="Message"></textarea>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="email">Product Catalog </label>
									<input type="file" class="form-control" id="file" name="productCatalog" required="" >
								</div>
								<small class="display-block" >
										
								</small>
							</div>
						</div>
						<small class="display-block">Your credentials
						
								@if (count(@$errors) > 0)
									<div class="alert alert-danger">
										<strong>AutoAds!</strong> There were some problems with your input.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
						</small>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>