@extends('mail.main')

@section('content')

{{-- RESET PASSWORD --}}
<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                <p>GShopvn xin chào,</p>
                <p style="margin: 0;">Bạn vừa yêu cầu đặt lại mật khẩu tại GShopvn, nhấn vào để đặt lại mật khẩu.</p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" align="left">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="border-radius: 3px;" bgcolor="#17a2b8"><a href="https://gshopvn.com/dat-lai-mat-khau/{{$token}}" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #17a2b8; display: inline-block;">Đặt lại mật khẩu</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                <p style="margin: 0;">Hoặc nhấn vào liên kết dưới đây:</p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                <small style="margin: 0;"><a href="https://gshopvn.com/dat-lai-mat-khau/{{$token}}" target="_blank" style="color: #FFA73B;">https://gshopvn.com/dat-lai-mat-khau/{{$token}}</a></small>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                <p style="margin: 0;">Nếu bạn không thực hiện yêu cầu này xin vui lòng bỏ qua hoặc nếu cần hỗ trợ hãy liên hệ với chúng tôi ngay.</p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                <p style="margin: 0;">Trân trọng,<br>GShopvn Team</p>
            </td>
        </tr>
    </table>
</td>

@endsection