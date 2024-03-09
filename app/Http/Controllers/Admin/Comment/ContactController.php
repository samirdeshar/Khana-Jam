<?php

namespace App\Http\Controllers\Admin\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactFormNotification;
use Illuminate\Support\Facades\Log;
use Kamaln7\Toastr\Facades\Toastr;
use Throwable;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder_name = "admin.messages.";
    public function index()
    {
        $messages = Comment::orderByDesc('created_at')->get();
        $data = [
            'messages' => $messages,
            'n' => '1'
        ];
        return view($this->folder_name . 'messages', $data);
    }


    public function destroy(Request $request, $comment)
    {
        $comment = Comment::findOrFail($comment);
        DB::beginTransaction();
        try {
            $comment->delete();
            DB::commit();
            Toastr::success('Successfully Deleted', 'Thank You');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::warning($th->getMessage(), 'OOPs !!!');
        }
        return back();
    }

    public function contact_us(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $contact = Contact::create($request->all());
            $admin = User::first();
            $admin->notify(new ContactFormNotification($contact));
            DB::commit();
            Toastr::success('Message Sent', 'We will contact you soon!!');
            return back()->with('success', 'Message Sent....We will contact you soon!!');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::warning($th->getMessage(), 'OOPs !!!');
        }
    }
    public function contact_view()
    {
        $data = Contact::orderbyDesc('created_at')
                    ->get();
        return view('admin.contact_us.contact_us', compact('data'));

    }
    public function contact_destroy(Request $request, $message)
    {
        // dd('test');
        $message = Contact::findOrFail($message);
        DB::beginTransaction();
        try {
            $message->delete();
            DB::commit();
            Toastr::success('Successfully Deleted', 'Thank You');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::warning($th->getMessage(), 'OOPs !!!');
        }
        return back();
    }
}
