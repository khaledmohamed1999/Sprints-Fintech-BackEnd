<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Linked Cards') }}
                    </h2>
                    <table class="table">
                        <th>Card Name</th>
                        <th>Card Number</th>
                        <th>Card expiry date</th>
                        <th>Default</th>
                        @foreach ($cards as $card)
                        <tr>
                            <td>{{$card->name}}</td>
                            <td>{{$card->number}}</td>
                            <td>{{$card->expiry}}</td>
                            @if ($card->default==1)
                            <td>Default</td>
                            @else
                            <td><a href="{{url('profile/set-default-card/'.$card->number)}}" class="border border-transparent rounded-md font-semibold btn btn-success focus:ring-offset-2 transition ease-in-out duration-150">Set</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                    <a href="{{url('wallet/bank-linking')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">Add Card</a>
                </div>
            </div>



            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
