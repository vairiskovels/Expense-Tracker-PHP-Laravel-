@extends('layouts.main')

@section('title', 'Track you expenses')
@section('content')

<body id="history" class="main-body">
    @extends('layouts.navbar')

    <main id="history-section" class="main">
        <div class="section-header">
            <h2>Expenses</h2>
            <form action="#" id="search-form">
                <div class="input-field">
                    <select name="search" id="search-select">
                        <option selected disabled>Search by</option>
                        <option value="1">Name</option>
                        <option value="2">Category</option>
                        <option value="3">Date</option>
                        <option value="4">Price</option>
                    </select>
                </div>
                <div class="input-field">
                    <input type="text" name="" id="" placeholder="Name" class="show search-input">
                    <select name="searchValue" id="" class="hide search-input">
                        <option selected disabled>Select</option>
                        <option value="1">Name</option>
                        <option value="2">Category</option>
                        <option value="3">Date</option>
                        <option value="4">Amount</option>
                    </select>
                    <input type="date" name="searchValue" id="" class="hide search-input" placeholder="Date">
                    <input type="text" name="searchValue" id="" class="hide search-input" placeholder="Price">
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
                    @foreach ($expenses as $expense)
                    <tr>
                        <td class="expense-name">{{$expense->name}}</td>
                        <td class="expense-cat"><i class="fa-solid {{$expense->icon_name}}"></i> {{$expense->type_name}}</td>
                        <td class="expense-date">{{date('d/m/Y', strtotime($expense->date));}}</td>
                        <td class="expense-price">{{$expense->price}}€</td>
                        <td class="edit-btn"><a href="/edit-record/{{$expense->id}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
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

            searchInputs[v-1].classList.replace("hide" , "show");
            for ($i = 0; $i < searchInputs.length; $i++) {
                if ($i != (v-1)) {
                    searchInputs[$i].classList.replace("show" , "hide");
                }
            }
        }
    </script>
</body>
@endsection