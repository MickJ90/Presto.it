 <x-main>

     <x-slot:title>{{__('ui.insertion')}}</x-slot:title>

     <x-navbar />
     <div class="container mt-4">
         <x-success />
         <x-error />
     </div>



     <div class="container my-3 showContainer BackGroundIllustration border-orange rounded ">
         <div class="row ">
             <div class="mt-2 d-flex flex-row-reverse">
                 <form action="{{route('insertions.destroy' , $insertion )}}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger mt-1 me-1" type="submit"> <i class="bi bi-trash-fill"></i></button>
                 </form>
                 <a href="{{ route('insertions.edit' , $insertion)}}" class="btn btn-success mt-1 me-1"><i
                         class="bi bi-pencil-fill"></i></a>

             </div>



             <div class="col-12 text-center al rounded p-3">
                 <h3 class="m-3">{{$insertion->title}}</h3>
                 <p class="m-3 p-2 rounded categoryBadge text-white">{{$insertion->category->name}}</p>
             </div>


             <div class="col-12 ">

                 <div id="carouselExampleInterval" class="carousel slide my-5 mx-auto  w-50 " data-bs-ride="carousel">
                     <div class="carousel-inner rounded  ">
                         @if (!$insertion->images()->get()->isEmpty())
                         @foreach ($insertion->images()->get() as $image)
                         <div class="carousel-item @if ($loop->first) active @endif carusel-img-size  "
                             data-bs-interval="10000">
                             <div class="d-flex justify-content-center ">
                                 <img src="{{ $image->getUrl(800,400) }}" class="img-fluid  " alt="...">
                             </div>
                         </div>
                         @endforeach
                         @else
                         <div class="carousel-item active d-flex justify-content-center" data-bs-interval="10000">
                             <img src="/images/img-presto.jpg" class=" img-fluid " alt="...">
                         </div>
                         @endif

                         <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleInterval"
                             data-bs-slide="prev">
                             <span class="carousel-control-prev-icon text-light bg-dark rounded-5"
                                 aria-hidden="true"></span>
                             <span class="visually-hidden ">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                             data-bs-slide="next">
                             <span class="carousel-control-next-icon text-light bg-dark rounded-5"
                                 aria-hidden="true"></span>
                             <span class="visually-hidden">Next</span>
                         </button>
                     </div>
                 </div>
             </div>

             <div class=" mt-5 background-green text-white px-5 rounded">

                 <div class="col-12  mt-2">
                     <div class=" d-flex justify-content-between">
                         <h4>{{ \App\Custom\Currency::formatEuro($insertion->price)}}</h4>
                         <p class=" d-flex justify-content-end">{{$insertion->created_at->diffForHumans()}}</p>
                     </div>
                     <p class="mt-2">{{$insertion->description}}</p>

                     <a href="mailto:{{$insertion->user->email}}"><button type="button"
                             class="btn buttonColor my-3">{{__('ui.contactVendor')}}</button></a>
                 </div>
             </div>
         </div>

 </x-main>