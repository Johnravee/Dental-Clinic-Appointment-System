<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
            line-height: 1.5;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px; /* Adjust size as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo">
        </div>
        <h1>Appointment Confirmation</h1>
        <p>Hello, {{ $data['name'] }}</p>
        <p>Thank you for booking your appointment with us!</p>
        <p>Your appointment details are as follows:</p>
        <ul>
            <li><strong>Date:</strong> {{ $data['appointment_date'] }}</li>
            <li><strong>Status:</strong> {{ $data['status'] }}</li>
        </ul>
        <p>Please note that our store hours are from <strong>9 AM to 5 PM</strong>. If you have any questions or need to reschedule, please don't hesitate to contact us.</p>
        <p>We look forward to seeing you soon!</p>
        <div class="footer">
            <p>Best regards,<br>Dental Clinic</p>
        </div>
    </div>
</body>
</html>
