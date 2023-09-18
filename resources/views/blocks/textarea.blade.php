<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
		<strong>{{ $label }}:</strong>
		<textarea rows="4" cols="45" name="{{$name}}" class="form-control">{{ $object->$name ?? '' }}</textarea>
	</div>
</div>