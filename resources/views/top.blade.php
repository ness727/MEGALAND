    <!-- header section strats -->
    <header class="header_section">
	
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
		
          <a class="navbar-brand" href="/~sale13/one/public" style="margin-left: 5%;">
            <span>
              MegaLand
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex flex-column flex-lg-row align-items-center ml-auto">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/~sale13/one/public">메인 <span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="{{route('stats.index')}}">통계</a>
                </li>
				<li class="nav-item">
					<a class="nav-link" href="{{route('attraction.index')}}">@if (session()->get("grade") == 1) 놀이기구 관리 @else 놀이기구 @endif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{route('grade.index')}}">@if (session()->get("grade") == 1) 등급 관리 @else 등급 @endif</a>
				</li>
				<!--
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('account.index') }}">회원</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('attraction.index') }}">놀이기구</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('grade.index') }}">등급</a>
                </li>
				-->
				@if (session()->get("grade") == 99)
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
							   role="button" data-bs-toggle="dropdown" aria-expanded="false">  
							기타 관리
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 1.2rem;">
							<li><a class="dropdown-item" href="{{route('account.index')}}">회원 조회</a></li>
						</ul>
					</li>
				@endif
				
				<li class="nav-item login">
					@if (!session()->exists("phone"))
						<a class="nav-link" href="" data-bs-toggle='modal' data-bs-target='#exampleModal'>Login</a>
					@else
						<a class="nav-link" href="{{ url('login/logout') }}">Logout</a>
					@endif
				</li>
				@if (!session()->exists("phone"))
					<li class="nav-item">
					  <a class="nav-link" href="{{ route('account.create') }}">회원 가입</a>
					</li>
				@endif
              </ul>
            </div>
          </div>
		  
        </nav>
      </div>
    </header>
    <!-- end header section -->
	
<!-- Login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="border-radius: 1.5rem;">

           <div class="modal-header mycolor1">
               <h5 class="modal-title" id="exampleModalLabel">Login</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>

           <div class="modal-body bg-light">
              <form name="form_login" method="post" action="{{ url('login/check') }}">
              @csrf
				  <table class="table table-borderless mymargin5">					  
					  <div class="form-group">
						<label for="exampleInputEmail1">전화번호</label>
						<input type="email" class="form-control" name="phone" aria-describedby="phoneHelp" placeholder="Phone">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">비밀번호</label>
						<input type="password" class="form-control" name="pwd" id="exampleInputPassword1" placeholder="Password">
					  </div>
				  </table>
              </form>
          </div>

          <div class="modal-footer alert-secondary radius_bottom_left radius_bottom_right">
              <button type="button" class="btn btn-sm btn-secondary button_radius" onclick="javascript:form_login.submit();">확인</button>
              <button type="button" class="btn btn-sm btn-light button_radius" data-bs-dismiss="modal">닫기</button>
          </div>
       </div>
   </div>
</div>
