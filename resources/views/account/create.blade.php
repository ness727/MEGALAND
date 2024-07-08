@include("head")

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    @include("top")
    <!-- end header section -->
  </div>

  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          회원 가입
        </h2>
      </div>

    <div class="service_container">
		
		<div class="card text-center my_container">		  
			<div class="card-body" style="margin-top: 20px;">
				<form name="form1" method="post" action="{{ route('account.store') }}{{ $tmp }}">
				@csrf
				@method('POST')
					<input type="hidden" name="visit_cnt" value="0"/>
					<table class="table table-sm table-bordered table-hover mymargin5" style="border-style: hidden;">
						<tr>
							<td class="mycolor2 my_table_color radius_top_left">이름</td>
							<td class="radius_top_right">
								<div class="fd-inline-flex">
									<input type="text" name="name" class="form-control form-control-sm input_top_right" value="{{ old('name') }}">
									<font color="red">@error('name') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">비밀번호</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="pwd" class="form-control form-control-sm" value="{{ old('pwd') }}">
									<font color="red">@error('pwd') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">나이</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="age" class="form-control form-control-sm" value="{{ old('age') }}">
									<font color="red">@error('age') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">전화번호</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="phone" class="form-control form-control-sm" value="{{ old('phone') }}" placeholder="ex) 010XXXXOOOO">
									<font color="red">@error('phone') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">등급</td>
							<td>
								<div class="fd-inline-flex">
									<select name="grade" class="form-select">
										<option value="" selected>선택하세요.</option>
										@foreach ($list as $row)
											@if ($row->id != 99)
												<option value="{{ $row->id }}">{{ $row->name }}</option>
											@else
												@if (session()->exists("phone") && session()->get("grade") == 99)
													<option value="{{ $row->id }}">{{ $row->name }}</option>
												@endif
											@endif
										@endforeach
									</select>
									<font color="red">@error('grade') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color radius_bottom_left">기타</td>
							<td class="radius_bottom_right">
								<div class="fd-inline-flex">
									<input type="text" name="etc" class="form-control form-control-sm input_bottom_right" value="{{ old('etc') }}">
								</div>
							</td>
						</tr>
					</table>
					
					<div align="center">
						<input type="submit" value="저장" class="btn hmycolor1 btn-success my_button button_radius">
						<!-- <input type="button" value="이전화면" class="btn btn-sm hmycolor1 btn btn-sm btn-primary"> -->
					</div>
				</form> 
			</div>
		  </div>
    </div>
	
	<div class="btn-box">
	@if (session()->exists("phone"))
		<a href="{{ route('account.index') }}{{ $tmp }}">
		  이전화면
		</a>
	@else
		<a href="/~sale13/one/public">
		  이전화면
		</a>
	@endif
	</div>
	
	</section>
	<!-- end service section -->

	<div class="footer_bg">

    <!-- contact section -->
    


    <!-- end contact section -->

	@include("bottom")


</body>

</html>