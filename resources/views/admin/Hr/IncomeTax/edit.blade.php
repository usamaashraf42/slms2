<div id="edit_incomeTax" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Income Tax </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('income-tax.update',$data->id)}}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Annual start amount <span class="text-danger">* </span></label>
						<input class="form-control annual_start_amount" name="annual_start_amount" id="annual_start_amount"  value="{{$data->annual_start_amount}}" style="width: 100%;min-height: 40px;" />
				</div>
				<div class="form-group">
					<label>Annual End Amount <span class="text-danger">* </span></label>
					<input class="form-control annual_end_amount" name="annual_end_amount" id="annual_end_amount"  value="{{$data->annual_end_amount}}" style="width: 100%;min-height: 40px;" />
				</div>
				<div class="form-group">
					<label>After Amount Percentage <span class="text-danger">* </span></label>
					<input class="form-control after_amount_percentage" name="after_amount_percentage" id="after_amount_percentage"  value="{{$data->after_amount_percentage}}" style="width: 100%;min-height: 40px;" />
				</div>

				<div class="form-group">
					<label>Fix Tax <span class="text-danger">* </span></label>
					<input class="form-control fix_tax" name="fix_tax" id="fix_tax"  value="{{$data->fix_tax}}" style="width: 100%;min-height: 40px;" />
				</div>
				<div class="form-group">
					<label>Percentage Tax <span class="text-danger">* </span></label>
					<input class="form-control per_tax" name="per_tax" id="per_tax" type="number" min='0' value="{{$data->per_tax}}" style="width: 100%;min-height: 40px;" />
				</div>
				<div class="submit-section">
					<button class="btn btn-primary submit-btn">Update </button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>