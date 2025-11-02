<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LGFE</title>
</head>
<body>

    <nav>
        <ul>
          
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li>
                <a href="">budget</a>
            </li>
            <li>
                <a href="{{route('expenses.create')}}">expenses</a>
            </li>
            <li>
                <a href="{{route('categories.create')}}">categories</a>
            </li>
            <li>
                <a href="{{route('incomes.create')}}">incomes</a>
            </li>

          <div class="connect">
            <ul>
                <li><a href="{{route('auth.login')}}">connexion</a></li>
            </ul>
          </div>
        </ul>

        @yield('content')
    </nav>
</body>
</html>