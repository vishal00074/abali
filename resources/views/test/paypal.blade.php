<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  
        <title>Abali</title>
  
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
  
      <style>
body.payment-card {
    background: url(../frontend/assets/images/pay-bg.jpg) no-repeat;
    background-size: cover;
    background-position: center;
}
body.payment-card .card-center {
    height: 100vh;
}
.row.vcenter {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.panel-default>.panel-heading {
    background-color: #fed600;
    border-color:#fed600;
}
.panel-default>.panel-heading h3 {
    font-size: 18px;
    font-weight: 600;
}
.form-control {
height: 44px;}

.pay-pmnt {
    background: #fff;
    padding: 50px;
    text-align: center;
    margin: 0 auto;
    display: block;
    border-radius: 10px;
}
.pay-pmnt img {
    margin-bottom: 25px;
}
		</style>
    </head>
    <body class="payment-card">
	
	<div class="container">
        <div class="row vcenter">
  
            <div class="col-md-5">
			<div class="pay-pmnt">
                <h1>Paypal Payment </h1>
                  
                <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table>
                <form action="{{ url('paypal_post') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="hidden" name="bookingID" value=" {{ $data->bookingID  }} ">
                    <input type="hidden" name="price" value="{{ $data->price }}">
                    <button type="submit" class="btn btn-success">Pay £{{ $data->price }} from Paypal</button>
                </form>
                
  
            </div></div>
        </div>   </div>
    </body>
</html> 