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
          놀이기구 정보 수정
        </h2>
      </div>

    <div class="service_container">
		
		<div class="card text-center my_container">		  
			<div class="card-body" style="margin-top: 20px;">
				<form name="form1" method="post" action="{{ route('attraction.update', $row->id) }}{{ $tmp }}" enctype="multipart/form-data">
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
									<input type="text" name="name" class="form-control form-control" value="{{ $row->name }}">
									<font color="red">@error('name') {{ $message }} @enderror</font>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">나이 제한</td>
							<td>
								<div class="fd-inline-flex">
									<input type="text" name="age_limit" class="form-control form-control" value="{{ $row->age_limit }}">
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">시작 시간 (24시간 형식)</td>
							<td align="left">
								<div class="d-inline-flex">
									<input type="text" name="start_time1" class="form-control form-control-sm" value="{{ substr($row->start_time, 0, 2) }}" placeholder="ex) 00 ~ 23">
									&nbsp:&nbsp
									<input type="text" name="start_time2" class="form-control form-control-sm" value="{{ substr($row->start_time, 3, 4) }}" placeholder="ex) 00 ~ 59">
								</div>
								<font color="red" style="display: block;">@error('start_time1') {{ $message }} @enderror</font>
								<font color="red" style="display: block;">@error('start_time2') {{ $message }} @enderror</font>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">종료 시간 (24시간 형식)</td>
							<td align="left">
								<div class="d-inline-flex">
									<input type="text" name="end_time1" class="form-control form-control-sm" value="{{ substr($row->end_time, 0, 2) }}" placeholder="ex) 00 ~ 23">
									&nbsp:&nbsp
									<input type="text" name="end_time2" class="form-control form-control-sm" value="{{ substr($row->end_time, 3, 4) }}" placeholder="ex) 00 ~ 59">
								</div>
								<font color="red" style="display: block;">@error('end_time1') {{ $message }} @enderror</font>
								<font color="red" style="display: block;">@error('end_time2') {{ $message }} @enderror</font>
							</td>
						</tr>
						<tr>	
							<td class="mycolor2 my_table_color">정원</td>
							<td>
								<div class="fd-inline-flex">
									<div class="fd-inline-flex">
										<input type="text" name="capacity" class="form-control form-control-sm" value="{{ $row->capacity }}">
										<font color="red">@error('capacity') {{ $message }} @enderror</font>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">사진</td>
							<td class="mb-3">
								<div align="left">
									<label for="formFile" class="form-label" style="font-size: 1.1rem;">&nbsp놀이기구 사진을 업로드 해주세요.</label>
									<input type="file" name="picture" id="formFile" class="form-control form-control-sm" value="{{ $row->picture }}">
									
									<div align="left" class="fd-inline-flex" style="margin-top: 7px;">
										<div class="d-inline-flex" style="font-size: 1.0rem;">
											&nbsp<b>기존 파일 이름</b> : <?= $row->picture ?> <br>
										</div><br>&nbsp
										
										@if($row->picture)
										   <img src="{{ asset('attraction_imgs/' . $row->picture) }}"
												 width="200" class="img-fluid img-thumbnail margin5">
										@else
											<img src=" " width="200" height="150" class="img-fluid img-thumbnail margin5">
										@endif
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color radius_bottom_left">기타</td>
							<td class="radius_bottom_right">
								<div class="fd-inline-flex">
									<input type="text" name="etc" class="form-control form-control input_bottom_right" value="{{ $row->etc }}">
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
		<a href="{{ route('attraction.show', $row->id) }}{{ $tmp }}">
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