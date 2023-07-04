@extends('layouts.main')

@section('body')
    {{-- Title --}}

    <div class="container relative overflow-x-auto mx-auto">
        <h1 class="text-2xl font-bold text-center mt-16 mb-10 text-sky-400">{{ $title }}</h1>

        {{-- Table --}}
        <table class="table table-zebra">
            <!-- Table head -->
            <thead>
                <tr class="bg-black/25">
                    {{-- <th>#</th> --}}
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>L/P</th>
                    <th>Golongan</th>
                    <th>Eselon</th>
                    <th>Jabatan</th>
                    <th>Tempat Tugas</th>
                    <th>Unit Kerja</th>
                    <th>HP</th>
                    <th>NPWP</th>
                </tr>
            </thead>

            <!-- Table body -->
            <tbody>
                @foreach ($pegawai as $item)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $item->NIP }}</td>
                        <td>{{ $item->data->nama }}</td>
                        <td>{{ $item->data->tempat_lahir }}</td>
                        <td>{{ $item->data->alamat }}</td>
                        <td>{{ $item->data->tanggal_lahir }}</td>
                        <td>{{ $item->data->jk }}</td>
                        <td>{{ $item->golongan->golongan }}</td>
                        <td>{{ $item->golongan->eselon }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->tempat_tugas }}</td>
                        <td>{{ $item->unit_kerja }}</td>
                        <td>{{ $item->data->no_hp }}</td>
                        <td>{{ $item->data->npwp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        window.print();
        // window.download = 'file.pdf '
    </script>
@endsection
