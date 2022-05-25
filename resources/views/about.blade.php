@extends('layout')
@section('main')
        <!-- main -->
        <main class="container">
          <section class="single-blog-post">
            <h1>About Me</h1>
            <div class="single-blog-post-ContentImage" data-aos="fade-left">
              <img src="{{ asset('images/dhsg.jpeg') }}" alt="" />
            </div>
    
            <div>
              <p class="about-text">
                Laravel là một PHP framework, có mã nguồn mở và miễn phí, được xây dựng nhằm hỗ trợ phát triển các phần mềm, ứng dụng, theo kiến trúc MVC.
                 Hiện nay, Laravel đang là PHP framework phổ biến nhất và tốt nhất.
                <br /><br />
                Trường Đại học Sài Gòn được thành lập theo Quyết định số 478/QĐ-TTg ngày 25/04/2007 của Thủ tướng Chính phủ trên cơ sở nâng cấp Trường Cao đẳng Sư phạm Thành phố Hồ Chí Minh.
                Đại học Sài Gòn là cơ sở giáo dục Đại học công lập trực thuộc UBND TP.
                Hồ Chí Minh và chịu sự quản lý của Nhà nước về giáo dục của Bộ Giáo dục và Đào tạo. 
                Đại học Sài Gòn là trường đào tạo đa ngành, đa lĩnh vực. Đại học Sài Gòn đào tạo từ trình độ cao đẳng, đại học và sau đại học. 
                Đại học Sài Gòn đào tạo theo 2 phương thức: chính quy và không chính quy (vừa làm vừa học, liên thông). 
                Tốt nghiệp Đại học Sài Gòn người học được cấp các bằng cấp: cử nhân, kỹ sư, thạc sĩ…
              </p>
            </div>
          </section>
        </main>
    
@endsection