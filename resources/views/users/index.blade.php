<x-master>
    <x-slot:title>
        User List
        </x-slot>

        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mr X</td>
                    <td>
                        <a href="{{ route('users.show', 1) }}">Show</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mr Y</td>
                    <td>
                        <a href="{{ route('users.show', 2) }}">Show</a>
                    </td>
                </tr>
            </tbody>
        </table>

</x-master>