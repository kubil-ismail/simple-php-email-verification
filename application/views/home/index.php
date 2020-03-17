</head>

<body>

    <div class="container mt-5 animated slideInLeft">
        <div class="jumbotron">
            <h1 class="display-4">Daftar Member</h1>
            <p class="lead">Silahkan daftar untuk menjadi member.</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="#" role="button" data-toggle="modal" data-target="#exampleModal">Daftar</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('send') ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="send">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>