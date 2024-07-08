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
          놀이기구 정보 조회
        </h2>
      </div>

    <div class="service_container">
		
		<div class="card text-center my_container">		  
			<div class="card-body" style="margin-top: 20px;">
				<form name="form1" method="post" action="">
					<table class="table table-sm table-bordered table-hover mymargin5" style="border-style: hidden;">
						<tr>
							<td class="mycolor2 my_table_color radius_top_left" width="20%">번호</td>
							<td width="80%" align="left" class="radius_top_right">
								<div>&nbsp{{ $row->id }}</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">이름</td>
							<td align="left">
								<div class="fd-inline-flex">
									&nbsp{{ $row->name }}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">나이 제한</td>
							<td align="left">
								<div class="fd-inline-flex">
									&nbsp{{ $row->age_limit }}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">시작 시간 (24시간 형식)</td>
							<td align="left">
								<div class="d-inline-flex">
									&nbsp{{ $row->start_time }}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">종료 시간 (24시간 형식)</td>
							<td align="left">
								<div class="d-inline-flex">
									&nbsp{{ $row->end_time }}
								</div>
							</td>
						</tr>
						<tr>	
							<td class="mycolor2 my_table_color">정원</td>
							<td align="left">
								<div class="fd-inline-flex">
									<div class="fd-inline-flex">
										&nbsp{{ $row->capacity }}
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">사진</td>
							<td align="left" class="mb-3">
								<div class="fd-inline-flex">
									<div class="fd-inline-flex">
										<div class="d-inline-flex">
											&nbsp<b>파일이름</b> : <?= $row->picture ?> <br>
										</div><br>&nbsp
										
										@if($row->picture)
										   <img src="{{ asset('storage/attraction_imgs/' . $row->picture) }}"
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
							<td align="left" class="radius_bottom_right">
								<div>
									&nbsp{{ $row->etc }}
								</div>
							</td>
						</tr>
					</table>
					
					<div align="center">
						<!-- <input type="button" value="수정" class="btn btn-sm hmycolor1 btn btn-sm btn-primary"> -->
						<a href="{{ route('attraction.edit', $row->id) }}{{ $tmp }}" class="btn hmycolor1 btn-secondary my_button button_radius">수정</a>
						<form action="{{ route('attraction.destroy', $row->id) }}">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn hmycolor1 btn-danger button_radius" onClick="return confirm('삭제할까요?');">삭제</button> &nbsp;
						</form>
						<!-- <input type="button" value="이전화면" class="btn btn-sm hmycolor1 btn btn-sm btn-primary"> -->
						
					</div>
				</form>	  
			</div>
		</div>
    </div>
	
	<div class="btn-box">
		<a href="{{ route('attraction.index') }}{{ $tmp }}">
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