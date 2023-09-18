<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
		<strong>{{ $label }}:</strong>
		<select name="{{ $name }}" class="form-control">
			@foreach($variable as $var)
				<option 
					@if((!empty($object) && $object->$name == $var->id)) selected @endif 
					value="{{$var->id}}">{{$var->name}}
				</option>
			@endforeach
		</select>
	</div>
</div>