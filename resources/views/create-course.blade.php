<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>آفاق | إنشاء دورة تدربية</title>
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
 <div class="py-[85px]">
    <form method="POST" action="{{ route('course.store', $instructor->id) }}" enctype="multipart/form-data" x-data="{
    step: 1,
    goToStep(n) {
        if (n >= 1 && n <= 4) this.step = n;
    }
    }" class="max-w-3xl mx-auto p-6 bg-white rounded-xl shadow-md ">
    @csrf

      <!-- Step Indicators with Text and Arrows -->
       <div class="flex justify-center items-center gap-x-2 mt-6 mb-6">
          <template x-for="(label, index) in ['معلومات الدورة', 'وصف الدورة', 'تحميل الدورة', 'تحديد السعر']">
             <div class="flex items-center gap-x-1">
                 <div :class="{
                     'bg-myRed text-white': step === index + 1,
                     'bg-gray-100 text-gray-700': step !== index + 1
                       }"
                       class="flex items-center gap-x-2 px-3 py-1 rounded-full cursor-pointer text-sm font-medium"
                       @click="goToStep(index + 1)">
                      <span class="w-6 h-6 rounded-full flex items-center justify-center font-bold"
                           :class="step === index + 1 ? 'bg-white text-myRed' : 'bg-gray-200 text-gray-700'">
                           <span x-text="index + 1"></span>
                     </span>
                     <span x-text="label"></span>
                 </div>

                 <!-- Arrow except after last step -->
                 <template x-if="index < 3">
                   <span class="text-gray-400 text-lg px-1">←</span>
                 </template>
             </div>
         </template>
       </div>


      <!-- Step 1: Basic Info -->
      <div x-show="step === 1" >
          <h2 class="text-2xl mt-10 mb-8 ">معلومات الدورة</h2>
          <div class="mt-4">
            <x-input-label for="title" :value="__('عنوان الدورة')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
         </div>
          <div class="mt-4">
            <x-input-label for="subtitle" :value="__('عنوان الدورة الفرعي')" />
            <x-text-input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle" :value="old('subtitle')"   />
            <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
         </div>

         <div class="mt-4">
            <label for="category_id" class="block font-medium text-sm text-gray-700 ">اختر الفئة</lable>
            <select id="category_id" name="category_id" class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full">
                <option value="">اختر الفئة</option>
                @foreach ($categories as $category )
                    <option value="{{ $category->id }}">{{$category->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
         </div>
         <div class="mt-4">
            <label for="level" class="block font-medium text-sm text-gray-700 ">اختر المستوى</lable>
            <select id="level" name="level" class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full">
                <option value="beginner">مبتدئ</option>
                <option value="intermediate">متوسط</option>
                <option value="advanced">متقدم</option>
                <option value="all levels">جميع المستويات</option>
            </select>
            <x-input-error :messages="$errors->get('level')" class="mt-2" />
         </div>
         <div class="mt-4">
            <lable for="cover_image" class="block font-medium text-sm text-gray-700 ">صورة غلاف الدورة</lable>
            <input id="cover_image" type="file" name="cover_image" accept=".jpg, .jpeg, .png, .webp" class="block w-full border border-gray-400 rounded p-2 !mt-2 font-medium text-sm text-gray-700 file:border-none  file:bg-myRed file:text-sm file:text-white file:hover:bg-myRedd file:active:bg-myRed file:py-1 file:px-3 file:rounded">
            <x-input-error :messages="$errors->get('cover_image')" class="mt-2" />
         </div>
         <div class="mt-4">
            <lable for="promo_video" class="block font-medium text-sm text-gray-700 ">الفيديو الترويجي</lable>
            <input id="promo_video" type="file" name="promo_video" accept="video/*" class="block w-full border border-gray-400 rounded p-2 !mt-2 font-medium text-sm text-gray-700 file:border-none  file:bg-myRed file:text-sm file:text-white file:hover:bg-myRedd file:active:bg-myRed file:py-1 file:px-3 file:rounded">
            <x-input-error :messages="$errors->get('promo_video')" class="mt-2" />
         </div>
          <div class="mt-6 mb-4 flex justify-end">
              <button type="button" @click="goToStep(2)" class="bg-myRed text-white px-4 py-2 rounded hover:bg-myRedd active:bg-myRed ">التالي</button>
          </div>
      </div>

      <!-- Step 2: Description -->
      <div x-show="step === 2">
          <h2 class="text-2xl mt-10 mb-8">وصف الدورة</h2>
          <div class="mt-4">
            <lable for="description" class="block font-medium text-sm text-gray-700" >وصف الدورة</lable>
            <textarea id="description" name="description" placeholder="" class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full" required autofocus></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
          </div>
          <div class="mt-4">
            <lable for="objectives" class="block font-medium text-sm text-gray-700" >ماذا سيتعلم الطلاب في هذه الدورة؟</lable>
            <textarea id="objectives" name="objectives" placeholder="" class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full" required></textarea>
            <x-input-error :messages="$errors->get('objectives')" class="mt-2" />
          </div>
          <div class="mt-4">
            <lable for="requirements" class="block font-medium text-sm text-gray-700" >ماهي المتطلبات الاساسية لأخد هذه الدورة؟</lable>
            <textarea id="requirements" name="requirements" placeholder="" class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full" required></textarea>
            <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
          </div>
          <div class="mt-4">
            <lable for="target_audience" class="block font-medium text-sm text-gray-700" >لِمن موجهة هذه الدورة؟</lable>
            <textarea id="target_audience" name="target_audience" placeholder="" class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full" ></textarea>
            <x-input-error :messages="$errors->get('target_audience')" class="mt-2" />
          </div>
          <div class="mt-6 mb-4 flex justify-between">
              <button type="button" @click="goToStep(1)" class="bg-gray-200 hover:bg-gray-300 active:bg-gray-200 text-gray-700 px-4 py-2 rounded">السابق</button>
              <button type="button" @click="goToStep(3)" class="bg-myRed text-white hover:bg-myRedd active:bg-myRed px-4 py-2 rounded">التالي</button>
          </div>
        </div>

      <!-- Step 3: Course Content -->
      <div x-show="step === 3">
          <h2 class="text-2xl mt-10 mb-8">محتوى الدورة</h2>
          <div x-data="{
              contents: [
                  { title: '', file: null, fileName: '' }
              ],
              addContent() {
                  this.contents.push({ title: '', file: null, fileName: '' });
              },
              removeContent(index) {
                 this.contents.splice(index, 1);
              }
           }">
              <template x-for="(content, index) in contents" :key="index">
                 <div class="border p-4 mb-4 rounded bg-gray-50 space-y-2">
                     <input type="text" :name="`contents[${index}][title]`"
                        placeholder="عنوان المحتوى"
                        x-model="contents[index].title"
                        class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full" required>


                       <!-- زر رفع الملف -->
                       <label :for="`file-upload-${index}`" class="inline-flex items-center gap-2 cursor-pointer bg-myRed text-white px-3 py-1 rounded-md hover:bg-myRedd active:bg-myRed ">
                         <!-- أيقونة رفع -->
                          <span>رفع ملف</span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-4 text-white">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                          </svg>
                       </label>

                       <!-- حقل رفع الملفات (مخفي) -->
                       <input
                          :id="`file-upload-${index}`"
                          type="file"
                          class="hidden"
                          accept=".mp4, .webm, .ogg, .ogv, .mov, .avi, .mkv, .wmv, .flv, .pdf"
                          :name="`contents[${index}][file]`"
                          @change="
                          contents[index].file = $event.target.files[0];
                          contents[index].fileName = $event.target.files[0]?.name;
                          "
                        >

                       <!-- إظهار اسم الملف -->
                       <template x-if="contents[index].fileName">
                          <span class="text-sm text-gray-700 font-semibold" x-text="contents[index].fileName" ></span>
                       </template>

                       <div class="">
                        <p class="text-xs text-gray-500 mt-2">الحد الأقصى لحجم الملف : 10GB</p>
                        <p class="text-xs text-gray-500">الملفات المسموح بها : ملفات الفيديو، وملفات pdf.</p>
                       </div>




                     <button type="button"
                      @click="removeContent(index)"
                      x-show="contents.length > 1"
                      class="text-gray-800 text-sm hover:text-red-600">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-gray-800 hover:text-red-600 inline">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                      </svg>
                      حدف
                      </button>
                 </div>
             </template>

             <button type="button" @click="addContent"
              class="bg-green-600 text-white px-4 py-2 rounded">
               إضافة محتوى آخر
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white inline">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
            @if ($errors->has('contents'))
           <div class="mt-2 text-sm text-red-600">
           تأكدي من ملء عنوان كل محتوى وتحميل ملف (PDF أو فيديو) صالح.
           </div>
           @endif

         </div>

          <div class="mt-6 mb-4 flex justify-between ">
              <button type="button" @click="goToStep(2)" class="bg-gray-200 hover:bg-gray-300 active:bg-gray-200 text-gray-700 px-4 py-2 rounded">السابق</button>
              <button type="button" @click="goToStep(4)" class="bg-myRed text-white hover:bg-myRedd active:bg-myRed px-4 py-2 rounded">التالي</button>
          </div>
      </div>

      <!-- Step 4: Pricing -->
      <div x-show="step === 4">
          <h2 class="text-2xl mt-10 mb-8">تحديد السعر</h2>
          <div class="mt-4">
            <lable for="price" class="block font-medium text-sm text-gray-700">سعر الدورة</lable>
            <select id="price" name="price" class="border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm block mt-1 w-full">
               <option value="">اختر السعر</option>
              @for ($price = 50; $price <= 1000; $price += 10)
                 <option value="{{ $price }}">{{$price.'د.ل'}}</option>
              @endfor
            </select>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
          </div>
          <div class="mt-4 flex items-center">
            <input id="is_free" type="checkbox" name="is_free" value="true" class="w-5 h-5 appearance-none border cursor-pointer border-gray-300  rounded-md ml-2 hover:border-myRedd hover:bg-myRed checked:bg-no-repeat checked:bg-center checked:border-myRedd checked:bg-myRed hover:checked:border-myRed hover:checked:bg-myRed hover:checked:ring-myRed focus:checked:border-myRed focus:checked:bg-myRed focus:checked:ring-myRed focus:ring-myRed ">
            <label for="is_free" class="text-sm text-gray-600 cursor-pointer ">الدورة مجانية</label>
            <x-input-error :messages="$errors->get('is_free')" class="mt-2" />
          </div>
          <div class="mt-6 mb-4 flex justify-between">
              <button type="button" @click="goToStep(3)" class="bg-gray-200 hover:bg-gray-300 active:bg-gray-200 text-gray-700 px-4 py-2 rounded">السابق</button>
              <button type="submit" class="bg-green-600 hover:bg-green-700 active:bg-green-600 text-white px-4 py-2 rounded">إرسال للمراجعة</button>
          </div>
      </div>
  </form>
 </div>

</body>
</html>
