<!--BEGIN my search query-->
@if (isset($currentSearchQuery))
<p>Menampilkan hasil untuk kueri: <b>{{ $currentSearchQuery }}</b>. <a href="{{ route('preference.reset', ['name'=>'currentSearchQuery']).'?redirect='."http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); }}">Clear</a></p>
@endif
<!--END my search query-->
