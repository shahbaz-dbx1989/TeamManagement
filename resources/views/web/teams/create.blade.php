<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create Team</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2>Create Team</h2>
                 @if(Session::has('message'))
                        <div class="alert alert-success">
                          {{Session::get('message')}}
                        </div>
                    @elseif($errors->count()>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            {{ $error }}
                            <br/>
                            @endforeach
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif                  
            </div>
        </div>

        <div class="row">
                <form action="{{route('teams.store')}}" method="Post">
                {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="team">Team</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Team" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-12"><button type="submit" class="btn btn-default">Submit</button></div>
                </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>