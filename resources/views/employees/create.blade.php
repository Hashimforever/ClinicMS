@extends('layouts.app')
@section('content')
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Admin</li>
				<li class="active"><a href="{{route('employee.index')}}"> Employee</a></li>
			</ol>
		</div><br><!--/.row-->
<!-- Modal -->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if (count($errors) > 0)
        <div class="alert alert-danger">
           
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add Employee
					<a class="btn btn-primary pull-right" href="{{route('employee.index')}}"><span class="glyphicon glyphicon"></span>Back</a></div>
					<div class="panel-body">
          			
      				<div class="container">
		      	<form action="{{ route('employee.store') }}" method="POST">
    @csrf
		      	<div class="row">
		      	<div class=" col-md-4 form-group">
					<label>First Name:</label>
				 	<input type="text" name="first_name" class="form-control" required>
				</div>
				<div class=" col-md-4 form-group">
					<label>Middle Name:</label>
				 	<input type="text" name="middle_name" class="form-control">
				</div>
				<div class=" col-md-4 form-group">
					<label>Last Name:</label>
				 	<input type="text" name="last_name" class="form-control" required>
				</div>
				<div class=" col-md-4 form-group">
					<label>Email:</label>
				 	<input type="email" name="email" class="form-control">
				</div>
				<div class=" col-md-4 form-group">
					<label>Phone:</label>
				 	<input type="number" name="phone" class="form-control" required>
				</div>
				<div class=" col-md-4 form-group">
					<label>Type:</label>
				 	<select class="form-control" name="type" required>
				 	<option></option>
				 	<option>Doctor</option>
				 	<option>Laboratory</option>
					<option>Reception</option>
					<option>Pharmacy</option>
					<option>Acountant</option>
					<option>Nurse</option>	
					<option>Other</option>
				 	</select>
				</div>
				<div class=" col-md-4 form-group">
					<label>In-Time:</label>
				 	<input type="text" name="in_time" class="form-control timepicker" required>
				</div>
				<div class=" col-md-4 form-group">
					<label>Out-Time:</label>
				 	<input type="text" name="out_time" class="form-control timepicker" required>
				</div>
				<div class=" col-md-4 form-group">
			        <label>Select Department:</label>
			        <select name="department_id" class="form-control" required>
			        <option></option>
			            @foreach($departments as $department)
			                <option value="{{$department->id}}">{{ $department->name}}</option>
			            @endforeach
			        </select>
			    </div>
				<div class=" col-md-4 form-group">
					<label>Address:</label>
					<textarea name="address" class="form-control" required></textarea>
				</div>
				<div class=" col-md-4 form-group">
					<label>Education:</label>
					<textarea name="education" class="form-control"></textarea>
				</div>
				<div class=" col-md-4 form-group">
					<label>Descrption:</label>
					<textarea name="description" class="form-control"></textarea>
				</div>
				<div class=" col-md-4 form-group">
					<label>Certificate:</label>
					<textarea name="certificate" class="form-control"></textarea>
				</div>
				<div class=" col-md-4 form-group">
					<label>Speciality:</label>
					<textarea name="speciality" class="form-control"></textarea>
				</div>
				<div class=" col-md-4 form-group">
			        <label>Working Day:</label>
			        <select name="working_day[]" class="form-control" multiple="" required="" >
			        <option>Sunday</option>
			        <option>Monday</option>
			        <option>Tuesday</option>
			        <option>Wednesday</option>
			        <option>Thursday</option>
			        <option>Friday</option>
			        <option>Saturday</option>   
			        </select>
			    </div>
			    
				
		      </div>
		    <div class="modal-footer">
		        
		          <button class="btn btn-danger" type="reset">Reset</button>
		           <button class="btn btn-success" type="submit">Save changes</button>
		    </div>
		    </form>
		  </div>
		</div>
		</div>
		</div>
</div>		@stop