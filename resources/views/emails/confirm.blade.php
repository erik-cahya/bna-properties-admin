<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Inquiry Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .header {
            background: #1e293b;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
        }
        .content h2 {
            margin-top: 0;
            color: #1e293b;
        }
        .details {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
        }
        .details p {
            margin: 6px 0;
            font-size: 14px;
        }
        .footer {
            background: #f1f5f9;
            color: #64748b;
            text-align: center;
            padding: 15px;
            font-size: 12px;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
        }
        .btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your Booking is Confirmed 🎉</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $details['customer_name'] }},</h2>
            <p>We’re excited to let you know that your booking has been successfully confirmed!</p>

            <div class="details">
                <p><strong>Property:</strong> {{ $details['property_name'] }}</p>
                <p><strong>Check-in Date:</strong> {{ \Carbon\Carbon::parse($details['start_date'])->format('F j, Y') }}</p>
                <p><strong>Check-out Date:</strong> {{ \Carbon\Carbon::parse($details['end_date'])->format('F j, Y') }}</p>
            </div>

            <p>We look forward to hosting you. If you have any questions or special requests, please don’t hesitate to contact us.</p>

        </div>
        <div class="footer">
            Thank you for choosing BNA Property.<br>
            &copy; {{ date('Y') }} BNA Property
        </div>
    </div>

</body>
</html>
