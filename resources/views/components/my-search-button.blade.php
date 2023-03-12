<!--BEGIN my search button-->
<div class="ms-2 bd-highlight"><a class="btn" data-bs-toggle="modal" data-bs-target="#searchModal" href="#" title="Cari..."><i class="bi-search"></i></a></div>
<!-- BEGIN search modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="searchModalLabel">Cari...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
          <input type="text" name="q" class="form-control" id="searchTextInput" onkeyup="this.value=this.value.toLowerCase()" autocomplete="off" value="{{ $currentSearchQuery ?? ''}}" required>
        </div>
        <div class="modal-footer">
          <a href="{{ route('preference.reset', ['name'=>'currentSearchQuery']).'?redirect='."http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); }}" type="button" name="button" class="btn">Clear</a>
          <button type="submit" class="btn btn-primary"><i class="me-2 bi-search"></i>Cari</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END search modal -->
<!--END my search button-->
