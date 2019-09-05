<?php

namespace App\Http\Controllers\User;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Auth;
use App\Http\Requests\User\DailyReportRequest;

class DailyReportController extends Controller
{

    private $dailyreport;

    public function __construct(DailyReport $instanceClass)
    {
        $this->middleware('auth');
        $this->dailyreport = $instanceClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailyreports = $this->dailyreport->getByUserId(Auth::id());
        return view('user.daily_report.index', compact('dailyreports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->dailyreport->fill($input)->save();
        return redirect()->to('report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dailyreport = $this->dailyreport->find($id);
        return view('user.daily_report.show', compact('dailyreport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dailyreport = $this->dailyreport->find($id);
        return view('user.daily_report.edit', compact('dailyreport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
        $dailyreport = $request->all();
        $this->dailyreport->find($id)->fill($dailyreport)->save();
        return redirect()->to('report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dailyreport->find($id)->delete();
        return redirect()->to('report');
    }
}
