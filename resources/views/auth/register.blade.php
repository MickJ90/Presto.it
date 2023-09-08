<x-main>
    <x-navbar />
    <x-slot:title>{{__('ui.register')}}</x-slot:title>
    <div class="container-fluid w-100 ">
        <div class="row">


            <div class="col-6 mx-auto my-5 ">

                <div class="card p-3   text-white background-green  ">


                    <div class="row  my-5">
                        <div class="col-12 col-lg-6 d-flex align-items-center "><img class="img-fluid w-100 rounded "
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiB5Z-jzICYJsM6Xq7ARXUPiBicg1ZeyjhSQ&usqp=CAU"
                                alt=""></div>
                        <div class="col-12 col-lg-6">
                            <form action="/register" method="POST">
                                @csrf
                                <h3 class="mt-3">{{__('ui.register')}}</h3>
                                <div class="col-12 mt-3  ">
                                    <label for="name">{{__('ui.name')}}</label>
                                    <input class="form-control focus-ring focus-ring-danger " type="text" name="name"
                                        id="name">
                                    @error('name')<p class="small rounded my-2 errorBackground text-danger">
                                        {{ $message }}
                                    </p> @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="email">{{__('ui.email')}}</label>
                                    <input class="form-control focus-ring focus-ring-danger" type="email" name="email"
                                        id="email">
                                    @error('email')<p class="small rounded my-2 errorBackground text-danger">
                                        {{ $message }}
                                    </p> @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="password">{{__('ui.password')}}</label>
                                    <input class="form-control focus-ring focus-ring-danger" type="password"
                                        name="password" id="password">
                                    @error('password')<p class="small rounded my-2 errorBackground text-danger">
                                        {{ $message }}
                                    </p> @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="password_confirmation">{{__('ui.confirmPassword')}}</label>
                                    <input class="form-control focus-ring focus-ring-danger" type="password"
                                        name="password_confirmation" id="password_confirmation">
                                    @error('password')<p class="small rounded my-2 errorBackground text-danger">
                                        {{ $message }}
                                    </p> @enderror
                                </div>
                                <div class="col-12 my-3">
                                    <button type="submit"
                                        class="btn text-white buttonColor">{{__('ui.register')}}</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-main>