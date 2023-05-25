<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('dashboard') }}" method="post">
                        @csrf

                        <input type="text" name="search" value="{{ old('search') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <div>
                            <select name="column"
                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                                <option value="" {{ request()->column == '' ?'selected' : ''  }}>---</option>
                                <option value="name" {{ request()->column == 'name' ?'selected' : ''  }}>Name</option>
                                <option value="email" {{ request()->column == 'email' ?'selected' : ''  }}>Email
                                </option>
                            </select>
                            @error('column')
                            <div class="text-red-400 font-bold">{{ $message }}</div>
                            @enderror
                        </div>


                        <select name="direction" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="asc"  {{ request()->direction == 'asc' ?'selected' : ''  }}>asc</option>
                            <option value="desc" {{ request()->direction == 'desc' ?'selected' : ''  }}>desc</option>
                        </select>


                        <button>search</button>
                    </form>
                </div>
            </div>

            <div class="text-white my-4 font-bold">
                {{ request()->get('search') }}
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>NAO ADMIN</div>
                    <ul>
                        @foreach($users as $user)
                            <li>{{ $user->id }} :: {{ $user->name }} :: {{ $user->email }} ::j

                                <span @class(['bg-green-100 text-green-600' => $user->admin])>{{ $user->admin ? 'EH ADMIN' : 'NAO EH ADMIN'}}</span>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
