<div id="edit_performanceIndicator" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Performance Indicator </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('performance-indicator.update',$data->id)}}" id="PerformanceIndicatorUpdate">
					@csrf
					@method('PUT')

				<div class="form-group">
					<label for="indicator_name">Performance Indicator  <span class="text-danger">* </span></label>
					<input class="form-control indicator_name" name="indicator_name" value="{{$data->indicator_name}}" id="indicator_name" required >
				</div>
				<div class="form-group">
					<label for="indicator_total_marks">Marks   <span class="text-danger">* </span></label>
					<input class="form-control indicator_total_marks" name="indicator_total_marks" value="{{$data->indicator_total_marks}}" id="indicator_total_marks" type="number" min="0" value="0" style="width: 100%;min-height: 40px;"  />
						
				</div>
				<br>
				<div class="submit-section">
					<button class="btn btn-primary submit-btn">Update </button>
				</div>
			</form>
		</div>
		</div>
	</div>
</div>