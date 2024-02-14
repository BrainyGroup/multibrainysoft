<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Tenant;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
              //TODO identify tenant and put it in log and audit trail
      //TODO refactor and use event for log and audit trail
     try{  
    

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        // $this->authorize('viewAny', Dashboard::class);
        // Log::info($this->company()->name.': Start bank index');


        return Inertia::render('Dashboard/Index', compact('translations'));

        // return Inertia::render('Dashboard/Index',  [
        //   'translations' => $translations,
        //   'filters' => Req::all('search', 'trashed'),
          
        //   'banks' => Bank::query()->where('company_id', $this->company()->id)
        //       ->orderByName()
        //       ->filter(Req::only('search', 'trashed'))
        //       ->paginate(10)
        //       ->withQueryString()
        //       ->through(fn ($bank) => [
        //           'id' => $bank->id,
        //           'name' => $bank->name,
        //           'description' => $bank->description,                 
        //           'deleted_at' => $bank->deleted_at,
        //       ]),
        //  ]);        

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::info($this->company()->name.': End bank index');

        $errorTime = Carbon::now();

        return redirect()->back()

        ->with('error', $e->getMessage());
      }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
