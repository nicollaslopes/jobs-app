<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/mail.css') }}"> --}}
    <title>Job Application Notification</title>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h2>New Job Application Received!</h2>
        </div>
        <div class="content">
            <p>Dear {{ $data['recruiter_name']}},</p>

            <p>You have received a new application from <strong>{{$data['candidate_name']}}</strong> for the position of <strong>{{ $data['job_position'] }}</strong>.</p>
            <p>Candidate's contact: <strong>{{ $data['candidate_email'] }} </strong></p>

            {{-- <p>The candidate's main technologies are: <strong>{technologies}</strong>.</p> --}}

            <p>Best regards.<br>*Your App*</p>
        </div>
    </div>
</body>
</html>
