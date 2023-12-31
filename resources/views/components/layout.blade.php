<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style type="text/css">
        body {
            margin-top: 20px;
            background-image: linear-gradient(250deg, #ecd38d 0%, #ffbb00 100%);
        }

        main {
            background-image: linear-gradient(250deg, #ecd38d 0%, #ffbb00 100%);
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .avatar.sm {
            width: 2.25rem;
            height: 2.25rem;
            font-size: .818125rem;
        }

        .table-nowrap .table td,
        .table-nowrap .table th {
            white-space: nowrap;
        }

        .table-nowrap .table th {
            color: #F5B201;
        }

        .table>:not(caption)>*>* {
            padding: 0.75rem 1.25rem;
            border-bottom-width: 1px;
        }

        table th {
            font-weight: 600;
            background-color: #eeecfd !important;
        }

        .overflow-hidden>.card-header {
            background-image: linear-gradient(250deg, #1490E7 0%, #1920B0 100%);
            color: white;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <main>
        {{ $slot }}
    </main>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('js/bootstrap-datetimepicker.min.js') }}">
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('Danilo');
            $('#data_nascimento').mask('00/00/0000');
            $('#cep').mask('00000-000');
            $('#cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('#numero_rua').mask('00000', {
                reverse: true
            });
            $('#estado').mask('AA', {
                'translation': {
                    A: {
                        pattern: /[A-Za-z0-9]/
                    }
                }
            });
        });
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            console.log('Modal');
            console.log("#deleteModal".id);
            $("#deleteModal".id).modal('show');
            $("#deleteModal115").modal('show');
        });
    </script>
</body>

</html>
