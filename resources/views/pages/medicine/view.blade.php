@extends('layouts.app')
@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="fs-2 fw-semibold">Show Data Obat {{ $medicine->medicine_name }}</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('medicine.index') }}"class="text-decoration-none">Obat</a>
                    </li>
                    <li class="breadcrumb-item active"><span>Show</span></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="example">
                                <div class="tab-content rounded-bottom">
                                    <div class="tab-pane p-3 active preview" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="medicine_name">Nama Obat</label>
                                                    <input class="form-control-plaintext" id="medicine_name" type="text"
                                                        name="medicine_name" value="{{ $medicine->medicine_name }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="medicine_name">Dibuat Oleh</label>
                                                    <input class="form-control-plaintext" id="medicine_name" type="text"
                                                        name="medicine_name" value="{{ $medicine->medicine_made }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="medicine_name">Tanggal
                                                        Kadaluwarsa</label>
                                                    <input class="form-control-plaintext" id="medicine_name" type="text"
                                                        name="medicine_name"
                                                        value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $medicine->expiry_date)->format('d-m-Y') }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="medicine_name">Diinput Oleh</label>
                                                    <input class="form-control-plaintext" id="medicine_name" type="text"
                                                        name="medicine_name" value="{{ $medicine->user->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-5">
                                                <div class="text-center">
                                                    <button type="submit"
                                                        onclick="location.href='{{ route('medicine.index') }}'"
                                                        class="btn bg-gradient bg-warning">Kembali</button>
                                                </div>
                                            </div>
                                        </div>
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
@endpush
