<x-app-layout>
	<x-slot name="header"></x-slot>
	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="code-preview rounded-xl bg-gradient-to-r bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 p-2 sm:p-6 dark:bg-gray-800">
					<div class="flex items-center space-x-4">
						<svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
						<div class="space-y-1 font-medium dark:text-white">
							{{-- <div>{{ $invitation->sender->name }} has invited you to join his team {{ $invitation->team->name }}</div> --}}
							<a href="{{ route('invitations.accept', $invitation->token) }}" target="_blank" class="inline-flex items-center text-xs text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-white-800 font-medium rounded-lg text-sm px-4 py-2 text-center">
								<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
								<span>Join</span>
							</a>
						</div>
					</div>
				</div>
			</div>
	</div>
</x-app-layout>
