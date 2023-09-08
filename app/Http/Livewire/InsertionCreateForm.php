<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Jobs\RemoveFace;
use App\Jobs\ResizeImage;
use App\Jobs\AddMarkFidelity;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Models\Insertions;
use Illuminate\Support\Facades\File;

class InsertionCreateForm extends Component
{
    use WithFileUploads;
    public $insertion;
    public $temporary_images;
    public $images = [];
    public $dbimages;

    public function messages(){
        return [
            'insertion.title.required' => __('errors.insertion_title_required'),
            'insertion.category_id.required' => __('errors.category_id_required'),
            'insertion.price.required' => __('errors.insertion_price_required'),
            'insertion.description.required' => __('errors.insertion_description_required'),
            'temporary_images.*.image' => __('errors.temporary_images_*_image'),
            'temporary_images.*.max' =>  __('errors.temporary_images_*_max'),
        ];

    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:4096',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function removeDbImage($key)
    {
        if($this->dbimages->has($key)) {
            $this->dbimages->get($key)->delete();
            $this->dbimages->forget($key);
            
        }
    }

    protected function rules()
    {
        return [
            'insertion.title' => 'required',
            'insertion.category_id' => 'required',
            'insertion.price' => 'required',
            'insertion.description' => 'required',
            'temporary_images.*' => 'image|max:4096'
    
        ];
    }

    public function mount(Insertions $insertion)
    {
        $this->insertion =$insertion;
        $this->dbimages = $insertion->images()->get();
    }

    public function store()
    {   
        $this->validate();
        $this->insertion->user_id = auth()->user()->id;
        $this->insertion->save();
        
        if (count($this->images)) {
            foreach ($this->images as $image) {
               // $this->insertion->images()->create(['path' => $image->store('images', 'public')]);
                
                $newFileName = "insertions/{$this->insertion->id}";
                $newImage = $this->insertion->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFace::withChain([
                    new AddMarkFidelity($newImage->id),
                    new ResizeImage($newImage->path, 300, 300),
                    new ResizeImage($newImage->path, 800, 400),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            
            }

            File::deleteDirectory(storage_path('/app/livewire-tm'));
            
        }
        
        
        session()->flash('success', __('ui.successCreated'));
        $this->newInsertion();
        $this->emitTo('insertion-list', 'loadInsertions');
    
    }

    public function newInsertion()
    {
        $this->insertion = new \App\Models\Insertions;
        $this->images = [];
        $this->temporary_images = [];
        $this->dbimages = collect();

    }

    public function render()
    {
        return view('livewire.insertion-create-form');
    }

}
