@extends('operator.layout.main-operator')

@section('title', 'Operator - Payment') 

@section('content')

<div class="my-4 w-full mr-10 lg:mr-20">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold">Payment</h1>
            <p class="text-sm lg:text-base">You can check all payment status here</p>
            <h2 class="mt-6 text-lg lg:text-xl font-semibold">Payment history</h2>
        </div>
    </div>
    
    <div class="flex flex-col gap-3 mt-3">
        <div class="flex justify-between items-center">
            <p>Payment date</p>
            <div class="flex items-center gap-2">
                <span> : </span>
                <input type="text" class="py-1 px-4 rounded-md border border-yellow-500 text-black w-40 md:w-56 lg:w-[440px] block" value="abcdefg"></input>
            </div>
        </div>
          <div class="flex justify-between items-center">
            <p>Paid to</p>
            <div class="flex items-center gap-2">
                <span> : </span>
                <input type="text" value="abcdefg" class="py-1 px-4 rounded-md text-black border border-yellow-500 w-40 md:w-56 lg:w-[440px] block"></input>
            </div>
        </div>
          <div class="flex justify-between items-center">
            <p>Province</p>
            <div class="flex items-center gap-2">
                <span> : </span>
                <input type="text" value="abcdefg" class="py-1 px-4 text-black rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block"></input>
            </div>
        </div>
          <div class="flex justify-between items-center">
            <p>Status</p>
            <div class="flex items-center gap-2">
                <span> : </span>
                <input type="text" value="Unpaid" class="py-1 text-black px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block"></input>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <p>Proof</p>
            <div class="flex items-center gap-2">
                <span> : </span>
                <div class="w-40 md:w-56 lg:w-[440px]">
                    <div class="flex justify-center items-center flex-col border border-yellow-500 rounded-md">
                        <img src="{{ ('images/image-13.png') }}" alt="pdf" class="w-20 py-10"/>
                        <button class="bg-yellow-500 text-black py-2 w-full">Download PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="flex items-center gap-3 mt-12">
        <a href='payment-for-operator-detaill.html' class="py-2 px-4 rounded-md border border-blue-700 text-blue-700">Back</a>
    </div>

</div>

@endsection
    