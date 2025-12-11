<div class="sidebar">

    <div class="brand">FINANCE PRO</div>

    <ul class="menu">

        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

        <li><a href="{{ route('incomes.index') }}">Incomes</a></li>
        <li><a href="{{ route('expenses.index') }}">Expenses</a></li>
        <li><a href="{{ route('categories.create') }}">Categories</a></li>
        <li><a href="{{ route('budget.index') }}">Budgets</a></li>

        {{-- @if(auth()->user()->role === 'admin')
            <li><a href="{{ route('employee.index') }}">Employees</a></li>
        @endif --}}
{{-- 
        <li><a href="{{ route('settings.index') }}">Settings</a></li> --}}
    </ul>

</div>
