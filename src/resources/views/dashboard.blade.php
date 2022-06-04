<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
					{{ __('Tasks') }}
			</h2>
			<a href="{{ route('tasks.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add task</a>
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
