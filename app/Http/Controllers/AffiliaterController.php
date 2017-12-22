<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Helpers\StrHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliaterController extends Controller
{
    private $user;

    protected $strHelper;

    public function __construct(StrHelper $strHelper)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if (!$this->user->hasRole('admin'))
                return response('Access Denied', 403);

            return $next($request);
        });

        $this->strHelper = $strHelper;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $affiliates = Affiliate::orderBy('id', 'desc')->paginate(10);
        return view('dashboard/affiliates.index', compact('affiliates'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        do{
            $thrivecart_affiliate_id = $this->strHelper->generateRandomString();
        }while(Affiliate::where('thrivecart_affiliate_id', $thrivecart_affiliate_id)->exists());


        return view('dashboard/affiliates.add', compact('thrivecart_affiliate_id'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'invites_left' => 'required',
            'thrivecart_affiliate_id' => 'required',
        ]);

        Affiliate::create($request->all());

        return redirect()->route('affiliates.index');
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
        $affiliate = Affiliate::find($id);
        return view('dashboard/affiliates.edit', compact('affiliate'));
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
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'invites_left' => 'required',
            'thrivecart_affiliate_id' => 'required',
        ]);

        Affiliate::find($id)->update($request->all());

        return redirect()->route('affiliates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Affiliate::find($id)->delete();
        return redirect()->route('affiliates.index');
    }
}
