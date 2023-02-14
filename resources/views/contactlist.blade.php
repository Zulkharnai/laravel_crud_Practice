@extends('layout')
@section('title', 'Contact List ')
@section('content')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    </head>

    <body>

        <h2>Contact List </h2>

        <table>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                {{-- <th>Massage</th> --}}
                <th>Action</th>
            </tr>
            @foreach ($data as $key => $data)
                <tr>
                    <td>{{ $data->contact_name }}</td>
                    <td>{{ $data->contact_email }}</td>
                    <td>{{ $data->contact_phone }}</td>
                    {{-- <td>{{$data->contact_massage}}</td> --}}
                    <td><a class="nav-link px-lg-3 py-3 py-lg-4" href="Edit/{{$data->contact_id}}">Edit</a><a
                            class="nav-link px-lg-3 py-3 py-lg-4" href="delete/{{$data->contact_id}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    @endsection
