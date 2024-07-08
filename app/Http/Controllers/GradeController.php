<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Grade;	      // Eloquent ORM



class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//if (session()->get("rank") != 1) return redirect("/");
		
		$data['tmp'] = $this->qstring();
		
		$text1 = request('text1');
		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);		// 자료 읽기
		
		return view('grade.index', $data);	// 자료 표시
    }
	
	public function getlist($text1)
	{
		//$sql = 'select * from grades order by name';                    // Raw Query
		//$result = DB::select($sql);
		//$result = DB::table('grade')->orderby('name')->get();      // Query Builder
		if (session()->get("grade") == 99) {
			$result = Grade::where('name', 'like', '%'. $text1. '%')
				->orderby('id','asc')->paginate(5)->appends(['text1' => $text1]);
		}
		else {
			$result = Grade::where('name', 'like', '%'. $text1. '%')
				->where('id', '!=', 99)
				->orderby('id','asc')->paginate(5)->appends(['text1' => $text1]); 
		}
		
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
        return view('grade.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Grade; 		// grade 모델변수 row 선언
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('grade' . $tmp);
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
        $data['row'] = Grade::find($id);                      // Eloquent ORM
		return view('grade.show', $data);
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
        $data['row'] = Grade::find($id);  // 자료 찾기
		return view('grade.edit', $data);  // 수정화면 호출
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
		$row = Grade::find($id);
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('grade' . $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::find($id)->delete();
		
		$tmp = $this->qstring();
		return redirect('grade' . $tmp);
    }
	
	public function save_row(Request $request, $row) {
		$request->validate([
			'name' => 'required|max:20',
		],
		[
			'name.required' => '이름은 필수입력입니다.',
			'name.max' => '20자 이내로 입력해주세요.',
		]);
		$row->name = $request->input("name");
		
		$row->save();			// 저장
	}
	
	public function qstring() {
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		
		return $tmp;
	}
}
