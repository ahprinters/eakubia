<!-- Name -->
<div>
    <label class="block text-sm font-medium text-gray-700">Name(English)</label>
    <input type="text" name="name_en" placeholder="Enter name in English"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700">Name(Bangla)</label>
    <input type="text" name="name_bn" placeholder="Enter name in Bangla"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2">
</div>

<!-- Email -->
<div>
    <label class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="email" placeholder="Enter email"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
</div>

<!-- Class -->
<div>
    <label class="block text-sm font-medium text-gray-700">Class</label>
    <input type="text" name="class" placeholder="Enter class"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
</div>

<!--Roll Number-->
<div>
    <label class="block text-sm font-medium text-gray-700">Roll Number</label>
    <input type="text" name="roll_number" placeholder="Enter roll number"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
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

 
<!-- Phone -->
<div>
    <label class="block text-sm font-medium text-gray-700">Phone</label>
    <input type="text" name="phone" placeholder="Enter phone"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2" required>
</div>

<!-- Date of Birth -->
<div>
    <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
    <input type="date" name="date_of_birth" class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2">
</div>
<!-- NID / Birth certificate -->
<div>
    <label class="block text-sm font-medium text-gray-700">NID / Birth Certificate</label>
    <input type="text" name="nid_birth_certificate" placeholder="Enter NID or Birth Certificate number"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2">
</div>

<!-- Blood Group -->
<div>
    <label class="block text-sm font-medium text-gray-700">Blood Group</label>
    <select name="blood_group" class="w-full border rounded text-gray-900 px-3 py-2" required>
        <option value="">Select Blood Group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>
</div>

<!-- Nationality -->
<div>
    <label class="block text-sm font-medium text-gray-700">nationality</label>
    <input type="text" name="nationality" placeholder="Enter your nationality"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2">
</div>

<!-- Religion -->
<div>
    <label class="block text-sm font-medium text-gray-700">Religion</label>
    <select name="religion" class="w-full border rounded text-gray-900 px-3 py-2" required>
        <option value="">Select Religion</option>
        <option value="Islam">Islam</option>
        <option value="Hinduism">Hinduism</option>
        <option value="Christianity">Christianity</option>
        <option value="Buddhism">Buddhism</option>
        <option value="Other">Other</option>
    </select>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700">Address</label>
    <input type="text" name="address" placeholder="Enter address"
           class="w-full border rounded text-gray-900 placeholder-gray-400 px-3 py-2">
</div>


<!-- Active -->
<div class="flex items-center">
    <input type="checkbox" name="is_active" value="1" class="mr-2" checked>
    <label class="text-sm text-gray-700">Active</label>
</div>