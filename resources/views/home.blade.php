<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Snippet - BBBootstrap</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
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
        <style></style>
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
                        <button type="button" class="btn btn-success" id="createtask" data-toggle="modal" data-target="#exampleModal">CREATE PROJECT</button>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <button type="button" class="btn btn-success" id="createproject" data-toggle="modal" data-target="#exampleModal2">CREATE TASK</button>
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header float-right">
                        <h5>CREATE PROJECT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="save_project_form">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="project_name" name="project_name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="project_description" name="project_description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-10" id="save_project_validation">
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save_project">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2-->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header float-right">
                        <h5>CREATE TASK</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="save_task_form">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Project:</label>
                                <select class="form-select" aria-label="Default select example" id="project_id" name="project_id">
                                    <option selected>Select Project</option>
                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Priority:</label>
                                <select class="form-select" aria-label="Default select example" id="priority" name="priority">
                                    <option selected>Select Priority</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Sort Order:</label>
                                <input type="text" class="form-control" id="order" name="order" value="{{$order}}" readonly>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-10" id="save_task_validation">
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save_task">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
        <script src="{{ asset('assets/js/ajaxcalls.js') }}"></script>
    </body>
</html>