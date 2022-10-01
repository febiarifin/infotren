<div class="col-md-3">
    <!-- Terbaru -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <div>
                <p class="fs-6 fw-bold text-secondary">
                    {{ config('app.name') }}
                </p>
                <hr />
                <a href="{{ route('home') }}"
                    class="btn btn-outline-primary btn-sm rounded-pill col-12 {{ $active == 'terbaru' ? 'active' : '' }}">Terbaru</a>
            </div>
        </div>
    </div>

    <!-- Popularitas -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <div>
                <p class="fs-6 fw-bold text-secondary">
                    Popularitas
                </p>
                <hr />
                <a href="{{ route('pesantren.test', ['test' => 'terpopuler']) }}"
                    class="btn btn-outline-primary btn-sm rounded-pill col-12 {{ $active == 'terpopuler' ? 'active' : '' }}">Tampilkan</a>
            </div>
        </div>
    </div>

    <!-- Jarak -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <div>
                <p class="fs-6 fw-bold text-secondary">
                    Jarak Terdekat
                </p>
                <hr />
                <a href="{{ route('pesantren.test', ['test' => 'terdekat']) }}"
                    class="btn btn-outline-primary btn-sm rounded-pill col-12 {{ $active == 'terdekat' ? 'active' : '' }}">Terdekat</a>
            </div>
        </div>
    </div>

    <!-- Biaya -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <div>
                <p class="fs-6 fw-bold text-secondary">
                    Biaya Pendidikan
                </p>
                <hr />
                <a href="{{ route('pesantren.test', ['test' => 'termurah']) }}"
                    class="btn btn-outline-primary btn-sm rounded-pill col-12 mb-1 {{ $active == 'termurah' ? 'active' : '' }}">Termurah</a>
                <a href="{{ route('pesantren.test', ['test' => 'termahal']) }}"
                    class="btn btn-outline-primary btn-sm rounded-pill col-12 {{ $active == 'termahal' ? 'active' : '' }}">Termahal</a>
            </div>
        </div>
    </div>

    <!-- Konsentrasi -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <div>
                <p class="fs-6 fw-bold text-secondary">
                    konsentrasi
                </p>
                <hr />
                @foreach ($konsentrasis as $konsentrasi)
                    <a href="{{ route('pesantren.konsentrasi', ['konsentrasi' => $konsentrasi->slug]) }}"
                        class="btn btn-outline-primary btn-sm rounded-pill mb-1 {{ $active == $konsentrasi->slug ? 'active' : '' }}">{{ Str::substr($konsentrasi->name, 0, 20) }}..</a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Jenjang -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <div>
                <p class="fs-6 fw-bold text-secondary">
                    Jenjang
                </p>
                <hr />
                @foreach ($jenjangs as $jenjang)
                    <a href="{{ route('pesantren.jenjang', ['jenjang' => $jenjang->slug]) }}"
                        class="btn btn-outline-primary btn-sm rounded-pill mb-1 {{ $active == $jenjang->slug ? 'active' : '' }}">{{ $jenjang->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

</div>
