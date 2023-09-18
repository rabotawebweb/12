<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
	<div class="max-w-xl">
		@if ($errors->any())
			<div class="alert alert-danger">
				<strong>{{ $label }}</strong> <br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
</div>