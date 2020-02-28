@extends('_layouts.admin.default')
@section('title', 'Query ')
@section('content')

<div class="widget blog-comments clearfix">
	<h3>Follow Up {{count($query->followUps)}}</h3>
	<ul class="comments-list">
		@foreach($query->followUps as $follow)
		<li>
			<div class="comment">
				<div class="comment-author">
					<img class="avatar" alt="" src="assets/img/user.jpg">
				</div>
				<div class="comment-block">
					<span class="comment-by">
						<span class="blog-author-name">@isset($follow->queryBy){{$follow->queryBy->name}} @endisset</span>
						<span class="float-right">
							<span class="blog-reply"><a href="#"><i class="fa fa-reply"></i> Reply</a></span>
						</span>
					</span>
					<p>{{$follow->follow_up}}</p>
					<span class="blog-date">{{date("d M Y", strtotime($follow->created_at)) }}</span>
				</div>
			</div>
			<!-- <ul class="comments-list reply">
				<li>
					<div class="comment">
						<div class="comment-author">
							<img class="avatar" alt="" src="assets/img/user.jpg">
						</div>
						<div class="comment-block">
							<span class="comment-by">
								<span class="blog-author-name">Henry Daniels</span>
								<span class="float-right">
									<span class="blog-reply"><a href="#"><i class="fa fa-reply"></i> Reply</a></span>
								</span>
							</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
							<span class="blog-date">December 6, 2018</span>
						</div>
					</div>
				</li>
				<li>
					<div class="comment">
						<div class="comment-author">
							<img class="avatar" alt="" src="assets/img/user.jpg">
						</div>
						<div class="comment-block">
							<span class="comment-by">
								<span class="blog-author-name">Diana Bailey</span>
								<span class="float-right">
									<span class="blog-reply"> <a href="#"><i class="fa fa-reply"></i> Reply</a></span>
								</span>
							</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
							<span class="blog-date">December 7, 2018</span>
						</div>
					</div>
				</li>
			</ul> -->
		</li>
		@endforeach

	</ul>
</div>
<div class="widget new-comment clearfix">
	<h3>Leave Comment</h3>
	<form action="{{route('followUpRemarks')}}" method ="POST">
		<input type="hidden" name="parent_id" value ="{{$id}}">
		@csrf
		<div class="row">
			<div class="col-sm-8">
				<div class="form-group">
					<label>Comments</label>
					<textarea type="text" class="form-control" name="follow_up"></textarea>
				</div>
					<input type="submit" value="Submit" class="button btn-sm btn-success">
			</div>
		</div>
	</form>
</div>

@endsection