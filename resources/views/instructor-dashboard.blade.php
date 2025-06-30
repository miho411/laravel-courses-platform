<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لوحة تحكم المدرب</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style=" font-family: 'Noto Sans Arabic', sans-serif;" class="bg-gray-50 ">
    <header class="bg-myRed grid grid-cols-3 gap-2 px-6 fixed top-0 right-0 left-0 z-10 h-[65px] shadow">
        <div class="col-start-2 flex justify-center items-center">
            <a href="/" >
                <img src="{{ asset('images/White AFAQ Logo Ver.png') }}" alt="AFAQ logo" class="w-[120px] h-auto" >
            </a>
        </div>
        <div class="flex justify-end items-center ml-8">
            <div class="text-white text-lg font-semibold mx-4">{{$instructor->name}}</div>
            <img src="{{ asset('storage/'. $instructor->profile_photo) }}" alt="profile photo" class="rounded-full w-[36px] h-[36px] ">
        </div>
    </header>



        <!-- القائمة الجانبية -->
        <aside class="bg-white w-64 h-[calc(100vh-65px)] border-l shadow-md p-4 fixed top-[65px] right-0 bottom-0 flex flex-col gap-6 ">
            <a href="#" class="flex items-center gap-6 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-[24px] text-[#757575] mr-2" viewBox="0 0 512 512"><path d="M204 240H68a36 36 0 01-36-36V68a36 36 0 0136-36h136a36 36 0 0136 36v136a36 36 0 01-36 36zM444 240H308a36 36 0 01-36-36V68a36 36 0 0136-36h136a36 36 0 0136 36v136a36 36 0 01-36 36zM204 480H68a36 36 0 01-36-36V308a36 36 0 0136-36h136a36 36 0 0136 36v136a36 36 0 01-36 36zM444 480H308a36 36 0 01-36-36V308a36 36 0 0136-36h136a36 36 0 0136 36v136a36 36 0 01-36 36z"></path></svg>
                <span>لوحة التحكم</span>
            </a>
            <a href="#" class="flex items-center gap-6 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-[24px] text-[#757575] mr-2 " viewBox="0 0 512 512"><path d="M16 352a48.05 48.05 0 0048 48h133.88l-4 32H144a16 16 0 000 32h224a16 16 0 000-32h-49.88l-4-32H448a48.05 48.05 0 0048-48v-48H16zm240-16a16 16 0 11-16 16 16 16 0 0116-16zM496 96a48.05 48.05 0 00-48-48H64a48.05 48.05 0 00-48 48v192h480z"></path></svg>
                <span>جميع الدورات</span>
            </a>
            <a href="#" class="flex items-center gap-6 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-[24px] text-[#757575] mr-2 " viewBox="0 0 512 512"><path d="M368 16H144a64.07 64.07 0 00-64 64v352a64.07 64.07 0 0064 64h224a64.07 64.07 0 0064-64V80a64.07 64.07 0 00-64-64zm-34.52 268.51c7.57 8.17 11.27 19.16 10.39 30.94C342.14 338.91 324.25 358 304 358s-38.17-19.09-39.88-42.55c-.86-11.9 2.81-22.91 10.34-31S292.4 272 304 272a39.65 39.65 0 0129.48 12.51zM192 80a16 16 0 0116-16h96a16 16 0 010 32h-96a16 16 0 01-16-16zm189 363.83a12.05 12.05 0 01-9.31 4.17H236.31a12.05 12.05 0 01-9.31-4.17 13 13 0 01-2.76-10.92c3.25-17.56 13.38-32.31 29.3-42.66C267.68 381.06 285.6 376 304 376s36.32 5.06 50.46 14.25c15.92 10.35 26.05 25.1 29.3 42.66a13 13 0 01-2.76 10.92z"></path></svg>
                <span>إعدادات</span>
            </a>

            <a href="{{ route('course.create', $instructor->id) }}" class="mt-2 bg-myRed hover:bg-myRedd active:bg-myRed text-white py-3 px-4 rounded-md shadow flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>إنشاء دورة</span>

            </a>
        </aside>

        <!-- المحتوى الرئيسي -->
        <main class="flex-1  pt-[89px] pr-[280px] pb-6 pl-6">
            <h2 class="text-2xl font-bold mb-4">الرئيسية</h2>
            <div class="bg-white rounded shadow p-4">
                <div class="flex gap-2">
                    <button class="bg-gray-800 text-white px-4 py-1 rounded">7 أيام</button>
                    <button class="text-gray-700 hover:text-[#fa532e]">آخر 30 يومًا</button>
                    <button class="text-gray-700 hover:text-[#fa532e]">آخر 90 يومًا</button>
                    <button class="text-gray-700 hover:text-[#fa532e]">آخر 365 يومًا</button>
                </div>
                <!-- محتوى إحصائيات أو غيره هنا -->
            </div>
        </main>


</body>
</html>
