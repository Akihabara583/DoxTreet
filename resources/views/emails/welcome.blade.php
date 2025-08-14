<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to DoxTreet!</title>
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
        <h2>The era of complicated paperwork is over.</h2>

        <p>Welcome, {{ $user->name }}!</p>

        <p>Your DoxTreet account is active, and you're all set to create, sign, and manage documents in minutes. No lawyers, no queues.</p>

        <a href="{{ route('dashboard') }}" class="cta-button">Go to Your Dashboard</a>
    </div>
    <div class="footer">
        <p>&copy; 2025 DoxTreet. All rights reserved.</p>
    </div>
</div>
</body>
</html>
