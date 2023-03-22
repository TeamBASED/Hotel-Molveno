<x-layout.base>
    <main id="reservation-overview">
    <h2>Users</h2>

    <article class="flex-center">
        <div class="flex-column left-side padding-inline-1rem padding-block">
            <h3>Search user</h3>
            Hier komen zoekvelden.
        </div>
        <div class="right-side padding-inline-5rem padding-block">
            <div class="grid-two-columns no-horizontal-gap ">
            <h3>User</h3>
            <h3>Role</h3>

            @foreach ($users as $user)

                <p class="gray-background padding-inline-5rem">{{ $user->first_name }} {{ $user->last_name }}</p>
                <p class="gray-background padding-inline-5rem">{{ $user->role->title}}</p>

                    
                </p>
                        
            @endforeach
    


            </div>

        </div>
    
    </article>

    </main>
</x-layout.base> 
