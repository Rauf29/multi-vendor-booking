<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateVendorProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $vendorProfile = auth()->user()->vendorProfile;

        return view('vendor.profile.edit', compact('vendorProfile'));
    }

    public function update(UpdateVendorProfileRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->vendorProfile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'business_name' => $request->business_name,
                'slug' => $request->slug,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'bio' => $request->bio,
                'is_approved' => false,
                'approved_at' => null,
            ]
        );

        return redirect()
            ->route('vendor.profile.edit')
            ->with('status', 'Vendor profile saved successfully. Approval pending.');
    }
}
