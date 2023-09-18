<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Разделы <a class="btn btn-success" href="{{ route('catalogs.create') }}"> <<добавить</a>
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
						<th>Описание</th>
						<th width="280px">Action</th>
					</tr>
					@foreach ($catalogs as $catalog)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $catalog->name }}</td>
						<td>{{ $catalog->comment }}</td>
						<td>
							<form action="{{ route('catalogs.destroy',$catalog->id) }}" method="POST">
			   
								<a class="btn btn-info" href="{{ route('catalogs.show',$catalog->id) }}">Show</a>
				
								<a class="btn btn-primary" href="{{ route('catalogs.edit',$catalog->id) }}">Edit</a>
			   
								@csrf
								@method('DELETE')
				  
								<button type="submit" class="btn btn-danger" style="color:#000">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			  
				{!! $catalogs->links() !!}
					
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
