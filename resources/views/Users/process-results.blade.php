<h1>User Processing Results</h1>

@if (count($processedUsers) > 0)
    <div class="processed-users">
        <h2>Processed Users</h2>
        <ul>
            @foreach ($processedUsers as $user)
                <li>
                    @include('users.user_info', ['user' => $user])
                </li>
            @endforeach
        </ul>
    </div>

    @if (count($createdUsers) > 0)
        <div class="created-users">
            <h2>Created Users</h2>
            <ul>
                @foreach ($createdUsers as $userCreated)
                    @include('users.user_info', ['user' => $userCreated])
                @endforeach
            </ul>
        </div>
    @endif

    @if (count($updatedUsers) > 0)
        <div class="updated-users">
            <h2>Updated Users</h2>
            <ul>
                @foreach ($updatedUsers as $userUpdated)
                    @include('users.user_info', ['user' => $userUpdated])
                @endforeach
            </ul>
        </div>
    @endif
@else
    <p>No users were processed.</p>
@endif
