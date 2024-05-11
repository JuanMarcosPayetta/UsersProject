<strong>User Information:</strong><br>
<ul>
    <li><strong>UID:</strong> {{ $user->uid }}</li>
    <li><strong>First Name:</strong> {{ $user->first_name }}</li>
    <li><strong>Last Name:</strong> {{ $user->last_name }}</li>
    <li><strong>Username:</strong> {{ $user->username }}</li>
    <li><strong>Email:</strong> {{ $user->email }}</li>
    <li><strong>Gender:</strong> {{ $user->gender }}</li>
    <li><strong>Phone Number:</strong> {{ $user->phone_number }}</li>
    <li><strong>Social Insurance Number:</strong> {{ $user->social_insurance_number }}</li>
    <li><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</li>
</ul>

<strong>Employment Information:</strong><br>
<ul>
    <li><strong>Title:</strong> {{ $user->employment->title }}</li>
    <li><strong>Key Skill:</strong> {{ $user->employment->key_skill }}</li>
</ul>

<strong>Address Information:</strong><br>
<ul>
    <li><strong>City:</strong> {{ $user->address->city }}</li>
    <li><strong>Street Name:</strong> {{ $user->address->street_name }}</li>
    <li><strong>Street Address:</strong> {{ $user->address->street_address }}</li>
    <li><strong>Zip Code:</strong> {{ $user->address->zip_code }}</li>
    <li><strong>State:</strong> {{ $user->address->state }}</li>
    <li><strong>Country:</strong> {{ $user->address->country }}</li>
    <li><strong>Lat:</strong> {{ $user->address->lat }}</li>
    <li><strong>Ing:</strong> {{ $user->address->lng }}</li>
</ul>

<strong>Credit Card Information:</strong><br>
<ul>
    <li><strong>CC Number:</strong> {{ $user->credit_card->cc_number }}</li>
</ul>

<strong>Subscription Information:</strong><br>
<ul>
    <li><strong>Plan:</strong> {{ $user->subscription->plan }}</li>
    <li><strong>Status:</strong> {{ $user->subscription->status }}</li>
    <li><strong>Payment Method:</strong> {{ $user->subscription->payment_method }}</li>
    <li><strong>Term:</strong> {{ $user->subscription->term }}</li>
</ul>

<hr>
