<?php

namespace App\Http\Controllers\Frontend\Contact;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Controllers\Controller;
use App\Mail\SendMailContact;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailContact;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;

class ContactController extends Controller
{
    protected $contact;
    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }
    public function index()
    {
        $contact = Contact::query()->orderBy('id', 'desc')->first();
        return view('frontend.contact.index', compact('contact'));
    }
    public function create(Request $request)
    {
//        $request->validated();
//        $newsContact = $this->contact->create($request->validated());
        dispatch(New SendEmailContact($request->all()));
        return redirect()->route('contact.index');
    }
}
