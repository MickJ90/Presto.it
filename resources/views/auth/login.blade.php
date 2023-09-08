<x-main>
    <x-navbar />
    <x-slot:title>{{__('ui.logIn')}}</x-slot:title>
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">
            <div class=" col-7 card p-3 background-green text-white mt-5 ">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-6"> <img class="rounded img-fluid"
                            src="https://media.istockphoto.com/id/472990070/it/vettoriale/opportunit%C3%A0.jpg?s=612x612&w=0&k=20&c=fMdG7V_N0FSRWSwaChl2NRtY91APvsHI7ClROvbzNWg="
                            alt=""></div>
                    <form class="col-12 col-lg-6" action="/login" method="POST">
                        @csrf
                        <h3 class="mt-3">{{__('ui.logIn')}}</h3>
                        <div class="col-12 mt-3">
                            <label for="email">{{__('ui.email')}}</label>
                            <input class="form-control focus-ring focus-ring-danger" type="email" name="email"
                                id="email">
                            @error('email')<p class="small rounded my-2 errorBackground text-danger">{{ $message }}
                            </p> @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <label for="password">{{__('ui.password')}}</label>
                            <input class="form-control focus-ring focus-ring-danger" type="password" name="password"
                                id="password">
                            @error('password')<p class="small rounded my-2 errorBackground text-danger">
                                {{ $message }}
                            </p> @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <a href="/register" class="text-white">{{__('ui.notRegister')}}</a>
                        </div>
                        <div class="col-12 my-3">
                            <button type="submit" class="btn buttonColor">{{__('ui.logIn')}}</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>


</x-main>