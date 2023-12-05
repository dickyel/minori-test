@extends('layouts.admin')


@section('title','training-admin')

@section('content')

 <!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Data Karyawan</h2>
    <div class="row">
      
        <div class="table-responsive">
            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead class="thead-dark">
                    <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Tanggal Sertifikat</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
       
    </div>
</div>
@endsection

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>

        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { 
                  data: 'DT_RowIndex', 
                  name: 'DT_RowIndex', 
                  orderable: false, 
                  searchable: false,
                  width: '5%',
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
                },
                { data: 'pegawai.nip', name: 'pegawai.nip' },
                { data: 'pegawai.nama_karyawan', name: 'pegawai.nama_karyawan' },
                {
                    data: 'training.jenis',
                    name: 'training.jenis',
                    render: function (data) {
                        return '<div>' + data + '</div>';
                    }
                },

                { 
                    data: 'tgl_sertifikat', name: 'tgl_sertifikat',
                    render: function (data, type, row) {
                        
                        var parsedDate = moment(data, 'YYYY-MM-DD');
                        parsedDate.month(parsedDate.month() - 1);

                        var formattedDate = parsedDate.format('DD-MM-YYYY');
                        return formattedDate;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
