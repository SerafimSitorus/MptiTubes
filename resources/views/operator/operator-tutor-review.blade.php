@extends('operator.layout.main-operator')

@section('title', 'Operator - Tutor Review') 

@section('content')

<div class="my-4 w-full px-4 lg:px-20 overflow-auto">
  <div class="flex justify-between md:items-end md:flex-row flex-col">
      <div>
          <h1 class="text-xl lg:text-3xl font-bold">Tutor Management</h1>
          <p class="text-sm lg:text-base">You can manage all section related to private tutor here</p>
          <h2 class="mt-6 text-lg lg:text-xl font-semibold">Tutor Review</h2>
      </div>
      <h1 class="mt-6 text-lg lg:text-xl font-semibold">Sumatera Utara</h1>
  </div>
  <div class="overflow-x-auto mt-6">
      <table class="min-w-full  border border-gray-200">
          <thead class="bg-blue-800 rounded-xl">
              <tr class="rounded-md">
                  <th class="text-white text-left px-3 py-2 lg:px-6 lg:py-3">Username</th>
                  <th class="text-white text-left px-3 py-2 lg:px-6 lg:py-3">City</th>
                  <th class="text-white text-left px-3 py-2 lg:px-6 lg:py-3">Grade</th>
                  <th class="text-white text-left px-3 py-2 lg:px-6 lg:py-3">Actions</th>
              </tr>
          </thead>
          <tbody>
              <tr class="border-t border-gray-200">
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">@JohnDoe</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">Binjai</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">Bad</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left"><a href="operator-tutor-review-detail" class="underline text-blue-700">See details</a></td>
              </tr>
              <tr class="border-t border-gray-200">
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">@SarahWilliams</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">Medan</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">Good</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left"><a href="operator-tutor-review-detail" class="underline text-blue-700">See details</a></td>
              </tr>
              <tr class="border-t border-gray-200">
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">@EmmaW</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">Medan</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">Very Good</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left"><a href="operator-tutor-review-detail" class="underline text-blue-700">See details</a></td>
              </tr>
              <tr class="border-t border-gray-200">
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">@KatteWil</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">Medan</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left">Bad</td>
                  <td class="px-3 py-2 lg:px-6 lg:py-3 text-left"><a href="operator-tutor-review-detail" class="underline text-blue-700">See details</a></td>
              </tr>
          </tbody>
      </table>
  </div>
  <div class="flex justify-between gap-3 md:items-center mt-6 flex-col md:flex-row">
      <div>
          <label for="role">Rows per page</label>
          <select class="py-2 px-3 bg-yellow-100 rounded-md text-black" name="role" id="role">
              <option value="1">1</option>
          </select>
      </div>
      <div class="flex gap-2 flex-row items-center">
          <button class="py-2 px-4 bg-yellow-100 rounded-md text-black">&lt;</button>
          <span class="py-2 px-4 bg-yellow-100 rounded-md text-black">1</span>
          <span>/ 1</span>
          <button class="py-2 px-4 bg-yellow-100 rounded-md text-black">&gt;</button>
      </div>
  </div>
</div>
@endsection
    