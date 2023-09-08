<div class="card my-3 border   border-dark">
    <div class="position-relative">
        @if($isAccepted === 0)
        <span class="position-absolute top-0 end-0 rejected rejected-color">{{__('ui.rejected')}}</span>
        @elseif($isAccepted === null)
        <span class="position-absolute top-0 end-0 toRevisioned review">{{__('ui.toReview')}}</span>
        @else
        <div class="hide img-card-size "></div>
        @endif

        @if(isset($image))
        <img src="{{ $image }}" class="card-img-top img-fluid img-size-card ">
        @else
        <img src="/images/img-presto.jpg" class="card-img-top img-fluid">
        @endif
    </div>


    <div class="card-body background-green  text-white ">
        <h4 class="card-title max-line ">{{ $title }}</h4>
        <h6 class="card-subtitle mb-2  text-white  ">{{ \App\Custom\Currency::formatEuro($price) }}</h6>
        <p class="card-text max-line   ">{{ $description }}</p>
        <div class="d-flex justify-content-center ">
            <a href="" class="text-white mb-3 max-line">{{__('ui.category_' . $categoryid)}}</a>

        </div>
        <div> <a href="{{ $link }}"
                class="btn d-flex justify-content-center text-white buttonColor">{{__('ui.showInsertion')}}</a>
        </div>
        <div class="text-center my-3">
            <p>{{$date}}</p>
        </div>
    </div>
</div>