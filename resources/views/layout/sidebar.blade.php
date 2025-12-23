<!-- Hamburger Menu Button -->
<div class="sidebar-toggle">
    <span>&#9776;</span> <!-- icône hamburger -->
</div>

<div class="sidebar responsive-sidebar">

    <div class="brand">FINANCE PRO</div>

    <ul class="menu">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('incomes.index') }}">Revenus</a></li>
        <li><a href="{{ route('expenses.index') }}">Depenses</a></li>
        <li><a href="{{ route('categories.create') }}">Categories</a></li>
        <li><a href="{{ route('budget.index') }}">Budgets</a></li>
        {{-- Option admin
        @if(auth()->user()->role === 'admin')
            <li><a href="{{ route('employee.index') }}">Employees</a></li>
        @endif --}}
    </ul>

</div>
