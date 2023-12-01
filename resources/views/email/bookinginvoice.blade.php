<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px;
        }

        .property-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .booking-info {
            text-align: center;
            padding: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Property Booking Confirmation</h1>
        </div>
        <img src="{{$data->primary_image}}" alt="Property Image" class="property-image">
        <div class="booking-info">
            <h2>Booking Details</h2>
            <p><strong>Property Name:</strong>{{$data->propertyname}}</p>
            <p><strong>Check-in Date:</strong> {{$data->check_in}}</p>
            <p><strong>Check-out Date:</strong> {{$data->check_out}}</p>
            <p><strong>Total Price:</strong>{{$data->price}}</p>
			<address>{{$data->address}}</address>
			
			<h2>User Details</h2>
			 <p><strong>User Name:</strong> {{$data->username}}</p>
			 <p><strong>Email:</strong> {{$data->useremail}}</p>
			 <p><strong>Phone :</strong> {{$data->userphone}}</p>
        </div>
        <div class="footer">
            <p>This email was sent to you by team Abali.</p>
        </div>
    </div>
</body>
</html>
