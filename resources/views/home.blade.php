<x-main>
    <x-slot:title>Presto.it</x-slot:title>

    <div class="p-0">
        <img class="img-fluid" src="\images\header3.jpg" alt="">
    </div>
    <x-navbar />
    <div class="container mt-4">
        <x-success />
        <x-error />
    </div>

    <div class="container p-0">
        <div class="row m-5 p-0">
            <div class="col-12 mt-4">
                <h2 class="d-flex justify-content-center">{{__('ui.categories')}}</h2>
            </div>
            @foreach($categories as $category)
            <div class="col-6 col-md-3  col-lg-2">
                <div class="d-flex flex-column justify-content-center align-items-center py-3 ">
                    <a data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                        data-aos-duration="500" href="{{route('categoryShow', compact('category'))}}"><i
                            class="{{ $category->icon }} icon px-4 rounded"></i></a>
                    <h5 data-aos="fade-right" data-aos-anchor="#example-anchor" data-aos-offset="500"
                        data-aos-duration="500" class="mt-3 text-center">{{__('ui.category_' . $category->id)}}</h5>
                </div>
            </div>
            @endforeach
        </div>

    </div>






    <div class="container  my-5">
        <div class="row d-flex BackGroundIllustration  ">
            <div class="col-12 col-md-6 d-flex align-middle ">
                <img class=" img-fluid d-flex justify-content-start " src="\images\norton-shake.jpg" alt="">
            </div>
            <div class="col-12 col-md-6 my-3 overflow-hidden  fs-3 ">
                <div class="p-3 " data-aos="fade-left" data-aos-duration="3000">
                    <h3 class="text-center mb-4">{{__('ui.title1')}}</h3>

                    <p> {{__('ui.p1')}}</p>
                </div>
            </div>
        </div>
        <div class="row  my-5  BackGroundIllustrationReverse">
            <div class="col-12 col-md-6 my-5 overflow-hidden r fs-3 ">
                <div class="p-3 " data-aos="fade-right" data-aos-duration="3000">
                    <h3 class="text-center mb-4">{{__('ui.title2')}}</h3>
                    <p>{{__('ui.p2')}}</p>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-end ">
                <img class="img-fluid" src="\images\vestiti-abiti-clothes-1068x712 (1).jpg" alt="">
            </div>
        </div>




    </div>


    <div class="container mt-4 ">
        <div class="my-5 text-center">


            <section class="container mt-5">
                <div class="row ">
                    <div class="p-4 d-flex justify-content-between">
                        <h2>{{__('ui.lastestInsertions')}}</h2>
                        <a href="{{ route('insertions.index') }}" class=" buttonColor text-white text-end  btn ">
                            {{__('ui.goToAllInsertions') }}</a>

                    </div>

                </div>
                <div class="row mt-4">

                    @foreach($insertions as $insertion)
                    <div class="col-12  col-sm-6 col-md-4 ">

                        <x-card :title="$insertion->title" :category="$insertion->category->name"
                            :image="!$insertion->images()->get()->isEmpty() ? $insertion->images()->first()->getUrl(300,300) : '/images/img-presto.jpg'"
                            :categoryid="$insertion->category->id" :price="$insertion->price"
                            :description="$insertion->description" :body="$insertion->body"
                            :date="$insertion->created_at->diffForHumans()" :link="route('insertions.show', $insertion)"
                            :isAccepted="$insertion->is_accepted" />

                    </div>
                    @endforeach
                </div>
            </section>

</x-main>