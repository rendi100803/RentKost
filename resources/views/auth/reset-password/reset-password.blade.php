@extends('auth.index_login')
@section('content')
    <div class="container p-3 mx-auto">
        <section>
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen md:h-screen lg:py-0">
                <a href="{{ route('login.index') }}"
                    class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    {{-- <img class="w-8 h-8 mr-2" src="" alt="logo"> --}}
                    Bharata.id
                </a>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 max-w-md sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 shadow">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Enter the email address registered on your account
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="{{ route('reset-password.process') }}" method="POST">
                            @csrf
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter Your Email">
                                @error('email')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
                                in</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Forgot It? <a class="font-medium text-primary-600 dark:text-primary-500"
                                    href="{{ route('login.index') }}">Send me Back</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
