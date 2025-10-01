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
            <h1>📩 New Inquiry Received</h1>
        </div>
        <div class="content">
            <h2>Hello Admin,</h2>
            <p>You’ve received a new inquiry from your website. Here are the details:</p>

            <div class="details">
                <p><strong>Name:</strong> {{ $details['name'] }}</p>
                <p><strong>Email:</strong> {{ $details['email'] }}</p>
                <p><strong>Phone:</strong> {{ $details['phone'] ?? 'N/A' }}</p>
                <p><strong>Message:</strong><br>{{ $details['message'] }}</p>
                <p><strong>Property ID:</strong><br>{{ $details['property_id'] }}</p>
                <p><strong>Property Name:</strong><br>{{ $details['property_name'] }}</p>
            </div>

            <a href="{{ url('/bookings') }}" class="btn">View in Dashboard</a>
        </div>
        <div class="footer">
            This is an automated notification from your website.<br>
            &copy; {{ date('Y') }} Ilot Property Bali
        </div>
    </div>
</body>
</html>
