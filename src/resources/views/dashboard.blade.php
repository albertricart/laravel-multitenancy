<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
					{{ __('Tasks') }}
			</h2>
			
			<a href="{{ route('tasks.create') }}" class="inline-flex items-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-4 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
				<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
				Add task
			</a>
	</x-slot>
	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
					<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
						<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
							<table class="w-full text-sm text-left text-gray-500">
									<thead class="text-xs text-gray-700 uppercase bg-gray-50">
											<tr>
													<th scope="col" class="px-6 py-3">
														Task name
													</th>
													<th scope="col" class="px-6 py-3">
														Description
													</th>
													<th scope="col" class="px-6 py-3">
														Created by
													</th>
													<th scope="col" class="px-6 py-3">
														Created at
													</th>
											</tr>
									</thead>
									<tbody>
										@foreach (auth()->user()->tasks as $task)
										<tr class="bg-white border-b -800 hover:bg-gray-50">
												<th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
														{{ $task->name }}
												</th>
												<td class="px-6 py-4">
													{{ $task->description }}
												</td>
												<td class="px-6 py-4">
													{{ $task->user->name }}
												</td>
												<td class="px-6 py-4">
													@datetime($task->created_at)
												</td>
										</tr>
										@endforeach
									</tbody>
							</table>
					</div>
					</div>
			</div>
	</div>
</x-app-layout>
