<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	background: #e6e6e6;
}
.accordion .card {
	border: none;
	margin-bottom: 2px;
	border-radius: 0;
	box-shadow: 0 0 6px rgba(0,0,0,0.2);
}
.accordion .card .card-header {
	background: #6245dd;
	padding-top: 7px;
	padding-bottom: 7px;
	border-radius: 0;
}
.accordion .card-header h2 {
	color: #fff;
	font-size: 1rem;
	font-weight: 500;
	font-family: "Roboto", sans-serif;
}
.accordion img {
	width: 150px;
}
.accordion .card-header h2 span {
	float: left;
	margin-top: 10px;
}
.accordion .card-header .btn {
	font-weight: 500;
}
.accordion .card-header i {
	color: #fff;
	font-size: 1.3rem;
	margin: 0 6px 0 -10px;
	font-weight: bold;
	position: relative;
	top: 5px;
}			
.accordion .card-header button:hover {
	color: #23384e;
}
.accordion .card-body {
	color: #666;
}
</style>
<script>
$(document).ready(function(){
	// Add minus icon for collapse element which is open by default
	$(".collapse.show").each(function(){
		$(this).siblings(".card-header").find(".btn i").html("remove");
	});
	
	// Toggle plus minus icon on show hide of collapse element
	$(".collapse").on('show.bs.collapse', function(){
		$(this).parent().find(".card-header .btn i").html("remove");
	}).on('hide.bs.collapse', function(){
		$(this).parent().find(".card-header .btn i").html("add");
	});
});
</script>
</head>
<body>
<div >
	<div class="row">
		<div class="col-lg-10 mx-auto">
			<div class="accordion mt-5" id="accordionExample">
				@forelse($elcurso->lessons as $lesson)
									
				<div class="card">
					<div class="card-header" id="heading{{$lesson->position}}">
						<h2 class="mb-0">
							<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$lesson->position}}" aria-expanded="false" aria-controls="collapse{{$lesson->position}}"><i class="material-icons">add</i> {{$lesson->title}}</a>
						</h2>
					</div>
					<div id="collapse{{$lesson->position}}" class="collapse" aria-labelledby="heading{{$lesson->position}}" data-parent="#accordionExample">
						<div class="card-body">
							<div class="media">
								<img src="{{$lesson->thumbnail ? $lesson->thumbnail->first()->getUrl() : ''}}" class="mr-3">
								<div class="media-body">
									<p>{!!$lesson->short_text!!}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@empty
				@endforelse
			</div>
		</div>
	</div>
</div>
</body>
