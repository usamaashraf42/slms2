
@extends('_layouts.admin.default')
@section('title', 'Dashboard')
@section('content')

<div class="content container-fluid">
	@component('_components.alerts-default')
	@endcomponent
	<div class="row">

		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="dash-widget dash-widget5">
				<span class="dash-widget-icon bg-primary"><i class="fa fa-users" aria-hidden="true"></i></span>
				<div class="dash-widget-info">
					<h3>{{count($student)}}</h3>
					<span>Students @isset(Auth::user()->branch) Of {{Auth::user()->branch->branch_name}}@endisset</span>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="dash-widget dash-widget5">
				<span class="dash-widget-icon bg-info"><i class="fa fa-user" aria-hidden="true"></i></span>
				<div class="dash-widget-info">
					<h3>50</h3>
					<span>Teachers</span>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="dash-widget dash-widget5">
				<span class="dash-widget-icon bg-warning"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
				<div class="dash-widget-info">
					<h3>102</h3>
					<span>Parents</span>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="dash-widget dash-widget5">
				<span class="dash-widget-icon bg-success"><i class="fa fa-money" aria-hidden="true"></i></span>
				<div class="dash-widget-info">
					<h3>000 .Rs</h3>
					<span>Total Earnings</span>
				</div>
			</div>
		</div>
	</div>
	<!-- ///////////////////////// Pending Task////////////////////// -->
	<div class="row">
		@if(Auth::user()->can('Student-left Approval'))
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="dash-widget dash-widget5">
				<span class="dash-widget-icon bg-primary"><i class="fa fa-users" aria-hidden="true"></i></span>
				<div class="dash-widget-info">
					<h3>{{($lefts)}}</h3>
					<span>Left Student Approval  </span>
				</div>
			</div>
		</div>
		@endif
		@if(Auth::user()->can('Student-transfer Approval'))
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="dash-widget dash-widget5">
				<span class="dash-widget-icon bg-info"><i class="fa fa-user" aria-hidden="true"></i></span>
				<div class="dash-widget-info">
					<h3>{{$transfers}}</h3>
					<span>Transfer Approval</span>
				</div>
			</div>
		</div>
		@endif
		@if(Auth::user()->can('Correction Approval'))
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="dash-widget dash-widget5">
				<span class="dash-widget-icon bg-warning"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
				<div class="dash-widget-info">
					<h3>{{$correction}}</h3>
					<span>Correction Approval</span>
				</div>
			</div>
		</div>
		@endif
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<a href="{{route('initial-admission.index')}}">
			<div class="dash-widget dash-widget5">
				<span class="dash-widget-icon bg-success"><i class="fa fa-money" aria-hidden="true"></i></span>
				<div class="dash-widget-info">
					<h3>{{$initalAdmissionQuery}}</h3>
					<span>Initial Admission</span>
				</div>
			</div></a>
		</div>
	</div>
	<!-- ////////////////////////////////////////////  -->
	<div class="row">
		<div class="col-lg-6">
			<div class="content-page">
				<div class="page-title">Total Members @isset(Auth::user()->branch) Of {{Auth::user()->branch->branch_name}}@endisset</div>
				<div id="school-chart"></div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="content-page">
				<div class="page-title">Income Monthwise</div>
				<div id="incomeChart" style="height: 350px;"></div>
			</div>
		</div>
	</div>
	
	<div class="row mt-4">
		<div class="col-lg-6 col-md-12 col-12">
			<div class="card-box m-b-2">
				<div class="page-title mb-2">
					Events
				</div>
				<div class="card-body p-0">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="content-page">
				<div class="row">
					<div class="col-md-12">
						<div class="page-title mb-2">
							Exam-list
						</div>
						<div class="table-responsive">
							<table class="table table-striped custom-table">
								<thead>
									<tr>
										<th style="min-width:91px;">Exam Name </th>
										<th style="min-width:50px;">Subject</th>
										<th style="min-width:50px;">Class</th>
										<th style="min-width:50px;">Section</th>
										<th style="min-width:50px;">Time</th>
										<th style="min-width:50px;">Date</th>
										<th class="text-right" style="width:30%;">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<a href="exam-detail.html" class="avatar">C</a>
										</td>
										<td>English</td>
										<td>5</td>
										<td>B</td>
										<td>10.00am</td>
										<td>20/1/2019</td>
										<td class="text-right" >
											<a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									<tr>
										<td>
											<a href="exam-detail.html" class="avatar">C</a>
										</td>
										<td>English</td>
										<td>4</td>
										<td>A</td>
										<td>10.00am</td>
										<td>2/1/2019</td>
										<td class="text-right">
											<a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									
									<tr>
										<td>
											<a href="exam-detail.html" class="avatar">C</a>
										</td>
										<td>Maths</td>
										<td>6</td>
										<td>B</td>
										<td>10.00am</td>
										<td>2/1/2019</td>
										<td class="text-right">
											<a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									<tr>
										<td>
											<a href="exam-detail.html" class="avatar">C</a>
										</td>
										<td>Science</td>
										<td>3</td>
										<td>B</td>
										<td>10.00am</td>
										<td>20/1/2019</td>
										<td class="text-right">
											<a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									<tr>
										<td>
											<a href="exam-detail.html" class="avatar">C</a>
										</td>
										<td>Maths</td>
										<td>6</td>
										<td>B</td>
										<td>10.00am</td>
										<td>20/1/2019</td>
										<td class="text-right">
											<a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									<tr>
										<td>
											<a href="exam-detail.html" class="avatar">C</a>
										</td>
										<td>English</td>
										<td>7</td>
										<td>B</td>
										<td>10.00am</td>
										<td>20/1/2019</td>
										<td class="text-right">
											<a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									<tr>
										<td>
											<a href="exam-detail.html" class="avatar">C</a>
										</td>
										<td>Science</td>
										<td>5</td>
										<td>B</td>
										<td>10.00am</td>
										<td>20/1/2019</td>
										<td class="text-right">
											<a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="notification-box">
		<div class="msg-sidebar notifications msg-noti">
			<div class="topnav-dropdown-header">
				<span>Messages</span>
			</div>
			<div class="drop-scroll msg-list-scroll">
				<ul class="list-box">
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">R</span>
								</div>
								<div class="list-body">
									<span class="message-author">Richard Miles </span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item new-message">
								<div class="list-left">
									<span class="avatar">J</span>
								</div>
								<div class="list-body">
									<span class="message-author">Ruth C. Gault</span>
									<span class="message-time">1 Aug</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">T</span>
								</div>
								<div class="list-body">
									<span class="message-author"> Tarah Shropshire </span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">M</span>
								</div>
								<div class="list-body">
									<span class="message-author">Mike Litorus</span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">C</span>
								</div>
								<div class="list-body">
									<span class="message-author"> Catherine Manseau </span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">D</span>
								</div>
								<div class="list-body">
									<span class="message-author"> Domenic Houston </span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">B</span>
								</div>
								<div class="list-body">
									<span class="message-author"> Buster Wigton </span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">R</span>
								</div>
								<div class="list-body">
									<span class="message-author"> Rolland Webber </span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">C</span>
								</div>
								<div class="list-body">
									<span class="message-author"> Claire Mapes </span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">M</span>
								</div>
								<div class="list-body">
									<span class="message-author">Melita Faucher</span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">J</span>
								</div>
								<div class="list-body">
									<span class="message-author">Jeffery Lalor</span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">L</span>
								</div>
								<div class="list-body">
									<span class="message-author">Loren Gatlin</span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="chat.html">
							<div class="list-item">
								<div class="list-left">
									<span class="avatar">T</span>
								</div>
								<div class="list-body">
									<span class="message-author">Tarah Shropshire</span>
									<span class="message-time">12:28 AM</span>
									<div class="clearfix"></div>
									<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="topnav-dropdown-footer">
				<a href="chat.html">See all messages</a>
			</div>
		</div>
	</div>
</div>


@endsection
@push('post-styles')

@endpush
@push('post-scripts')

<script type="text/javascript">
	    // Chart
	


  var colorsDash = ['#8E37D7', '#01c0c8' ,'#6B8DD6'];
Morris.Donut({
  element: 'school-chart',
  colors: colorsDash,
  resize: true,
   labels: ['Series A', 'Series B','Series C'],
  data: [
    {label: "Students", value: <?php echo count($student); ?>},
    {label: "Teachers", value: 12000},
    {label: "Parents", value: 20000}
  ],
    xkey: 'label',
  ykeys: ['value'],
   labels: ['Value']
});



$(function() {
      var data = [
        { month: '2018-01', value: 2000 },
        { month: '2018-02', value: 11000 },
        { month: '2018-03', value: 10000 },
        { month: '2018-04', value: 14000 },
        { month: '2018-05', value: 11000 },
        { month: '2018-06', value: 17000 },
        { month: '2018-07', value: 14500 },
        { month: '2018-08', value: 18000 },
        { month: '2018-09', value: 12000 },
        { month: '2018-10', value: 23000 },
        { month: '2018-11', value: 17000 },
        { month: '2018-12', value: 23000 }
      ];
      var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      new Morris.Line({
        element: 'incomeChart',
        data: data,
        xkey: 'month',
        ykeys: ['value'],
        labels: ['Value'],
        lineColors: ['#8E37D7'],
        lineWidth: 4,
        pointSize: 6,
        pointFillColors:['rgba(255,255,255,0.9)'],
        pointStrokeColors: ['#01c0c8'],
        gridLineColor: 'rgba(0,0,0,.5)',
        resize: true,
        gridTextColor: '#01c0c8',
        yLabelFormat: function(value) {
              var ranges = [
                { divider: 1e6, suffix: 'M' },
                { divider: 1e3, suffix: 'k' }
              ];
              function formatNumber(n) {
                for (var i = 0; i < ranges.length; i++) {
                  if (n >= ranges[i].divider) {
                    return Math.round((n / ranges[i].divider)).toString() + ranges[i].suffix;
                  }
                }
                return n;
              }
              return '$' + formatNumber(value);
            },
        xLabelFormat: function (x) { return months[x.getMonth()]; }
      });
    });

</script>
@endpush