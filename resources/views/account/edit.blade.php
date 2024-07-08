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
          회원 정보 수정
        </h2>
      </div>

    <div class="service_container">
		
		<div class="card text-center my_container">		  
			<div class="card-body" style="margin-top: 20px;">
				<form name="form1" method="post" action="{{ route('account.update', $row -> id) }}{{ $tmp }}">
				@csrf
				@method('PATCH')
					<table class="table table-sm table-bordered table-hover mymargin5" style="border-style: hidden;">
						<tr>
							<td class="mycolor2 my_table_color radius_top_left" width="20%">번호</td>
							<td width="80%" align="left" class="radius_top_right">
								<div>&nbsp{{$row->id}}</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">이름</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="name" class="form-control form-control" value="{{ $row -> name }}">
									<font color="red">@error('name') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">비밀번호</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="pwd" class="form-control form-control" value="{{ $row -> pwd }}">
									<font color="red">@error('pwd') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">나이</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="age" class="form-control form-control" value="{{ $row -> age }}">
									<font color="red">@error('age') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">전화번호</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="phone" class="form-control form-control" value="{{ $row -> phone }}">
									<font color="red">@error('phone') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">방문 횟수</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="visit_cnt" class="form-control form-control" value="{{ $row -> visit_cnt }}">
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">등급</td>
							<td>
								<div class="fd-inline-flex">
									<select name="grade" class="form-select">
										<option value="" selected>선택하세요.</option>
										@foreach ($list as $row1)
											@if ( $row->grade_id == $row1->id )
												<option value="{{ $row1->id }}" selected>{{ $row1->name }}</option>
											@else
												<option value="{{ $row1->id }}">{{ $row1->name }}</option>
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
									<input type="text" name="etc" class="form-control form-control input_bottom_right" value="{{ $row -> etc }}">
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
		<a href="{{ route('account.show', $row->id) }}{{ $tmp }}">
		  이전화면
		</a>
	</div>
	
	</section>
	<!-- end service section -->

	<div class="footer_bg">

    <!-- contact section -->
    


    <!-- end contact section -->

	@include("bottom")


</body>

</html>