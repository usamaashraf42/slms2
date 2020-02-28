
@extends('_layouts.admin.default')
@section('title', 'Class List')
@section('content')
@php($levelName='')
<style>
	
	.table-bordered td, .table-bordered th {
		border: 1px solid #000000;

	}
	.table td, .table th {
		padding: .01rem;
		font-size: 10px;
		padding-left: 5px;
		vertical-align: top;
		border-top: 1px solid #dee2e6;
	}
	.checkbox_1:before{

		content: "";
		width: 24px;
		height: 24px;
		margin-left: -1px;
		margin-top: -3px;
		border-radius: 50%!important;
		border: solid 2px #014a75;
		background: white;
		position: absolute;
	}
	.checkbox_1:after{
		content: "";
		width: 18px;
		height: 9px;

		border: solid 2px #fff;

		border-top: none;
		border-right: none;
		position: absolute;
		top: 3px;
		left: 3px;
		transform: rotate(-45deg);
		opacity: 0;
		transition: all 0.2s ease-out;
	}
	.checkbox_1:checked:after{
		opacity: 1;
	}
	.checkbox_1:checked:before{
		background: #014a75;
		border-radius: 50%!important;
	}
	@media print{
		@page { width: 100%; size: auto;  margin: 5mm!important;
			size: landscape;}
		}
	</style>
	<link media="print" href="print.css" />
	<style>
		@page { width: 100%; size: auto;  margin: 0mm;
			size: landscape;}

			@media print {
				.page_1 {
					margin: 0;
					color: #000;
					background-color: #fff;
				}
			}
		</style>
		<div class="content container-fluid">

			<div style="display: block;">
				<div class="col-md-12">
					<input type='button' id='btn' value='Print' onclick="printDivs(this,printAllRecord);" 
					class="btn btn-primary float-center allrecord" style="width: 100%;">
				</div>

				<div id="printAllRecord" >
					
					<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 60px;">
						
						<div class="content container-fluid " >

							<div class="logo_heading" style="margin: 0 auto; width: 40%;">
								<img src="{{asset('images/school/alis pvt ltd.png')}}">
								<p style="text-align: right;">Attendace Sheet of Township For Aug-19</p>

							</div>

							<div class="row">
								<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
									@if(isset($users_list->course->course_name) && ($levelName!=$users_list->course->course_name))

									<h4>{{$users_list->course->course_name}}</h4>
									@endif
									<div class="row p-5">
										<div style="width: 53%; float: left;">
											<table class="table table-bordered" style="margin-top: -35px;">
												<thead>
													<tr>
														<th class="text-uppercase small font-weight-bold">Date</th>
														<th class="text-uppercase small font-weight-bold">No of students</th>
														<th class="text-uppercase small font-weight-bold">sig</th>
														<th class="text-uppercase small font-weight-bold" style="width: 140px;"></th>
													</tr>

													<tr>
														<td>1</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>2</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>3</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>4</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>5</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>6</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>1</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>7</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>8</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>9</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>10</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>11</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>12</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>13</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>14</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>15</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>16</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>17</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>18</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>19</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>20</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>21</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>22</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>23</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>24</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>23</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>25</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>26</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>27</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>28</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>29</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>30</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>31</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>

												</thead>

											</table>
										</div>
										<div style="width:45%;">
											<p style="padding-left: 30px;">Total students <strong>received</strong> fee vouchers<hr style="width: 120px;margin-top: -18px; height: 2px solid #000;float: right;"></p><br>
											<p style="padding-left: 30px;">Total students <strong>not received</strong> fee vouchers <hr style="width: 120px;margin-top: -18px; height: 2px solid #000; float: right;"> </p>
										</div>
									</div>
								</div>
							</div>	
						</div>


							@endif	