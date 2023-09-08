<div class="container my-5">
    <h4 class=" my-5 w-100 rounded d-flex justify-content-center">{{__('ui.allYourInsertions')}}</h4>
    <div class="row">

        @foreach($insertions as $insertion)
        <div class="col-12 col-md-6 col-lg-3">
            <x-card :title="$insertion->title" :category="$insertion->category->name" :price="$insertion->price"
                :image="!$insertion->images()->get()->isEmpty() ? $insertion->images()->first()->getUrl(300,300) : '/images/img-presto.jpg'"
                :description="$insertion->description" :body="$insertion->body" :categoryid="$insertion->category->id"
                :link="route('insertions.show', $insertion)" :date="$insertion->created_at->diffForHumans()"
                :isAccepted="$insertion->is_accepted" />
        </div>
        @endforeach

    </div>
</div>