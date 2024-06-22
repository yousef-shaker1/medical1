<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Navbar Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">متجر إلكتروني</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @can('الرئيسية')
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">الرئيسية</a>
                </li>
                @endcan
                
                @can('المدن')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('city.index') }}">المدن</a>
                </li>
                @endcan
                @can('الخدمات')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services.index') }}">الخدمات</a>
                </li>
                @endcan
                @can('الطلبات')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.index') }}">الاوردر</a>
                </li>
                @endcan

                @can('صلاحيات المستخدمين')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">صلاحيات المستخدمين</a>
                </li>
                @endcan
                @can('قائمة المستخدمين')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">المستخدمين</a>
                </li>
                @endcan
            </ul>
            <form method="POST" action="/logout" class="d-flex">
                @csrf
                <button class="btn btn-outline-light" type="submit">تسجيل الخروج</button>
            </form>
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
 