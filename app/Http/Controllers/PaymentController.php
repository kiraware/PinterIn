<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Models\Bank;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = auth()->user()->is_admin
            ? Payment::with(['user', 'course', 'bank'])->latest()->get()
            : auth()->user()->payments()->with(['course', 'bank'])->latest()->get();

        return view('payments.index', compact('payments'));
    }

    public function create(Course $course)
    {
        $banks = Bank::all();

        return view('payments.create', compact('course', 'banks'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'account_number' => 'required|string',
            'payment_proof' => 'required|image|mimes:jpeg,png|max:5120',
        ]);

        $filename = time().'.'.$request->payment_proof->extension();
        $request->payment_proof->storeAs('payment_proofs', $filename);
        $validated['payment_proof'] = $filename;

        Payment::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'bank_id' => $request->bank_id,
            'amount' => $course->price,
            'account_number' => $request->account_number,
            'payment_proof' => $filename,
            'status' => PaymentStatus::PENDING,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment submitted successfully.');
    }

    public function updateStatus(Request $request, Payment $payment)
    {
        if ($payment->status !== PaymentStatus::PENDING) {
            abort(403, 'Status cannot be changed again.');
        }

        $request->validate([
            'status' => 'required|in:'.implode(',', [PaymentStatus::COMPLETED->value, PaymentStatus::FAILED->value]),
        ]);

        $payment->status = $request->status;
        $payment->save();

        if ($payment->status === PaymentStatus::COMPLETED) {
            Enrollment::firstOrCreate([
                'user_id' => $payment->user_id,
                'course_id' => $payment->course_id,
            ]);
        }

        return redirect()->route('payments.index')->with('success', 'Payment status updated.');
    }

    /**
     * Show the payment proof.
     */
    public function showPaymentProof(Payment $payment): StreamedResponse
    {
        $path = 'payment_proofs/'.$payment->payment_proof;

        if (Storage::disk('local')->exists($path)) {
            $headers = [
                'Content-Type' => File::mimeType(Storage::disk('local')->path($path)),
            ];

            return Storage::download($path, $payment->payment_proof, $headers);
        }

        abort(404);
    }
}
