<!DOCTYPE html>
<html>
<head>
    <title>AzzGo - Recupero password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/bootstrap.min.css"></link>
    <link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/prettify.css"></link>
    <link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.css"></link>
</head>
<body class="wysihtml5-supported">
<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="color: black;"> Ho dimenticato la mia password </h3>
                </div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Errore!</h4>
                                    @foreach($errors->all() as $error)
                                        {{ $error }} <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <form class="image-upload" method="post" action="{{ route('password.email') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"/>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-sm">Invia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>