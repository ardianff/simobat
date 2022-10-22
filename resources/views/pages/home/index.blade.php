@extends('layouts.app')
@push('addon-styles')
    <link href="{{ url('vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card mb-4 text-white bg-primary" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fs-3 fw-bold">Jumlah Users</h5>
                            <p class="card-text fs-6 fw-semibold">{{ $users_count . ' Orang' }}</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card mb-4 text-white bg-info" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fs-3 fw-bold">Jumlah Obat</h5>
                            <p class="card-text fs-6 fw-semibold">{{ $medicine_count . ' Item' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addon-scripts')
    <script src="{{ url('vendors/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ url('vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    {{-- <script src="{{ url('js/main.js') }}"></script> --}}
@endpush
