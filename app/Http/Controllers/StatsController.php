<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Stats;	      // Eloquent ORM
use App\Models\Attraction;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//if (session()->get("rank") != 1) return redirect("/");
		
		$data['tmp'] = $this->qstring();
		
		$text1 = $request->input('text1');
		if (!$text1) $text1 = date("Y-m-d", strtotime("-1 month"));  // 오늘 기준 1달 전 날짜
		
		$text2 = $request->input('text2');
		if (!$text2) $text2 = date("Y-m-d");  // 오늘 날짜
		
		$text3 = $request->input('text3');
		
		$data['text1'] = $text1;
		$data['text2'] = $text2;
		$data['text3'] = $text3;
        $data['list'] = $this->getlist($text1, $text2, $text3);		// 자료 읽기
		
		
		$str_label="";
		$str_data="";
		foreach($this->get_group_list($text1, $text2) as $row) {
			$str_label .= "'$row->attraction_name',";
			$str_data .= $row->customer_sum . ',';
		}
		$data["str_label"] = $str_label;
		$data["str_data"] = $str_data;

		return view('stats.index', $data);	// 자료 표시
    }
	
	public function getlist($text1, $text2, $text3)
	{		
		$result = Stats::leftjoin('attractions','stats.attraction_id','=','attractions.id')->
			select('stats.*','attractions.name as attraction_name')->
			wherebetween( 'stats.run_day', array($text1,$text2) )->
			where('attractions.name', 'like', '%'. $text3. '%')->
			orderby('stats.run_day','desc')->
			paginate(5)->appends( ['text1'=>$text1,'text2'=>$text2,'text3'=>$text3] );
		return $result;
	}

	public function get_group_list($text1, $text2)
	{		
		$result = Stats::leftjoin('attractions','stats.attraction_id','=','attractions.id')->
			select('stats.attraction_id', 'attractions.name as attraction_name', DB::raw('sum(stats.customer_cnt) as customer_sum'))->
			wherebetween('stats.run_day', array($text1, $text2))->
			groupby('stats.attraction_id')->
			orderby('stats.run_day','desc')->
			limit(7)->paginate(-1);
			
		return $result;
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['tmp'] = $this->qstring();
		$data['list'] = $this->getlist_attraction();
        return view('stats.create', $data);
    }

	public function getlist_attraction()
	{
		$result = Attraction::select('id', 'name')
		->orderby('name')->get();
		
		return $result;
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Stats; 		// stats 모델변수 row 선언
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('stats' . $tmp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id	
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$data['tmp'] = $this->qstring();
        $data['row'] = $this->find_stats($id);
		return view('stats.show', $data);
    }

	public function find_stats($id)
	{		
		$result = Stats::leftjoin('attractions','stats.attraction_id','=','attractions.id')->
			select('stats.*','attractions.name as attraction_name')->
			where('stats.id', $id)->
			first();
		return $result;
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$data['tmp'] = $this->qstring();
        $data['row'] = Stats::find($id);  // 자료 찾기
		$data['list'] = $this->getlist_attraction();
		return view('stats.edit', $data);  // 수정화면 호출
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
		$row = Stats::find($id);
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('stats' . $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stats::find($id)->delete();
		
		$tmp = $this->qstring();
		return redirect('stats' . $tmp);
    }
	
	public function save_row(Request $request, $row) {		
		$row->run_day = $request->input("run_day");
		$row->attraction_id = $request->input("attraction_id");
		$row->customer_cnt = $request->input("customer_cnt");
		
		$row->save();			// 저장
	}
	
	public function qstring() {
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		
		return $tmp;
	}
}
