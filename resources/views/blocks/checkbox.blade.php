<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
		<strong>{{ $label }}:</strong>
		@foreach($variable as $key => $var)
		<div>
			<input type="checkbox" id="{{ $name }}{{ $key }}" name="{{ $name }}[{{ $var->id }}]" value="1" 
					@if((!empty($object) && !empty($object->$name[$var->id]))) checked @endif />
			<label for="{{ $name }}{{ $key }}">{{$var->name}}</label>
		</div>
		@endforeach
	</div>
</div>