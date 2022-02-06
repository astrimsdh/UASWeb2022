<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:login.php?pesan=belum_login");
	}

    include 'koneksi.php';
    $sql = "SELECT * FROM transaksi_astri ORDER BY id_transaksi DESC LIMIT 1";
    $query = mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_assoc($query);
    $no_transaksi = $data['id_transaksi'] + 1;

    $sql = "SELECT * FROM user_astri WHERE username = 'kasir'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);
    $nama = $data['nama_user'];
    $id_user = $data['id_user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transaksi Penjualan Astri</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Web Astri Musidah</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="masakan.php">
                <i class="fas fa-fw fa-folder"></i>
                <span>Masakan</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                TRANSAKSI
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="transaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pembelian</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Astri Musidah</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Transaksi Pembelian</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    Masukkan Transaksi
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="no_transaksi" class="col-sm-3 col-form-label">No Transaksi</label>
                                            <div class="col-sm-9">
                                            <input type="text" readonly class="form-control-plaintext" id="no_transaksi" value="<?= $no_transaksi; ?>" name="no_transaksi" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_user" class="col-sm-3 col-form-label">Nama User</label>
                                            <div class="col-sm-9" >
                                            <input type="hidden" readonly class="form-control-plaintext" id="id_user" value="<?= $id_user; ?>" name="id_user">
                                            <input type="text" readonly class="form-control-plaintext" id="nama_user" value="<?= $nama; ?>" name="nama_user" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                            <div class="col-sm-9">
                                            <input type="text" readonly class="form-control-plaintext" id="tanggal" value="<?= date('Y-m-d') ?>" name="tanggal" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_masakan" class="col-sm-3 col-form-label">Pilih Masakan</label>
                                            <div class="col-sm-9">
                                            <select name="nama_masakan" id="nama_masakan" class="form-control">
                                                <option value="0">-- Pilih Masakan --</option>
                                                <?php
                                                    $no = 1;
                                                    $qry = mysqli_query($koneksi, "SELECT * FROM masakan_astri");
                                                    while($data=mysqli_fetch_assoc($qry))
                                                    {
                                                ?>
                                                    <option data="<?= $data['nama_masakan'];?>" value="<?= $data['id_masakan'];?>"><?= $data['nama_masakan'];?></option>
                                                    
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm-9">
                                            <input type="number" class="form-control" id="jumlah" placeholder="jumlah" name="jumlah">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                            <div class="col-sm-9">
                                            <input type="text" readonly class="form-control-plaintext" id="harga" value="" name="harga" disabled placeholder="Rp 0,-">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="total" class="col-sm-3 col-form-label">Total</label>
                                            <div class="col-sm-9">
                                            <input type="text" readonly class="form-control-plaintext" id="total" value="" name="total" disabled placeholder="Rp 0,-">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button id="proses" class="btn btn btn-primary">Proses</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Masakan</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_pesan">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-10 ">
                                            Total
                                        </div>
                                        <div class="col-2">
                                            <input type="text" class="form-control-plaintext " disabled placeholder="0" id="bayar">
                                        </div>
                                    </div>
                                    <div class="row my-1">
                                        <div class="col-9">
                                            Bayar
                                        </div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row my-3d-flex justify-content-center">
                                        <div class="">
                                            <button class="btn btn-secondary" id="batal_transaksi">Batal</button>
                                            <button class="btn btn-primary" id="bayar_transaksi">Bayar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script>
        $(function() {
            $('#nama_masakan').on('click', function(){
                let id_masakan = $('#nama_masakan option:selected').attr('value');
                $.ajax({
                    url : 'getMasakan.php',
                    data: {
                        id: id_masakan
                    },
                    type: 'json',
                    method: 'post',
                    success: function(response){
                        $('#harga').val(parseInt(response));
                        console.log(response);
                    }
                })
            })

            $('#jumlah').on('change', function(){
                let harga = $('#harga').val();
                let jumlah = $('#jumlah').val();
                let total = harga * jumlah;
                $('#total').val(total);
            })

            let bayar_kasir = 0;
            let order = [];
            let no = 1;
            $('#proses').on('click', function(){
                let list = [];

                // Ambil nilai input
                let id_transaksi = $('#no_transaksi').val();
                let id_masakan = $('#nama_masakan option:selected').attr('value');
                let nama_masakan = $('#nama_masakan option:selected').attr('data');
                let harga = $('#harga').val();
                let jumlah = $('#jumlah').val();
                let total = parseInt($('#total').val());
                

                if(jumlah == ""){
                    alert("Isi Terlebih dahulu Pesanan");
                }else{
                    $.ajax({
                        url : 'tambahDetail.php',
                        data: {
                            id_transaksi: id_transaksi,
                            id_masakan: id_masakan,
                            nama_masakan: nama_masakan,
                            harga: harga,
                            jumlah: jumlah,
                            total: total
                        },
                        type: 'json',
                        method: 'post',
                        success: function(response){
                            console.log(response);
                        }
                    })

                    list.push({
                        'id_masakan': id_masakan,
                        'nama_masakan': nama_masakan,
                        'harga': harga,
                        'jumlah': jumlah,
                        'total': total
                    })

                    bayar_kasir += total;
                    $('#bayar').val(bayar_kasir);

                    $.each(list, function(i,data){
                        $('#list_pesan').append(`
                            <tr>
                                <td>`+ no++ +`</td>
                                <td>`+ data.nama_masakan +`</td>
                                <td>`+ data.harga +`</td>
                                <td>`+ data.jumlah +`</td>
                                <td>`+ data.total +`</td>
                            </tr>
                        `)
                    })

                    // Menghapus nilai
                    $('#nama_masakan').val("");
                    $('#harga').val("");
                    $('#jumlah').val("");
                    $('#total').val("");
                    
                }
            })
            $('#batal_transaksi').on('click', function(){
                let id_transaksi = $('#no_transaksi').val();
                let total_bayar = $('#bayar').val();

                if(total_bayar == ""){
                    alert("Tambah menu terlebih dahulu");
                    console.log("oke")
                }else{
                    $.ajax({
                        url: 'batalTransaksi.php',
                        data: {
                            id_transaksi: id_transaksi
                        },
                        method: 'post',
                        type: 'json',
                        success: function(data){
                            alert("Transaksi Berhasil dibatalkan");
                            window.location.reload();
                        }
                    })
                    
                }
            })

            $('#bayar_transaksi').on('click', function(){
                let id_user = $('#id_user').val();
                let id = $('#no_transaksi').val();
                let total_bayar = $('#bayar').val();

                if(total_bayar == "") {
                    alert("Tambah Menu Terlebih dahulu")
                }else{
                    $.ajax({
                        url: 'bayarTransaksi.php',
                        data: {
                            id_user: id_user,
                            total_bayar: total_bayar
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data){
                            
                        }
                    })
                    alert("Berhasil Menambahkan Transaksi");
                    window.location.reload();
                    window.location.href = 'print.php?id=' + id
                }
            })
        })
    </script>

</body>

</html>