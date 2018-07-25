<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
            <form method="post" action="{{ route('storescategories.store') }}">
                {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Add a Category</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Category Name</label>
							<input name="CategoryName" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Notes</label>
							<textarea name="Notes" class="form-control" required></textarea>
						</div>
						<!-- <div class="form-group">
							<label>Updated By</label>
							<input name="UpdatedBy" type="text" class="form-control" required>
						</div>					 -->
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>