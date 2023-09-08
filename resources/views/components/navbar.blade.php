<nav id="navbar" class="navbar navbar-expand-lg   border-bottom border-body background-green sticky-top"
    data-bs-theme="dark">
    <div class="container-fluid">



        <a class="navbar-brand logo-navbar d-flex inline  " href="{{ route('home') }}"> <img class=" img-fluid  "
                src="/images/logo_presto-it.png" alt="">
            <p class="mx-2  my-0 d-flex align-items-center">Presto.it</p>
        </a>
        <button class="navbar-toggler buttonColor" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">

        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active colorNavbarButton" aria-current="page"
                        href="{{ route('insertions.index') }}">{{ __('ui.allInsertions')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active colorNavbarButton" aria-current="page"
                        href="{{ route('insertions.create') }}">{{ __('ui.addInsertion')}}</a>
                </li>

                <li class="nav-item dropdown ">
                    <a class="nav-link active dropdown-toggle colorNavbarButton" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.categories')}}
                    </a>


                    <ul class="dropdown-menu dropDownMenuBg colorNavbar background-green text-white">
                        @foreach(App\Models\Category::all() as $category)
                        <li><a class="dropdown-item text-effect colorNavbarButton  text-white"
                                href="{{route('categoryShow', compact('category'))}}">{{__('ui.category_' . $category->id)}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                @auth
                @if (Auth::user()->is_revisor)
                <li>
                    <form action="\revisor\home">
                        <button type="submit"
                            class="btn buttonColor text-white">{{ __('ui.insertionsToBeReview')}}</button>
                        <span class="position absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{App\Models\Insertions::toBeRevisionedCount()}}</span>
                    </form>


                </li>
                @endif
                @endauth
            </ul>

            @auth
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn px-0">{{ __('ui.logout')}}</button>
                    </form>
                </li>
            </ul>
            @else
            <a href="/login" class="btn buttonColor text-white m-1">{{ __('ui.logIn')}}</a>
            <a href="/register" class="btn buttonColor text-white">{{ __('ui.register')}}</a>
            @endauth

            <div class="btn-group mx-2">
                <div class=" dropdown-toggle text-white" data-bs-toggle="dropdown" data-bs-display="static"
                    aria-expanded="false">
                    <span class="fi fi-{{Session::get('locale')}}"></span>
                </div>
                <ul
                    class="dropdown-menu background-green border mt-4 border-white dropdown-menu-start dropdown-menu-lg-end">
                    <li class="dropdown-item d-flex colorNavbarButton justify-content-center ">
                        <x-language lang="it" nation="it" />

                    </li>
                    <li class="dropdown-item d-flex colorNavbarButton justify-content-center">
                        <x-language lang="gb" nation="gb" />

                    </li>
                    <li class="dropdown-item d-flex colorNavbarButton justify-content-center">
                        <x-language lang="es" nation="es" />

                    </li>
                </ul>
                </>

            </div>
</nav>