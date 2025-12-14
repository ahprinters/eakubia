<x-layouts.app :title="__('Add Student')">
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-xl font-bold mb-4">ব্যক্তিগত তথ্য</h1>

        <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" placeholder="Enter name" class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
            </div>
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" placeholder="Enter email" class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
            </div>
            
            <!-- Class -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Class</label>
                <input type="text" name="class" placeholder="Enter class" class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
            </div>
            <!-- phone -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" placeholder="Enter phone" class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
            </div>
            <!-- Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" placeholder="Enter address" class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2">
            </div>  

            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <select name="gender" class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            

            <!-- Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" value="1" class="mr-2" checked>
                <label class="text-sm text-gray-700">Active</label>
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Save Student
            </button>
        </form>
    </div>
</x-layouts.app>