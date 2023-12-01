<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Email</title>
   </head>
   <body>
        <p><br>{{ $detail['body'] }}</p>
        <p><h3><u>User Information</u> :</h3></p>
        
        <table>
            <tr>
                <th align="left">Name &nbsp;&nbsp;&nbsp;&nbsp;</th>
                <td>{{ $detail['name'] }}</td>
            </tr>
            
        </table>
        <br><br>
        
       
        
        <div>
            <p>Best regards,</p>
		    <p>The Abali Team</p>
        </div>
   </body>
</html>