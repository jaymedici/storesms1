<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">clear</i>
				</div>				
				<h4 class="modal-title">Error!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">{{ session('error') }}</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>  