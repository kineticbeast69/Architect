<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Auth;
use Date;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\DescriptionList\Node\Description;
use Symfony\Component\CssSelector\Node\FunctionNode;
use function PHPUnit\Framework\returnArgument;

class AdminController extends Controller
{
     public function adminDashboard()
     {
          return view("home");
     }

     // services dahboard function
     public function services()
     {

          $services = Service::select('construction_type', 'title', 'Service_id', 'created_at', 'id')->get();

          return view('admin.services', ['services' => $services]);
     }

     // adding the services form
     public function servicesForm(Request $request)
     {
          $validate = $request->validate([
               'type' => "required|string|min:5|max:50",
               'title' => "required|string|min:20|max:200",
               'description' => "required|string|min:50|max:2000",
               'image' => "nullable|image|mimes:jpg,jpeg,png,gif|max:3048",
          ], [
               "type.required" => "Construction Type field is required.",
               "type.min" => "Type must be greater than 5 characters.",
               "type.max" => "Type can't be greater than 50 characters.",

               "title.required" => "Title field is required.",
               "title.min" => "Title must be greater than 20 characters.",
               "title.max" => "Title can't be greater than 200 characters.",

               "description.required" => "Description field is required.",
               "description.min" => "Description must be greater than 50 characters.",
               "description.max" => "Description can't be greater than 2000 characters.",

               "image.image" => "Only image is allowed.",
               "image.mimes" => "Image can be .jpeg .jpg .gif .png",
               "image.max" => "Image size under 3MB."
          ]);

          // setting the image path
          $imgPath = null;
          if ($request->hasFile('image')) {
               $imgPath = $request->file('image')->store('service', 'public');
          }

          // generating the services id
          $random_int = random_int(1000, 9999);
          $dateTime = Date('Y');
          $services_id = 'SR' . $random_int . $dateTime;

          // saving the services
          $services = Service::create(['Service_id' => $services_id, 'title' => $validate['title'], 'description' => $validate['description'], 'image' => $imgPath, 'construction_type' => $validate['type']]);

          if (!$services) {
               return redirect()->back()->with('tech_error', 'Sorry! We are facing some technical error.');
          }

          return redirect()->route('services')->with('services_add', 'Service Added Succesfully.');
     }

     public function serviceUpdate($serviceID)
     {
          $service = Service::where('Service_id', $serviceID)->select('id', 'title', 'construction_type', 'description', 'image')->firstOrFail();

          return view('admin.serviceUpdate', ['service' => $service]);

     }

     public function serviceUpdateForm(Request $request, $id)
     {
          $validate = $request->validate([
               "type" => "required|string|min:5|max:50",
               "title" => "required|string|min:20|max:200",
               "description" => "required|string|min:50|max:2000",
               "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:3048"
          ], [
               "type.required" => "Type is required.",
               "type.min" => "Type must have 5 characters.",
               "type.max" => "Type can't be greater than 50 characters.",

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

          // fecthing the service
          $service = Service::find($id)->firstOrFail();

          //fethcing the image value
          $imgPath = null;
          if ($request->hasFile('image')) {

               if ($service->image && Storage::exists('public/service/' . $service->image)) {
                    Storage::delete('public/service/' . $service->image);
               }

               // creating the new image path
               $imgPath = $request->file('image')->store('blogs', 'public');
               $service->image = $imgPath;
          }


          // saving the services updated value;
          $service->construction_type = $validate['type'];
          $service->title = $validate['title'];
          $service->description = $validate['description'];

          $service->save();

          return redirect()->route('services')->with('service_update', "Services Updated succesfully.");


     }
     // service info
     public function serviceInfo($id)
     {
          $service = Service::find($id);
          return view('admin.servicesInfo', ['service' => $service]);
     }

     // service delete
     public function serviceDelete($id)
     {
          $service = Service::find($id);
          $service->delete();
          return redirect()->route('service')->with('service_delete', 'Service Deleted succesfully.');

     }

     // contact controller
     public function contacts()
     {
          $finish = Contact::where('status', 'resolved')->get();
          $under_progress = Contact::whereIn('status', ['in-progress', 'reach-out'])->get();
          $new_contacts = Contact::where('status', 'new')->get();

          return view('admin.contacts', ['Dones' => $finish, 'Unders' => $under_progress, 'News' => $new_contacts]);
     }

     // blogs reslated controller are here
     public function blogs()
     {
          // public blog
          $public_blog = Blog::with('users')->where('status', 'public')->get();
          $private_blog = Blog::with('users')->where('status', 'private')->get();
          $update_blog = Blog::with('users')->where('status', 'private')->where('updated_blog', true)->get();
          return view('admin.blogs', ['publics' => $public_blog, 'privates' => $private_blog, 'updates' => $update_blog]);
     }

     // fethcing the blog info
     public function blogInfo($blogID)
     {
          $blog = Blog::where('blog_id', $blogID)->select('title', 'description', 'status', 'blog_id', 'created_at', 'published_at', 'image')->firstOrFail();

          return view('admin.blogInfo', ['blog' => $blog]);
     }

     // delete the blog data
     public function blogDelete($id)
     {
          $delete_blog = Blog::find($id);
          $delete_blog->delete();
          return redirect()->route('blogs')->with('blog_delete', "Blog Delete succesfully.");
     }

     // change the status of blog
     public function blogStatus(Request $request, $id)
     {
          $blog = Blog::findOrFail($id);

          if ($request->status === 'public') {
               $blog->status = 'public';
               $blog->published_at = now();

               if ($blog->updated_blog) {
                    $blog->updated_blog = false; // reset
               }

               $blog->save();

               return redirect()->route('blogs')->with('success', 'Blog published successfully!');
          }

          if ($request->status === 'private') {
               $blog->status = 'private';
               $blog->save();

               return redirect()->route('blogs')->with('success', 'Blog set to private!');
          }

          return redirect()->route('blogs.index')->with('error', 'Invalid status update.');
     }


     public function projects()
     {
          $projects = Project::select('id', 'project_name', 'project_id', 'title', 'created_at')->get();
          return view('admin.projects', ['projects' => $projects]);
     }

     public function projectForm(Request $request)
     {
          $validate = $request->validate([
               'name' => "required|string|min:5|max:25",
               'title' => "required|string|min:20|max:200",
               'description' => "required|string|min:50|max:2000",
               'image' => "nullable|image|mimes:jpg,jpeg,png,gif|max:3048",
          ], [
               "name.required" => "Project Name field is required.",
               "name.min" => "Type must be greater than 5 characters.",
               "name.max" => "Type can't be greater than 25 characters.",

               "title.required" => "Title field is required.",
               "title.min" => "Title must be greater than 20 characters.",
               "title.max" => "Title can't be greater than 200 characters.",

               "description.required" => "Description field is required.",
               "description.min" => "Description must be greater than 50 characters.",
               "description.max" => "Description can't be greater than 2000 characters.",

               "image.image" => "Only image is allowed.",
               "image.mimes" => "Image can be .jpeg .jpg .gif .png",
               "image.max" => "Image size under 3MB."
          ]);

          // setting the image path
          $imgPath = null;
          if ($request->hasFile('image')) {
               $imgPath = $request->file('image')->store('project', 'public');
          }

          // generating the services id
          $random_int = random_int(1000, 9999);
          $dateTime = Date('Y');
          $services_id = 'PR' . $random_int . $dateTime;

          // saving the services
          $projects = Project::create(['project_id' => $services_id, 'title' => $validate['title'], 'description' => $validate['description'], 'image' => $imgPath, 'project_name' => $validate['name']]);

          if (!$projects) {
               return redirect()->back()->with('tech_error', 'Sorry! We are facing some technical error.');
          }

          return redirect()->route('projects')->with('projects_add', 'Projects Added Succesfully.');
     }

     public function projectUpdate($projectID)
     {
          $project = Project::where('project_id', $projectID)->select('id', 'title', 'project_name', 'description', 'image')->firstOrFail();

          return view('admin.projectUpdate', ['project' => $project]);
     }

     public function projectUpdateForm(Request $request, $id)
     {
          $validate = $request->validate([
               "name" => "required|string|min:5|max:25",
               "title" => "required|string|min:20|max:200",
               "description" => "required|string|min:50|max:2000",
               "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:3048"
          ], [
               "name.required" => "Name is required.",
               "name.min" => "Name must have 5 characters.",
               "name.max" => "Name can't be greater than 25 characters.",

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

          // fecthing the service
          $project = Project::find($id)->firstOrFail();

          //fethcing the image value
          $imgPath = null;
          if ($request->hasFile('image')) {

               if ($project->image && Storage::exists('public/project/' . $project->image)) {
                    Storage::delete('public/project/' . $project->image);
               }

               // creating the new image path
               $imgPath = $request->file('image')->store('blogs', 'public');
               $project->image = $imgPath;
          }


          // saving the services updated value;
          $project->project_name = $validate['name'];
          $project->title = $validate['title'];
          $project->description = $validate['description'];

          $project->save();

          return redirect()->route('projects')->with('project_update', "Project Updated succesfully.");


     }

     public function projectDelete($id)
     {
          $project = Project::find($id);
          $project->delete();
          return redirect()->route('projects')->with('projects_delete', 'Project Deleted succesfully.');

     }

     public function teams()
     {
          return view('admin.team');
     }

}
