@if(session()->has('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
@endif