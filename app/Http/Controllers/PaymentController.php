<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use App\Models\Payment;

use Exception;

class PaymentController extends Controller
{
    public function panel($payments)
    {
        $panel = 'Pagamentos';
        return view('auth.payment.index', compact('payments', 'panel'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('enrolment', 'article')
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($payments);
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $payments = Payment::with('enrolment.student.user', 'article')
            ->whereHas('enrolment', fn($q) => $q->where('code', 'like', "%{$search}%"))
            ->orWhereHas('article', fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orWhereHas('enrolment.student.user', fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($payments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.payment.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        try{
            Payment::create($request->all());
            flash()->success('Artigo criado com successo');
            return redirect()->route('payments.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::find($id);
        return view('auth.payment.form', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, string $id)
    {
        try{
            $payment = Payment::find($id);
            $payment->update($request->all());
            flash()->success('Artigo editado com successo');
            return redirect()->route('payments.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $payment = Payment::find($id);
            $payment->delete();
            flash()->success('Artigo eliminado com successo');
            return redirect()->route('payments.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
