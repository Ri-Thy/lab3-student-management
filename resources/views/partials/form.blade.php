<div class="space-y-6">

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">
            Student Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $student?->name ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-4 py-2"
            placeholder="Enter student name"
            required
        >

        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $student?->email ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-4 py-2"
            placeholder="student@example.com"
            required
        >

        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">
            Phone
        </label>

        <input
            type="text"
            name="phone"
            value="{{ old('phone', $student?->phone ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-4 py-2"
            placeholder="012 345 678"
        >

        @error('phone')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">
            Gender
        </label>

        <select
            name="gender_id"
            class="w-full rounded-lg border border-slate-300 px-4 py-2"
            required
        >
            <option value="">Select gender</option>

            @foreach ($genders as $gender)
                <option
                    value="{{ $gender->id }}"
                    @selected((string) old('gender_id', $student?->gender_id ?? '') === (string) $gender->id)
                >
                    {{ $gender->name }}
                </option>
            @endforeach

        </select>

        @error('gender_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

</div>