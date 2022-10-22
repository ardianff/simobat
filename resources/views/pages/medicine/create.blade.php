@extends('layouts.app')
@push('addon-styles')
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="fs-2 fw-semibold">Tambah Data Obat</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('medicine.index') }}" class="text-decoration-none">Obat</a>
                    </li>
                    <li class="breadcrumb-item active"><span>Tambah</span></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="example">
                                <div class="tab-content rounded-bottom">
                                    <div class="tab-pane p-3 active preview" role="tabpanel">
                                        <form class="row g-3" action="{{ route('medicine.store') }}" method="post">
                                            @csrf
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="medicine_name">Nama Obat</label>
                                                    <input class="form-control @error('medicine_name') is-invalid @enderror"
                                                        id="medicine_name" type="text" name="medicine_name"
                                                        value="{{ old('medicine_name') }}">
                                                    @error('medicine_name')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="medicine_made">Dibuat Oleh</label>
                                                    <input
                                                        class="form-control  @error('medicine_made') is-invalid @enderror"
                                                        id="medicine_made" type="text" name="medicine_made"
                                                        value="{{ old('medicine_made') }}">
                                                    @error('medicine_made')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="medicine_expiry">Tanggal
                                                        Kedaluwarsa</label>
                                                    <input
                                                        class="form-control @error('medicine_expiry') is-invalid @enderror"
                                                        id="medicine_expiry" type="text" name="medicine_expiry"
                                                        value="{{ old('medicine_expiry') }}">
                                                    @error('medicine_expiry')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mt-5">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Simpan
                                                        Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addon-scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#medicine_expiry').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'materialicons',
            showOnFocus: true,
            showRightIcon: false,
            format: 'dd-mm-yyyy'
        });
    </script>
@endpush
