<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
		<strong>{{ $label }}:</strong>
		<input type="text" name="{{$name}}" value="{{ $object->$name ?? '' }}" class="form-control" placeholder="{{ $label }}">
	</div>
</div>