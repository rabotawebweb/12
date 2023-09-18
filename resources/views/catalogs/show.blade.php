<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Разделы <a class="btn btn-success" href="{{ route('catalogs.index') }}"> <<назад</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<strong>Название:</strong>
								{{ $catalog->name }}
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<strong>Описание:</strong>
								{{ $catalog->comment }}
							</div>
						</div>
					</div>
					
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
