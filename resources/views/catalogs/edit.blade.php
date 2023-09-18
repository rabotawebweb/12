<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактировать раздел <a class="btn btn-primary" href="{{ route('catalogs.index') }}"> <<назад</a>
        </h2>
    </x-slot>
	

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
		
			@include('blocks.errors', ['label' => 'Ошибки!'])
			
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{ route('catalogs.update',$catalog->id) }}" method="POST">
						@csrf
						@method('PUT')
				   
						 <div class="row">
							
							@include('blocks.input', ['object' => $catalog ?? null, 'name' => 'name', 'label' => 'Название'])
							
							@include('blocks.textarea', ['object' => $catalog ?? null, 'name' => 'comment', 'label' => 'Описание'])
							
							@if ( auth()->id() == 1 )
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Видимость:</strong>
										<input type="radio" id="showcat1" name="hidden" value="1" 
												@if((!empty($catalog) && empty($catalog->show))) checked @endif />
										<label for="showcat1">скрыть раздел</label>
										<input type="radio" id="showcat2" name="hidden" value="2" 
												@if((!empty($catalog) && !empty($catalog->show))) checked @endif />
										<label for="showcat2">показать раздел</label>
								</div>
							</div>
							@endif
							
							@include('blocks.submit', ['label' => 'Сохранить'])
							
						</div>
				   
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
