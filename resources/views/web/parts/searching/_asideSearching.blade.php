<div class="col-sm-4 col-md-3">

    <div class="section-title line-style no-margin">
        <h3 class="title">Provincias Registradas</h3>
    </div>
    <div id="filter-box">
        @foreach($countProvince as $countProv)
            <a href="{{ route('filter.province', $countProv->province->slug) }}"
               class="filter">{{ $countProv->province->name }}</a>
        @endforeach
    </div>

    <div class="section-title line-style">
        <h3 class="title">Buscar</h3>
    </div>
    <div class="right-box">
        <form method="post" action="{{ route('filter.commerce') }}" class="grey-color">
            @csrf
            <div class="row">
                <div class="col-md-12 space-div">
                    <label>Buscar</label>
                    <input class="form-control" type="text" name="keywords" id="keywords"
                           placeholder="Nombre del Comercio" />
                </div>
                <div class="col-md-12 space-div">
                    <select class="dropdown" name="provinces" data-settings='{"cutOff": 5}'>
                        <option value="">-- Provincias --</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 space-div">
                    <button type="submit" class="btn btn-default search-button">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="section-title line-style">
        <h3 class="title">Publicidad</h3>
    </div>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- indexComercios -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-7543412924958320"
         data-ad-slot="2594521634"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>