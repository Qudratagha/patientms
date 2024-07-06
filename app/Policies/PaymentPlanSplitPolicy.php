<?php

namespace App\Policies;

use App\Models\PaymentPlanSplit;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PaymentPlanSplitPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PaymentPlanSplit $paymentPlanSplit): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PaymentPlanSplit $paymentPlanSplit): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PaymentPlanSplit $paymentPlanSplit): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PaymentPlanSplit $paymentPlanSplit): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PaymentPlanSplit $paymentPlanSplit): bool
    {
        //
    }
}
