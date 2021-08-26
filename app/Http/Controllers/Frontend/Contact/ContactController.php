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
        return view('frontend.contact.index');
    }
    public function create(StoreContactRequest $request)
    {
        $newsContact = $this->contact->create($request->validated());
        dispatch(New SendEmailContact($newsContact))->delay(Carbon::now()->addMinutes(1));      
        return redirect()->route('contact.index')->with('status', lang::get('messages.sendmail'));
    }
}
