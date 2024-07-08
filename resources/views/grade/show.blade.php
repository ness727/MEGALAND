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
          등급 정보 조회
        </h2>
      </div>

    <div class="service_container">
		
		<div class="card text-center my_container">		  
			<div class="card-body" style="margin-top: 20px;">
				<form name="form1" method="post" action="">
					<table class="table table-sm table-bordered table-hover mymargin5" style="border-style: hidden;">
						<tr>
							<td class="mycolor2 my_table_color radius_top_left" width="20%">번호</td>
							<td width="80%" class="radius_top_right" align="left">
								<div>&nbsp{{$row->id}}</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color radius_bottom_left">등급명</td>
							<td class="radius_bottom_right" align="left">
								<div>
									&nbsp{{$row->name}}
								</div>
							</td>
						</tr>
					</table>
					
					<div align="center">
						<!-- <input type="button" value="수정" class="btn btn-sm hmycolor1 btn btn-sm btn-primary"> -->
						<a href="{{ route('grade.edit', $row->id) }}{{ $tmp }}" class="btn hmycolor1 btn-secondary my_button button_radius">수정</a>
						<form action="{{ route('grade.destroy', $row->id) }}">
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
		<a href="{{ route('grade.index') }}{{ $tmp }}">
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