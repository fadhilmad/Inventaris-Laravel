<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- datatables  -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap5.min.js"></script>


    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

    {{-- date pick--}}
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    {{--  css  --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.rtl.min.css" />


    <title>Sistem Informasi Inventaris AKN Pacitan</title>
</head>
<body>
@include('sweetalert::alert')
{{--Navbar--}}
<header class="p-3 bg-primary text-dark">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a class="d-flex align-items-center mb-lg-0 text-dark text-decoration-none">
                <img src="{{url('/img/akn.png')}}" width="50" height="50" role="img">
            </a>

            <p class="col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0 ms-3">
                Sistem Informasi Inventaris <br> Akademi Komunitas Pacitan
            </p>

            @guest

            @else
                <div class="text-end">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                 class="bi bi-person-circle me-1" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @if (Auth::user()->hasRole('admin'))
                                <li>
                                    <a class="dropdown-item unstyled"
                                       href="{{ route('admin.dashboard') }}">{{ __('Beranda') }}</a>
                                </li>
                            @elseif (Auth::user()->hasRole('tu'))

                                <li>
                                    <a class="dropdown-item unstyled"
                                       href="{{ route('tu.dashboard') }}">{{ __('Beranda') }}</a>
                                </li>

                            @elseif (Auth::user()->hasRole('wr'))

                                <li>
                                    <a class="dropdown-item unstyled"
                                       href="{{ route('wr.dashboard') }}">{{ __('Beranda') }}</a>
                                </li>

                            @elseif (Auth::user()->hasRole('inventaris'))

                                <li>
                                    <a class="dropdown-item unstyled"
                                       href="{{ route('inventaris.dashboard') }}">{{ __('Beranda') }}</a>
                                </li>

                            @elseif (Auth::user()->hasRole('pplp'))

                                <li>
                                    <a class="dropdown-item unstyled"
                                       href="{{ route('pplp.dashboard') }}">{{ __('Beranda') }}</a>
                                </li>

                            @endif

                            <li>
                                <a class="dropdown-item unstyled" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            </li>
                        </ul>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            @endguest

        </div>
    </div>
    </div>
</header>
{{--navbar--}}

@yield('content')

<!-- Footer -->
<footer class="text-light p-3 bg-primary">
    <div class="text-center">
        Copyright © 2022 Akademi Komunitas Pacitan
    </div>
</footer>
<!-- Footer -->


<script>
    $(function() {
        $('#toggle1').change(function() {
            var validasi_ketua = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                data: {'validasi_ketua': validasi_ketua, 'id': id},
                url: '/ketua/pengajuan/inventaris/validasi/'+id,
                success: function(data){
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil Mengubah Data',
                        'success'
                    )
                }
            });
        })
    })

    $(function() {
        $('#toggle2').change(function() {
            var validasi_ketua = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            var jumlah_setelah = $('#result').val();

            $.ajax({
                type: "GET",
                dataType: "json",
                data: {'validasi_ketua': validasi_ketua, 'id': id, 'jumlah_setelah' : jumlah_setelah},
                url: '/ketua/penghapusan/inventaris/validasi/'+id+'/'+jumlah_setelah,
                success: function(data){
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil Mengubah Data',
                        'success'
                    )
                }
            });
        })
    })

    $(function() {
        $('#toggle3').change(function() {
            var validasi_wr = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                data: {'validasi_wr': validasi_wr, 'id': id},
                url: '/wr/pengajuan/inventaris/validasi/'+id,
                success: function(data){
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil Mengubah Data',
                        'success'
                    )
                }
            });
        })
    })

    $(function() {
        $('#toggle4').change(function() {
            var validasi_wr = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            var jumlah_setelah = $('#result').val();

            $.ajax({
                type: "GET",
                dataType: "json",
                data: {'validasi_wr': validasi_wr, 'id': id, 'jumlah_setelah' : jumlah_setelah},
                url: '/wr/penghapusan/inventaris/validasi/'+id+'/'+jumlah_setelah,
                success: function(data){
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil Mengubah Data',
                        'success'
                    )
                }
            });
        })
    })
</script>


<script>
    $(document).ready(function() {
        $('.unit_kerja').select2({
            theme: "bootstrap-5",
            placeholder: "",
        });
        $('.jabatan').select2({
            theme: "bootstrap-5",
            placeholder: "",
        });
    });

    function calculateAmount(val) {
        var now = $("#jumlah_ini").val();
        var total = now - val;

        var print = document.getElementById('jumlah_setelah');

        if (val > now || val < 0 || total < 0){
            print.value = ('Melebihi jumlah saat ini');
            $("#tambah-data").attr("disabled", true);
        }
        else {

            print.value = total;
            $("#tambah-data").attr("disabled", false);
        }
    };

    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose:true //to close picker once year is selected
    });

    $(document).ready(function () {
        $('#table1').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
        });
    });

    $(document).ready( function () {
        $('#table2').DataTable( {
            dom: 'Bfrtip',
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            buttons: [
                // { extend: 'copy', className: 'btn btn-sm btn-primary' },
                // { extend: 'excel', className: 'btn btn-sm btn-primary' },
                {
                    extend: 'pdfHtml5',
                    customize: function(doc) {
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableBodyOdd.alignment = 'center';
                    },
                  className: 'btn btn-md btn-primary',
                },
            ]
        } );
    } );

    $(document).ready( function () {
        $('#table3').DataTable( {
            dom: 'Bfrtip',
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            buttons: [
                {
                    extend: 'pdfHtml5',
                    customize: function(doc) {
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableBodyOdd.alignment = 'center';
                    },
                    className: 'btn btn-md btn-primary',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6]
                    }
                },
            ]
        } );
    } );
    $(document).ready( function () {
        $('#table4').DataTable( {
            dom: 'Bfrtip',
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            buttons: [
                {
                    extend: 'pdfHtml5',
                    customize: function(doc) {
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableBodyOdd.alignment = 'center';
                    },
                    className: 'btn btn-md btn-primary',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7]
                    }
                },
            ]
        } );
    } );
</script>

<!-- Optional JavaScript; choose one of the two! -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
