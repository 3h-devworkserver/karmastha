<form name="MyForm" method="POST" action="https://www.ipay.com.np/Payment/VerifyTransaction" >             
	<input name="MerchantId" type="hidden" value="939a8cc6-cda2-47f7-a25a-a1ccf0f45721">             
	<input name="TransactionId" type="hidden" value="Service ID, Service Type, Service Details"> 
	<input name="Confirmation_Code" type="hidden" value="Confirmation_Code">             
	<input name="ReturnUrl" type="hidden" value="{{url('verify/success')}}">             
	<input name="ErrorUrl" type="hidden" value="{{url('verify/cancel')}}">            
	<input name="Amount" type="hidden" value="1000.00"> 
	<input name="SessionKey" type="hidden" value="SessionKey">          
</form>
<script src="{{asset('js/frontend/jquery.min.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('form').submit();
	})
</script>
