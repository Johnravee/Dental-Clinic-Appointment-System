<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <script defer src="{{asset('js/profile.js')}}"></script>
</head>
<body>
   <div class="wrapper">
        <aside>
            <div class="profile-image">
                <img id="current_image" src="{{ $user_data->profile_image ? $user_data->profile_image : 'https://imgs.search.brave.com/k9CtcdTUBBZn0xsogB4cCEDsZizcrGvPtIXqgyrvZ9w/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/dXNlYXN0MS5rYXB3/aW5nLmNvbS92aWRl/b19pbWFnZS1QS0Fy/ZENqeEsucG5nP0V4/cGlyZXM9MTcyODc5/MjAwOSZHb29nbGVB/Y2Nlc3NJZD1kZXYt/c2EtdmlkZW9wcm9j/ZXNzaW5nQGthcHdp/bmctZGV2LmlhbS5n/c2VydmljZWFjY291/bnQuY29tJlNpZ25h/dHVyZT1TNGJ5aExD/MXBFNC8vbnVDRzRV/Wmd4MlI1WElrSytQ/ZmliQUVRYTNoekVW/Q1EwVFY4MEdGZEhx/bUNWem9mbWZES0Rn/RzhERnl5T3FLK3o4/emZHdkhKWkJrK2ti/UGNlQlFPRk1RSUNp/MzFPc2hOMTRiZE1I/Z2tXeFJSM0IrN0ky/QTdWMks0dkRjU1N3/TDJJWk5UNW9xR2l0/a0FudzhQbXRtVXR5/MmY1U1owbHF2U05R/bFl4MjVwNDE3R2kv/b0YxemkyY3FHTWtN/YmVRWHZpVmx0Yysv/akQyNUJ0UE4rZk1X/d3BCeTVjWTlNamtr/djN0cDc2V0JWYkFy/K2xBc1J5cCs3OVFX/bXNjREFjeXpCZTZL/ajZQZEhaVHcyOEVF/VkxBZ240eFI5WEgx/Uytta0x6dllaaDZH/b1ZPOHprL215Qy9h/SlNZMUdsbXRRYUxC/WlM2cTNuRDMxV1E9/PQ' }}" alt="profile image">
            </div>

            <div class="settings">
                <button class="settings-button"><a href="{{route('dashboard')}}">Home</a></button>
                <button class="settings-button" onclick="openModal()">Setting</button>
                <button class="settings-button"><a href="{{route('logout')}}">Logout</a></button>
            </div>
           
        </aside>
        <main>
            <div class="details">
                <div class="name">
                   <input type="text" value="Name: {{ $user_data->name }}" readonly>
                </div>
                <div class="email">
                    <input type="text" value="Email: {{ $user_data->email }}" readonly>
                </div>
                <div class="contact">
                    <input type="text" value="Contact: {{$user_data->contact}}" readonly>
                </div>
                <div class="address">
                    <input type="text" value="Address: {{$user_data->address}} " readonly>
                </div>
                <div class="gender">
                    <input type="text" value="Gender: {{$user_data->gender}}" readonly>
 </div>
                <div class="verified">
                    <input type="text" value="Verified: {{$user_data->email_verified_at}}" readonly>
                </div>
                <div class="status">
                  @if($user_data)
                        <input type="text" value="Status: Active" readonly>
                    @else
                        <input type="text" value="Status: Offline" readonly>
                    @endif
                </div>
                <div class="created_at">
                    <input type="text" value="Created at: {{$user_data->created_at}}" readonly>
                </div>
            </div>
        </main>
   </div>

  <!-- Modal for editing profile -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-image-preview">
            <img id="previewImage" src="{{ $user_data->profile_image ? $user_data->profile_image : 'https://imgs.search.brave.com/k9CtcdTUBBZn0xsogB4cCEDsZizcrGvPtIXqgyrvZ9w/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/dXNlYXN0MS5rYXB3/aW5nLmNvbS92aWRl/b19pbWFnZS1QS0Fy/ZENqeEsucG5nP0V4/cGlyZXM9MTcyODc5/MjAwOSZHb29nbGVB/Y2Nlc3NJZD1kZXYt/c2EtdmlkZW9wcm9j/ZXNzaW5nQGthcHdp/bmctZGV2LmlhbS5n/c2VydmljZWFjY291/bnQuY29tJlNpZ25h/dHVyZT1TNGJ5aExD/MXBFNC8vbnVDRzRV/Wmd4MlI1WElrSytQ/ZmliQUVRYTNoekVW/Q1EwVFY4MEdGZEhx/bUNWem9mbWZES0Rn/RzhERnl5T3FLK3o4/emZHdkhKWkJrK2ti/UGNlQlFPRk1RSUNp/MzFPc2hOMTRiZE1I/Z2tXeFJSM0IrN0ky/QTdWMks0dkRjU1N3/TDJJWk5UNW9xR2l0/a0FudzhQbXRtVXR5/MmY1U1owbHF2U05R/bFl4MjVwNDE3R2kv/b0YxemkyY3FHTWtN/YmVRWHZpVmx0Yysv/akQyNUJ0UE4rZk1X/d3BCeTVjWTlNamtr/djN0cDc2V0JWYkFy/K2xBc1J5cCs3OVFX/bXNjREFjeXpCZTZL/ajZQZEhaVHcyOEVF/VkxBZ240eFI5WEgx/Uytta0x6dllaaDZH/b1ZPOHprL215Qy9h/SlNZMUdsbXRRYUxC/WlM2cTNuRDMxV1E9/PQ' }}"  alt="Profile Image" >
        </div>
        <form id="editForm" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf 
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user_data->name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
               <input type="number" id="contact" name="contact" value="{{$user_data->contact}}" class="form-control" maxlength="12">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{$user_data->address}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="Male" {{ $user_data->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user_data->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $user_data->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="profileImage">Profile Image:</label>
                <input type="file" id="profileImage" name="profile_image" class="form-control">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            
        </form>
    </div>
</div>
@error('error')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror
</body>
</html>