<!-- Quick Navigation Start -->
<?php
$title=trans('quick_navigation');
 if(authUser()->is_admin){
	$title='クイックナビ';
 }
?>
<form class="row row-cols-lg-auto g-3 align-items-center mt-2 mt-md-0">
	<div class="col-12">
		<label class="fw-bold">{{ $title }}</label>
	</div>
	<div class="col-12 d-flex gap-2">
		@php echo getQuickNavigation(); @endphp
		<button type="button" class="btn btn-primary" onclick="redirectToSelectedOption()" title="Go">Go</button>
	</div>
</form>
<!-- Quick Navigation End -->