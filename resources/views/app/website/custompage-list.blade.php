<x-app-layout>
    @include('layouts.website-navigation')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!count($customPages))
                        <a class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg mb-6" href="{{ route('app.website.custompage.create') }}">{{ __('New custom page') }}</a>
                        <h2 class="flex justify-center text-red-500 text-2xl font-bold">{{ __('No custom page') }}</h2>

                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-1/3 w-1/3 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    @else
                        <a class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg mb-6" href="{{ route('app.website.custompage.create') }}">{{ __('New custom page') }}</a>
                        <div class="flex flex-col mb-4">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ __('Status') }}
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ __('title') }}
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">{{ __('Edit') }}</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($customPages as $customPage)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <livewire:active-custompage :custompage="$customPage"/>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{ $customPage->title }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a alt="{{ __('Edit') }}" href="{{ route('app.website.custompage.edit', $customPage->id) }}" class="bg-gray-100 hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 inline-block align-middle">
                                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                            </svg></a>
                                                        <a alt="{{ __('Delete') }}" href="{{ route('app.website.custompage.destroy', $customPage->id) }}" class="bg-gray-100 hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 inline-block align-middle">
                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ $customPages->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@livewireScripts
