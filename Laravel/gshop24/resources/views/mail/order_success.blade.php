@extends('mail.main')

@section('content')
    {{-- ORDER SUCCESS --}}
    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
                <td bgcolor="#ffffff" align="left"
                    style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                    <p>GShopvn xin chào,</p>
                    <p style="margin: 0;">GShopvn đã nhận được yêu cầu đặt hàng của bạn và đang xử lý. Bạn sẽ nhận được
                        thông báo tiếp theo khi đơn hàng đã sẵn sàng được giao.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" align="left">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td bgcolor="#ffffff" align="center"
                                style="pa
                            dding: 20px 30px 60px 30px;">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center" style="border-radius: 3px;" bgcolor="#17a2b8"><a
                                                href="https://gshopvn.com/checkout/{{ $id }}-{{ $order_key }}"
                                                target="_blank"
                                                style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #17a2b8; display: inline-block;">Tình
                                                trạng đơn hàng</a></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> <!-- COPY -->
            <tr>
                <td bgcolor="#ffffff" align="left"
                    style="padding: 0px 30px 0px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                    <b style="margin: 0;">Vui lòng thanh toán trong vòng 24 giờ. Vì sau đó hệ thống sẽ tự động hủy đơn hàng
                        của bạn. Nếu đã thanh toán xin vui lòng bỏ qua thông báo này.</b>
                </td>
            </tr>

            <tr>
                <td bgcolor="#ffffff" align="left"
                    style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                    <p style="margin-bottom: 2rem;">Nếu bạn không thực hiện yêu cầu này xin vui lòng bỏ qua hoặc nếu cần hỗ
                        trợ hãy liên hệ với chúng tôi ngay.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" align="left"
                    style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                    <p style="margin: 0;">Trân trọng,<br>GShopvn Team</p>
                </td>
            </tr>
        </table>
    </td>
    {{-- ORDER SUCCESS --}}
@endsection
