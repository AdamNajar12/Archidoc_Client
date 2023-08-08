<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
            max-width: 800px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: normal; /* Enlever le fond en gras */
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            list-style: none;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            padding: 8px 15px;
            border: 1px solid #ddd;
            background-color: #f5f5f5;
            color: #333;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #ddd;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Type d'intervention</th>
                    <th>Statut</th>
                    <th>Date demandée</th>
                    <th>Code client</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->type_intervention }}</td>
                        <td>{{ $ticket->statut }}</td>
                        <td>{{ $ticket->date_demande }}</td>
                        <td>{{ $ticket->code_client }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-12 text-center">
        <ul class="pagination pager" id="myPager"></ul>
    </div>
</div>

</body>
</html>
