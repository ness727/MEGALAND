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
          회원 정보 조회
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
								<div>&nbsp{{$row->id}}</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">이름</td>
							<td align="left">
								<div class="fd-inline-flex">
									&nbsp{{$row->name}}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">비밀번호</td>
							<td>
								<div class="fd-inline-flex" align="left">
									&nbsp{{$row->pwd}}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">나이</td>
							<td>
								<div class="fd-inline-flex" align="left">
									&nbsp{{$row->age}}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">전화번호</td>
							<td align="left">
								<div class="d-inline-flex">
									@if (is_numeric($row->phone) && strlen($row->phone) == 11) 
										&nbsp{{substr($row->phone, 0, 3) . "-" . substr($row->phone, 3, 4) . "-" . substr($row->phone, 7, 4)}}
									@else
										&nbsp{{$row->phone}}
									@endif
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">방문 횟수</td>
							<td align="left">
								<div class="d-inline-flex">
									&nbsp{{$row->visit_cnt}}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">등급</td>
							<td align="left">
								<div>
									&nbsp{{$row->grade_name}}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color radius_bottom_left">기타</td>
							<td class="radius_bottom_right" align="left">
								<div>
									&nbsp{{$row->etc}}
								</div>
							</td>
						</tr>
					</table>
					
					<div align="center">
						<!-- <input type="button" value="수정" class="btn btn-sm hmycolor1 btn btn-sm btn-primary"> -->
						<a href="{{ route('account.edit', $row->id) }}{{ $tmp }}" class="btn hmycolor1 btn-secondary my_button button_radius">수정</a>
						<form action="{{ route('account.destroy', $row->id) }}">
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
		<a href="{{ route('account.index') }}{{ $tmp }}">
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