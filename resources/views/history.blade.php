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
                    <select name="" id="">
                        <option selected disabled>Category</option>
                    </select>
                </div>
                <div class="input-field">
                    <input type="text" name="" id="" placeholder="Name">
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
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"><i class="fa-solid fa-bus"></i> Transport</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"> <i class="fa-solid fa-file-invoice-dollar"></i> Bills</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"><i class="fa-solid fa-basket-shopping"></i> Groceries</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"><i class="fa-solid fa-shirt"></i> Clothes</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"><i class="fa-solid fa-burger"></i> Snacks</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"><i class="fa-solid fa-staff-aesculapius"></i> Wellbeing</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"><i class="fa-solid fa-film"></i> Entertainment</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"><i class="fa-solid fa-shirt"></i> Clothes</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <tr>
                        <td class="expense-name">Test</td>
                        <td class="expense-cat"><i class="fa-solid fa-basket-shopping"></i> Groceries</td>
                        <td class="expense-date">01/02/22</td>
                        <td class="expense-price">123€</td>
                        <td class="edit-btn"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="delete-btn"><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
@endsection