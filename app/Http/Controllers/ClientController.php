<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Helpers\ExceptionHelper;
use App\Exceptions\ErrorException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\SuccessException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    public $title = 'clients';
    public $parent_menu = 'resources';

    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('password');
    }


    public function index()
    {
        $client_types = DB::SELECT('SELECT * FROM client_type');
        $client_cities = DB::SELECT('SELECT * FROM client_city');
        $client_districts = DB::SELECT('SELECT * FROM client_district');
        $client_genders = DB::SELECT('SELECT * FROM client_gender');
        $client_invalids = DB::SELECT('SELECT * FROM client_invalid');
        $client_conclusions = DB::SELECT('SELECT * FROM client_conclusion');
        $client_financial_statuses = DB::SELECT('SELECT * FROM client_financial_status');
        $client_current_statuses = DB::SELECT('SELECT * FROM client_current_status');
        $donors = DB::SELECT('SELECT * FROM donor');

        $menu[$this->parent_menu][$this->title] = true;

        return view(strtolower($this->title).'.view')
            ->with('client_types', $client_types)
            ->with('client_cities', $client_cities)
            ->with('client_districts', $client_districts)
            ->with('client_genders', $client_genders)
            ->with('client_invalids', $client_invalids)
            ->with('client_conclusions', $client_conclusions)
            ->with('client_financial_statuses', $client_financial_statuses)
            ->with('client_current_statuses', $client_current_statuses)
            ->with('donors', $donors)
            ->with('menu', $menu) 
            ->with('page_title',ucwords(str_replace("-", " ", $this->parent_menu)));
    }

    public function clientList(Request $request)
    {
        $client = Client::query();
        $client->select(
            'client.*',
            'client_type.name AS client_type',
            'client_district.name AS client_district',
            'client_city.name AS client_city',
            'client_gender.name AS client_gender',
            'client_invalid.name AS client_invalid',
            'client_conclusion.name AS client_conclusion',
            'client_financial_status.name AS client_financial_status',
            'client_current_status.name AS client_current_status',
            'donor.name AS donor'
            
        )
      ->leftJoin('client_type', 'client.client_type_id', '=', 'client_type.id')
               ->leftJoin('client_district', 'client.client_district_id', '=', 'client_district.id')
               ->leftJoin('client_city', 'client.client_city_id', '=', 'client_city.id')
               ->leftJoin('client_gender', 'client.client_gender_id', '=', 'client_gender.id')
               ->leftJoin('client_invalid', 'client.client_invalid_id', '=', 'client_invalid.id')
               ->leftJoin('client_conclusion', 'client.client_conclusion_id', '=', 'client_conclusion.id')
               ->leftJoin('client_financial_status', 'client.client_financial_status_id', '=', 'client_financial_status.id')
               ->leftJoin('donor', 'client.donor_id', '=', 'donor.id')
               ->leftJoin('client_current_status', 'client.client_current_status_id', '=', 'client_current_status.id');

        return DataTables::of($client->get())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client_types = DB::SELECT('SELECT * FROM client_type');
        $client_cities = DB::SELECT('SELECT * FROM client_city');
        $client_districts = DB::SELECT('SELECT * FROM client_district');
        $client_genders = DB::SELECT('SELECT * FROM client_gender');
        $client_invalids = DB::SELECT('SELECT * FROM client_invalid');
        $client_conclusions = DB::SELECT('SELECT * FROM client_conclusion');
        $client_financial_statuses = DB::SELECT('SELECT * FROM client_financial_status');
        $client_current_statuses = DB::SELECT('SELECT * FROM client_current_status');
        $donors = DB::SELECT('SELECT * FROM donor');

        $menu[$this->parent_menu][$this->title] = true;

        return view(strtolower($this->title).'.add_edit')
        ->with('client_types', $client_types)
        ->with('client_cities', $client_cities)
        ->with('client_districts', $client_districts)
        ->with('client_genders', $client_genders)
        ->with('client_invalids', $client_invalids)
        ->with('client_conclusions', $client_conclusions)
        ->with('client_financial_statuses', $client_financial_statuses)
        ->with('client_current_statuses', $client_current_statuses)
        ->with('donors', $donors)
        ->with('action', 'add')
        ->with('menu', $menu);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $item = new Client();
            $item->name = $request->name;
            $item->last_name = $request->last_name;
            $item->client_type_id = $request->client_type_id;
            $item->client_district_id = $request->client_district_id;
            $item->client_city_id = $request->client_city_id;
            $item->client_gender_id = $request->client_gender_id;
            $item->client_invalid_id = $request->client_invalid_id;
            $item->client_conclusion_id = $request->client_conclusion_id;
            $item->client_financial_status_id = $request->client_financial_status_id;
            $item->client_current_status_id = $request->client_current_status_id;
            $item->donor_id = $request->donor_id;
            $item->date_birth = $request->date_birth;
            $item->date_take = $request->date_take;
            $item->date_stop = $request->date_stop;
            $item->stop_reason = $request->stop_reason;
            $item->social_score = $request->social_score;
            $item->personal_id = $request->personal_id;
            $item->physical_address = $request->physical_address;
            $item->contact_person = $request->contact_person;
            $item->phone = $request->phone;
            $item->diagnosis = $request->diagnosis;
            $item->comment = $request->comment;
            $item->save();
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }

            return Redirect::route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client_types = DB::SELECT('SELECT * FROM client_type');
        $client_cities = DB::SELECT('SELECT * FROM client_city');
        $client_districts = DB::SELECT('SELECT * FROM client_district');
        $client_genders = DB::SELECT('SELECT * FROM client_gender');
        $client_invalids = DB::SELECT('SELECT * FROM client_invalid');
        $client_conclusions = DB::SELECT('SELECT * FROM client_conclusion');
        $client_financial_statuses = DB::SELECT('SELECT * FROM client_financial_status');
        $client_current_statuses = DB::SELECT('SELECT * FROM client_current_status');
        $donors = DB::SELECT('SELECT * FROM donor');
        
        $item = Client::find($id);
        

        $menu[$this->parent_menu][$this->title] = true;

        return view(strtolower($this->title).'.add_edit')
            ->with('client_types', $client_types)
            ->with('client_cities', $client_cities)
            ->with('client_districts', $client_districts)
            ->with('client_genders', $client_genders)
            ->with('client_invalids', $client_invalids)
            ->with('client_conclusions', $client_conclusions)
            ->with('client_financial_statuses', $client_financial_statuses)
            ->with('client_current_statuses', $client_current_statuses)
            ->with('donors', $donors)
            ->with('menu', $menu) 
            ->with('item', $item)
            ->with('action', 'edit');
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
        $item = Client::find($id);
        $item->name = $request->name;
        $item->last_name = $request->last_name;
        $item->client_type_id = $request->client_type_id;
        $item->client_district_id = $request->client_district_id;
        $item->client_city_id = $request->client_city_id;
        $item->client_gender_id = $request->client_gender_id;
        $item->client_invalid_id = $request->client_invalid_id;
        $item->client_conclusion_id = $request->client_conclusion_id;
        $item->client_financial_status_id = $request->client_financial_status_id;
        $item->client_current_status_id = $request->client_current_status_id;
        $item->donor_id = $request->donor_id;
        $item->date_birth = $request->date_birth;
        $item->date_take = $request->date_take;
        $item->date_stop = $request->date_stop;
        $item->stop_reason = $request->stop_reason;
        $item->social_score = $request->social_score;
        $item->personal_id = $request->personal_id;
        $item->physical_address = $request->physical_address;
        $item->contact_person = $request->contact_person;
        $item->phone = $request->phone;
        $item->diagnosis = $request->diagnosis;
        $item->comment = $request->comment;
        $item->save();

        return Redirect::route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $item = Client::find($id);

            $item->delete();
            throw new SuccessException;
        }
        catch(Exception $e){
             return ExceptionHelper::toResponse($e);
             }
    }
}
