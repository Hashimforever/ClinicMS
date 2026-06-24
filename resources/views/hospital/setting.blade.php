@extends('layouts.app')
@section('content')
<div class="col-md-12 main">   
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Hospital Setting</li>
	</ol>
</div><!--/.row-->
		
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">{{$hospital->name}} Setting</h1>
	</div>

</div><!--/.row-->
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Hospital Settings</div>
			<div class="panel-body">
				<div class="col-md-12">
					<form action="{{ route('hospital.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
						<div class="form-group">
							<label>Hospital Name:</label>
							 <input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label>Hospital Slogan:</label>
							 <input type="text" name="slogan" class="form-control">
						</div>
						<div class="form-group">
						<label>Change Logo:</label>
						 {!! Form::file('logo', null, array('class' => 'form-control')) !!}
						 </div>
						 <div class="form-group">
							<label>Email Address:</label>
							 <input type="text" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Website:</label>
							 <input type="text" name="website" class="form-control">
						</div>
						<div class="form-group">
							<label>Address:</label>
							<textarea name="address" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Contact:</label>
							<textarea name="contact" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>About Us:</label>
							<textarea name="description" class="form-control"></textarea>
						</div>
						<div class="form-group">
						<button class="btn btn-success" type="submit">Save Changes</button>
						<button class="btn btn-primary" type="reset">Default</button>
						</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Pan Settings</div>
			<div class="panel-body">
				<div class="col-md-12">
						<div class="form-group">
							<label>Pan Number:</label>
							<input type="text" name="pan_no" class="form-control">
						</div>
						<div class="form-group">
							<label>Registration Number:</label>
							<input type="text" name="registration_no" class="form-control">
						</div>
						<div class="form-group">
						<button class="btn btn-success" type="submit">Save Changes</button>
						<button class="btn btn-primary" type="reset">Default</button>
						</div>
					
						
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Tax Settings</div>
			<div class="panel-body">
				<div class="col-md-12">
						<div class="form-group">
							<label>Tax Name:</label>
							<input type="text" name="tax_type" class="form-control">
						</div>
						<div class="form-group">
							<label>Percent (%)</label>
							<input type="text" name="tax_percent" class="form-control">
						</div>
						<div class="form-group">
						<button class="btn btn-success" type="submit">Save Changes</button>
						<button class="btn btn-primary" type="reset">Default</button>
						</div>
					
						
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Prefix Setting</div>
			<div class="panel-body">
				<div class="col-md-12">
						<div class="form-group">
							<label>Invoice Prefix:</label>
							<input type="text" name="invoice_prefix" class="form-control">
						</div>
						<div class="form-group">
							<label>Patient ID Prefix:</label>
							<input type="text" name="patient_prefix" class="form-control">
						</div>
						<div class="form-group">
							<label>Invoice  Message:</label>
							<input type="text" name="invoice_message" class="form-control">
						</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit">Save Changes</button>
						<button class="btn btn-primary" type="reset">Default</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div></div>
@endsection