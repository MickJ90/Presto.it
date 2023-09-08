<x-main>
    <x-slot:title>{{__('ui.insertions')}}</x-slot:title>
    <x-navbar />
    <div class="container mt-4">
        <x-success />
        <x-error />
    </div>
    <div class="container">
        <div class="row m-5">
            <div class="col-12 col-md-6 mb-3">
                <h2>{{__('ui.searchInsertion')}}</h2>
                <form action="{{ route('insertions.search') }}" method="GET" class="d-flex">
                    <input name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.search')}}"
                        aria-label="search">
                    <button class="btn buttonColor" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>

            <div class="col-12mt-4">
                <h2>{{__('ui.allInsertions')}}</h2>
            </div>

            @forelse($insertions as $insertion)
            <div class="col-12 col-md-4 col-lg-3">

                <x-card :title="$insertion->title" :category="$insertion->category->name" :price="$insertion->price"
                    :image="!$insertion->images()->get()->isEmpty() ? $insertion->images()->first()->getUrl(300,300) : '/images/img-presto.jpg'"
                    :description="$insertion->description" :body="$insertion->body"
                    :categoryid="$insertion->category->id" :date="$insertion->created_at->diffForHumans()"
                    :link="route('insertions.show', $insertion)" :isAccepted="$insertion->is_accepted" />

            </div>
            @empty
            <div class="col-12">
                <div class=" py-3 shadow">
                    <p class="">Non ci sono annunci per questa ricerca</p>
                </div>
            </div>
            @endforelse
        </div>

    </div>

</x-main>