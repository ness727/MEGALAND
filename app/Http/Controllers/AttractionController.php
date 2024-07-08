<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Attraction;	      // Eloquent ORM
use Image;

class AttractionController extends Controller
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
		
		return view('attraction.index', $data);	// 자료 표시
    }
	
	public function getlist($text1)
	{
		$result = Attraction::where('name', 'like', '%'. $text1. '%')
			->orderby('name','asc')->paginate(5)->appends(['text1' => $text1]);
			
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
        return view('attraction.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Attraction; 		// attraction 모델변수 row 선언
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('attraction' . $tmp);
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
        $data['row'] = Attraction::select('*')->
								where('id', '=', $id)
								->first();
		return view('attraction.show', $data);
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
        $data['row'] = Attraction::find($id);  // 자료 찾기
		return view('attraction.edit', $data);  // 수정화면 호출
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
		$row = Attraction::find($id);
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('attraction' . $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attraction::find($id)->delete();
		
		$tmp = $this->qstring();
		return redirect('attraction' . $tmp);
    }
	
	public function save_row(Request $request, $row) {
		$request->validate([
			'name' => 'required|max:50',
			'start_time1' => 'required|numeric|max:23',
			'start_time2' => 'required|numeric|max:59',
			'end_time1' => 'required|numeric|max:23',
			'end_time2' => 'required|numeric|max:59',
			'capacity' => 'required'
		],
		[
			'name.required' => '이름은 필수입력입니다.',
			'start_time1.required' => '시작 시간1은 필수입력입니다.',
			'start_time2.required' => '시작 시간2는 필수입력입니다.',
			'end_time1.required' => '종료 시간1은 필수입력입니다.',
			'end_time2.required' => '종료 시간2는 필수입력입니다.',
			'capacity.required' => '정원은 필수입력입니다.',
			
			'name.max' => '50자 이내로 입력해주세요.',
			'start_time1.max' => '23 이내로 입력해주세요.',
			'start_time2.max' => '59 이내로 입력해주세요.',
			'end_time1.max' => '23 이내로 입력해주세요.',
			'end_time2.max' => '59 이내로 입력해주세요.'
		]);
		
		$row->name = $request->input("name");
		$row->age_limit = $request->input("age_limit");
		$row->start_time = $request->input("start_time1") . ":" . $request->input("start_time2");
		$row->end_time = $request->input("end_time1") . ":" . $request->input("end_time2");
		$row->capacity = $request->input("capacity");
		if ($request->hasFile('picture'))	         // upload할 파일이 있는 경우
		{
			$pic = $request->file('picture');
			$pic_name = $pic->getClientOriginalName();             // 파일이름
			$pic->storeAs('public/attraction_imgs', $pic_name);        // 파일저장
			
			$img = Image::make($pic)
					->resize(null, 200, function($constraint) { $constraint->aspectRatio(); })
					->save('storage/attraction_imgs/thumb/' . $pic_name);
			
			$row->picture = $pic_name;                     // pic 필드에 파일이름 저장
		}
		$row->etc = $request->input("etc");
		
		$row->save();			// 저장
	}
	
	public function qstring() {
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		
		return $tmp;
	}
}
