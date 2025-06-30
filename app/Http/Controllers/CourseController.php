<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class CourseController extends Controller
{
    public function create($id)
    {
        $categories = Category::all();
        $instructor = User::findOrFail($id);
        return view('create-course', compact('instructor','categories'));
    }

    public function store(Request $request, $id )
    {
        /*dd(['title'            => $request->title,
            'subtitle'         => $request->subtitle,
            'category_id'      => $request->category_id,
            'level'            => $request->level,
            'cover_image'      => $request->file('cover_image'),
            'promo_video'      => $request->file('promo_video'),
            'description'      => $request->description,
            'objectives'       => $request->objectives,
            'requirements'     => $request->requirements,
            'target_audience'  => $request->target_audience,
            'is_free'          => $request->is_free,
            'price'            => $request->price,
            'contents'         =>$request->contents,
        ]);*/
        $instructor = User::findOrFail($id);
        $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'subtitle'      => ['nullable', 'string', 'max:255'],
            'category_id'   => ['required', 'exists:categories,id'],
            'level'         => ['required', 'in:beginner,intermediate,advanced,all levels'],
            'cover_image'   => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'], // 5MB
            'promo_video'   => ['required', 'file', 'mimetypes:video/mp4,video/webm,video/ogg,video/ogv,video/mov,video/avi,video/mkv,video/wmv,video/flv', 'max:153600'], // 50MB

            //وصف الدورة
            'description'       => ['required', 'string'],
            'objectives'        => ['required', 'string'],
            'requirements'      => ['required', 'string'],
            'target_audience'   => ['required', 'string'],

            //السعر
            'price'     => ['required_unless:is_free,true', 'nullable', 'integer', 'min:0', 'max:1000'],
            'is_free'   => ['nullable', 'in:true'],

            //محتوى الدورة
            /*'contents'              => ['required', 'array', 'min:1'],
            'contents.*.title'      => ['required', 'string', 'max:255'],
            'contents.*.file' => [
                'required',
                'file',
                'mimetypes:
                    video/mp4,
                    video/webm,
                    video/ogg,
                    video/ogv,
                    video/mov,
                    video/avi,
                    video/mkv,
                    video/wmv,
                    video/flv,
                    application/pdf',
                'max:10485760', // 10GB
            ],
            'contents.*.is_free' => ['nullable', 'in:true'],*/

        ]);
        $coverImage = $request->file('cover_image')->store('courses_images', 'public');
        $promoVideo = $request->file('promo_video')->store('promo_videos', 'public');
        $course = $instructor->courses()->create([
            'title'            => $request->title,
            'subtitle'         => $request->subtitle,
            'category_id'      => $request->category_id,
            'level'            => $request->level,
            'cover_image'      => $coverImage,
            'promo_video'      => $promoVideo,
            'description'      => $request->description,
            'objectives'       => $request->objectives,
            'requirements'     => $request->requirements,
            'target_audience'  => $request->target_audience,
            'is_free'          => $request->boolean('is_free'),
            'price'            => $request->is_free ? null : $request->price,
            'status'           => 'pending',
        ]);



        foreach ($request->contents as $content) {
            $uploadedFile = $content['file'];
            $path = $uploadedFile->store('course_contents', 'public');
            $order = ($course->contents()->max('order') ?? 0) + 1;
            $course->contents()->create([
               'title' => $content['title'],
               'file_path' => $path,
               'order' => $order,
               'is_free' => isset($content['is_free']) ? true : false,
            ]);
        }

        return redirect('/');

    }
}
