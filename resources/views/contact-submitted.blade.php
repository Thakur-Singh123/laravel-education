<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Submitted</title>
</head>
<body>
    <h1>Contact Submitted</h1>
    <p>A new contact has been submitted:</p>
    <ul>
        <li>Name: {{ $newContact->name }}</li>
        <li>Email: {{ $newContact->email }}</li>
        <li>Subject: {{ $newContact->subject }}</li>
        <li>Message: {{ $newContact->message }}</li>
    </ul>
</body>
</html>
