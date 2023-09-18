<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Страны <a class="btn btn-success" href="{{ route('countries.create') }}"> <<добавить</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
					<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th width="280px">Action</th>
					</tr>
					@foreach ($countries as $country)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $country->name }}</td>
						<td>
							<form action="{{ route('countries.destroy',$country->id) }}" method="POST">
			   
								<a class="btn btn-info" href="{{ route('countries.show',$country->id) }}">Show</a>
				
								<a class="btn btn-primary" href="{{ route('countries.edit',$country->id) }}">Edit</a>
			   
								@csrf
								@method('DELETE')
				  
								<button type="submit" class="btn btn-danger" style="color:#000">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			  
				{!! $countries->links() !!}
					
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
