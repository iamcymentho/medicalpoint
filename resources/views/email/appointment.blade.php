<div class="card">
    <div class="card-body ">
        Dear {{$mailData['name']}},
<p>Thank you for booking your appointment with Medical Point Center</p>
<p>The details of your appointment are below:</p>
Time & Date: {{$mailData['time']}}, {{$mailData['date']}}<br>
with:Dr. {{$mailData['doctorName']}}<br>

<b>Location:</b> Main office,Lagos
<b>Contact:</b>(04)456789
    </div>

    <div class="card-footer">
        <h3>Leading the way in medical excellence</h3>
    </div>
</div>