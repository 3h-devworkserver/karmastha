<div style="margin: 0 auto; padding: 50px 0; width: 100%;"><center>
<table style="width: 600px; margin: 0px auto; background: #fff; padding: 0px; border: 1px solid #ececec;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr class="logo">
<td style="padding: 0 20px 10px; border-bottom: 1px dashed #500847; margin: 0;"><a style="display: block;" href="{{url('/')}}"> <img class="w320" src="{{getLogoUrl()}}" alt="company logo" height="100" /> </a></td>
</tr>
<tr class="main-content" style="padding: 0; margin: 0;">
<td style="font-size: 14px; padding: 20px 20px 0px; font-weight: 600; font-family: Arial; margin-top: 10px;">
<p style="padding: 0 0 5px 0; margin: 0;">Hello {{ $user['name'] }},<br /><br /></p>
</td>
</tr>
<tr class="mobile-spacing" style="font-size: 14px; padding: 10px 20px; margin: 0; font-family: Arial;">
<td style="padding: 0px 20px 20px 20px;">
<p style="padding: 0 0 5px 0; margin: 0;">Thank you for registering with us.<a href="{{route('frontend.auth.account.confirm', $user['confirmation_code'] )}}">Please Click on following link to activate your account.</a></p>
</td>
</tr>
<tr class="w320 mobile-spacing" style="font-size: 14px; padding: 0px; margin: 0; font-family: Arial;">
<td style="padding: 0px 20px 20px 20px;">
<p style="padding: 0 0 5px 0; margin: 0; color: #52595f; font-style: italic;">If you have any queries, please feel free to contact us at <a style="color: #500847;" href="mailto:info@upeverest.com">info@karmastha.com</a></p>
</td>
</tr>
<tr class="footer" style="padding: 0; margin: 0;">
<td style="padding: 0 20px 10px; font-family: Arial;">
<p style="font-size: 14px; line-height: normal; margin: 0; padding: 20px 0 0 0; color: #52595f; border-top: 1px dashed #ccc; font-weight: bold;">Regards,</p>
</td>
</tr>
<tr>
<td style="font-family: Arial; margin: 0 0 20px 0; padding: 0 20px 0;">
<p style="font-size: 14px; line-height: normal; margin: 0 0 20px 0; padding: 0;">Karmastha Team</p>
</td>
</tr>
</tbody>
</table>
</center></div>