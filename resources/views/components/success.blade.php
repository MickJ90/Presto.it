@if(session()->has('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif