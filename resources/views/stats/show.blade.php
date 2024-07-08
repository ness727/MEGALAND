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
          통계 조회
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
							<td class="mycolor2 my_table_color">날짜</td>
							<td align="left">
								<div class="fd-inline-flex">
									&nbsp{{ $row->run_day }}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">놀이기구명</td>
							<td align="left">
								<div class="fd-inline-flex">
									&nbsp{{ $row->attraction_name }}
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color radius_bottom_left">이용객 수</td>
							<td align="left" class="radius_bottom_right">
								<div>
									&nbsp{{ $row->customer_cnt }}
								</div>
							</td>
						</tr>
					</table>
					
					<div align="center">
						<!-- <input type="button" value="수정" class="btn btn-sm hmycolor1 btn btn-sm btn-primary"> -->
						<a href="{{ route('stats.edit', $row->id) }}{{ $tmp }}" class="btn hmycolor1 btn-secondary my_button button_radius">수정</a>
						<form action="{{ route('stats.destroy', $row->id) }}">
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
		<a href="{{ route('stats.index') }}{{ $tmp }}">
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