<form action="{{ route('set_language_locale' , $lang )}}" method="POST">
@csrf
    <button type="submit" class="bg-transparent border-0">
        <span class="fi fi-{{ $nation }}"></span>
    </button>
</form>