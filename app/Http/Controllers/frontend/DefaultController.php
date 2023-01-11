<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\AgentContact;
use App\Mail\ContactusMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Cookie, Crypt, Mail, Session};

class DefaultController extends Controller
{
    public function contactus()
    {
        return view('frontend.contactus');
    }

    public function showblog($id)
    {
        $id = Crypt::decrypt($id);
        $blog = Blog::where('id', $id)->first();

        $viewed = Session::get('viewed_blog', []);
        
        if (!in_array($id, $viewed)) {
            $blog->increment('view');
            Session::push('viewed_blog', $id);
        }

        return view('frontend.blogs.blog',compact('blog'));
    }


    public function showAllBlog()
    {
        $blogs = Blog::latest()->get();

        return view('frontend.blogs.allblogs',compact('blogs'));
    }

    public function contactusmail(Request $request)
    {
        try {
            $details = [];
            $details = $request->all();
            
            $mail = $request->tomail;
            Mail::to($mail)->send(new ContactusMail($details));              
            
            return redirect()->back()->with('success', 'Mail sent successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function agentContact(Request $request)
    {
        // try {
            $agentContact = [];
            $agentContact = $request->all();
            
            $mail = $request->toemail;
            Mail::to($mail)->send(new AgentContact($agentContact));              
            
            return redirect()->back()->with('success', 'Mail sent successfully.');
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Something went wrong.');
        // }
    }
}
