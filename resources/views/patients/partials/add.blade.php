<div class="modal fade" id="addPatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:75%">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Patient</h4>
      </div>
      <form action="{{ route('patient.store') }}" method="POST">
    @csrf
      <div class="modal-body">
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
		 	<input type="number" name="phone" class="form-control">
		</div>
		 <div class=" col-md-4 form-group">
	        <label>Gender:</label>
	        <select name="gender" class="form-control" required>
	        <option>Male</option>
	        <option>Female</option>
	        <option>Other</option>
	        </select>
	    </div>
	     <div class=" col-md-4 form-group">
	        <label>Marital Status:</label>
	        <select name="marital_status" class="form-control" required>
	        <option>Married</option>
	        <option>Single</option>
	        <option>Other</option>
	        </select>
	    </div>
	      <div class=" col-md-4 form-group">
	        <label>Blood Group:</label>
	        <select name="blood_group" class="form-control">
	        <option value="">Select</option>
	        <option>A+</option>
	        <option>A-</option>
	        <option>B+</option>
	        <option>B-</option>
	        <option>AB+</option>
	        <option>AB-</option>
	        <option>O+</option>
	        <option>O-</option>
	        </select>
	    </div>
		<div class=" col-md-4 form-group">
			<label>Date of Birth:</label>
			{!! Form::date('birth_date', null, array('class' => 'form-control')) !!}
		</div>
		<div class=" col-md-4 form-group">
			<label>Age:</label>
		 	<input type="number" name="age" class="form-control" required>
		</div>
		<div class=" col-md-4 form-group">
			<label>Relative Name:</label>
		 	<input type="text" name="relative_name" class="form-control">
		</div>
		<div class=" col-md-4 form-group">
			<label>Relative Phone:</label>
		 	<input type="number" name="relative_phone" class="form-control">
		</div>
		<div class=" col-md-4 form-group">
			<label>Country:</label>
		 	<input type="text" name="country" class="form-control">
		</div>
		<div class=" col-md-4 form-group">
			<label>State:</label>
		 	<input type="text" name="state" class="form-control">
		</div>
		<div class=" col-md-4 form-group">
			<label>District:</label>
		 	<input type="text" name="district" class="form-control">
		</div>
		<div class=" col-md-4 form-group">
			<label>Location:</label>
			<textarea name="location" class="form-control" required></textarea>
		</div>
		
		<div class=" col-md-4 form-group">
			<label>Occupation:</label>
			<textarea name="occupation" class="form-control"></textarea>
		</div>
		<div class=" col-md-4 form-group">
			<label>Descrption:</label>
			<textarea name="description" class="form-control"></textarea>
		</div>
		
      </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-danger" type="reset">Reset</button>
           <button class="btn btn-success" type="submit">Save changes</button>
    </div>
    </form>
  </div>
</div>
</div>
</div>


<!-- Appointment for patient -->
