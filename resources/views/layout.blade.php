<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    @yield('title');
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark justify-content-center mt-0">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">MAIN</a>
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
    </ul>
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
    {{--Sweeeeeet Alert --}}
</div>

</body>
</html>
