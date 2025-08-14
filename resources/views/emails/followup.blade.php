<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>A friendly reminder from DoxTreet</title>
    <style>
        body { margin: 0; padding: 0; width: 100%; background-color: #f8f9fa; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; }
        .wrapper { width: 100%; background-color: #f8f9fa; padding: 40px 0; }
        .inner-wrapper { width: 90%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; padding: 40px; text-align: center; border: 1px solid #dee2e6; }
        h2 { color: #212529; font-size: 24px; }
        p { font-size: 16px; color: #495057; line-height: 1.6; }
        .cta-button { display: inline-block; background-image: linear-gradient(to right, #007bff, #17a2b8); color: #ffffff; padding: 14px 28px; border-radius: 5px; text-decoration: none; font-weight: bold; margin-top: 20px; font-size: 16px; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="inner-wrapper">
        <h2>Hi {{ $user->name }},</h2>

        <p>A few months have passed since you joined DoxTreet.<br>We hope we helped you handle your paperwork easily and without the usual headache.</p>

        <p>Life is always moving, and new tasks often appear—from business contracts to personal agreements.</p>

        <p>Just a friendly reminder that we're always here to make the complicated simple for you.</p>

        <a href="{{ url('/') }}" class="cta-button">Visit DoxTreet</a>
    </div>
    <div class="footer">
        <p>&copy; 2025 DoxTreet. All rights reserved.</p>
    </div>
</div>
</body>
</html>
