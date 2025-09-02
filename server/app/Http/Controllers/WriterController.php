<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Str;
use function Laravel\Prompts\select;
use function PHPUnit\Framework\returnArgument;

class WriterController extends Controller
{
    public function writerDashboard()
    {
        $public_blog = Blog::where('author_id', auth()->id())->where('status', 'public')->select('id', 'blog_id', 'title', 'status', 'published_at', 'created_at')->get();

        $private_blog = Blog::where("author_id", auth()->id())->where('status', 'private')->select('id', 'blog_id', 'title', 'status', 'published_at', 'created_at')->get();


        return view('writerDashboard', ['privates' => $private_blog, 'publics' => $public_blog]);

    }

    public function addBlogFrom(Request $request)
    {
        $validate = $request->validate([
            "title" => "required|string|min:20|max:200",
            "description" => "required|string|min:50|max:2000",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:3048"
        ], [
            "title.required" => "Enter the title.",
            "title.min" => "Title must have at least 20 characters.",
            "title.max" => "Title can't be greater than 200 characters.",

            "description.required" => "Enter the description.",
            "description.min" => "Description must have at least 50 characters.",
            "description.max" => "Description can't be greater than 2000 characters.",

            "image.image" => "Only image files are allowed.",
            "image.mimes" => "Image can be .jpeg, .png, .jpg, .gif only.",
            "image.max" => "Image size must be under 3MB."
        ]);

        // getting the image path
        $imgPath = null;
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store("blogs", 'public');
        }

        // blog id
        $random_int = random_int(1000, 9999);
        $dateTime = date('Y');
        $blog_id = 'AR' . $random_int . 'BL' . $dateTime;

        // saving the blog data
        $save_blog = Blog::create(['blog_id' => $blog_id, 'author_id' => Auth::id(), 'title' => $validate['title'], 'description' => $validate['description'], 'slug' => Str::slug($validate['title']), 'image' => $imgPath]);


        if (!$save_blog) {
            return redirect()->back()->with('tech_error', "Sorry! We are facing some technical error");
        }

        return redirect()->route('writer.dashboard')->with('blog_success', "Blog saved succesfully.");
    }

    public function udpateBlog($blogID)
    {
        $find_blog = Blog::where('blog_id', $blogID)->select('id', 'blog_id', 'title', 'description', 'image')->first();

        if (!$find_blog) {
            return redirect()->with('tech_error', 'Sorry! We are facing some technical error.');
        }

        return view('updateblog', ['blog' => $find_blog]);

    }

    public function updateBlogForm(Request $request, $blogID, $id)
    {
        $validate = $request->validate([
            "title" => "required|string|min:20|max:200",
            "description" => "required|string|min:50|max:2000",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:3048"
        ], [
            "title.required" => "Title is required.",
            "title.min" => "Title must have 20 characters.",
            "title.max" => "Title can't be greater than 200 characters.",

            "description.required" => "Description is required.",
            "description.min" => "Description must have atleast 50 characters.",
            "description.max" => "Description can't be greater than 2000 characters.",

            "image.image" => "Only image is allowed.",
            "image.mimes" => "Image can be only .jpeg .jpg .png. .gif",
            "images.max" => "Image size can't be greater than 3MB."
        ]);

        // fecthing the blog
        $blog = Blog::where('id', $id)->where('blog_id', $blogID)->firstOrFail();

        //fethcing the image value
        $imgPath = null;
        if ($request->hasFile('image')) {

            if ($blog->image && Storage::exists('public/blog/' . $blog->image)) {
                Storage::delete('public/blog/' . $blog->image);
            }

            // creating the new image path
            $imgPath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imgPath;
        }

        // checking the status
        if ($blog->status === 'public') {
            $blog->status = 'private';
        }


        // saving the blog updated value;
        $updated_blog = $blog->updated_blog;
        $blog->title = $validate['title'];
        $blog->slug = Str::slug($validate['title']);
        $blog->description = $validate['description'];
        $blog->updated_blog = !$updated_blog;

        $blog->save();

        return redirect()->route('writer.dashboard')->with('blog_update', "Blog Added succesfully.");


    }
}
