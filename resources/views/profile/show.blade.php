
<div class="container">
    <h1>Profile</h1>

    <!-- Update Profile Information -->
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}">
        </div>
        <button type="submit">Update Profile</button>
    </form>

    <!-- Update Password -->
    <form action="{{ route('profile.password.update') }}" method="POST">
        @csrf
        <div>
            <label>Current Password:</label>
            <input type="password" name="current_password">
        </div>
        <div>
            <label>New Password:</label>
            <input type="password" name="password">
        </div>
        <div>
            <label>Confirm New Password:</label>
            <input type="password" name="password_confirmation">
        </div>
        <button type="submit">Update Password</button>
    </form>

    <!-- Update Permissions -->
    <form action="{{ route('profile.permissions.update') }}" method="POST">
        @csrf
        <div>
            <label>Role:</label>
            <select name="role">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit">Update Permissions</button>
    </form>
</div>

