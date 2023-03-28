@extends('templates.tpl_default')

@section('content')
    <div id="main-content-wp" class="clearfix category-product-page">
        <section class="box-content">
            <div class="wrapper">
                <form action="https://mobileworld.com.vn/tai-khoan.html" id="account-form" class="account-form" method="post"
                    accept-charset="utf-8"> <input type="hidden" name="action" value="member_account">
                    <div class="form-wrap">
                        <div class="col-left">
                            <div class="avatar"> <a href="javascript:void(0)" class="avatar-img"> <img
                                        src="https://mobileworld.com.vn/uploads/noavatar.png" alt="Giang Văn Duyệt"></a>
                                <div class="username">Giang Văn Duyệt</div> <button type="button" id="btn-avatar"
                                    class="fa-upload hide">Tải ảnh lên</button>
                            </div>
                        </div>
                        <div class="account col-right">
                            <div class="form-row">
                                <div id="field-display_name" class="form-field field-display_name fa-user"> <input
                                        type="text" name="display_name" value="Giang Văn Duyệt" required="1"
                                        autofocus="1" minlength="2" id="display_name" class="form-control"> </div>
                                <div id="field-gender" class="form-field field-gender fa-venus"> <select name="gender"
                                        id="gendeer" class="form-control">
                                        <option value="male" selected="selected">Nam</option>
                                        <option value="female">Nữ</option>
                                    </select> </div>
                            </div>
                            <div id="field-address" class="form-field field-address fa-map-marker"> <input type="text"
                                    name="address" value="Xóm 3, Thái Thượng, Thái Thụy, Thái Bình" id="address"
                                    class="form-control"> </div>
                            <div id="field-phone" class="form-field field-phone fa-phone"> <input type="text"
                                    name="phone" value="0354374284" id="phone" class="form-control"> </div>
                            <div id="field-user_email" class="form-field field-user_email fa-envelope-o"> <input
                                    type="email" name="user_email" value="giangvanduyet@gmail.com" required="1"
                                    id="user_email" class="form-control"> </div>
                            <div id="field-company" class="form-field field-company fa-home"> <input type="text"
                                    name="company" value="nooo" id="company" class="form-control"> </div>
                            <div class="form-row">
                                <div id="field-birthday" class="form-field field-birthday fa-calendar"> <input
                                        type="text" name="birthday" value="24/05/2001" id="birthday"
                                        class="form-control"> </div>
                            </div>
                            <div id="field-button" class="form-field field-button form-button"> <button type="submit"
                                    class="button btn-save">Lưu thay đổi</button> </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
