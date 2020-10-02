<!DOCTYPE html>
<html lang="ru">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="edugid.ru">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('keywords')
@yield('description')
<meta name="csrf-token" content="{{ csrf_token() }}">
<base href="{{ route('main') }}">
<!-- SITE TITLE -->
@yield('title')
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
@section('head-styles')
@show
<script>
    window.testtask = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
@section('head-scripts')
@show
</head>

<body>

<section class='text-center'>
    <h1>Заказы</h1>
</section>

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6">
                <form method='GET' action='{{route("main")}}'>
                    <h2>Поиск по имени</h2>
                    <label>
                        <input type='text' value='' name='search'/>
                        <input type='submit' value='НАЙТИ'/>
                    </label>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3"><strong>Имя</strong></div>
            <div class="col-3"><strong>Фамилия</strong></div>
            <div class="col-3"><strong>Телефон</strong></div>
            <div class="col-3"><strong>Страна</strong></div>

            @foreach($orders as $order)
                <div class="col-3">
                    {{ $order->name }}
                </div>
                <div class="col-3">
                    {{ $order->lastname }}
                </div>
                <div class="col-3">
                    {{ $order->phone }}
                </div>
                <div class="col-3">
                    {{ $order->country }}
                </div>
            @endforeach
            
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-2 mb-5 mt-md-3">
            {{ $orders->appends(request()->query())->links('pagination') }}
        </div>
    </div>
</section>



@section('bottom-scripts')
@show
</body>
</html>