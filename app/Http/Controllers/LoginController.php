<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Account;

class LoginController extends Controller
{
    public function check() {
		$uid = request('phone');
		$pwd = request('pwd');
		
		//입력한 아이디, 암호의 직원 정보 조사
		$row = Account::select('*', DB::raw('`grade_id` as `grade`'))
						->where('phone', '=', $uid)
						->where('pwd', '=', $pwd)
						->first();
		if ($row) {
			session()->put('phone', $row->phone);  //세션으로 저장
			session()->put('name', $row->name);
			session()->put('grade', $row->grade);
		}
		
		return view('main');
	}
	
	public function logout() {
		session()->forget('phone');
		session()->forget('name');
		session()->forget('grade');
		
		return view('main');
	}
}
