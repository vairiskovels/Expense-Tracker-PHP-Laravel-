@extends('layouts.main')

@section('title', 'Track you expenses')
@section('content')

<body id="history" class="main-body">
    @extends('layouts.navbar')

    <main id="history-section" class="main">
        <div class="section-header">
            <h2>Expenses</h2>
            <form action="{{ url('/history') }}" method="POST" id="search-form">
                @csrf
                <div class="input-field">
                    <select name="search" id="search-select">
                        <option selected disabled value="0">Search by</option>
                        <option value="1">Name</option>
                        <option value="2">Category</option>
                        <option value="3">Date</option>
                        <option value="4">Price</option>
                    </select>
                </div>
                <div class="input-field">
                    <input type="text" class="show search-input" disabled>
                    <input type="text" name="searchName" id="name-search" placeholder="Name" class="hide search-input">
                    <select name="searchCategory" id="select-search" class="hide search-input">
                        <option selected disabled>Select</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                    <input type="date" name="searchDate" id="date-search" class="hide search-input" placeholder="Date">
                    <input type="text" name="searchPrice" id="price-search" class="hide search-input" placeholder="Price (€)">
                </div>
                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
        <div class="expenses-table-wrap">
        <table class="expenses">
                <thead>
                    <tr class="table-head">
                        <th>Name</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>                                                                                                                
                <tbody>
                    @foreach ($query as $expense)
                    <tr>
                        <td class="expense-name">{{$expense->name}}</td>
                        <td class="expense-cat"><i class="fa-solid {{$expense->icon_name}}"></i> {{$expense->type_name}}</td>
                        <td class="expense-date">{{date('d/m/Y', strtotime($expense->date));}}</td>
                        <td class="expense-price">{{$expense->price}}€</td>
                        <td class="edit-btn"><a href="/edit-record/{{$expense->id}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn">
                            <form method="POST" action='/delete-record/{{$expense->id}}'>
                                @csrf
                                <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <script>
        const searchSelect = document.getElementById("search-select");
        let option2 = searchSelect.addEventListener('change', changeSearchField);
        const searchInputs = document.getElementsByClassName("search-input");

        function changeSearchField(e) {
            const v = e.target.value;

            searchInputs[v].classList.replace("hide" , "show");
            for ($i = 0; $i < searchInputs.length; $i++) {
                if ($i != (v)) {
                    searchInputs[$i].classList.replace("show" , "hide");
                }
            }
        }
    </script>
</body>
@endsection