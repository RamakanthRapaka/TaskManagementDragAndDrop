
<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Sticky Footer Navbar Template · Bootstrap v5.2</title>
        <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-3.2.1.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery.gridstrap@0.0.0-semantically-released/dist/jquery.gridstrap.min.css"> 
        <script src="https://cdn.jsdelivr.net/npm/jquery.gridstrap@0.0.0-semantically-released/dist/jquery.gridstrap.min.js"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <script src="{{ asset('assets/js/custom.js') }}"></script>

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
        <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">
        <meta name="theme-color" content="#712cf9">
        <!-- Custom styles for this template -->
        <link href="{{ asset('assets/css/sticky-footer-navbar.css') }}" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">

        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Fixed navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row">
                    <div class="col-sm-6" style="text-align: left">
                        <button type="button" class="btn btn-success" id="createtask">CREATE PROJECT</button>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <button type="button" class="btn btn-success" id="createproject">CREATE TASK</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="list list-row card" id="grid" data-sortable-id="0" aria-dropeffect="move" onclick="currentOrder();">
                                @foreach($tasks as $task)
                                <div class="list-item" data-id="13" id="{{'task'.$task->order}}" data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false" style="">
                                    <div><a href="#" data-abc="true"><span class="w-40 avatar gd-primary">{{mb_substr($task->project->name, 0, 1, 'utf-8')}}</span></a></div>
                                    <div class="flex">
                                        <a href="#" class="item-author text-color" data-abc="true">{{$task->project->name}}</a>
                                        <div class="item-except text-muted text-sm h-1x">{{$task->name}}</div>
                                    </div>
                                    <div class="no-wrap">
                                        <button type="button" class="btn btn-danger" id="{{'deletetask'.$task->id}}">DELETE</button>
                                    </div>
                                    <div class="no-wrap">
                                        <button type="button" class="btn btn-success" id="{{'edittask'.$task->id}}">EDIT</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>     
                </div>  
            </div>
        </div>

        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>


        <script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>