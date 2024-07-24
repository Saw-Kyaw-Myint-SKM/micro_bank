<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .highlight {
            color: #007bff;
            font-weight: bold;
        }

        .footer {
            font-size: 14px;
            color: #666;
            margin-top: 20px;
            text-align: center;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .emoji {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>📈 Transaction History</h1>
        <p>Hi {{ $to_user_name }},</p>
        <p>You have received a transaction from <span class="highlight">{{ $from_user_name }}</span> 🏦.</p>
        <p><strong>💸 Amount:</strong> {{ number_format($amount) }} kyats</p>
        <p><strong>📝 Note:</strong> {{ $note }}</p>
        <p>Thank you for using our service! If you have any questions or need assistance, please do not hesitate to <a
                href="mailto:support@example.com">contact our support team</a> 🤝.</p>
        <p class="footer">Best regards,<br>Micro Bank</p>
    </div>
</body>

</html>
