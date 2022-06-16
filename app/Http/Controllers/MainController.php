<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Expense;
use Carbon\Carbon;
use Validator;
use Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {   // Check is user logged in
            $expenses = Expense::select([
                'expenses.name',
                'expenses.price',
                'expenses.date',
                'types.name as type_name',
                'types.icon_name as icon_name'
            ])
            ->join('types', 'types.id', '=', 'expenses.type_id')
            ->where('user_id', auth()->user()->id)
            ->orderByRaw('expenses.date DESC, expenses.name ASC')
            ->get();
            
            $categories = DB::select("SELECT types.id as id, types.name as name, types.icon_name as icon_name, SUM(expenses.price) as price, colors.color_code as color_code
                                    FROM types
                                    LEFT JOIN expenses on types.id = expenses.type_id AND expenses.user_id = ? AND MONTH(expenses.date) = ?
                                    JOIN colors on types.color_id = colors.id
                                    GROUP BY types.id
                                    ORDER BY SUM(expenses.price) desc", [auth()->user()->id, Carbon::now()->month]);

            $total = DB::select("SELECT SUM(price) as price
                                FROM expenses
                                WHERE user_id = ? AND MONTH(expenses.date) = ?", [auth()->user()->id, Carbon::now()->month]);

            return view('index', compact('expenses', 'categories'))->with(['total' => $total]);
        } else {
            return view('login');
        }
    }
    public function login()
    {
        return view('login');
    }

    public function auth(Request $request) {
        $this->validate($request, [
            'username'      => 'required',
            'password'      => 'required'
        ]);
        
        $user_data = array(
            'username'      => $request->get('username'),
            'password'      => $request->get('password')
        );

        if(Auth::attempt($user_data)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('message', 'The username or password is incorrect.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    function create()
    {
        $types = Type::all();
        return view('add', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'type'      => 'required|numeric',
            'name'      => 'required|max:50',
            'price'      => 'required|numeric|min:0.01',
            'date'      => 'required|date|max:'.(date('Y'))
        ]);

        $expense = new Expense();
        $expense->type_id = $request->get('type');
        $expense->user_id = auth()->user()->id;
        $expense->name = ucfirst($request->name);
        $expense->price = $request->price;
        $expense->date = Carbon::parse($request->date);
        $expense->save();
        return redirect('/add')->with('message', "'".ucfirst($request->name)."' has succesfully been added to the list.");
    }

    public function category($id) {
        $category = DB::select("SELECT types.name as name, SUM(price) as price, MONTH(date) as month, colors.color_code as color
                                FROM expenses
                                JOIN types on expenses.type_id = types.id
                                JOIN colors on types.color_id = colors.id
                                WHERE types.name = ? AND YEAR(expenses.date) = ? AND expenses.user_id = ?
                                GROUP BY MONTH(expenses.date), name, color
                                ORDER BY MONTH(expenses.date) ASC", [$id, Carbon::now()->year, auth()->user()->id]);
        return view('categories', compact('category'));
    }

    public function reports() {
        $byMonth = DB::select("SELECT MONTH(date) as month, SUM(price) as price 
                                FROM expenses
                                WHERE user_id = ?
                                GROUP BY MONTH(date)", [auth()->user()->id]);

        $byCategory = DB::select("SELECT types.name as name, SUM(price) as price, MONTH(date) as month, colors.color_code as color
                                FROM expenses
                                JOIN types on expenses.type_id = types.id
                                JOIN colors on types.color_id = colors.id
                                WHERE YEAR(expenses.date) = ? AND expenses.user_id = ?
                                GROUP BY MONTH(expenses.date), name, color
                                ORDER BY MONTH(expenses.date) ASC", [Carbon::now()->year, auth()->user()->id]);
        $top10 = DB::select("SELECT expenses.name as name, expenses.price as price, colors.color_code as color
                            FROM expenses
                            JOIN types on expenses.type_id = types.id
                            JOIN colors on types.color_id = colors.id
                            WHERE MONTH(expenses.date) = ? AND expenses.user_id = ?
                            ORDER BY expenses.price DESC
                            LIMIT 10", [Carbon::now()->month, auth()->user()->id]);
        return view('reports', compact('byMonth', 'byCategory', 'top10'));
    }

    public function history(Request $request) {
        $search = $request->search;
        $sort = $request->sort;
        if ($sort == 'category') {
            $sort = 'type_id';
        }
        $order = $request->order;
        $types = Type::all();
        $expenses = Expense::select([
            'expenses.id',
            'expenses.name',
            'expenses.price',
            'expenses.date',
            'types.name as type_name',
            'types.icon_name as icon_name'
        ])
        ->join('types', 'types.id', '=', 'expenses.type_id')
        ->where('user_id', auth()->user()->id);
        
        if ($search == 1){
            if ($request->searchName != null) {
                $expenses->where('expenses.name', 'like', '%'.$request->searchName.'%')->get();
            }
        }
        else if ($search == 2){
            if ($request->searchCategory != null) {
                $expenses->where('expenses.type_id', $request->searchCategory);
            }
        }
        else if ($search == 3){
            if ($request->searchDate != null) {
                $expenses->where('expenses.date', Carbon::parse($request->searchDate));
            }
        }
        else if ($search == 4){
            if ($request->searchPrice != null) {
                if ($request->chbx == '1') {
                    $expenses->where('expenses.price', '<=',$request->searchPrice)->orderByRaw('expenses.date DESC, expenses.price DESC');
                }
                else {
                    $expenses->where('expenses.price', '>=',$request->searchPrice)->orderByRaw('expenses.date DESC, expenses.price DESC');
                }
            }
        }

        if ($sort != null) {
            $query = $expenses->orderByRaw('expenses.'.$sort.' '.$order)->get();
        }
        else {
            $query = $expenses->orderByRaw('expenses.date DESC, expenses.name ASC')->get();
        }
        $searchBy = ['1'=>'Name', '2'=>'Category', '3'=>'Date', '4'=>'Price'];

        return view('history', compact('query', 'types', 'order', 'search', 'searchBy'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRecord($id)
    { 

        $checkId = Expense::select(['*'])
                    ->where('expenses.id', $id)
                    ->get();

        $types = Type::all();
        $record = Expense::select([
            'expenses.id',
            'expenses.name',
            'expenses.price',
            'expenses.date',
            'types.name as type_name',
            'types.id as type_id'
        ])
        ->join('types', 'types.id', '=', 'expenses.type_id')
        ->where('expenses.id', $id)
        ->where('user_id', auth()->user()->id)
        ->get();

        return view('edit-record', compact('types', 'record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRecord(Request $request)
    {
        $this->validate($request, [
            'type'      => 'required|numeric',
            'name'      => 'required|max:50',
            'price'      => 'required|numeric|min:0.01',
            'date'      => 'required|date|max:'.(date('Y'))
        ]);

        $expense = Expense::find($request->get('id'));
        $expense->type_id = $request->get('type');
        $expense->user_id = auth()->user()->id;
        $expense->name = ucfirst($request->name);
        $expense->price = $request->price;
        $expense->date = Carbon::parse($request->date);
        $expense->save();
        return redirect('/history');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::where('id', $id)->where('user_id', auth()->user()->id)->delete();
        return redirect('/history');
    }
}
