
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>

<body>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tbody>
            <tr>
                <td align="center" style="line-height:24px;font-size:16px;margin:0;padding:0 16px">

                    <table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0"
                        style="width:100%;max-width:600px;margin:0 auto">
                        <tbody>
                            <tr>
                                <td style="line-height:24px;font-size:16px;margin:0" align="left">
                                    <table class="m_-2340738238265822780s-10 m_-2340738238265822780w-full"
                                        role="presentation" border="0" cellpadding="0" cellspacing="0"
                                        style="width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="line-height:40px;font-size:40px;width:100%;height:40px;margin:0"
                                                    align="left" width="100%" height="40">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table role="presentation" align="center" border="0" cellpadding="0"
                                        cellspacing="0" style="margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td style="line-height:24px;font-size:16px;margin:0; " align="left">
                                                    <a href="" style="color:#000"><h1>[Ismart.com]</h1></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="m_-2340738238265822780s-10 m_-2340738238265822780w-full"
                                        role="presentation" border="0" cellpadding="0" cellspacing="0"
                                        style="width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="line-height:40px;font-size:40px;width:100%;height:40px;margin:0"
                                                    align="left" width="100%" height="40">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="m_-2340738238265822780p-6 m_-2340738238265822780p-lg-10"
                                        role="presentation" border="0" cellpadding="0" cellspacing="0"
                                        style="border-radius:6px;border-collapse:separate!important;width:100%;overflow:hidden;border:1px solid #e2e8f0"
                                        bgcolor="#ffffff">
                                        <tbody>
                                            <tr>
                                                <td style="line-height:24px;font-size:16px;width:100%;margin:0;padding:40px"
                                                    align="left" bgcolor="#ffffff">
                                                    <div style="padding-top:0;padding-bottom:20px;font-weight:700!important;vertical-align:baseline;font-size:24px;line-height:28.8px;margin:0"
                                                        align="left">
                                                        Chúc mừng bạn đã đặt Hàng thành công
                                                    </div>

                                                    <div class="">
                                                        <h5>Sản phẩm đã đặt</h5>
                                                        <table id="myTable" class="table table-bordered caption-top"
                                            style="width:100%;border:1px solid #ddd;border-collapse:collapse">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="text-align:center;border:1px solid #ddd;padding:8px">STT</th>
                                                    <th scope="col" style="text-align:center;border:1px solid #ddd;padding:8px">Ảnh avatar</th>
                                                    <th scope="col" style="text-align:center;border:1px solid #ddd;padding:8px">Tên sản phẩm</th>
                                                    <th scope="col" style="text-align:center;border:1px solid #ddd;padding:8px">Giá sản phẩm</th>
                                                    <th scope="col" style="text-align:center;border:1px solid #ddd;padding:8px">Số lượng</th>
                                                    <th scope="col" style="text-align:center;border:1px solid #ddd;padding:8px">Ngày đặt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $t = 0;
                                                @endphp
                                                @foreach ($data['cart_content']->all() as $index => $item)
                                                <tr id="">
                                                    <td style="text-align:center;border:1px solid #ddd;padding:8px;">
                                                        {{ $t + 1 }}
                                                    </td>
                                                    <td style="text-align:center;border:1px solid #ddd;padding:8px;">
                                                        <img src="{{ asset('') }}{{ $item->options->image }}"
                                                            class="img-thumbnail" style="width: 70px; height: 70px;"
                                                            alt="...">
                                                    </td>
                                                    <td style="text-align:center;border:1px solid #ddd;padding:8px;">
                                                        {{ $item->name }}
                                                    </td>
                                                    <td style="text-align:center;border:1px solid #ddd;padding:8px;">
                                                        {{ number_format($item->price, 0, ',', '.') }}đ
                                                    </td>
                                                    <td style="text-align:center;border:1px solid #ddd;padding:8px;">
                                                        {{ $item->qty }}
                                                    </td>
                                                    <td style="text-align:center;border:1px solid #ddd;padding:8px;">
                                                        {{ $item->created_at }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                    
                                                    </div>

                                                    <div class="card mb-5">
                                                        <div class="card-body p-4">
                        
                                                            <div class="float-end">
                                                                <p class="mb-0 me-5 d-flex align-items-center">
                                                                </p><h5>Thông tin người nhận</h5>
                                                                <p>Họ và tên : {{$data['order']['name']}}</p>
                                                                <p>Số điện thoại:{{$data['order']['phone_number']}}</p>
                                                                <p>Địa chỉ : {{$data['order']['name']}} </p>
                                                                <p>Phương thức thanh toán: {{$data['order']['payment']}}</p>
                                                                <p>Tổng tiền: {{number_format($data['order']['total_price'])}}đ</p>

                                                                
                                                            </div>
                        
                                                        </div>
                                                    </div>
                                                   
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="m_-2340738238265822780s-10 m_-2340738238265822780w-full"
                                        role="presentation" border="0" cellpadding="0" cellspacing="0"
                                        style="width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="line-height:40px;font-size:40px;width:100%;height:40px;margin:0"
                                                    align="left" width="100%" height="40">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div style="color:#718096" align="center">
                                        <div style="margin-bottom:4px;font-size:14px">Mua sắm dễ dàng cùng Ismart</div>
                                        <table role="presentation" align="center" border="0" cellpadding="0"
                                            cellspacing="0" style="margin:0 auto">
                                            <tbody>
                                                <tr>
                                                    <td style="line-height:24px;font-size:16px;padding-right:24px;margin:0"
                                                        align="left" valign="top">
                                                        <a href="https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/2/F0DBEeC0EclyQEsT7wi9iA/aHR0cHM6Ly9pdHVuZXMuYXBwbGUuY29tL3ZuL2FwcC9pZDk1ODEwMDU1Mw"
                                                            style="color:#0d6efd" target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/2/F0DBEeC0EclyQEsT7wi9iA/aHR0cHM6Ly9pdHVuZXMuYXBwbGUuY29tL3ZuL2FwcC9pZDk1ODEwMDU1Mw&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw3MIB9Hz3icxFw8w3KW2vsP">
                                                            <img src="https://ci5.googleusercontent.com/proxy/L0tgBkbvzqDAS8inur3XsszG2O8CKKNwNgxWoESynEfhMhpvBxLNn-igWQ3kvrY-H3xIFsWODgRVb1DInog8SDv0Ts2O9L676RNV-vbcBF2kjmOkY1FagGDjcFTt3NHbuS3l=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/6c/45/07/32776dc149296e43cebe3dfc52be4f51.png"
                                                                style="height:auto;line-height:100%;outline:none;text-decoration:none;display:block;width:120px;border-style:none;border-width:0"
                                                                width="120" class="CToWUd" data-bit="iit">
                                                        </a>
                                                    </td>
                                                    <td style="line-height:24px;font-size:16px;padding-right:0;margin:0"
                                                        align="left" valign="top">
                                                        <a href="https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/3/u85Ll3yD9_dsx6KXEkkAuQ/aHR0cHM6Ly9wbGF5Lmdvb2dsZS5jb20vc3RvcmUvYXBwcy9kZXRhaWxzP2lkPXZuLnRpa2kuYXBwLnRpa2lhbmRyb2lk"
                                                            style="color:#0d6efd" target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/3/u85Ll3yD9_dsx6KXEkkAuQ/aHR0cHM6Ly9wbGF5Lmdvb2dsZS5jb20vc3RvcmUvYXBwcy9kZXRhaWxzP2lkPXZuLnRpa2kuYXBwLnRpa2lhbmRyb2lk&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw1jdebKmkk-e2aNgHxlPrFz">
                                                            <img src="https://ci3.googleusercontent.com/proxy/oYNNbZS9yGVZc1rhtHymDsELPePIOHFWGLqAcjHCiSYTa-Za_1St1bA41JAfWIwRw8dDkgfnEl20aQNjfzG7EXrS1RH3MDmVgmvWVgTrLNx7WWQkOXuRCmUOiM07mJBU2EpM=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/55/15/15/362a5872bd4a220d44a6721eba261fb1.png"
                                                                style="height:auto;line-height:100%;outline:none;text-decoration:none;display:block;width:130px;border-style:none;border-width:0"
                                                                width="130" class="CToWUd" data-bit="iit">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="m_-2340738238265822780s-4 m_-2340738238265822780w-full"
                                            role="presentation" border="0" cellpadding="0" cellspacing="0"
                                            style="width:100%" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="line-height:16px;font-size:16px;width:100%;height:16px;margin:0"
                                                        align="left" width="100%" height="16">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table role="presentation" align="center" border="0" cellpadding="0"
                                            cellspacing="0" style="margin:0 auto">
                                            <tbody>
                                                <tr>
                                                    <td style="line-height:24px;font-size:16px;padding-right:24px;margin:0"
                                                        align="left" valign="top">
                                                        <a href="https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/4/9JbVWfQa4cGxu8Xon1-9yg/aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90aWtpLnZuLz9obD1lbg"
                                                            style="color:#0d6efd" target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/4/9JbVWfQa4cGxu8Xon1-9yg/aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS90aWtpLnZuLz9obD1lbg&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw3hwbmqS88Q_HPLx03acn9K">
                                                            <img src="https://ci5.googleusercontent.com/proxy/dCwUpNCpEtFbnOlgnu5jNGp0Yeu9WBVzSTuRCPdoYCJrzUmfumBh2DfD3W0UCkAFE_m7_xpTHIabrsWwkR3_Qs_-flQiWIglNXUOkRp1TN1lhoQwAkWHmDEwkHx-lRaAfN1P=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/01/2d/a1/f968def2b44e2dbf3f263732c19e67ad.png"
                                                                style="height:auto;line-height:100%;outline:none;text-decoration:none;display:block;width:35px;border-style:none;border-width:0"
                                                                width="45" class="CToWUd" data-bit="iit">
                                                        </a>
                                                    </td>
                                                    <td style="line-height:24px;font-size:16px;padding-right:24px;margin:0"
                                                        align="left" valign="top">
                                                        <a href="https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/5/YveBoOYXvH2fHb7laj9-ug/aHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL3Rpa2kudm4"
                                                            style="color:#0d6efd" target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/5/YveBoOYXvH2fHb7laj9-ug/aHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL3Rpa2kudm4&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw2Y0gimO-kXjalXtTvuRwv1">
                                                            <img src="https://ci4.googleusercontent.com/proxy/UgyBIiR2IjbJOerIihICQRcAGaVPA7kAtnahZYEU-GbIzaZtBOc93Skj_MAlKxXnnZGEn-iDanRcj91PP4HY0macTKm_oSTx2l4ofz7QvmygRJIQQXkThBHoLM45tB8IaHO2=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/a7/54/38/904bdb5f033870856fec569c7564f4f8.png"
                                                                style="height:auto;line-height:100%;outline:none;text-decoration:none;display:block;width:35px;border-style:none;border-width:0"
                                                                width="45" class="CToWUd" data-bit="iit">
                                                        </a>
                                                    </td>
                                                    <td style="line-height:24px;font-size:16px;padding-right:24px;margin:0"
                                                        align="left" valign="top">
                                                        <a href="https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/6/xaSO-GNhCIkuT-mbXYcLzA/aHR0cHM6Ly90d2l0dGVyLmNvbS90aWtpdm4"
                                                            style="color:#0d6efd" target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/6/xaSO-GNhCIkuT-mbXYcLzA/aHR0cHM6Ly90d2l0dGVyLmNvbS90aWtpdm4&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw2Isz4rC73MwQg6hJRDHvXC">
                                                            <img src="https://ci6.googleusercontent.com/proxy/ZW9-jjll1ivIySBD1JvQSgQIztzfUtpIEytuHKXTOgKCrkqIBN58UopIChzL44w8vGg5UkoCqvee5RDhEfm2b03IfkZXEmD2MnP8Z3x9DOcM-DfX1uyVbHQbVnJg_Yfaxvl2=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/55/9b/87/8283f7cececc9cc94703822fd569dbcd.png"
                                                                style="height:auto;line-height:100%;outline:none;text-decoration:none;display:block;width:35px;border-style:none;border-width:0"
                                                                width="45" class="CToWUd" data-bit="iit">
                                                        </a>
                                                    </td>
                                                    <td style="line-height:24px;font-size:16px;padding-right:0px;margin:0"
                                                        align="left" valign="top">
                                                        <a href="https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/7/dG9Hc9QZgyRBOXttnbOmsw/aHR0cHM6Ly93d3cueW91dHViZS5jb20vdXNlci9UaWtpVkJsb2c"
                                                            style="color:#0d6efd" target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/7/dG9Hc9QZgyRBOXttnbOmsw/aHR0cHM6Ly93d3cueW91dHViZS5jb20vdXNlci9UaWtpVkJsb2c&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw3wBE9HxbDD0qIeIlJLLJdw">
                                                            <img src="https://ci5.googleusercontent.com/proxy/m8wTRstl4lDDzLSkU43Pgde_XPm_ar2SPDOj7gabrQVPpr1MttFnYpT94w0gC9_Z3E7u4P57MRb_LBB2p_5RLOKP9ls-KiKyY6eImTAv8VOOLGlUHjAH0nsj3PVcouhxFVCz=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/5a/a7/7f/16c3799c795b5029c0bfd12c602c5d4e.png"
                                                                style="height:auto;line-height:100%;outline:none;text-decoration:none;display:block;width:42px;border-style:none;border-width:0"
                                                                width="45" class="CToWUd" data-bit="iit">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table role="presentation" align="center" border="0" cellpadding="0"
                                            cellspacing="0" style="margin:0 auto">
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        <div style="font-size:14px" align="center">
                                                            <a href=""
                                                                style="color:#2477e8;text-decoration:underline"
                                                                target="_blank"
                                                                data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/8/wA9iRzr3onlt2rYGEDLm7g/aHR0cHM6Ly90aWtpLnZuL2Jhby1tYXQtdGhvbmctdGluLWNhLW5oYW4&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw0JmNqxSmldonc8LlSUc4wP">Chính
                                                                sách bảo mật</a>
                                                            |
                                                            <a href=""
                                                                style="color:#2477e8;text-decoration:underline"
                                                                target="_blank"
                                                                data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/9/DzS1iaqXXx60GZ6-enntRw/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL3MvYXJ0aWNsZS9kaWV1LWtob2FuLXN1LWR1bmc&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw3Q_LVjVBCeHntAHnuNSqxP">Điều
                                                                khoản</a>
                                                            |
                                                            <a href=""
                                                                style="color:#2477e8;text-decoration:underline"
                                                                target="_blank"
                                                                data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/BAAABI2zmEoAAAAKLHAAALlLnKIAAAAA3NwAAAAAABPsQgBlB9vbTGEKXrUOT4eCIObF01EPnAAPBhU/10/NJ3bnXsbg1DEcLPQZHg1OA/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL3Mv&amp;source=gmail&amp;ust=1695129958429000&amp;usg=AOvVaw3zdMwJo6ZkCnR5nvDAebeY">Hỗ
                                                                trợ</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center" style="font-size:14px">
                                                            <div>
                                                                <img src="https://ci4.googleusercontent.com/proxy/BwnbU5FvIkUWqwWb4l9aoZOnQBO4CuFGCKTfYTphQE1jFzFIODvfgpvS6fT1HhwMWVMU9jukvygjmpiNNNGmKwHrBE2-tJmDkbtP_hFMO49DCybUTpJKg6zR3ydQRkYVV-nW=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/dd/87/f4/2c302b57adb498319f277f310842f02b.png"
                                                                    style="height:auto;line-height:100%;outline:none;text-decoration:none;display:inline;width:18px;border-style:none;border-width:0"
                                                                    width="18" class="CToWUd" data-bit="iit">
                                                                <p style="margin:0;display:inline">1900 6035</p>
                                                                |
                                                                <img src="https://ci4.googleusercontent.com/proxy/W0tR_sAKToLLy-Yr9mDLFshx4XRefZ9MHdwN8KPj85bq5VOaY_Z7HIz45WEgXbLG5aAhoFoPUP_KtekmXoEefj0Czu1YxVnHubHjsKfKb8kQGiTtuCWwJeEjepHTU3WuDrNl=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/68/61/88/93c6bd9f18b3a7dba13eeb9443abc7fb.png"
                                                                    style="height:auto;line-height:100%;outline:none;text-decoration:none;display:inline;width:18px;border-style:none;border-width:0"
                                                                    width="18" class="CToWUd" data-bit="iit">
                                                                <p style="margin:0;display:inline"><a
                                                                        href=""
                                                                        target="_blank">hotro@Ismart.vn</a></p>
                                                                |
                                                                <img src="https://ci5.googleusercontent.com/proxy/0QFYKJEKTjCVRExXuDrsvNF7nKDpMu4EmjWnrR_-Kbk-KFsHPyK2pnAOpc8hnbSI64u0p16NHZpHqbI1gCkyUs9axP4owhXnTVVao5TtOrsFo9uUsmmGPJgLXXdjdlBWKQay=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/2f/0a/d5/18f420688eca81af282e4ec698a2dd6b.png"
                                                                    style="height:auto;line-height:100%;outline:none;text-decoration:none;display:inline;width:18px;border-style:none;border-width:0"
                                                                    width="18" class="CToWUd" data-bit="iit">
                                                                <p style="margin:0;display:inline">52 Út Tịch, P.4
                                                                    Q.Tân Bình, Hồ Chí Minh</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="m_-2340738238265822780s-6 m_-2340738238265822780w-full"
                                        role="presentation" border="0" cellpadding="0" cellspacing="0"
                                        style="width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="line-height:24px;font-size:24px;width:100%;height:24px;margin:0"
                                                    align="left" width="100%" height="24">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>

   
</body>

</html>
