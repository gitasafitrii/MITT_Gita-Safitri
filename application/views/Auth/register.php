<html>

<head>
    <title>Form Register</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Form Register
            </div>
            <div class="card-body">
                <?php
                if ($this->session->flashdata('error') != '') {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $this->session->flashdata('error');
                    echo '</div>';
                }
                ?>
                <form method="POST" action="<?php echo base_url('Auth/proses'); ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="lahir">Tanggal Lahir</label>
                        <input class="form-control form-control-lg" id="lahir" type="date" name="lahir" required="" placeholder="Tanggal Lahir" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control form-control-lg" id="email" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>