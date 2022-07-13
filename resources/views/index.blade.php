@extends('layouts.main')

@section('content') 

<div class="bg-theme">
    <div class="container mx-auto px-12">
        <div class="grid place-content-center text-center">
            <div class="text-slab mt-[0px] md:mt-[35px] xl:mt-[100px] font-bold text-[14px] sm:text-[18px] md:text-[38px] leading-1 md:leading-[50px]">Search Your Favorite Store!</div>
            <div class="hidden md:block" style="font-style: normal;font-weight: 400;font-size: 18px;line-height: 32px">Search For More Than 10,000 Coupons and Deals</div>
            <div class="form-control md:w-[784px] mt-[5px] md:mt-[15px]">
                <form type="get" action="/search">
                    @csrf
                    <div class="relative ">
                        <span class="absolute inset-y-0 inline-flex items-center left-4">
                        <svg style="color:orange" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </span>
                        <input name="key" type="text" class="w-full border-gray-200 rounded-lg shadow-sm text-[14px] md:text-[22px] h-[45px] md:h-[78px]" style="padding-left:50px;"/>
                    </div>
                </form>
            </div>
            
            <div class="text-slab mt-[20px] lg:mt-[50px] text-[16px] md:text-[25px] lg:text-[32px] text-white font-bold">Top Coupons and Deals</div>
        </div>
    </div>
    
</div>
<div class="bg-white relative" >
    <div class="bg-theme absolute w-full h-full xl:h-1/2"></div>
    <div class="container mx-auto px-12" style="padding-top:15px;">
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-2 lg:gap-4 ">
            @foreach($data['best'] as $best) 
                <div class="box-1 w-full p-1 md:p-2 lg:p-4 mb-2 xl:mb-0 text-center h-[180px] md:h-[230px] lg:h-[300px]">
                    <a href="/{{$best->alias}}"><img src="{{$best->logo}}" alt="" class="object-contain object-center md:object-center w-full h-1/2"></a>
                    <div class="text-center text-[18px] lg:text-[28px] pt-2 text-[#F87400] font-bold text-roboto">{{ ($best->discount != null)?$best->discount:0 }}% Discount</div>
                    <button onclick=" window.open('{{$best->affiliate_url}}','_blank')" class="object-bottom text-center bg-[#646464] hover:bg-[#848484] w-2/3 lg:w-full p-[5px] md:p-[8px] lg:p-[13px] mt-[10px] rounded-[15px] text-roboto text-[18px] md:text-[22px] lg:text-[28px] text-[#ffffff] font-bold ">Get Code</button>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div style="background:white">
    <div class="container text-slab mx-auto px-12 py-[5px] lg:py-[20px] text-[18px] lg:text-[28px] text-right md:text-left" style="color:#646464; font-weight:700;"> Our Best Stores</div>
</div>

<div style="background:white;">
    <div class="container mx-auto px-12">
        <div class="grid grid-cols-1 sm: grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-2">
            @foreach($data['top'] as $top)
                <div class="box-2 p-2 md:p-6 hover:shadow-md h-[100px] md:h-[200px]">
                    <a href="/{{$top->alias}}"><img src="{{$top->logo}}" alt="" class="object-contain object-center md:object-center w-full h-1/2"></a>
                    <div class="text-roboto w-full text-center text-bottom pt-2 md:pt-8 text-[#7AC920] text-[14px] md:text-[25px] font-bold hover:text-[#2cbd2c]"><a href="" class="">Get Code</a></div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div style="background: #d3d3d3; margin-top:25px;">
    <img src="{{ asset('img/v2/image 23.png') }}" style="max-height:620px; width:100%">
</div>

<div style="background:white">
    <div class="container text-slab mx-auto px-12 py-[5px] md:py-[20px] lg:py-[50px] text-[14px] md:text-[28px] xl:text-[32px]"  style="color:#646464; font-weight:700;">Latest Coupons and Deals</div>
</div>

<div style="background:white">
    <div class="container text-slab mx-auto px-12">
        @foreach($data['latestcoupon'] as $latest)
            <div class="border border-[#b8b8b8] rounded-[15px] w-full mb-[10px] md:mb-[40px] flex flex-wrap md:flex-nowrap p-2 md:p-4 gap-x-10 text-center md:text-left">
                <div class="flex-none w-full md:w-auto">
                    <a href="/{{$latest->alias}}" class="w-full md:w-auto inline-block"><img src="{{$latest->logo}}" class="w-32 h-16 object-contain mx-auto" alt=""></a>
                </div>
                <div class="flex-auto w-full ">
                    <div class="text-slab text-[10px] md:text-[14px] lg:text-[24px] text-[#646464] mt-[10px] font-bold">{{$latest->title}}</div>
                    <div class="text-roboto text-[12px] lg:text-[16px] text-[#646464]">by {{$latest->name}}</div>
                </div>
                <?php 
                    $btn_text = ($latest->type == 'Coupon Code')?"Get Code":$latest->type;  
                    $btn_color = ($latest->type == 'Coupon Code')?'#7AC920':'#e39c18';
                ?>
                <button class="flex-none w-32 mt-[10px] md:mt-[0px] mx-auto bg-[{{$btn_color}}] text-slab text-center text-[12px] md:text-[18px] font-bold object-scale-down w-full p-[5px] text-white rounded-[15px] self-center">{{$btn_text}}</button>
            </div>
        @endforeach
    </div>
</div>

<div style="background:white">
    <div class="container text-slab mx-auto px-12"  style="color:#646464; font-weight:700;padding-top:50px; padding-bottom:50px;font-size:32px;">New Stores</div>
</div>

<div class="bg-white pb-[25px]">
    <div class="container mx-auto px-12">
        <div class="grid grid-cols-1 sm: grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-2">
            @foreach($data['lateststore'] as $latest)
                <div class="box-2 p-6 hover:shadow-md">
                    <a href="/{{$latest->alias}}"><img src="{{$latest->logo}}" alt="{{$latest->logo}}" class="object-contain object-center md:object-center w-full h-full"></a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('elements.contents.subscribe') 

@endsection