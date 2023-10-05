<!-- Quick Navigation Start -->
<form class="row row-cols-lg-auto g-3 align-items-center">
	<div class="col-12">
		<label class="fw-bold">クイックナビ</label>
	</div>
	<div class="col-12">
		@php echo getQuickNavigation(); @endphp
	</div>
	<div class="col-12">
		<button type="button" class="btn btn-primary" onclick="redirectToSelectedOption()">Go</button>
	</div>
</form>
<!-- Quick Navigation End -->