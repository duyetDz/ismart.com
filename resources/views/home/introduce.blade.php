@extends('templates.tpl_default')

@section('content')
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section" id="detail-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">Giới thiệu</h3>
                    </div>
                    <div class="section-detail">
                        <span class="create-date">2022-12-11 14:20:50</span>
                        <div class="detail">
                            <h1 class="title">Chat GPT – Công cụ thông minh nhất thế giới?</h1>
                            <div class="sapo">
                                <h5>Thời gian qua, sự xuất hiện của công cụ trí tuệ nhân tạo (AI) có tên ChatGPT (tên gọi
                                    đầy đủ là Chat Generative Pre-training Transformer) - một chatbot do công ty khởi nghiệp
                                    OpenAI phát triển đã làm giới công nghệ quan tâm dùng thử. Điểm đặc biệt của công cụ này
                                    là có kho kiến thức mà ChatGPT đã học được trong một thời gian dài để hoàn thiện.</h5>
                            </div>
                            <figure class="image-in-content"><img
                                    src="https://vusta.vnmediacdn.com/images/2023/02/07/9917-1675757224-screenshot-20230207-152943-word.jpg"
                                    alt="tm-img-alt"></figure>
                            <p class="text-center"><em>Sau 2 tháng phần mềm được tạo ra đã có 100 triệu người/tháng sử
                                    dụng</em></p>
                            <p class="text-justify"><strong>Công cụ thông minh nhất thế giới</strong></p>
                            <p class="text-justify">Được biết, ứng dụng Chat GPT (chatbot) được mệnh danh là trí tuệ nhân
                                tạo (AI) thông minh nhất thế giới. Công cụ này có thể trò chuyện, trả lời lưu loát đầy đủ
                                các câu hỏi mà bạn đưa ra, bất kể là thắc mắc về lĩnh vực gì. Khi Chat GPT ra mắt, người sử
                                dụng muốn tra cứu đã bắt đầu trò chuyện với công cụ này thay vì tìm kiếm thông tin trên
                                google. Với sự hiểu biết trong nhiều lĩnh vực, các câu hỏi thắc mắc của người sử dụng đã
                                được trả lời chỉ sau vài giây.</p>
                            <p class="text-justify">Hiện nay, số người dùng công cụ Chat GPT do OpenAI phát triển được cho
                                là cán mốc 100 triệu người/tháng, chỉ 2 tháng sau khi phần mềm trí tuệ nhân tạo này được ra
                                mắt, khiến đây trở thành ứng dụng cho người dùng phát triển nhanh nhất trong lịch sử. Theo
                                thống kê của Sensor Tower cho thấy nền tảng chia sẻ video ngắn TikTok cần 9 tháng sau khi
                                phát hành toàn cầu để đạt 100 triệu người dùng, trong khi Instagram mất tới 2,5 năm, còn ứng
                                dụng dịch Google Translate là 6,5 năm.</p>
                            <p class="text-justify">Chat GPT là ứng dụng AI được phát triển từ mô hình GPT-3.5 của công ty
                                khởi nghiệp công ty OpenAI, được đào tạo để đưa ra câu trả lời giống một cuộc trò chuyện với
                                người thật. Dù hoạt động miễn phí, người sử dụng cần có tài khoản trên nền tảng của OpenAI.
                                Dịch vụ chưa hỗ trợ mở tài khoản ở Việt Nam. Người dùng trong nước muốn trải nghiệm phải sử
                                dụng mạng riêng ảo (VPN), thuê số điện thoại nước ngoài với giá khoảng vài USD, dùng thẻ
                                thanh toán quốc tế để đăng ký, hoặc mua tài khoản từ người khác.</p>
                            <figure class="image-in-content"><img
                                    src="https://vusta.vnmediacdn.com/images/2023/02/07/9917-1675757225-screenshot-20230207-153008-word.jpg"
                                    alt="tm-img-alt"></figure>
                            <p class="text-center"><em>Samuel H. Altman là cha đẻ của Chat GPT. sinh ra và lớn lên ở St.
                                    Louis, Missouri, có gốc Do Thái</em></p>
                        </div>
                    </div>

                    



                </div>
            </div>
            <div class="sidebar fl-left">
                <div class="section" id="selling-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm bán chạy</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @foreach ($bestSellers as $item)
                                <li class="clearfix">
                                    <a href="{{ asset('') }}products/detail/{{ $item->id }}" title=""
                                        class="thumb fl-left">
                                        <img src="{{ asset('') }}{{ $item->feature_image }}" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="" title="" class="product-name">{{ $item->name }}</a>
                                        <div class="price">
                                            <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                            <span
                                                class="old">{{ number_format($item->price * 1.3, 0, ',', '.') }}đ</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="" title="" class="thumb">
                            <img src="https://i.pinimg.com/236x/09/5c/9d/095c9dbe831339e5d924b238edb3c481.jpg"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
