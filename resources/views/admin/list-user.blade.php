@extends('layouts.admin-dashboard')

@section('title', 'Welcome')

@section('outCSS')
{{-- CSS Tambahan --}} {{-- {{ asset('apaxy/...') }} --}}
<!-- DataTables -->
<link href="{{ asset('apaxy/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
  type="text/css" />
<link href="{{ asset('apaxy/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
  type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('apaxy/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
  type="text/css" />
@endsection

@section('pageName', 'List Users')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('/') }}">Lara Mart</a></li>
<li class="breadcrumb-item"><a href="javascript: void(0);">Data User</a></li>
<li class="breadcrumb-item active">List User</li>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <h4 class="header-title">Data User</h4>
        <p class="card-title-desc">Menampilkan data pelanggan pada Toko LaraMart.
        </p>

        <table id="datatable" class="table table-bordered dt-responsive nowrap"
          style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Active</th>
              <th>Create</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td class="text-center"> {{ $user->id }} </td>
              <td> {{ $user->name }} </td>
              <td> {{ $user->email }} </td>
              <td> {{ $user->detailuser->is_active }} </td>
              <td> {{ $user->created_at }} </td>
              <td> Aksi </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@section('outJS')
{{-- JS Tambahan --}} {{-- {{ asset('apaxy/...') }} --}}

<!-- Required datatable js -->
<script src="{{ asset('apaxy/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('apaxy/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('apaxy/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('apaxy/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('apaxy/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('apaxy/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
{{-- <script src="{{ asset('apaxy/libs/jszip/jszip.min.js') }}"></script> --}}
{{-- <script src="{{ asset('apaxy/libs/pdfmake/build/pdfmake.min.js') }}"></script> --}}
{{-- <script src="{{ asset('apaxy/libs/pdfmake/build/vfs_fonts.js') }}"></script> --}}
{{-- <script src="{{ asset('apaxy/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script> --}}
{{-- <script src="{{ asset('apaxy/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script> --}}
{{-- <script src="{{ asset('apaxy/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script> --}}
<!-- Datatable init js -->
<script src="{{ asset('apaxy/js/pages/datatables.init.js') }}"></script>
@endsection