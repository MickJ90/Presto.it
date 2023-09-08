<div class="container mt-5  text-white background-green rounded">
 
    @if($insertion->exists)
    <h4 class="pt-3">{{__('ui.editInsertion')}}</h4>
    @else
    <h4 class="pt-3">{{__('ui.addInsertion')}}</h4>
    @endif
    <div class="row">
        <form wire:submit.prevent="store" class="py-3">
            <div class="row text-white ">
                <div class="mt-1 col-12 col-md-5">
                    <label for="title">{{__('ui.productName')}}</label>
                    <input type="text" class="form-control" wire:model="insertion.title">
                    @error('insertion.title') <p class="small rounded my-2 errorBackground text-danger">{{ $message }}
                    </p> @enderror
                </div>
                <div class="mt-1 col-12 col-md-4">
                    <label for="category_id">{{__('ui.category')}}</label>
                    <select name="categories[]" id="category_id" class="form-control" wire:model="insertion.category_id"
                        value=" ">
                        <option value="">{{__('ui.chooseCategory')}}</option>
                        @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{__('ui.category_' . $category->id)}}</option>
                        @endforeach
                    </select>
                    @error('insertion.category_id') <p class="small rounded my-2 errorBackground text-danger">
                        {{ $message }}
                    </p> @enderror
                </div>
                <div class="mt-2 col-12 col-md-3">
                    <label for="price">{{__('ui.price')}}</label>
                    <input type="number" wire:model="insertion.price" class="form-control">
                    @error('insertion.price') <p class="small rounded my-2 errorBackground text-danger">{{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mt-2 col-12">
                    <label for="description">{{__('ui.description')}}</label>
                    <textarea wire:model="insertion.description" class="form-control" rows="5"></textarea>
                    @error('insertion.description') <p class="small rounded my-2 errorBackground text-danger">
                        {{ $message }}
                    </p> @enderror
                </div>
                <div class="mb-3 mt-3">
                    <input wire:model="temporary_images" type="file" multiple
                        class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
                    @error('temporary_images.*')
                    <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>
          
                @if (!empty($images) || !$dbimages->isEmpty())
                <div class="row">
                    <div class="col-12 my-5">
                        <p>{{__('ui.imgPreview')}}</p>
                        <div class="row  border-0 rounded  py-4">
                            @foreach ($images as $key => $image)
                            <div class="col my-3 img-fluid">
                                <div class="mx-auto shadow  img-fluid d-flex justify-content-center rounded"
                                    placeholder="carica immagine">
                                    <img class="img-preview my-2 img-fluid  rounded" src="{{$image->temporaryUrl()}}"
                                        alt="">
                                </div>
                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                    wire:click="removeImage({{$key}})">
                                    {{__('ui.delete')}}</button>
                            </div>
                            @endforeach
                            @foreach ($dbimages as $key => $image)
                            <div class="col my-3 img-fluid">
                                <div class="mx-auto shadow  img-fluid d-flex justify-content-center rounded"
                                    placeholder="carica immagine">
                                    <img class="img-preview my-2 img-fluid  rounded" src="{{asset('storage/' . $image->path)}}"
                                        alt="">
                                </div>
                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                    wire:click="removeDbImage({{$key}})">
                                    {{__('ui.delete')}}</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                <div class="mt-2 col-12">
                    <button type="submit" wire:loading.attr="disabled"
                        class="btn buttonColor  w-100">{{__('ui.save')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>