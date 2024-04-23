<!-- Edit -->
<div class="modal fade" id="edit_form_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Information</h4></center>
            </div>

            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_form02.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">student name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="student_name" value="<?php echo $row['student_name']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Student Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="student_email" value="<?php echo $row['student_email']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Faculty name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="faculty_name" value="<?php echo $row['faculty_name']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Course Code</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="course_code" value="<?php echo $row['course_code']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Date</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="appo_date" value="<?php echo $row['appo_date']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Slot</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="appo_slot" value="<?php echo $row['appo_slot']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">User id</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>">
					</div>
				</div>
               
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_form_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Information</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you?<br> want to Delete? </p>
				<h2 class="text-center"><?php echo $row['student_name'].' '.$row['student_email'].' '.$row['faculty_name'].' '.$row['course_code'].' '.$row['appo_date'].''.$row['appo_slot'].''.$row['user_id']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_form02.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>	