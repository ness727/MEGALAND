<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Account;	      // Eloquent ORM
use App\Models\Grade;


class AccountController extends Controller
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
		
		return view('account.index', $data);	// 자료 표시
    }
	
	public function getlist($text1)
	{
		$result = Account::leftjoin('grades','accounts.grade_id','=','grades.id')->
			select('accounts.*','grades.name as grade_name')->
			where('accounts.name', 'like', '%'. $text1. '%')->
			orderby('accounts.name','desc')->
			paginate(5)->appends( ['text1'=>$text1] );
			
		return $result;
	}

	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['list'] = $this->getlist_grade();
		$data['tmp'] = $this->qstring();
        return view('account.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Account; 		// account 모델변수 row 선언
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		if (session()->exists('phone'))
			return redirect('account' . $tmp);
		else
			return view('main');
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
        $data['row'] = $this->find_account($id);                      // Eloquent ORM
		return view('account.show', $data);
    }

	public function find_account($id)
	{
		$result = Account::leftjoin('grades','accounts.grade_id','=','grades.id')->
			select('accounts.*','grades.name as grade_name')->
			where('accounts.id', $id)->
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
		$data['list'] = $this->getlist_grade();
		$data['tmp'] = $this->qstring();
        $data['row'] = Account::find($id);  // 자료 찾기
		return view('account.edit', $data);  // 수정화면 호출
    }

	function getlist_grade()
	{
		$result=Grade::orderby('id')->get();
		return $result;
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
		$row = Account::find($id);
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('account' . $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Account::find($id)->delete();
		
		$tmp = $this->qstring();
		return redirect('account' . $tmp);
    }
	
	public function save_row(Request $request, $row) {
		$request->validate([
			'name' => 'required|max:20',
			'pwd' => 'required|max:20',
			'age' => 'required|max:200',
			'phone' => 'required|max:11',
			'grade' => 'required'
		],
		[
			'name.required' => '이름은 필수입력입니다.',
			'pwd.required' => '암호는 필수입력입니다.',
			'age.required' => '나이는 필수입력입니다.',
			'phone.required' => '전화번호는 필수입력입니다.',
			'grade.required' => '등급은 필수입력입니다.',
			'name.max' => '20자 이내로 입력해주세요.',
			'age.max'  => '20자 이내로 입력해주세요.',
			'pwd.max' => '20자 이내로 입력해주세요.',
			'phone.max' => '11자 이내로 입력해주세요.'
		]);
		
		/*$tel1= $request->input("tel1");
		$tel2= $request->input("tel2");
		$tel3= $request->input("tel3");
		$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);	// 전화번호 합치기
		*/
		
		$row->name = $request->input("name");
		$row->pwd = $request->input("pwd");
		$row->age = $request->input("age");
		$row->phone = $request->input("phone");
		$row->visit_cnt = $request->input("visit_cnt");
		$row->grade_id = $request->input("grade");
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
