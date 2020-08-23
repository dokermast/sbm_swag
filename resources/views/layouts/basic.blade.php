<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Shipment</title>
</head>
<body>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container-fluid text-center" style="background-color: #6c757d;">
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
        THIS PROJECT DESCRIPTION
    </button>
</div>

<div class="text-center" style="background-color: #6c757d; color: white;"><h2>Shipment Service</h2></div>

@yield('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                в Вашем АПИ отстутствуют необходимые для выполнения задания энд-поинты.
                в частности нужны:
                <br>
                - енд-поинт для получения всех Items
                <br>
                - енд-поинт для получения всех Items по shipment_id
                <br>
                Если я правильно понял структуру Вашего АПИ, то там должны быть сущности Shipment и  Item,
                и между ними должна быть связь "многие-ко-многим" через дополнительную таблицу
                <br>
                ТЗ сделано в MVC паттерне, если нужно, могу переделать на одностраничник с  Ajax-запросами
                <br>
                ссылка на Гит Этого проекта <a class="btn btn-outline-secondary" href="https://github.com/dokermast/sbm_swag.git" target="_blank" >Test Task GIT Link</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
