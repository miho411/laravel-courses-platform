<!DOCTYPE html>
<html dir="rtl" lang="ar"> <!-- lang="ar": يحدد أن لغة الصفحة هي العربية-->
<!-- dir="rtl": يضبط الاتجاه الافتراضي للنص ليكون من اليمين إلى اليسار -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>آفاق | دورات تدربية</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style=" font-family: 'Noto Sans Arabic', sans-serif;">

        <div class="shadow-lg fixed top-0 right-0 left-0 z-10 bg-white" x-data="{ open: false }">
            <div class="container mx-auto h-20 px-4 pt-3 flex justify-between">
                <div class="flex items-center gap-x-8">
                    <a href="/" class="relative -top-2">
                        <img src="{{ asset('images/Red AFAQ Logo Ver.png') }}" alt="AFAQ logo" class="w-36 h-auto" >
                    </a>
                    <a href="" class="text-[#333] font-bold active:underline active:decoration-20 active:underline-offset-8 active:decoration-myRed hover:text-myRed">فئات</a>
                    @if (Auth::user()?->role === 'instructor')
                        <a href="{{ route('instructor.dashboard', Auth::user()->id) }}" class="text-[#333] font-bold active:underline active:decoration-20 active:underline-offset-8 active:decoration-myRed hover:text-myRed">لوحة تحكم المدرب</a>
                    @elseif (Auth::user() !== null)
                        <a href="{{ route('instructor.create1', Auth::user()->id) }}" class="text-[#333] font-bold active:underline active:decoration-20 active:underline-offset-8 active:decoration-myRed hover:text-myRed">سجل كمدرب</a>
                    @else
                        <a href="{{ route('instructor.create2') }}" class="text-[#333] font-bold  active:underline active:decoration-20 active:underline-offset-8 active:decoration-myRed hover:text-myRed">سجل كمدرب</a>
                    @endif

                </div>
                <div class="flex items-center">
                    <form >

                          <div class="relative group">
                            <input
                            class=" w-[250px] bg-[#f4f4f4] placeholder:text-[#757575] placeholder: text-slate-700 text-sm border border-[#f4f4f4] rounded-full px-3 py-2 transition duration-300  focus:border-[#f7e4d6] focus:bg-[#f7e4d6] focus:ring-0 "
                            placeholder="ابحث"
                            />
                            <button
                            class="absolute top-2 left-3 "
                            type="button"
                            >
                               <i class="fa-solid fa-magnifying-glass text-lg text-[#757575] group-focus-within:text-myRed transition duration-300 "></i>

                            </button>
                          </div>

                    </form>
                </div>
                @if (Route::has('login'))
                <div class="flex items-center gap-x-3">
                    @auth

                       <div class="flex items-center gap-x-3">
                        <a href="#" class="relative top-[3px] ">
                            <i class="fa-regular fa-heart text-xl "></i>
                        </a>

                        <a href="#" class="relative top-[4px] ">
                            <i class="fa-solid fa-cart-shopping text-xl "></i>
                        </a>

                        <a href="#" class="bg-myRed px-3 py-2 text-white font-bold rounded-full hover:bg-myRedd active:bg-myRed">
                            لوحتي التعليمية
                        </a>


                       </div>

                       <div class="hidden sm:flex sm:items-center ">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('حسابي') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('تسجيل خروج') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                        <a
                            href="{{ route('register') }}"
                            class="bg-myRed px-3 py-2 text-white font-bold rounded-full hover:bg-myRedd active:bg-myRed"
                        >
                            تسجيل جديد
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('login') }}"
                                class="px-3 py-2 text-myRed font-bold rounded-full border border-myRed hover:bg-myRedd hover:text-white "
                            >
                                تسجيل دخول
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            </div>


        </div>
        <div class="pt-[120px] pb-[40px] flex items-center justify-center container mx-auto ">
          <div class="w-[550px] mt-12" >
            <h2 class="text-3xl font-bold text-[#333]">تعلم، تطوّر، انطلق!</h2>
            <h3 class="text-2xl text-[#333] mt-2 mb-4">انضم إلى منصتنا التعليمية واكتسب المعرفة من خلال دورات أونلاين تفاعلية تمنحك تجربة تعلم ممتعة ومرنة. ابدأ رحلتك اليوم واكتشف آفاقًا جديدة من التطور والإبداع.</h3>
            <a href="#courses" class="inline-block px-6 py-2 bg-myRed hover:bg-myRedd active:bg-myRed text-white text-2xl rounded-full ">تصفح</a>
          </div>
          <img src="images/background1.png" alt="bg" class="w-[620px] h-auto">
        </div>
        <div class="bg-[#f6f6f6] py-[40px]" id="courses">
            <div class="container mx-auto">
                <h2 class="text-3xl text-[#333] font-bold">
                    <span>الدورات </span>
                    <span class="text-myRed">التدربية</span>
                </h2>
                <ul class="flex gap-x-2 py-5 text-xl text-[#333]">
                    <li><a href="#">أحدث الدورات -</a></li>
                    <li><a href="#">الأكثر مبيعاً -</a></li>
                    <li><a href="#">الدورات المجانية</a></li>
                </ul>
                <div class="flex flex-wrap gap-4">
                    @foreach ($courses as $course)
                        <div class="w-[260px] h-[300px] shadow-lg rounded-xl bg-white relative overflow-hidden">
                            <img src="{{ asset('storage/'. $course->cover_image) }}" alt="course image" class=" w-full h-1/2 object-cover ">
                            <div class="absolute top-3 right-2 left-2 flex items-center justify-between px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="size-7 text-white">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                <span class="bg-[#f7e4d6] text-myRed text-xs font-semibold px-4 py-1 rounded-full shadow">
                                   {{ $course->category->name }}
                                </span>
                            </div>
                            <div class="py-3 px-4 flex flex-col gap-3">
                                <div class="flex items-center gap-2 pb-3 border border-x-transparent border-t-transparent">
                                    <img src="{{ asset('storage/'. $course->user->profile_photo) }}" alt="profile photo" class="rounded-full w-[45px] h-[45px] object-cover aspect-square flex-shrink-0">
                                    <div>
                                        <h3 class="font-semibold text-gray-800 line-clamp-1">{{$course->title}}</h3>
                                        <p class="text-gray-500 text-xs">{{$course->user->name}}</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="font-bold">{{$course->price}}</span>
                                        <span class="text-xs font-semibold">د.ل</span>
                                    </div>
                                    <a href="#" class="py-2 px-3 bg-[#ededed] rounded-lg text-xs font-semibold">أضف للسلة</a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="pt-8">
                    {{ $courses->links() }}
                </div>

            </div>
        </div>
        <div class="bg-[#f7e4d6] pt-10 pb-[15px]">
            <div class="container mx-auto">
                <div class="flex gap-x-20">
                    <ul>
                        <li class="text-xl text-[#333] font-bold mb-3">آفاق</li>
                        <li class="mb-3 text-[#333]"><a href="#">عن آفاق</a></li>
                        <li class="mb-3 text-[#333]"><a href="#">تواصل معنا</a></li>
                        <li class="mb-3 text-[#333]"><a href="#">شروط والأحكام</a></li>
                    </ul>
                    <ul>
                        <li class="text-xl text-[#333] font-bold mb-3">الروابط</li>
                        <li class="mb-3 text-[#333]"><a href="/">الرئيسية</a></li>
                        <li class="mb-3 text-[#333]"><a href="#">انظم كمدرب</a></li>
                        <li class="mb-3 text-[#333]"><a href="#">فئات</a></A></li>
                    </ul>
                    <ul>
                        <li class="text-xl text-[#333] font-bold mb-3">التواصل</li>
                        <li class="mb-3 text-[#333]">
                            <a href="https://wa.me/218910078151" target="_blank">
                                0910078151
                            </a>
                        </li>
                        <li class="mb-3 text-[#333]"><a href="{{'mailto:mahaalkurmaji8@gmail.com'}}" target="_blank">mahaalkurmaji8@gmail.com</a></li>
                        <li class="mb-3 text-[#333] text-3xl flex gap-x-4">
                            <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="mt-16 text-center text-[#333] font-light">
                   جميع الحقوق محفوظة © {{ date('Y') }} منصة آفاق
                </div>
            </div>
        </div>









</body>
</html>
