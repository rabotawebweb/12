<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить раздел <a class="btn btn-primary" href="{{ route('catalogs.index') }}"> <<назад</a>
        </h2>
    </x-slot>
	

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
		
			@include('blocks.errors', ['label' => 'Ошибки!'])
			
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{ route('catalogs.store') }}" method="POST">
						@csrf
					  
						 <div class="row">
						 
							@include('blocks.input', ['object' => $catalog ?? null, 'name' => 'name', 'label' => 'Название'])
							
							@include('blocks.textarea', ['object' => $catalog ?? null, 'name' => 'comment', 'label' => 'Описание'])
							
							@include('blocks.submit', ['label' => 'Сохранить'])
							
						</div>
					   
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
