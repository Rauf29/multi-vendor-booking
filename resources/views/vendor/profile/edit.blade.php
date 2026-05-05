<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vendor Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if (session('status'))
                    <div class="mb-4 text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('vendor.profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="business_name">Business Name</label>
                        <input type="text" name="business_name" id="business_name" value="{{ old('business_name', $vendorProfile?->business_name) }}" class="block w-full mt-1">
                        @error('business_name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $vendorProfile?->slug) }}" class="block w-full mt-1">
                        @error('slug') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $vendorProfile?->phone) }}" class="block w-full mt-1">
                        @error('phone') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $vendorProfile?->address) }}" class="block w-full mt-1">
                        @error('address') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $vendorProfile?->city) }}" class="block w-full mt-1">
                        @error('city') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" class="block w-full mt-1">{{ old('bio', $vendorProfile?->bio) }}</textarea>
                        @error('bio') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="px-4 py-2 bg-black text-white rounded">
                        Save Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
