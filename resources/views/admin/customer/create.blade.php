@extends('layouts.admin')


@section('content')

<!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">

                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Customers | Create New Customer</h5>

                    <!--end::Page Title-->
                </div>

                <!--end::Page Heading-->
            </div>

            <!--end::Info-->

            <!--begin::Toolbar-->
            
            <!--end::Toolbar-->
        </div>
    </div>

    <!--end::Subheader-->


    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">
               New Customer
            </h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                </div>
            </div>
        </div>
			<!--begin::Form-->
			<form class="form">
				<div class="card-body">
					<div class="form-group row">
						<div class="col-lg-4">
							<label>Full Name:</label>
							<input type="email" class="form-control" placeholder="Enter full name"/>
							<span class="form-text text-muted">Please enter your full name</span>
						</div>
						<div class="col-lg-4">
							<label>Email:</label>
							<input type="email" class="form-control" placeholder="Enter email"/>
							<span class="form-text text-muted">Please enter your email</span>
						</div>
						<div class="col-lg-4">
							<label>Subcode:</label>
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text"></div>
								<input type="text" class="form-control" placeholder=""/>
							</div>
							<span class="form-text text-muted">Please enter your Subcode</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-4">
							<label>CRF No:</label>
							<input type="email" class="form-control" placeholder=""/>
							<span class="form-text text-muted">Please enter your crf no</span>
						</div>
						<div class="col-lg-4">
							<label>KSEB Post No:</label>
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-info-circle"></i></span></div>
								<input type="text" class="form-control" placeholder="Post Number"/>
							</div>
							<span class="form-text text-muted">Please enter fax</span>
						</div>
						<div class="col-lg-4">
							<label>Installation Address:</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter your address"/>
								<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
							</div>
							<span class="form-text text-muted">Please enter your address</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-4">
							<label>District:</label>
							<div class="input-group">
								<div class="input-group-append"></div>
								<select class="form-control " id="kt_select2_1" name="assign_to">
									<option selected="selected">Select District</option>
									<option value="1">Kozhikode</option>
									<option value="2">Kannur</option>
									<option value="3">Wayanadu</option>
									<option value="4">Palakadu</option>
									<option value="5">Malapuram</option> 
									
								</select>
							</div>
							<span class="form-text text-muted">Please enter your District</span>
						</div>
						


						<div class="col-lg-4">
							<label>Pincode:</label>
							<div class="input-group">
								<div class="input-group-append"></div>
								<input type="text" class="form-control" placeholder="Enter your pincode"/>
							</div>
							<span class="form-text text-muted">Please enter your Pincode</span>
						</div>
						<div class="col-lg-4">
							<label>Customer Type:</label>
							<div class="radio-inline">
								<label class="radio radio-solid">
									<input type="radio" name="example_2" checked="checked" value="2"/>
									<span></span>
									Prepaid
								</label>
								<label class="radio radio-solid">
									<input type="radio" name="example_2" value="2"/>
									<span></span>
									Pospaid
								</label>
							</div>
							<span class="form-text text-muted">Please select user Type</span>
						</div>
					</div>

					
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<button type="reset" class="btn btn-primary mr-2">Submit</button>
							<button type="reset" class="btn btn-secondary">Cancel</button>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>


@endsection


@section('css')

<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('script')

<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/crud/datatables/basic/paginations.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>

<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>

@endsection