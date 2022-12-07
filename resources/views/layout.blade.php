<!DOCTYPE html>
<html>
<head>
    @yield('title');
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark justify-content-center mt-0 fixed-top">
    <div class="justify-content-start text-white font-weight-bold h4">M.H Hospital</div>
    <div class="container justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/home">MAIN</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('employees.index')}}">EMPLOYEES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('departments.index')}}">DEPARTMENTS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('rooms.index')}}">ROOMS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('patients.index')}}">PATIENTS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('bills.index')}}">BILLS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('medicines.index')}}">MEDICINES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('doses.index')}}">DOSES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('visits.index')}}">VISITS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('posts.index')}}">POSTS</a>
        </li>
    </ul>
    </div>
    <div class="d-flex justify-content-start text-success text-danger">
        <form method="post" action="/logout" >
            @csrf
            <button type="submit">logout</button>
        </form>
    </div>
</nav>
<div class="container mt-5">
    @yield('content')
    {{--Sweeeeeet Alert --}}
    <script>
        $(".delete").click(function (event) {

            let form = $(this).closest("form");
            event.preventDefault();
            // let $id = $(this).attr('data-id')
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this Record??",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire
                    (
                        'Deleted',
                    )
                } else
                    Swal.fire
                    (
                        'Canceled',
                    )
            })
        });

    </script>
</div>
</body>
</html>
