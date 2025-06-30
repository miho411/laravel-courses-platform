<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>آفاق | التسجيل كمدرب</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style=" font-family: 'Noto Sans Arabic', sans-serif;" class=" text-gray-900 antialiased">
    @include('navcourses')
        <div class=" pt-[85px] container mx-auto px-4 ">
               <div class="py-16">
                  <h2 class="text-4xl text-center text-[#333] mb-6">كن مدربا في آفاق</h2>
                  <p class="text-lg text-center text-[#333] ">الرجاء تعبئة بيانتك الشخصية لتتمكن من اضافة دوراتك</p>
               </div>

               <form method="POST" action="{{ route('instructor.store', $user->id) }}" enctype="multipart/form-data" >
                 @csrf
                 @method('PATCH')
                 <div class="flex gap-20 mb-20">
                  <div class="flex-1">
                     <!-- Name -->
                     <div class="mt-4">
                       <x-input-label for="name" :value="__('الإسم الكامل بالعربي')" />
                       <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus required autocomplete="name" />
                       <x-input-error :messages="$errors->get('name')" class="mt-2" />
                     </div>
                     <!-- Specialization -->
                     <div class="mt-4">
                       <x-input-label for="specialization" :value="__('التخصص')" />
                       <x-text-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" required  />
                       <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
                     </div>
                     <!-- Qualifications -->
                     <div class="mt-4">
                       <x-input-label for="qualification" :value="__('المؤهلات العلمية')" />
                       <x-text-input id="qualification" class="block mt-1 w-full" type="text" name="qualification" :value="old('qualification')" required />
                       <x-input-error :messages="$errors->get('qualification')" class="mt-2" />
                     </div>
                     <!-- job -->
                     <div class="mt-4">
                       <x-input-label for="job" :value="__('المهنة')" />
                       <x-text-input id="job" class="block mt-1 w-full" type="text" name="job" :value="old('job')" required />
                       <x-input-error :messages="$errors->get('job')" class="mt-2" />
                     </div>
                     <!-- Bio -->
                     <div class="mt-4">
                         <label for="bio" class="block font-medium text-sm text-gray-700">نبدة عن المدرب</label>
                         <textarea id="bio" name="bio" rows="5" cols="50" placeholder="" required value="{{old('bio')}}" class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full"></textarea>
                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                    </div>
                     <!-- Cv_path -->
                     <div class="mt-4 " x-data="{fileName:''}">
                        <label for="cv" class="block font-medium text-sm text-gray-700">السيرة الذاتية</label>
                        <div class="border p-[6px] border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm mt-1 ">
                            <!-- زر رفع الملف -->
                            <label for="cv" class="inline-flex items-center gap-2 cursor-pointer bg-myRed text-white px-3 py-1 rounded-md hover:bg-myRedd active:bg-myRed ">
                               <!-- أيقونة رفع -->
                               <span>رفع ملف</span>
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-4 text-white">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                               </svg>
                           </label>

                           <!-- حقل رفع الملفات (مخفي) -->
                           <input
                           id="cv"
                           type="file"
                           class="hidden"
                           accept=".pdf,.doc,.docx,.ppt,.pptx"
                           name="cv_path"
                           @change="fileName = $event.target.files[0]?.name"
                           >

                           <!-- إظهار اسم الملف -->
                           <template x-if="fileName">
                              <span class="text-sm text-gray-700 font-semibold" x-text="fileName" ></span>
                           </template>
                        </div>
                        <x-input-error :messages="$errors->get('cv_path')" class="mt-2" />
                     </div>
                     <!-- Profile_photo -->
                     <div class="mt-4 " x-data="{photoName:''}">
                        <label for="photo" class="block font-medium text-sm text-gray-700">الصورة الشخصية</label>
                        <div class="border p-[6px] border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm mt-1 ">
                            <!-- زر رفع الملف -->
                            <label for="photo" class="inline-flex items-center gap-2 cursor-pointer bg-myRed text-white px-3 py-1 rounded-md hover:bg-myRedd active:bg-myRed ">
                               <!-- أيقونة رفع -->
                               <span>رفع صورة</span>
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-4 text-white">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                               </svg>
                           </label>

                           <!-- حقل رفع الملفات (مخفي) -->
                           <input
                           id="photo"
                           type="file"
                           class="hidden"
                           accept=".jpg, .jpeg, .png, .webp"
                           name="profile_photo"
                           @change="photoName = $event.target.files[0]?.name"
                           >

                           <!-- إظهار اسم الملف -->
                           <template x-if="photoName">
                              <span class="text-sm text-gray-700 font-semibold" x-text="photoName" ></span>
                           </template>
                        </div>
                        <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />

                     </div>

                 </div>
                 <div class="flex-1">
                     <!-- website -->
                     <div class="mt-4">
                       <x-input-label for="website" :value="__('رابط موقعك')" />
                       <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('websiteb') " placeholder="http://www.something.com"  />
                       <x-input-error :messages="$errors->get('website')" class="mt-2" />
                     </div>
                     <!-- facebook -->
                     <div class="mt-4">
                       <x-input-label for="facebook" :value="__('رابط الفيسبوك')" />
                       <x-text-input id="facebook" class="block mt-1 w-full" type="text" name="facebook" :value="old('facebook')"  placeholder="http://www.facebook.com/Your.Profile.Here" />
                       <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                     </div>
                     <!-- instagram -->
                     <div class="mt-4">
                       <x-input-label for="instagram" :value="__('رابط الإنستغرام')" />
                       <x-text-input id="instagram" class="block mt-1 w-full" type="text" name="instagram" :value="old('instegram')" placeholder="http://www.instagram.com/Your.Profile.Here" />
                       <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                     </div>
                     <!-- x -->
                     <div class="mt-4">
                       <x-input-label for="x" :value="__('رابط التويتر')" />
                       <x-text-input id="x" class="block mt-1 w-full" type="text" name="x" :value="old('x')"  placeholder="http://www.x.com/Your.Profile.Here" />
                       <x-input-error :messages="$errors->get('x')" class="mt-2" />
                     </div>
                     <!-- youtube -->
                     <div class="mt-4">
                       <x-input-label for="youtube" :value="__('رابط اليوتيوب')" />
                       <x-text-input id="youtube" class="block mt-1 w-full" type="text" name="youtube" :value="old('youtube')"  placeholder="http://www.youtube.com/Your.Profile.Here" />
                       <x-input-error :messages="$errors->get('youtube')" class="mt-2" />
                     </div>
                     <!-- linkedin -->
                     <div class="mt-4">
                       <x-input-label for="linkedin" :value="__('رابط لينكد إن')" />
                       <x-text-input id="linkedin" class="block mt-1 w-full" type="text" name="linkedin" :value="old('linkedin')" placeholder="http://www.linkedin.com/Your.Profile.Here" />
                       <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                     </div>
                     <div class="pt-[152px] flex justify-end ">
                         <x-primary-button class="ms-4">
                        {{ __('تسجيل') }}
                         </x-primary-button>
                     </div>
                  </div>
                 </div>

               </form>
        </div>
    </body>
</html>
