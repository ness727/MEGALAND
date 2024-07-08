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
          등급 추가
        </h2>
      </div>

    <div class="service_container">
		
		<div class="card text-center my_container">		  
			<div class="card-body" style="margin-top: 20px;">
				<form name="form1" method="post" action="{{ route('grade.store') }}{{ $tmp }}">
				@csrf
				@method('POST')
					<input type="hidden" name="visit_cnt" value="0"/>
					<table class="table table-sm table-bordered table-hover mymargin5" style="border-style: hidden;">
						<tr>
							<td class="mycolor2 my_table_color radius_top_left radius_bottom_left">등급명</td>
							<td class="radius_top_right radius_bottom_right">
								<div class="fd-inline-flex">
									<input type="text" name="name" class="form-control form-control-sm input_top_right input_bottom_right" value="{{ old('name') }}">
									<font color="red">@error('name') {{ $message }} @enderror</font>
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